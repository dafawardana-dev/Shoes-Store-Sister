<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css buatan sendiri -->
    <link rel="stylesheet" href="../css/style_dashboard.css">
    <title>Menu Data Pemasok</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=""> Admin Toko Sepatu</a>
        </div>
    </nav>
    <div class="d-flex bg-info text-white" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-3">
                <a href="menu_dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="menu_sepatu.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i class="fas fa-database me-2"></i>Data Sepatu</a>
                <a style="color:azure;" href="menu_pemasok.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-database me-2"></i>Data Pemasok</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper" style="background-color: #9BA1A8;">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Akun Admin</h2>
                </div>
            </nav>
            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <form action="../client/proses_pemasok.php" method="POST">
                    <div class="row">
                        <input type="hidden" name="aksi" value="tambah" ?>
                        <div class="mb-3 col-md-6">
                            <label for="input_id_pemasok" class="form-label">Id Pemasok</label>
                            <input type="text" class="form-control" id="input_id_pemasok" name="id_pemasok">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="input_nama_pemasok" class="form-label">Nama Pemasok</label>
                            <input type="text" class="form-control" id="input_nama_pemasok" name="nama_pemasok">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="input_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="input_jenis_kelamin" name="jenis_kelamin">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="input_alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="input_alamat" name="alamat">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="input_no_telp" class="form-label">No Telpon</label>
                            <input type="text" class="form-control" id="input_no_telp" name="no_telp">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    <!-- <footer class="bg-dark pb-3 pt-4">
        <p class="text-center text-white bg-dark">Created with love by Ilham Shodiq</p>
    </footer> -->
    <footer class="bg-dark text-center text-white p-4" style="background-color: #22333E;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="mailto:ilhambheh@gmail.com">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"> </i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://twitter.com/The12sMB">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/ilham_shodq/">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/ilhamshodiq">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center">Created with love by Ilham Shodiq</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>