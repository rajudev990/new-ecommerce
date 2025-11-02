<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-close {
            font-size: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 10px;
            right: 10px;
            border: none;
            /* border remove */
            outline: none;
            /* focus outline remove */
            box-shadow: none;
            /* box-shadow remove */
            background: transparent;
            /* background clear */
        }

        .swal2-close:hover {
            color: #e74c3c;
            /* hover color change */
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center" style="height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow p-4">
                    <h4 class="text-center mb-3">Admin Login</h4>

                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}",
            timer: 300000,
            showConfirmButton: false,
            showCloseButton: true, // ✅ Close icon enable
            allowOutsideClick: true, // Click outside closes too
            allowEscapeKey: true,
            
        });
        @endif
    </script>
</body>

</html>