<?php $__env->startSection("title", "Dashboard"); ?>

<?php $__env->startSection("content"); ?>

    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="grid"></i>
                                </div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">
                                Welcome back! Here is your website overview.
                            </div>
                        </div>

                        <div class="col-12 col-xl-auto mt-4">
                            <div class="input-group input-group-joined border-0 shadow-sm" style="width: 17rem">
                            <span class="input-group-text bg-white">
                                <i class="text-primary" data-feather="calendar"></i>
                            </span>
                                <input class="form-control ps-0 pointer"
                                       id="litepickerRangePlugin"
                                       placeholder="Select date range..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">

            <div class="row">

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small text-uppercase fw-semibold">
                                        Website Visitors
                                    </div>
                                    <div class="fs-2 fw-bold text-dark mt-2">
                                        <?php echo e(number_format($visitorCount)); ?>

                                    </div>
                                </div>
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                    <i class="text-primary" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary bg-opacity-10 border-0 small text-primary fw-semibold">
                            Total visitors overview
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="text-muted small text-uppercase fw-semibold">
                                        Total Products
                                    </div>
                                    <div class="fs-2 fw-bold text-dark mt-2">
                                       1000
                                    </div>
                                </div>
                                <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                    <i class="text-warning" data-feather="package"></i>
                                </div>
                            </div>
                        </div>
                        <a class="card-footer bg-warning bg-opacity-10 border-0 small text-warning fw-semibold text-decoration-none d-flex justify-content-between"
                           href="<?php echo e(route('dashboard.product.index')); ?>">
                            <span>View Products</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 py-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="mb-0 fw-bold">Website Visitors</h5>
                                    <small class="text-muted">Daily visitor analytics</small>
                                </div>
                                <span class="badge bg-primary-soft text-primary">
                                Live Data
                            </span>
                            </div>
                        </div>

                        <div class="card-body">
                            <canvas id="myAreaChart" height="90"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/chart.js')); ?>"></script>

    <script>
        fetch('/dashboard/visitor-data')
            .then(res => res.json())
            .then(data => {
                const labels = data.map(item => item.date);
                const values = data.map(item => item.total);

                const ctx = document.getElementById('myAreaChart').getContext('2d');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Visitors',
                            data: values,
                            fill: true,
                            tension: 0.4,
                            borderWidth: 3,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/index.blade.php ENDPATH**/ ?>