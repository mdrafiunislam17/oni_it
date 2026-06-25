<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $orders = Order::query()
            ->with('orderItems.product', 'user')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.order.index', compact('settings', 'orders'));
    }

    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $products = Product::query()->where('activity', 1)->where('status', 1)->get();

        return view('admin.order.create', compact('settings', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:50',
            'address1' => 'required|string',
            'payment_method' => 'required|string',

            'products_id' => 'required|array',
            'products_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
        ]);

        try {
            $subTotal = 0;

            foreach ($request->products_id as $key => $productId) {
                $product = Product::findOrFail($productId);
                $quantity = $request->quantity[$key];

                $price = $product->discount ? $product->discount : $product->price;
                $subTotal += $price * $quantity;
            }

            $coupon = $request->coupon ?? 0;
            $totalAmount = max($subTotal - $coupon, 0);

            $order = new Order();

            $order->users_id = Auth::id();
            $order->order_number = 'ORD-' . strtoupper(Str::random(10));
            $order->status = $request->status ?? 'pending';
            $order->payment_method = $request->payment_method;
            $order->payment_status = $request->payment_status ?? 'unpaid';

            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->country = $request->country;
            $order->post_code = $request->post_code;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;

            $order->coupon = $coupon;
            $order->sub_total = $subTotal;
            $order->total_amount = $totalAmount;

            $order->save();

            foreach ($request->products_id as $key => $productId) {
                $product = Product::findOrFail($productId);

                $orderItem = new OrderItem();
                $orderItem->orders_id = $order->id;
                $orderItem->products_id = $product->id;
                $orderItem->quantity = $request->quantity[$key];
                $orderItem->price = $product->discount ? $product->discount : $product->price;
                $orderItem->save();
            }

            return redirect()->route('dashboard.order.index')
                ->with('success', 'Order created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function show(Order $order)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $order->load('orderItems.product', 'user');

        return view('admin.order.show', compact('settings', 'order'));
    }

    public function edit(Order $order)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $order->load('orderItems.product');
        $products = Product::query()->where('activity', 1)->where('status', 1)->get();

        return view('admin.order.edit', compact('settings', 'order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        try {
            $order->status = $request->status;
            $order->cancel_note = $request->cancel_note;

            $order->save();

            return redirect()->route('dashboard.order.index')
                ->with('success', 'Order updated successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }
    }

    public function destroy(Order $order)
    {
        try {
            $order->orderItems()->delete();
            $order->delete();

            return redirect()->route('dashboard.order.index')
                ->with('success', 'Order has been deleted');

        } catch (\Exception $exception) {
            return redirect()->route('dashboard.order.index')
                ->with('error', $exception->getMessage());
        }
    }
}
