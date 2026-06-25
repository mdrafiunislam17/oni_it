@extends("admin.layouts.master")

@section("title", "Create Order")

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
        .required-star { color: #e11d48; }
        .section-title { font-size: 18px; font-weight: 700; color: #334155; margin: 25px 0 15px; }
        .product-row {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 14px;
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
        .btn-back, .btn-add-product, .btn-remove-product { border-radius: 14px; padding: 12px 18px; font-weight: 600; }
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
        .order-summary {
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 18px;
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
                                <div class="page-header-icon"><i class="fas fa-cart-plus"></i></div>
                                Create Order
                            </h1>
                            <div class="page-header-subtitle mt-2">Create a new customer order with products and payment details</div>
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


                                <form id="orderForm" action="{{ route('dashboard.order.store') }}" method="POST">
                                @csrf

                                <div class="section-title">Customer Information</div>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name <span class="required-star">*</span></label>
                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email <span class="required-star">*</span></label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone <span class="required-star">*</span></label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Post Code</label>
                                        <input type="text" name="post_code" class="form-control" value="{{ old('post_code') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address 1 <span class="required-star">*</span></label>
                                        <input type="text" name="address1" class="form-control" value="{{ old('address1') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Address 2</label>
                                        <input type="text" name="address2" class="form-control" value="{{ old('address2') }}">
                                    </div>
                                </div>

                                <div class="section-title">Products</div>
                                <div id="productWrapper">
                                    <div class="product-row">
                                        <div class="row g-3 align-items-end">
                                            <div class="col-md-7">
                                                <label class="form-label">Product <span class="required-star">*</span></label>
                                                <select name="products_id[]" class="form-control product-select" required>
                                                    <option value="">Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}"
                                                                data-price="{{ $product->discount ? $product->discount : $product->price }}">
                                                            {{ $product->title }} - {{ $product->discount ? $product->discount : $product->price }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Quantity <span class="required-star">*</span></label>
                                                <input type="number" name="quantity[]" class="form-control quantity-input" value="1" min="1" required>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-outline-danger btn-remove-product w-100">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="addProduct" class="btn btn-outline-primary btn-add-product">
                                    + Add Product
                                </button>

                                <div class="section-title">Order & Payment</div>
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <label class="form-label">Coupon Discount</label>
                                        <input type="number" name="coupon" id="coupon" class="form-control" value="{{ old('coupon', 0) }}" min="0">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Payment Method <span class="required-star">*</span></label>
                                        <select name="payment_method" class="form-control" required>
                                            <option value="">Select Method</option>
                                            <option value="cash_on_hand" {{ old('payment_method') == 'cash_on_hand' ? 'selected' : '' }}>Cash</option>
                                            <option value="bkash" {{ old('payment_method') == 'bkash' ? 'selected' : '' }}>Bkash</option>
                                            <option value="nagad" {{ old('payment_method') == 'nagad' ? 'selected' : '' }}>Nagad</option>
{{--                                            <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Card</option>--}}
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Payment Status</label>
                                        <select name="payment_status" class="form-control">
                                            <option value="unpaid" {{ old('payment_status', 'unpaid') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                            <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Order Status</label>
                                        <select name="status" class="form-control">
                                            <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="delivered" {{ old('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="order-summary">
                                            <div class="d-flex justify-content-between mb-2">
                                                <strong>Sub Total:</strong>
                                                <strong id="subTotalText">0.00</strong>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <strong>Total Amount:</strong>
                                                <strong id="totalAmountText">0.00</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="action-btns">
                                    <button id="submitBtn" type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-1"></i> Save Order
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
                    <div>Processing your request</div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@push("scripts")
    <script>
        const productWrapper = document.getElementById('productWrapper');
        const addProductBtn = document.getElementById('addProduct');
        const couponInput = document.getElementById('coupon');
        const subTotalText = document.getElementById('subTotalText');
        const totalAmountText = document.getElementById('totalAmountText');
        const orderForm = document.getElementById('orderForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        function calculateTotal() {
            let subTotal = 0;

            document.querySelectorAll('.product-row').forEach(row => {
                const select = row.querySelector('.product-select');
                const quantity = parseInt(row.querySelector('.quantity-input').value || 0);
                const price = parseFloat(select.options[select.selectedIndex]?.dataset.price || 0);
                subTotal += price * quantity;
            });

            const coupon = parseFloat(couponInput.value || 0);
            const total = subTotal - coupon;

            subTotalText.innerText = subTotal.toFixed(2);
            totalAmountText.innerText = Math.max(total, 0).toFixed(2);
        }

        function bindRowEvents(row) {
            row.querySelector('.product-select').addEventListener('change', calculateTotal);
            row.querySelector('.quantity-input').addEventListener('input', calculateTotal);
            row.querySelector('.btn-remove-product').addEventListener('click', function () {
                if (document.querySelectorAll('.product-row').length > 1) {
                    row.remove();
                    calculateTotal();
                }
            });
        }

        document.querySelectorAll('.product-row').forEach(bindRowEvents);
        couponInput.addEventListener('input', calculateTotal);

        addProductBtn.addEventListener('click', function () {
            const firstRow = document.querySelector('.product-row');
            const newRow = firstRow.cloneNode(true);
            newRow.querySelector('.product-select').value = '';
            newRow.querySelector('.quantity-input').value = 1;
            productWrapper.appendChild(newRow);
            bindRowEvents(newRow);
            calculateTotal();
        });

        if (orderForm) {
            orderForm.addEventListener('submit', function () {
                if (submitLoader) submitLoader.style.display = 'flex';
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Saving...';
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

        calculateTotal();
    </script>
@endpush
