@extends("admin.layouts.master")

@section("title", "Order Details")

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
        .section-title { font-size: 18px; font-weight: 700; color: #334155; margin: 25px 0 15px; }
        .info-box {
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 18px;
        }
        .info-item { margin-bottom: 10px; color: #334155; }
        .info-item strong { color: #0f172a; }
        .btn-back { border-radius: 14px; padding: 12px 24px; font-weight: 600; }
        @media (max-width: 768px) {
            .page-wrapper { margin-top: -55px; }
            .order-card .card-body { padding: 20px; }
        }
    </style>
    <style>
        /* Your existing styles remain the same */
        .tox-tinymce-aux,
        .tox-dialog,
        .tox-menu,
        .tox-collection--list {
            z-index: 999999 !important;
        }

        .cke_notifications_area {
            display: none;
        }

        .custom-alert {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 45px 14px 16px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
            justify-content: center;
        }

        .custom-alert1 {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 45px 14px 16px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .custom-alert-icon {
            width: 26px;
            min-width: 26px;
            height: 26px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: bold;
            margin-top: 2px;
        }

        .custom-alert-content {
            flex: 1;
        }

        .custom-alert-close {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            opacity: .6;
        }

        .custom-alert-close:hover {
            opacity: 1;
        }

        .custom-alert-success {
            background: #dff0d8;
            border-color: #c3e6cb;
            color: #3c763d;
        }

        .custom-alert-success .custom-alert-icon {
            border: 2px solid #3c763d;
            color: #3c763d;
        }

        .custom-alert-danger {
            background: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }

        .custom-alert-danger .custom-alert-icon {
            border: 2px solid #a94442;
            color: #a94442;
        }

        .custom-alert-warning {
            background: #fcf8e3;
            border-color: #faebcc;
            color: #8a6d3b;
        }

        .custom-alert-warning .custom-alert-icon {
            border: 2px solid #8a6d3b;
            color: #8a6d3b;
        }

        .custom-alert-info {
            background: #d9edf7;
            border-color: #bce8f1;
            color: #31708f;
        }

        .custom-alert-info .custom-alert-icon {
            border: 2px solid #31708f;
            color: #31708f;
        }

        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(3px);
            z-index: 9999999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-alert-loading {
            min-width: 360px;
            max-width: 420px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 0;
            animation: fadeInUp 0.25s ease;
        }

        .spinner-icon {
            width: 26px;
            min-width: 26px;
            height: 26px;
            border: 3px solid #bce8f1 !important;
            border-top: 3px solid #31708f !important;
            border-right: 3px solid #31708f !important;
            border-bottom: 3px solid #bce8f1 !important;
            border-left: 3px solid #bce8f1 !important;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            font-size: 0;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .image-preview-box {
            width: 120px;
            height: 120px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            margin-top: 10px;
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .custom-modal {
            display: none;
            position: fixed;
            z-index: 99999999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .custom-modal-content {
            background: #fff;
            width: 100%;
            max-width: 460px;
            border-radius: 14px;
            padding: 30px 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            animation: fadeInUp 0.25s ease;
        }

        .custom-modal-content .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .custom-modal-content h3 {
            margin-bottom: 12px;
            font-weight: 700;
            color: #222;
        }

        .custom-modal-content p {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .modal-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-cancel,
        .btn-delete {
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-delete {
            background: #198754;
            color: #fff;
        }

        .btn-delete.btn-danger-custom {
            background: #dc3545;
        }

        #cancelNote {
            width: 100%;
            min-height: 100px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 12px;
            resize: vertical;
            outline: none;
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
                                <div class="page-header-icon"><i class="fas fa-receipt"></i></div>
                                Order Details
                            </h1>
                            <div class="page-header-subtitle mt-2">Order Number: {{ $order->order_number }}</div>
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

                                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <h4 >{{ $order->order_number }}</h4>
                                <p >Full order information</p>
                            </div>
{{--                            <a href="{{ route('dashboard.order.edit', $order->id) }}" class="btn btn-light text-primary">--}}
{{--                                Edit Order--}}
{{--                            </a>--}}
                        </div>

                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="section-title">Customer Information</div>
                                    <div class="info-box">
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

                                        @if(!empty($order->name))
                                            <div class="info-item"><strong>Name:</strong> {{ $order->name }}</div>
                                        @endif

                                        @if(!empty($order->email))
                                            <div class="info-item"><strong>Email:</strong> {{ $order->email }}</div>
                                        @endif

                                        @if(!empty($order->page_id))
                                            <div class="info-item"><strong>Page Name:</strong> {{ $order->page->title }}</div>
                                        @endif

                                            @if(!empty($order->phone))
                                                <div class="info-item"><strong>Phone:</strong> {{ $order->phone }}</div>
                                            @endif


                                        @if(!empty($order->country))
                                            <div class="info-item"><strong>Country:</strong> {{ $order->country }}</div>
                                        @endif

                                        @if(!empty($order->post_code))
                                            <div class="info-item"><strong>Post Code:</strong> {{ $order->post_code }}</div>
                                        @endif

                                        @if(!empty($order->address1))
                                            <div class="info-item"><strong>Address :</strong> {{ $order->address1 }}</div>
                                        @endif

                                        @if(!empty($order->address2))
                                            <div class="info-item"><strong>Address 2:</strong> {{ $order->address2 }}</div>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="section-title">Order Information</div>
                                    <div class="info-box">
                                        <div class="info-item"><strong>Order Number:</strong> {{ $order->order_number }}</div>
                                        <div class="info-item"><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</div>
                                        <div class="info-item">
                                            <strong>Order Status:</strong>
                                            <span class="badge bg-primary rounded-pill">{{ ucfirst($order->status) }}</span>
                                        </div>
{{--                                        <div class="info-item">--}}
{{--                                            <strong>Payment Status:</strong>--}}
{{--                                            @if($order->payment_status == 'paid')--}}
{{--                                                <span class="badge bg-success rounded-pill">Paid</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge bg-danger rounded-pill">Unpaid</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="info-item"><strong>Sub Total:</strong> {{ number_format($order->subtotal, 2) }}</div>
                                        @if(!empty($order->coupon) && $order->coupon > 0)
                                            <div class="info-item">
                                                <strong>Coupon:</strong> {{ number_format($order->coupon, 2) }}
                                            </div>
                                        @endif
                                        <div class="info-item"><strong>Total Amount:</strong> {{ number_format($order->total, 2) }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-title">Order Items</div>
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
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
                                            <td>
                                                @if(optional($item->product)->image)
                                                    <img src="{{ asset('uploads/product/' . $item->product->image) }}"
                                                         width="55" height="40"
                                                         style="object-fit: cover; border-radius: 6px;">
                                                @else
                                                    <img src="{{ asset('assets/img/images.jpg') }}"
                                                         width="55" height="40"
                                                         style="object-fit: cover; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td>{{ $item->product->title ?? 'N/A' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price, 2) }}</td>
                                            <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-5 pt-3 border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <form id="countryForm" action="{{ route('dashboard.order.update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex align-items-center gap-2">
                                            <strong>STATUS:</strong>

                                            <button type="button" id="approvedBtn" class="btn btn-success btn-sm">confirmed</button>
                                            <button type="button" id="cancelBtn" class="btn btn-danger btn-sm">cancelled</button>

                                            <input type="hidden" name="status" id="statusInput" value="">
                                            <input type="hidden" name="cancel_note" id="cancelNoteInput">
                                        </div>
                                    </form>

                                    <a href="{{ route('dashboard.invoice.show',$order->id) }}" class="btn btn-secondary" target="_blank">
                                       Invoice Print
                                    </a>

                                    <a href="{{ route('dashboard.order.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </main>
    <!-- Status Modal for Approved -->
    <div id="statusModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="icon">❗</div>
            <h3 id="modalTitle">Confirmed STATUS</h3>
            <p id="modalMessage">
                Are you sure you want to update this status?
                <br>This action cannot be undone.
            </p>

            <div class="modal-actions">
                <button id="modalCancelBtn" class="btn-cancel" type="button">Cancel</button>
                <button id="modalConfirmBtn" class="btn-delete" type="button">Confirmed</button>
            </div>
        </div>
    </div>

    <!-- Cancel Status Modal -->
    <div id="cancelStatusModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="icon">❗</div>
            <h3>Cancel STATUS</h3>
            <p>
                Please write a note for cancel status.
            </p>

            <div style="margin-top:15px; text-align:left;">
                <label for="cancelNote" class="form-label fw-bold">Note</label>
                <textarea id="cancelNote" placeholder="Write note here..."></textarea>
            </div>

            <div class="modal-actions" style="margin-top: 20px;">
                <button id="cancelModalCloseBtn" class="btn-cancel" type="button">Close</button>
                <button id="cancelModalConfirmBtn" class="btn-delete btn-danger-custom" type="button">Submit Cancel</button>
            </div>
        </div>
    </div>
    <!-- Loader -->
    <div id="submitLoader" class="submit-loader" style="display: none;">
        <div class="custom-alert1 custom-alert-info custom-alert-loading" role="alert">
            <div class="custom-alert-content text-center">
                <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="Loading..." style="width: 180px">
                <br><br>
                <strong id="loaderStatusText" style="font-size: 18px;">
                    Status updating...
                </strong>
                <div style="margin-top: 6px;">
                    Please wait while we update the Order status.
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('countryForm');
            const loader = document.getElementById('submitLoader');
            const loaderText = document.getElementById('loaderStatusText');

            const approvedBtn = document.getElementById('approvedBtn');
            const cancelBtn = document.getElementById('cancelBtn');

            const statusInput = document.getElementById('statusInput');
            const cancelNoteInput = document.getElementById('cancelNoteInput');

            const statusModal = document.getElementById('statusModal');
            const modalConfirmBtn = document.getElementById('modalConfirmBtn');
            const modalCancelBtn = document.getElementById('modalCancelBtn');

            const cancelStatusModal = document.getElementById('cancelStatusModal');
            const cancelModalCloseBtn = document.getElementById('cancelModalCloseBtn');
            const cancelModalConfirmBtn = document.getElementById('cancelModalConfirmBtn');
            const cancelNote = document.getElementById('cancelNote');

            if (loader) {
                loader.style.display = 'none';
            }

            function showModal(modal) {
                if (modal) {
                    modal.style.display = 'flex';
                }
            }

            function hideModal(modal) {
                if (modal) {
                    modal.style.display = 'none';
                }
            }

            if (approvedBtn) {
                approvedBtn.addEventListener('click', function () {
                    showModal(statusModal);
                });
            }

            if (modalCancelBtn) {
                modalCancelBtn.addEventListener('click', function () {
                    hideModal(statusModal);
                });
            }

            if (modalConfirmBtn) {
                modalConfirmBtn.addEventListener('click', function () {
                    hideModal(statusModal);

                    statusInput.value = 'confirmed';
                    cancelNoteInput.value = '';

                    if (loader) {
                        loader.style.display = 'flex';
                    }

                    if (loaderText) {
                        loaderText.innerHTML = 'confirmed status updating...';
                    }

                    setTimeout(function () {
                        form.submit();
                    }, 100);
                });
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', function () {
                    cancelNote.value = '';
                    showModal(cancelStatusModal);
                });
            }

            if (cancelModalCloseBtn) {
                cancelModalCloseBtn.addEventListener('click', function () {
                    hideModal(cancelStatusModal);
                });
            }

            if (cancelModalConfirmBtn) {
                cancelModalConfirmBtn.addEventListener('click', function () {
                    const note = cancelNote.value.trim();

                    if (note === '') {
                        alert('Please write a note first.');
                        cancelNote.focus();
                        return;
                    }

                    hideModal(cancelStatusModal);

                    statusInput.value = 'cancelled';
                    cancelNoteInput.value = note;

                    if (loader) {
                        loader.style.display = 'flex';
                    }

                    if (loaderText) {
                        loaderText.innerHTML = 'cancelled status updating...';
                    }

                    setTimeout(function () {
                        form.submit();
                    }, 100);
                });
            }

            window.addEventListener('click', function (e) {
                if (e.target === statusModal) {
                    hideModal(statusModal);
                }

                if (e.target === cancelStatusModal) {
                    hideModal(cancelStatusModal);
                }
            });

            setTimeout(function () {
                document.querySelectorAll('.custom-alert').forEach(function (alert) {
                    if (!alert.classList.contains('custom-alert-loading')) {
                        alert.style.transition = 'opacity 0.5s ease';
                        alert.style.opacity = '0';

                        setTimeout(function () {
                            if (alert.parentNode) {
                                alert.remove();
                            }
                        }, 500);
                    }
                });
            }, 30000);
        });
    </script>
@endsection
