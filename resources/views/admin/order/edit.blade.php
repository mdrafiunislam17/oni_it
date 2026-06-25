@extends("admin.layouts.master")

@section("title", "Edit Order")

@push("styles")
    <style>
        body { background: #f1f5f9; }
        .page-wrapper { margin-top: -75px; }
        .order-card {
            border: none;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.10);
        }
        .order-card .card-header {
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            color: #fff;
            padding: 24px 28px;
            border-bottom: none;
        }
        .order-card .card-header h4 { margin: 0; font-weight: 700; font-size: 22px; }
        .order-card .card-header p { margin: 6px 0 0; opacity: .9; font-size: 14px; }
        .order-card .card-body { padding: 30px; background: #fff; }
        .form-label { font-weight: 600; color: #334155; margin-bottom: 8px; }
        .form-control {
            border-radius: 14px;
            min-height: 48px;
            border: 1px solid #dbe3ef;
            box-shadow: none !important;
            transition: .25s ease;
        }
        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.12) !important;
        }
        .section-title { font-size: 18px; font-weight: 700; color: #334155; margin: 25px 0 15px; }
        .info-box {
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 18px;
        }
        .action-btns { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 28px; }
        .btn-submit {
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            color: #fff;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
            transition: .25s ease;
        }
        .btn-submit:hover { color: #fff; transform: translateY(-2px); box-shadow: 0 12px 22px rgba(139, 92, 246, .25); }
        .btn-back { border-radius: 14px; padding: 12px 24px; font-weight: 600; }
        .custom-alert { border-radius: 14px; padding: 14px 16px; margin-bottom: 18px; }
        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.78);
            backdrop-filter: blur(4px);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .page-wrapper { margin-top: -55px; }
            .order-card .card-body { padding: 20px; }
        }
    </style>
@endpush

@section("content")
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fas fa-edit"></i></div>
                                Edit Order
                            </h1>
                            <div class="page-header-subtitle mt-2">Update order and payment status</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <div id="default">
                        <div class="card mb-4">
                            <div class="card-header">Add Screenshot </div>
                            <div class="card-body">

                                @if(session('success'))
                                    <div class="custom-alert custom-alert-success alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">✓</div>
                                        <div class="custom-alert-content">
                                            <strong>Success:</strong> {{ session('success') }}
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">⛔</div>
                                        <div class="custom-alert-content">
                                            <strong>Error:</strong> {{ session('error') }}
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">⛔</div>
                                        <div class="custom-alert-content">
                                            <strong>Error:</strong>
                                            <ul class="mb-0 ps-3">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif

                                <div class="card-header">
                            <h4 >Edit Order Status</h4>
                            <p >Order Number: {{ $order->order_number }}</p>
                        </div>



                            <div class="section-title">Order Information</div>
                            <div class="info-box mb-4">
                                <div class="row g-3">
                                    <div class="col-md-6"><strong>Customer:</strong> {{ $order->name }} </div>
{{--                                    <div class="col-md-6"><strong>Email:</strong> {{ $order->email }}</div>--}}
                                    <div class="col-md-6"><strong>Phone:</strong> {{ $order->phone }}</div>
                                    <div class="col-md-6"><strong>Total:</strong> {{ number_format($order->total, 2) }}</div>
                                </div>
                            </div>

                            <form id="orderForm" action="{{ route('dashboard.order.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Order Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ old('status', $order->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="delivered" {{ old('status', $order->status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>

{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="form-label">Payment Status</label>--}}
{{--                                        <select name="payment_status" class="form-control" required>--}}
{{--                                            <option value="unpaid" {{ old('payment_status', $order->payment_status) == 'unpaid' ? 'selected' : '' }}>Unpaid</option>--}}
{{--                                            <option value="paid" {{ old('payment_status', $order->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="section-title">Order Items</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->orderItems as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->product->title ?? 'N/A' }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->price, 2) }}</td>
                                                <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="action-btns">
                                    <button id="submitBtn" type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-1"></i> Update Order
                                    </button>
                                    <a href="{{ route('dashboard.order.index') }}" class="btn btn-outline-secondary btn-back">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="submitLoader" class="submit-loader" style="display: none;">
            <div class="custom-alert1 custom-alert-info custom-alert-loading text-center" role="alert">
                <div class="custom-alert-content">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="" style="width: 200px">
                    <br>
                    <strong>Please wait...</strong>
                    <div>Updating your order</div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@push("scripts")
    <script>
        const orderForm = document.getElementById('orderForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (orderForm) {
            orderForm.addEventListener('submit', function () {
                if (submitLoader) submitLoader.style.display = 'flex';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Updating...';
                }
            });
        }

        setTimeout(function () {
            document.querySelectorAll('.custom-alert').forEach(function (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>
@endpush
