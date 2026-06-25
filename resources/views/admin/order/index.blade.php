@extends("admin.layouts.master")

@section("title", "All Orders")

@section("content")
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-white">All Orders</h1>

{{--                        <a href="{{ route('dashboard.order.create') }}" class="btn btn-light text-primary">--}}
{{--                            + Add Order--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            @if(session('success'))
                <div class="alert alert-success custom-alert">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger custom-alert">{{ session('error') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-header">All Orders</div>

                <div class="card-body">
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector" id="entriesPerPage">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                    </select> entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" id="searchInput">
                            </div>
                        </div>

                        <div class="datatable-container">
                            <table id="orderTable" class="datatable-table table align-middle">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Page Name</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
{{--                                    <th>Payment</th>--}}
                                    <th width="80">Action</th>
                                </tr>
                                </thead>

                                <tbody id="tableBody">
                                @forelse($orders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>
                                            <strong>{{ $order->name }} </strong><br>
                                            <small>{{ $order->email }}</small>
                                        </td>
                                        <td>{{$order->page->title ?? ''}}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ number_format($order->total, 2) }}</td>
                                        <td>
                                            @if($order->status == 'pending')
                                                <span class="badge bg-warning text-dark rounded-pill">Pending</span>
                                            @elseif($order->status == 'processing')
                                                <span class="badge bg-info text-white rounded-pill">Processing</span>
                                            @elseif($order->status == 'completed')
                                                <span class="badge bg-success text-white rounded-pill">Completed</span>
                                            @elseif($order->status == 'cancelled')
                                                <span class="badge bg-danger text-white rounded-pill">Cancelled</span>
                                            @else
                                                <span class="badge bg-secondary text-white rounded-pill">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </td>
{{--                                        <td>--}}
{{--                                            @if($order->payment_status == 'paid')--}}
{{--                                                <span class="badge bg-success text-white rounded-pill">Paid</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge bg-danger text-white rounded-pill">Unpaid</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>
                                            <a href="{{ route('dashboard.order.show', $order->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>

{{--                                            <a href="{{ route('dashboard.order.edit', $order->id) }}" class="btn btn-sm btn-warning">--}}
{{--                                                <i class="fas fa-edit"></i>--}}
{{--                                            </a>--}}

{{--                                            <button type="button"--}}
{{--                                                    class="btn btn-sm btn-danger delete-btn h-100 openDeleteModal"--}}
{{--                                                    data-id="{{ $order->id }}">--}}
{{--                                                <i class="far fa-trash-can"></i>--}}
{{--                                            </button>--}}

{{--                                            <form id="delete-form-{{ $order->id }}"--}}
{{--                                                  action="{{ route('dashboard.order.destroy', $order->id) }}"--}}
{{--                                                  method="POST"--}}
{{--                                                  style="display:none;">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Order Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="datatable-bottom d-flex justify-content-between align-items-center flex-wrap">
                            <div class="datatable-info" id="tableInfo"></div>
                            <nav class="datatable-pagination">
                                <ul class="datatable-pagination-list" id="pagination"></ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="deleteModal" class="custom-modal">
        <div class="custom-modal-content">
            <div class="icon">❗</div>
            <h3>Delete Order</h3>
            <p>Are you sure you want to delete this order?<br>This action cannot be undone.</p>

            <div class="modal-actions">
                <button id="cancelDelete" class="btn-cancel" type="button">Cancel</button>
                <button id="confirmDelete" class="btn-delete" type="button">Delete</button>
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

    <style>
        .datatable-top,
        .datatable-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        .datatable-search { margin-left: auto; }
        .datatable-search .datatable-input,
        .datatable-selector {
            padding: 8px 12px;
            border: 1px solid #dcdfe3;
            border-radius: 6px;
            outline: none;
        }
        .datatable-container { overflow-x: auto; }
        .datatable-table { width: 100%; border-collapse: collapse; }
        .datatable-table thead th {
            background: #f8f9fc;
            font-weight: 600;
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        .datatable-table tbody td {
            padding: 12px;
            border-bottom: 1px solid #f1f1f1;
            vertical-align: middle;
        }
        .datatable-pagination-list {
            list-style: none;
            display: flex;
            gap: 6px;
            padding: 0;
            margin: 0;
        }
        .datatable-pagination-list-item button {
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border: 1px solid #e3e6f0;
            background: #fff;
            color: #5a5c69;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .datatable-pagination-list-item.active button {
            background: #4e73df;
            color: #fff;
            border-color: #4e73df;
            box-shadow: 0 2px 6px rgba(78,115,223,0.25);
        }
        .datatable-input,
        .datatable-selector {
            all: revert;
            padding: 6px 10px;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            font-size: 14px;
            background: #f8f9fc;
            color: #5a5c69;
            transition: all 0.2s ease-in-out;
        }
        .datatable-input:focus,
        .datatable-selector:focus {
            border-color: #4e73df;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(78,115,223,0.15);
        }
        .datatable-pagination { margin-left: auto; }
        .datatable-info { font-size: 13px; color: #6c757d; }
        .custom-modal {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.3);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .custom-modal-content {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .custom-modal .icon {
            width: 50px;
            height: 50px;
            background: #ffe5e5;
            color: red;
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .modal-actions { display: flex; gap: 10px; margin-top: 20px; }
        .btn-cancel,
        .btn-delete {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-cancel { background: #ddd; }
        .btn-delete { background: #ff4d4d; color: #fff; }
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
            background: #fff;
        }
        @media (min-width: 768px) {
            .datatable-input { width: 220px; }
            .datatable-selector { width: 80px; }
        }
        @media (max-width: 767px) {
            .datatable-top {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .datatable-dropdown,
            .datatable-search { width: 100%; margin-left: 0; }
            .datatable-dropdown label {
                display: flex;
                flex-direction: column;
                gap: 6px;
                width: 100%;
            }
            .datatable-selector,
            .datatable-input { width: 100%; box-sizing: border-box; }
        }
    </style>

    <script>
        let deleteId = null;

        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteBtn = document.getElementById('confirmDelete');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const submitLoader = document.getElementById('submitLoader');

        document.querySelectorAll('.openDeleteModal').forEach(button => {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');
                if (deleteModal) deleteModal.style.display = 'flex';
            });
        });

        if (cancelDeleteBtn) {
            cancelDeleteBtn.addEventListener('click', function () {
                if (deleteModal) deleteModal.style.display = 'none';
                deleteId = null;
            });
        }

        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function () {
                if (deleteId) {
                    if (deleteModal) deleteModal.style.display = 'none';
                    if (submitLoader) submitLoader.style.display = 'flex';
                    this.disabled = true;
                    this.innerText = 'Please wait...';
                    const deleteForm = document.getElementById('delete-form-' + deleteId);
                    if (deleteForm) deleteForm.submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const tbody = document.getElementById("tableBody");
            const searchInput = document.getElementById("searchInput");
            const entriesPerPage = document.getElementById("entriesPerPage");
            const pagination = document.getElementById("pagination");
            const tableInfo = document.getElementById("tableInfo");

            let rows = Array.from(tbody.querySelectorAll("tr"));
            let currentPage = 1;
            let perPage = parseInt(entriesPerPage.value);

            function renderTable() {
                let filteredRows = rows.filter(row => row.innerText.toLowerCase().includes(searchInput.value.toLowerCase()));
                let total = filteredRows.length;
                let totalPages = Math.ceil(total / perPage) || 1;

                if (currentPage > totalPages) currentPage = totalPages;

                let start = (currentPage - 1) * perPage;
                let end = start + perPage;

                rows.forEach(row => row.style.display = "none");
                filteredRows.slice(start, end).forEach(row => row.style.display = "");

                tableInfo.innerText = `Showing ${total === 0 ? 0 : start + 1} to ${Math.min(end, total)} of ${total} entries`;
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                pagination.innerHTML = "";
                for (let i = 1; i <= totalPages; i++) {
                    const li = document.createElement("li");
                    li.className = "datatable-pagination-list-item" + (i === currentPage ? " active" : "");
                    const btn = document.createElement("button");
                    btn.innerText = i;
                    btn.addEventListener("click", function () {
                        currentPage = i;
                        renderTable();
                    });
                    li.appendChild(btn);
                    pagination.appendChild(li);
                }
            }

            searchInput.addEventListener("input", function () {
                currentPage = 1;
                renderTable();
            });

            entriesPerPage.addEventListener("change", function () {
                perPage = parseInt(this.value);
                currentPage = 1;
                renderTable();
            });

            renderTable();
        });

        setTimeout(function () {
            document.querySelectorAll('.custom-alert').forEach(function (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>
@endsection
