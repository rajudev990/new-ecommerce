<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        /* Sidebar Width */
        #sidebar {
            width: 250px;
            /* আগের 250px থেকে বড় */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #1e1e2d;
            color: #fff;
            transition: all 0.35s ease;
            z-index: 999;
            overflow-y: hidden;
            /* scroll initially hidden */
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Scrollbar Styling */
        #sidebar::-webkit-scrollbar {
            width: 6px;
            /* চিকন scrollbar */
        }

        #sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        #sidebar:hover {
            overflow-y: auto;
            /* mouse hover এ scroll show হবে */
        }

        /* Overlay hide on large screens */
        @media (min-width: 768px) {
            #sidebar {
                overflow-y: hidden;
                /* desktop scroll hide by default */
            }
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        #sidebar .nav-link {
            color: #ccc;
            transition: 0.3s;
            font-size: 15px;
        }

        #sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        #sidebar .nav-link.active {
            color: #fff;
            background-color: #3a3f58;
        }

        /* Submenu tree (dot + line) */
        .submenu ul {
            list-style: none;
            padding-left: 25px;
            margin: 0;
            position: relative;
        }

        .submenu ul::before {
            content: "";
            position: absolute;
            left: 11px;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #555;
        }

        .submenu ul li {
            position: relative;
            padding-left: 25px;
            margin: 6px 0;
        }

        .submenu ul li::before {
            content: "●";
            color: #999;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 10px;
            line-height: 22px;
        }

        .submenu ul li::after {
            content: "";
            position: absolute;
            left: 6px;
            top: 11px;
            width: 12px;
            height: 1px;
            background-color: #666;
        }

        .submenu ul li:last-child::before {
            color: #ccc;
        }

        .submenu ul li a {
            color: #bbb;
            font-size: 14px;
            text-decoration: none;
            display: block;
            transition: 0.3s;
        }

        .submenu ul li a:hover {
            color: #fff;
        }

        /* Content */
        #content-wrapper {
            margin-left: 250px;
            transition: all 0.35s ease;
        }

        #content-wrapper.expanded {
            margin-left: 0;
        }

        /* Topbar */
        #topbar {
            height: 60px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 998;
        }

        /* Overlay for mobile */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
            display: none;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.show {
                margin-left: 0;
            }

            #content-wrapper {
                margin-left: 0;
            }
        }

        .mobile-row {
            display: none;
            background-color: #f8f9fa;
        }

        .toggle-mobile i {
            transition: transform 0.3s;
        }

        .toggle-mobile.active i {
            transform: rotate(45deg);
            /* + becomes x style */
        }

        @media (min-width: 768px) {
            .mobile-toggle {
                display: none;
            }
        }



        .swal-close-btn {
            font-size: 18px;
            /* বড় icon */
            color: #fff;
            /* white color */
            background: #e74c3c;
            /* red circular background */
            border-radius: 50%;
            /* circle shape */
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 10px;
            right: 10px;
        }

        .swal-close-btn:hover {
            background: #c0392b;
            /* hover color change */
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- <div class="p-3"> -->
        <div class="">
            <h4 class="text-center mb-4 fw-bold">Admin Panel</h4>
            <ul class="nav flex-column">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i>Dashboard</a>
                </li>

                <!-- Landing Page -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#landingPageSubmenu" role="button" aria-expanded="false" aria-controls="landingPageSubmenu">
                        <span><i class="fas fa-globe me-2"></i>Landing Page</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="landingPageSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Manage</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#ordersSubmenu" role="button" aria-expanded="false" aria-controls="ordersSubmenu">
                        <span><i class="fas fa-shopping-cart me-2"></i>Orders</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="ordersSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Manage Order</a></li>
                            <li><a href="#">Courier</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Category -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#categorySubmenu" role="button" aria-expanded="false" aria-controls="categorySubmenu">
                        <span><i class="fas fa-list me-2"></i>Category</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="categorySubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Main Category</a></li>
                            <li><a href="#">Sub Category</a></li>
                            <li><a href="#">Sub Sub Category</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Brand -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#brandSubmenu" role="button" aria-expanded="false" aria-controls="brandSubmenu">
                        <span><i class="fas fa-tags me-2"></i>Brand</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="brandSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">All Brand</a></li>
                            <li><a href="#">Add Brand</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Product -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#productSubmenu" role="button" aria-expanded="false" aria-controls="productSubmenu">
                        <span><i class="fas fa-box-open me-2"></i>Product</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="productSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">All Product</a></li>
                            <li><a href="#">Add Product</a></li>
                            <li><a href="#">Vendor Product</a></li>
                            <li><a href="#">Colors</a></li>
                            <li><a href="#">Sizes</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Slider -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#sliderSubmenu" role="button" aria-expanded="false" aria-controls="sliderSubmenu">
                        <span><i class="fas fa-sliders-h me-2"></i>Slider</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="sliderSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">All Slider</a></li>
                            <li><a href="#">Add Slider</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Website Setup -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#websiteSubmenu" role="button" aria-expanded="false" aria-controls="websiteSubmenu">
                        <span><i class="fas fa-cogs me-2"></i>Website Setup</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="websiteSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Header</a></li>
                            <li><a href="#">Footer</a></li>
                            <li><a href="#">Theme Color</a></li>
                            <li><a href="#">Pages</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Setting & Configuration -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#settingSubmenu" role="button" aria-expanded="false" aria-controls="settingSubmenu">
                        <span><i class="fas fa-tools me-2"></i>Setting & Configuration</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="settingSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Courier API</a></li>
                            <li><a href="#">Invoice Address</a></li>
                            <li><a href="#">Delivery Charge</a></li>
                            <li><a href="#">Social Login</a></li>
                            <li><a href="#">Payment Method</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Campaign/Offer -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#campaignSubmenu" role="button" aria-expanded="false" aria-controls="campaignSubmenu">
                        <span><i class="fas fa-bullhorn me-2"></i>Campaign/Offer</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="campaignSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Coupon</a></li>
                            <li><a href="#">Offer Banner</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Admin -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#adminSubmenu" role="button" aria-expanded="false" aria-controls="adminSubmenu">
                        <span><i class="fas fa-user-shield me-2"></i>Admin</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="adminSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Add</a></li>
                            <li><a href="#">Manage</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Customer -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#customerSubmenu" role="button" aria-expanded="false" aria-controls="customerSubmenu">
                        <span><i class="fas fa-user-friends me-2"></i>Customer</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="customerSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Customers</a></li>
                            <li><a href="#">Message</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Report -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#reportSubmenu" role="button" aria-expanded="false" aria-controls="reportSubmenu">
                        <span><i class="fas fa-chart-line me-2"></i>Report</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="reportSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">Profit/Loss Report</a></li>
                            <li><a href="#">Product Stock & Profit</a></li>
                            <li><a href="#">Order Report</a></li>
                            <li><a href="#">Office Sale Report</a></li>
                            <li><a href="#">Order Profit</a></li>
                            <li><a href="#">Sale Profit</a></li>
                            <li><a href="#">Purchase Report</a></li>
                            <li><a href="#">Supplier Report</a></li>
                            <li><a href="#">Stock Report</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Vendor -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#vendorSubmenu" role="button" aria-expanded="false" aria-controls="vendorSubmenu">
                        <span><i class="fas fa-store me-2"></i>Vendor</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="vendorSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">All Vendor</a></li>
                            <li><a href="#">Add Vendor</a></li>
                            <li><a href="#">Vendor Product</a></li>
                            <li><a href="#">Withdraw Request</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Seller -->
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#sellerSubmenu" role="button" aria-expanded="false" aria-controls="sellerSubmenu">
                        <span><i class="fas fa-user-tie me-2"></i>Seller</span>
                        <i class="fas fa-chevron-down rotate-icon"></i>
                    </a>
                    <div class="collapse submenu" id="sellerSubmenu">
                        <ul class="nav flex-column">
                            <li><a href="#">All Seller</a></li>
                            <li><a href="#">Add Seller</a></li>
                            <li><a href="#">Withdraw Request</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Content -->
    <div id="content-wrapper">
        <div id="topbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-dark d-md-none me-3" id="mobileToggle"><i class="fas fa-bars"></i></button>
                <button class="btn btn-dark d-none d-md-block me-3" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                <h5 class="mb-0 d-none d-md-block">Dashboard</h5>
            </div>

            <div class="dropdown profile-dropdown">
                <div class="d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown">
                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" />
                    <span>{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down ms-2"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.toggle-mobile').forEach(button => {
            button.addEventListener('click', function() {
                const tr = this.closest('tr');
                const nextRow = tr.nextElementSibling;
                if (nextRow && nextRow.classList.contains('mobile-row')) {
                    if (nextRow.style.display === 'table-row') {
                        nextRow.style.display = 'none';
                    } else {
                        nextRow.style.display = 'table-row';
                    }
                    this.classList.toggle('active');
                }
            });
        });
    </script>



    <script>
        const sidebar = document.getElementById("sidebar");
        const sidebarToggle = document.getElementById("sidebarToggle");
        const mobileToggle = document.getElementById("mobileToggle");
        const contentWrapper = document.getElementById("content-wrapper");
        const overlay = document.getElementById("overlay");



        sidebar.addEventListener("mouseenter", () => {
            sidebar.style.overflowY = "auto";
        });

        sidebar.addEventListener("mouseleave", () => {
            sidebar.style.overflowY = "hidden";
        });


        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
            contentWrapper.classList.toggle("expanded");
        });

        mobileToggle.addEventListener("click", () => {
            sidebar.classList.toggle("show");
            overlay.style.display = sidebar.classList.contains("show") ? "block" : "none";
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.remove("show");
            overlay.style.display = "none";
        });

        document.querySelectorAll('[data-bs-toggle="collapse"]').forEach((el) => {
            el.addEventListener("click", () => {
                const icon = el.querySelector(".rotate-icon");
                if (icon) icon.classList.toggle("collapsed");
            });
        });
    </script>

    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false,
            showCloseButton: true, // ✅ Close icon enable
            allowOutsideClick: true, // Click outside closes too
            allowEscapeKey: true,
            customClass: {
                closeButton: 'swal-close-btn' // ✅ custom CSS class
            }
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}",
            timer: 3000,
            showConfirmButton: false,
            showCloseButton: true, // ✅ Close icon enable
            allowOutsideClick: true, // Click outside closes too
            allowEscapeKey: true,
            customClass: {
                closeButton: 'swal-close-btn' // ✅ custom CSS class
            }
        });
        @endif
    </script>

    <script>
        document.querySelectorAll('.deleteBtn').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>

</body>

</html>