<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login Admin</title>
</head>

<body style="background-color: #344D67;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="aksi_login_admin.php?op=in" method="POST" class="mt-5 border p-4 bg-light shadow">
                    <h2 class="sr-only">Login Admin</h2>
                    <div class="mb-3 col-md-12">
                        <label>Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label>Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password">
                    </div>
                    <div class="d-grid mb-3 col-md-12">
                        <input type="submit" name="submit" value="LOGIN" class="btn btn-primary"></input>
                    </div>
                </form>
                <p class="text-center mt-3" style="color:white;">Belum punya akun?<a
                        href="../register/register_admin.php" style="color:white;"> Register</a></p>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>