<?php $__env->startSection("title", "Slider List"); ?>

<?php $__env->startSection("content"); ?>

    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-white">Slider List</h1>

                        <a href="<?php echo e(route('dashboard.slider.create')); ?>" class="btn btn-light text-primary">
                            + Add Slider
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">

            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span>All Sliders</span>

                    <small class="text-muted">
                        <i class="fas fa-grip-vertical me-1"></i>
                        Drag rows to update sort
                    </small>
                </div>

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
                                    </select>
                                    entries per page
                                </label>
                            </div>

                            <div class="datatable-search">
                                <input class="datatable-input"
                                       placeholder="Search..."
                                       type="search"
                                       id="searchInput">
                            </div>
                        </div>

                        <div class="datatable-container">
                            <table id="countryTable" class="datatable-table table align-middle">
                                <thead>
                                <tr>
                                    <th width="120">Sort</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th width="105">Action</th>
                                </tr>
                                </thead>

                                <tbody id="tableBody">
                                <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr data-id="<?php echo e($slider->id); ?>" class="sortable-row">
                                        <td>
                                            <span class="drag-handle">
                                                <i class="fas fa-grip-vertical"></i>
                                            </span>

                                            <span class="sort-number ms-2">
                                                <?php echo e($slider->sort); ?>

                                            </span>
                                        </td>

                                        <td>
                                            <?php if($slider->image): ?>
                                                <img src="<?php echo e(asset('uploads/slider/' . $slider->image)); ?>"
                                                     width="50"
                                                     height="35"
                                                     style="object-fit: cover; border-radius: 6px;">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('assets/img/images.jpg')); ?>"
                                                     width="50"
                                                     height="35"
                                                     style="object-fit: cover; border-radius: 6px;">
                                            <?php endif; ?>
                                        </td>

                                          <td>
                                            <?php echo e($slider->title ?? "NO Title"); ?>

                                        </td>

                                        <td>
                                            <?php if($slider->status): ?>
                                                <div class="badge bg-success text-white rounded-pill">Active</div>
                                            <?php else: ?>
                                                <div class="badge bg-danger text-white rounded-pill">Inactive</div>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('dashboard.slider.edit', $slider->id)); ?>"
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <button type="button"
                                                    class="btn btn-sm btn-danger delete-btn h-100 openDeleteModal"
                                                    data-id="<?php echo e($slider->id); ?>">
                                                <i class="far fa-trash-can"></i>
                                            </button>

                                            <form id="delete-form-<?php echo e($slider->id); ?>"
                                                  action="<?php echo e(route('dashboard.slider.destroy', $slider->id)); ?>"
                                                  method="POST"
                                                  style="display:none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Slider Found</td>
                                    </tr>
                                <?php endif; ?>
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

            <h3>Delete Slider</h3>

            <p>
                Are you sure you want to delete this item?
                <br>
                This action cannot be undone.
            </p>

            <div class="modal-actions">
                <button id="cancelDelete" class="btn-cancel" type="button">
                    Cancel
                </button>

                <button id="confirmDelete" class="btn-delete" type="button">
                    Delete
                </button>
            </div>
        </div>
    </div>

    
    <div id="submitLoader" class="submit-loader" style="display: none;">
        <div class="loader-card" role="alert" aria-live="polite">
            <div class="loader-circle-bg">
                <img src="<?php echo e(asset('assets/img/gif/icon3.gif')); ?>"
                     alt="Loading..."
                     class="loader-gif">
            </div>

            <h3 class="loader-title">
                <i class="fas fa-spinner fa-spin me-2"></i>
                Please Wait...
            </h3>

            <p class="loader-text">
                We are processing your request.
                <br>
                Please don't refresh or close this page.
            </p>

            <div class="loader-progress">
                <div class="loader-progress-bar"></div>
            </div>
        </div>
    </div>

    
    <div id="sortSaveBadge" class="sort-save-badge">
        <i class="fas fa-check-circle me-1"></i>
        Sort updated successfully
    </div>

    <style>
        .datatable-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .datatable-search {
            margin-left: auto;
        }

        .datatable-top,
        .datatable-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .datatable-search .datatable-input,
        .datatable-selector {
            padding: 8px 12px;
            border: 1px solid #dcdfe3;
            border-radius: 6px;
            outline: none;
        }

        .datatable-container {
            overflow-x: auto;
        }

        .datatable-table {
            width: 100%;
            border-collapse: collapse;
        }

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

        .sortable-row {
            transition: background 0.2s ease;
        }

        .drag-handle {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            color: #4e73df;
            border-radius: 8px;
            cursor: grab;
            transition: 0.2s;
        }

        .drag-handle:hover {
            background: #4e73df;
            color: #fff;
        }

        .drag-handle:active {
            cursor: grabbing;
        }

        .sortable-ghost {
            opacity: 0.45;
            background: #eef2ff !important;
        }

        .sortable-chosen {
            background: #f8f9fc;
        }

        .sort-save-badge {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 999999;
            background: #198754;
            color: #fff;
            padding: 12px 18px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            display: none;
            font-size: 14px;
        }

        .datatable-pagination-list {
            list-style: none;
            display: flex;
            gap: 6px;
            padding: 0;
            margin: 0;
        }

        .datatable-pagination-list-item button {
            border: 1px solid #ddd;
            background: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
        }

        .datatable-pagination-list-item.active button {
            background: #0061f2;
            color: #fff;
            border-color: #0061f2;
        }

        .btn-datatable {
            height: 36px;
            width: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border-radius: 6px;
            border: none;
        }

        .btn-transparent-dark {
            background: rgba(33, 40, 50, 0.08);
            color: #444;
        }

        .btn-transparent-dark:hover {
            background: rgba(33, 40, 50, 0.15);
        }

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

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            flex: 1;
            padding: 10px;
            background: #ddd;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-delete {
            flex: 1;
            padding: 10px;
            background: #ff4d4d;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(248, 250, 252, 0.86);
            backdrop-filter: blur(7px);
            -webkit-backdrop-filter: blur(7px);
            z-index: 9999999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px;
        }

        .loader-card {
            width: 430px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 22px;
            padding: 34px 30px 30px;
            text-align: center;
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.18);
            border: 1px solid rgba(78, 115, 223, 0.12);
            position: relative;
            overflow: hidden;
            animation: loaderCardIn 0.32s ease;
        }

        .loader-card::before {
            content: "";
            position: absolute;
            top: -90px;
            left: 50%;
            width: 260px;
            height: 260px;
            transform: translateX(-50%);
            background: radial-gradient(circle, rgba(78, 115, 223, 0.18), transparent 68%);
            pointer-events: none;
        }

        .loader-circle-bg {
            width: 190px;
            height: 190px;
            margin: 0 auto 16px;
            border-radius: 50%;
            background: linear-gradient(180deg, #f8fbff, #eef4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 0 1px rgba(78, 115, 223, 0.08), 0 16px 35px rgba(78, 115, 223, 0.12);
            position: relative;
            z-index: 1;
        }

        .loader-gif {
            width: 165px;
            max-width: 100%;
            filter: drop-shadow(0 14px 18px rgba(15, 23, 42, 0.16));
            animation: loaderZoom 1.7s ease-in-out infinite;
        }

        .loader-title {
            font-size: 24px;
            font-weight: 800;
            color: #1f3bb3;
            margin: 8px 0 8px;
            letter-spacing: -0.3px;
            position: relative;
            z-index: 1;
        }

        .loader-text {
            font-size: 15px;
            color: #6b7280;
            line-height: 1.75;
            margin-bottom: 24px;
            position: relative;
            z-index: 1;
        }

        .loader-progress {
            width: 100%;
            height: 9px;
            background: #edf2f7;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .loader-progress-bar {
            width: 38%;
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4e73df, #36b9cc, #4e73df);
            animation: progressMove 1.35s infinite ease-in-out;
        }

        @keyframes progressMove {
            0% {
                transform: translateX(-120%);
            }
            100% {
                transform: translateX(285%);
            }
        }

        @keyframes loaderZoom {
            0%, 100% {
                transform: scale(0.96);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes loaderCardIn {
            from {
                opacity: 0;
                transform: translateY(16px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
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

        .datatable-input:hover,
        .datatable-selector:hover {
            border-color: #cdd3e0;
            background: #fff;
        }

        .datatable-input:focus,
        .datatable-selector:focus {
            border-color: #4e73df;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(78,115,223,0.15);
        }

        .datatable-input::placeholder {
            color: #b7b9cc;
            font-size: 13px;
        }

        .datatable-selector {
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .datatable-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .datatable-input {
                width: 220px;
            }

            .datatable-selector {
                width: 80px;
            }
        }

        @media (max-width: 767px) {
            .datatable-top {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .datatable-dropdown,
            .datatable-search {
                width: 100%;
                margin-left: 0;
            }

            .datatable-dropdown label {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 6px;
                width: 100%;
                font-size: 14px;
                color: #5a5c69;
            }

            .datatable-selector,
            .datatable-input {
                width: 100%;
                box-sizing: border-box;
            }
        }

        .datatable-bottom {
            padding-top: 12px;
            border-top: 1px solid #e3e6f0;
            margin-top: 10px;
        }

        .datatable-info {
            font-size: 13px;
            color: #6c757d;
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

        .datatable-pagination-list-item button:hover {
            background: #f8f9fc;
            border-color: #cdd3e0;
        }

        .datatable-pagination-list-item.active button {
            background: #4e73df;
            color: #fff;
            border-color: #4e73df;
            box-shadow: 0 2px 6px rgba(78,115,223,0.25);
        }

        .datatable-pagination {
            margin-left: auto;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

    <script>
        let deleteId = null;

        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteBtn = document.getElementById('confirmDelete');
        const cancelDeleteBtn = document.getElementById('cancelDelete');
        const submitLoader = document.getElementById('submitLoader');

        document.querySelectorAll('.openDeleteModal').forEach(button => {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');

                if (deleteModal) {
                    deleteModal.style.display = 'flex';
                }
            });
        });

        if (cancelDeleteBtn) {
            cancelDeleteBtn.addEventListener('click', function () {
                if (deleteModal) {
                    deleteModal.style.display = 'none';
                }

                deleteId = null;
            });
        }

        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function () {
                if (deleteId) {
                    if (deleteModal) {
                        deleteModal.style.display = 'none';
                    }

                    if (submitLoader) {
                        submitLoader.style.display = 'flex';
                    }

                    this.disabled = true;
                    this.innerText = 'Please wait...';

                    const deleteForm = document.getElementById('delete-form-' + deleteId);

                    if (deleteForm) {
                        deleteForm.submit();
                    }
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const tbody = document.getElementById("tableBody");
            const searchInput = document.getElementById("searchInput");
            const entriesPerPage = document.getElementById("entriesPerPage");
            const pagination = document.getElementById("pagination");
            const tableInfo = document.getElementById("tableInfo");
            const sortSaveBadge = document.getElementById("sortSaveBadge");

            let rows = Array.from(tbody.querySelectorAll("tr[data-id]"));
            let currentPage = 1;
            let perPage = parseInt(entriesPerPage.value);

            if (tbody) {
                new Sortable(tbody, {
                    animation: 180,
                    handle: ".drag-handle",
                    ghostClass: "sortable-ghost",
                    chosenClass: "sortable-chosen",

                    onEnd: function () {
                        rows = Array.from(tbody.querySelectorAll("tr[data-id]"));

                        updateSortNumbers();
                        saveSliderSort();
                        renderTable();
                    }
                });
            }

            function updateSortNumbers() {
                rows = Array.from(tbody.querySelectorAll("tr[data-id]"));

                rows.forEach((row, index) => {
                    const sortNumber = row.querySelector(".sort-number");

                    if (sortNumber) {
                        sortNumber.innerText = index + 1;
                    }
                });
            }

            function saveSliderSort() {
                rows = Array.from(tbody.querySelectorAll("tr[data-id]"));

                let orders = [];

                rows.forEach((row, index) => {
                    orders.push({
                        id: row.getAttribute("data-id"),
                        sort: index + 1
                    });
                });

                fetch("<?php echo e(route('dashboard.slider.sort.update')); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        orders: orders
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            showSortBadge();
                        } else {
                            alert("Sort update failed");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert("Something went wrong");
                    });
            }

            function showSortBadge() {
                if (!sortSaveBadge) return;

                sortSaveBadge.style.display = "block";

                setTimeout(() => {
                    sortSaveBadge.style.display = "none";
                }, 1800);
            }

            function renderTable() {
                rows = Array.from(tbody.querySelectorAll("tr[data-id]"));

                let filteredRows = rows.filter(row =>
                    row.innerText.toLowerCase().includes(searchInput.value.toLowerCase())
                );

                let total = filteredRows.length;
                let totalPages = Math.ceil(total / perPage) || 1;

                if (currentPage > totalPages) {
                    currentPage = totalPages;
                }

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
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>