@extends('admin.layouts.app')

@section('title', 'Admin Dashboard Pro')

@section('content')
<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Dashboard Overview</h3>
            <p class="text-muted mb-0">Welcome back, Admin 👋 | Here's your business performance overview.</p>
        </div>
        <button class="btn btn-primary"><i class="fas fa-plus me-1"></i> Add New Product</button>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card bg-primary text-white p-3 shadow-sm rounded-4">
                <h6>Total Orders</h6>
                <h3 class="fw-bold">1,245</h3>
                <small>+8% from last week</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-success text-white p-3 shadow-sm rounded-4">
                <h6>Revenue</h6>
                <h3 class="fw-bold">$45,860</h3>
                <small>+12% from last month</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-warning text-white p-3 shadow-sm rounded-4">
                <h6>New Customers</h6>
                <h3 class="fw-bold">321</h3>
                <small>+5% new signups</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-danger text-white p-3 shadow-sm rounded-4">
                <h6>Pending Orders</h6>
                <h3 class="fw-bold">57</h3>
                <small>-3% this week</small>
            </div>
        </div>
    </div>

    <!-- Charts & Orders -->
    <div class="row g-4">
        <!-- Sales Chart -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Sales Overview</h5>
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Earnings Chart -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Earnings</h5>
                    <canvas id="earningsChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered table-hover" id="responsiveTable">
    <thead class="table-dark d-none d-md-table-header-group">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <!-- Row 1 -->
        <tr class="main-row">
            <td class="mobile-toggle text-center">
                <button class="btn btn-sm btn-primary toggle-mobile"><i class="fas fa-plus-circle"></i></button>
            </td>
            <td>John Doe</td>
            <td class="d-none d-md-table-cell">john@example.com</td>
            <td class="d-none d-md-table-cell">+880123456789</td>
            <td class="d-none d-md-table-cell">Admin</td>
        </tr>
        <tr class="mobile-row d-md-none">
            <td colspan="5">
                <strong>Email:</strong> john@example.com<br>
                <strong>Phone:</strong> +880123456789<br>
                <strong>Role:</strong> Admin
            </td>
        </tr>

        <!-- Row 2 -->
        <tr class="main-row">
            <td class="mobile-toggle text-center">
                <button class="btn btn-sm btn-primary toggle-mobile"><i class="fas fa-plus-circle"></i></button>
            </td>
            <td>Jane Smith</td>
            <td class="d-none d-md-table-cell">jane@example.com</td>
            <td class="d-none d-md-table-cell">+880987654321</td>
            <td class="d-none d-md-table-cell">Vendor</td>
        </tr>
        <tr class="mobile-row d-md-none">
            <td colspan="5">
                <strong>Email:</strong> jane@example.com<br>
                <strong>Phone:</strong> +880987654321<br>
                <strong>Role:</strong> Vendor
            </td>
        </tr>
    </tbody>
</table>

        </div>
    </div>

    <!-- Orders & Activities -->
    <div class="row g-4 mt-3">
        <!-- Recent Orders -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Recent Orders</h5>
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1023</td>
                                <td>John Doe</td>
                                <td>Wireless Earbuds</td>
                                <td>$120</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>2 Nov 2025</td>
                            </tr>
                            <tr>
                                <td>1022</td>
                                <td>Sarah Khan</td>
                                <td>Smart Watch</td>
                                <td>$180</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>1 Nov 2025</td>
                            </tr>
                            <tr>
                                <td>1021</td>
                                <td>Ali Raza</td>
                                <td>Gaming Mouse</td>
                                <td>$65</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                                <td>30 Oct 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Recent Activities</h5>
                    <ul class="list-group list-group-flush activity-timeline">
                        <li class="list-group-item">
                            <span class="text-primary fw-bold">+</span> New Product <b>“iPhone 15”</b> added
                            <br><small class="text-muted">2 hours ago</small>
                        </li>
                        <li class="list-group-item">
                            <span class="text-success fw-bold">✓</span> Order <b>#1023</b> completed
                            <br><small class="text-muted">5 hours ago</small>
                        </li>
                        <li class="list-group-item">
                            <span class="text-danger fw-bold">✗</span> Order <b>#1021</b> cancelled
                            <br><small class="text-muted">1 day ago</small>
                        </li>
                        <li class="list-group-item">
                            <span class="text-info fw-bold">★</span> User <b>Jane</b> left a review
                            <br><small class="text-muted">2 days ago</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products & Customers -->
    <div class="row g-4 mt-3">
        <!-- Top Products -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Top Selling Products</h5>
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Sold</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Wireless Headphones</td>
                                <td>Electronics</td>
                                <td>234</td>
                                <td>$4,680</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Smart Watch</td>
                                <td>Gadgets</td>
                                <td>189</td>
                                <td>$3,780</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Men's Sneakers</td>
                                <td>Fashion</td>
                                <td>156</td>
                                <td>$2,340</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Top Customers -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Top Customers</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>John Doe</strong><br><small class="text-muted">45 Orders</small></div>
                            <span class="badge bg-success">$3,200</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>Sarah Khan</strong><br><small class="text-muted">38 Orders</small></div>
                            <span class="badge bg-success">$2,950</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><strong>Ali Raza</strong><br><small class="text-muted">27 Orders</small></div>
                            <span class="badge bg-success">$2,180</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Sales ($)',
                data: [1200, 1800, 1600, 2100, 2600, 3000, 2800],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13,110,253,0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 2
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Earnings Chart (Pie)
    const earningsCtx = document.getElementById('earningsChart').getContext('2d');
    new Chart(earningsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Online', 'COD', 'Refunds'],
            datasets: [{
                data: [70, 25, 5],
                backgroundColor: ['#0d6efd', '#198754', '#dc3545']
            }]
        },
        options: { plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endsection
