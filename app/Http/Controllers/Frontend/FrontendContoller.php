<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Gallery;
use App\Models\Hero;
use App\Models\Microcity;
use App\Models\Page;
use App\Models\Product;
use App\Models\Promotions;
use App\Models\Property;
use App\Models\Rate;
use App\Models\ResortConventionHall;
use App\Models\Scheme;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Shipping;
use App\Models\Slider;
use App\Models\SpecialGoal;
use App\Models\Vision;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\SdItem;
use App\Models\SdOrderList;
use App\Models\SdOrderMore;

class FrontendContoller extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $collections = Category::query()
            ->where('activity', 1)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->take(8)
            ->get();

        $mainPromo = Promotions::query()
            ->where('type', 'main')
            ->where('status', 1)
            ->first();

        $rightPromos = Promotions::query()
            ->whereIn('type', ['wide', 'small'])
            ->where('status', 1)
            ->get();

        $galleries = Gallery::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->where('type', 'gallery')
            ->orderBy('id', 'desc')
            ->get();

        $aboutStories = About::query()
            ->where('activity', '!=', 0)
            ->latest()
            ->first();

        $sliders = Slider::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy("sort")
            ->take(4)
            ->get();

        $resortConventionHalls = ResortConventionHall::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($item) {
                $item->property_type = 'resort';
                return $item;
            });

        $microcities = Microcity::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($item) {
                $item->property_type = 'microcity';
                return $item;
            });

        $properties = ResortConventionHall::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $goals = SpecialGoal::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('serial', 'asc')
            ->get();

        $visions = Vision::query()
                ->where('activity', '!=', 0)
            ->get();
        $serviceCategory = ServiceCategory::query()
            ->where('activity', '!=', 0)
            ->get();

        return view('frontend.index',
            compact(
                'settings',
                'collections',
                'mainPromo',
                'rightPromos',
                'galleries',
                'aboutStories',
                'sliders',
                'properties',
                'goals',
                'visions',
                'serviceCategory',
            )
        );
    }

    public function about()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::query()->where('section_type', 'about')
            ->where('activity', '!=', 0)
            ->where('activity', 1)
            ->first();
        $goals = SpecialGoal::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('serial', 'asc')
            ->get();

        $visions = Vision::query()
            ->where('activity', '!=', 0)
            ->get();


        return view('frontend.about',
            compact('settings','about','goals','visions'));

    }

    public function company()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.company',
            compact('settings'));
    }

    public function chairman()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        $chairman = About::query()->where('section_type', 'chairman_message')
            ->where('activity', '!=', 0)
            ->where('activity', 1)
            ->first();

        return view('frontend.chairman',
            compact('settings','chairman'));

    }

    public function account()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        $account = About::query()->where('section_type', 'accounts_director')
            ->where('activity', '!=', 0)
            ->where('activity', 1)
            ->first();

        return view('frontend.account',
            compact('settings','account'));

    }



    public function managingDirector()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $md = About::query()->where('section_type', 'managing_director_message')
            ->where('activity', '!=', 0)
            ->where('activity', 1)
            ->first();

        return view('frontend.managingDirector',
            compact('settings','md'));

    }

    public function services()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::query()
            ->where('activity', '!=', 0)
            ->latest()->first();

        return view('frontend.services',
            compact('settings','about'));

    }

    public function servicesDetail()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::query()
            ->where('activity', '!=', 0)
            ->latest()->first();

        return view('frontend.service-detail',
            compact('settings','about'));

    }


    public function property($type = 'ongoing')
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $properties = Property::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view('frontend.property',
            compact('settings','properties','type'));

    }

    public function propertyDetail($title)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $about = About::query()
            ->where('activity', '!=', 0)
            ->latest()
            ->first();

        $property = Property::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->where('title', $title) // অথবা slug হলে slug ব্যবহার করবে
            ->firstOrFail();

        $properties = Property::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->take(12)
            ->get();


        return view('frontend.propertyDetail',
            compact('settings','about','property','title','properties'));
    }

    public function microcity()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $microcity = Microcity::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->latest()->first();
        return view('frontend.microcity',compact('settings','microcity'));

    }

    public function microcityDetail($title)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();



        $microcity = Microcity::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->where('title', $title)
            ->firstOrFail();


        return view('frontend.microcityDetail',
            compact('settings','microcity','title'));
    }


    public function resortConventionHall()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $resortConventionHall = ResortConventionHall::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(9);
        return view('frontend.resort-convention-halls',compact('settings','resortConventionHall'));

    }

    public function resortConventionHallDetail($title)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();



        $resortConventionHall = ResortConventionHall::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->where('title', $title)
            ->firstOrFail();


        return view('frontend.resort-convention-hallsDetail',
            compact('settings','resortConventionHall','title'));
    }


    public function blog()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::query()
            ->where('activity', '!=', 0)
            ->latest()->first();

        return view('frontend.blog',
            compact('settings','about'));

    }


    public function blogDetail()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $about = About::query()
            ->where('activity', '!=', 0)
            ->latest()->first();

        return view('frontend.blogDetail',
            compact('settings','about'));

    }




    public function product($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with('category')
            ->where('status', 1)
            ->where('activity', 1)

            ->when(request('q'), function ($query) {
                $query->where('name', 'like', '%' . request('q') . '%');
            })

            ->when(request('categories'), function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->whereIn('slug', request('categories'));
                });
            })

            ->latest()
            ->paginate(12);
        $categories = Category::where('activity', 1)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->withCount('products')
            ->get();

        $settings = Setting::pluck("value", "setting_name")->toArray();
        $sliders = Slider::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->orderBy("sort")
            ->get();

        return view('frontend.product', compact('category', 'products', 'settings','categories','sliders'));
    }

    public function productDetails($slug){
        $product = Product::query()
            ->where('slug', $slug)
            ->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(6)
            ->get();

        $settings = Setting::pluck("value", "setting_name")->toArray();

        return view('frontend.productDetails', compact('product', 'settings','relatedProducts'));
    }


    public function show($slug)
    {
        $settings = Setting::pluck("value", "setting_name")->toArray();

        // sidebar categories (reuse same logic)
        $category = Category::where('activity', 1)
            ->where('status', 1)
            ->where('front_view', '!=', 0)
            ->where('front_view', '<=', 4)
            ->orderBy('id', 'asc')
            ->get();

        // selected category
        $categorys = Category::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // products
        $products = $categorys->products()
            ->where('status', 1)
            ->where('activity', 1)
            ->latest()
            ->get();

        return view('frontend.category.show', compact(
            'categorys',
            'products',
            'settings',
            'category'
        ));
    }


    public function category()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        $collections = Category::where('activity', 1)
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('frontend.category',
            compact('settings', 'collections'));

    }

    public function savingScheme()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.savingScheme',
            compact('settings'));

    }

    public function submitSavingScheme(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $scheme = new Scheme();

            $scheme->name = $request->name;
            $scheme->phone = $request->phone;
            $scheme->email = $request->email;
            $scheme->location = $request->location;
            $scheme->amount = $request->amount;


            $scheme->save();

            return redirect()->back()
                ->with('success', 'Scheme created successfully');

        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }

    }


    public function contact()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.contact',
            compact('settings'));

    }


    public function termsUs()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.termsUs',
            compact('settings'));

    }


    public function privacyPolicy()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.privacyPolicy',
            compact('settings'));

    }

    public function gallery()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $galleries = Gallery::query()
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->where('type', 'gallery')
            ->orderBy('id', 'desc')
            ->get();


        return view('frontend.gallery',
            compact('settings','galleries'));

    }


    public function basundhara()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.pageShow',
            compact('settings'));

    }
    public function collections()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.collections',
            compact('settings'));

    }
    public function visitOurStore()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.visitOurStore',
            compact('settings'));

    }


    public function pageShow($slug)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $page = Page::where('slug', $slug)
            ->where('activity', '!=', 0)
            ->where('status', 1)
            ->firstOrFail();
        return view('frontend.pageShow', compact('settings','page'));

    }
    public function goldJewelleryGuide()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.goldJewelleryGuide',
            compact('settings'));

    }
    public function diamondBuyingGuide()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.diamondBuyingGuide',
            compact('settings'));

    }
    public function jewelleryCareTips()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.jewelleryCareTips',
            compact('settings'));

    }
    public function ringSizeGuide()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.ringSizeGuide',
            compact('settings'));

    }
    public function bangleSizeGuide()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.bangleSizeGuide',
            compact('settings'));

    }
    public function easyExchange()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.easyExchange',
            compact('settings'));

    }
    public function jewelleryCertification()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.jewelleryCertification',
            compact('settings'));

    }
    public function goldRateInfo()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.goldRateInfo',
            compact('settings'));

    }
    public function orderAssistance()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.orderAssistance',
            compact('settings'));

    }
    public function giftPackaging()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.giftPackaging',
            compact('settings'));

    }

    public function shippingPolicy()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.shippingPolicy',
            compact('settings'));

    }
    public function returnPolicy()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.returnPolicy',
            compact('settings'));

    }

    public function termsAndConditions()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.termsAndConditions',
            compact('settings'));

    }

    public function cancellationPolicy()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.cancellationPolicy',
            compact('settings'));

    }


//    public function index($page)
//    {
//        $pageData = Page::where('slug', $page)
//                         ->where('status', 1)
//                         ->firstOrFail();
//
//        $settings = Setting::pluck("value", "setting_name")->toArray();
//
//        $hero = Hero::where('page_id', $pageData->id)->latest()->first();
//
//        $galleries = Gallery::where('page_id', $pageData->id)
//            ->where('activity', '!=', 0)
//            ->where('type', 'gallery')
//            ->orderBy('id', 'desc')
//            ->get();
//
//        $review = Gallery::where('page_id', $pageData->id)
//            ->where('activity', '!=', 0)
//            ->where('type', 'review')
//            ->orderBy('id', 'desc')
//            ->get();
//
//        $detail = Detail::where('page_id', $pageData->id)->first();
//        $details = Detail::where('page_id', $pageData->id)->latest()->first();
//
//        $products = Product::where('page_id', $pageData->id)
//            ->where('activity', '!=', 0)
//            ->orderBy('id', 'desc')
//            ->get();
//
//        $shippings = Shipping::where('page_id', $pageData->id)->get();
//
//        return view('frontend.index', compact(
//            'settings',
//            'hero',
//            'galleries',
//            'detail',
//            'products',
//            'details',
//            'review',
//            'shippings',
//            'pageData'
//        ));
//    }



    public function order(Request $request)
    {
//        dd(request()->all());

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'cart_data' => 'required',
            'page_id' => 'required|integer|exists:pages,id',
        ]);

        DB::connection('mysql')->beginTransaction();
        DB::connection('mysql2')->beginTransaction();

        try {
            $cartData = json_decode($request->cart_data, true);

            if (!$cartData || !is_array($cartData)) {
                return redirect()->back()->with('error', 'Cart data invalid.');
            }

            $orderNumber = strtoupper(Str::random(8));
            $now = now();
            $date = $now->format('Y-m-d');

            $order = Order::create([
                'users_id' => auth()->check() ? auth()->id() : null,
                'page_id' => $request->page_id,
                'order_number' => $orderNumber,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
                'payment_status' => 'unpaid',
                'name' => $request->name,
                'phone' => $request->phone,
                'address1' => $request->address,
                'subtotal' => $request->subtotal ?? 0,
                'shipping_charge' => $request->shipping_charge ?? 0,
                'total' => $request->total ?? 0,
            ]);

            SdOrderMore::create([
                'order_id' => $orderNumber,
                'invoice_id' => '',
                'customerID' => 326,
                'clnt_mob' => $request->phone,
                'customer_name' => $request->name,
                'mobile' => $request->phone,
                'address' => $request->address,
                'reference' => '',
                'customer_category' => '',
                'discount' => $request->discount ?? 0,
                'shipping' => $request->shipping_charge ?? 0,
                'g_total' => $request->total ?? 0,
                'prev_due' => 0,
                'total_rcv' => 0,
                'p_mathod' => $request->payment_method ?? 'cod',
                'delivery_type' => '',
                'agent_comm' => 0,
                'type' => 1,
                'area_officer' => 1,
                'note' => $request->note ?? '',
                'salesID' => 9,
                'sales_p' => 0,
                'time' => $now,
                'date' => $date,
                'full_date' => $now,
                'l_time' => $now,
                'pathao' => 0,
                'pathao_status' => 0,
                'pathao_status_updated_at' => $now,
                'activity' => 2,
                'reseller_activity' => 2,
                'print_activity' => 0,
                'branch' => 1,
                'up_date' => $now,
                'order_type' => 'leading',
            ]);

            foreach ($cartData as $item) {
                $qty = $item['quantity'] ?? 1;

                $sdItem = SdItem::find($item['id']);

                if (!$sdItem) {
                    throw new \Exception('Second DB product not found. Product ID: ' . $item['id']);
                }

                $price = $item['price'] ?? $sdItem->sell ?? 0;
                $lineTotal = $qty * $price;

                OrderItem::create([
                    'orders_id' => $order->id,
                    'products_id' => $item['id'],
                    'quantity' => $qty,
                    'price' => $price,
                    'cart_data' => json_encode($item),
                ]);

                SdOrderList::create([
                    'orderID' => $orderNumber,
                    'customerID' => 326,
                    'clnt_mob' => $request->phone,
                    'cat' => $sdItem->category,
                    'pro_id' => $sdItem->id,
                    'title' => $sdItem->item_name,
                    'unit' => $sdItem->unit ?? 'pcs',
                    'details' => $sdItem->details ?? '',
                    'agent_point' => $sdItem->point ?? 0,
                    'unit_cost' => $sdItem->unit_cost ?? 0,
                    'price' => $price,
                    'qty' => $qty,
                    'line_total' => $lineTotal,
                    'ses' => $price * $qty,
                    'date' => $date,
                    'time' => now(),
                    'branch' => $sdItem->branch ?? 1,
                    'activity' => 1,
                    'type' => '1',
                    'remove_time' => '',
                    'up_date' => now(),
                ]);
            }


            DB::connection('mysql')->commit();
            DB::connection('mysql2')->commit();

            return redirect()->back()->with('success', 'আপনার অর্ডার সফলভাবে সম্পন্ন হয়েছে!');

        } catch (\Exception $e) {
            DB::connection('mysql')->rollBack();
            DB::connection('mysql2')->rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
