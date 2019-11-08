<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

if (!$_SESSION['id_kasir']) {
    header("location:logout.php");
}
else{
    $queryKasir = mysql_query("SELECT * FROM kasir WHERE id_kasir = '$_SESSION[id_kasir]'");
    $isiKasir = mysql_fetch_array($queryKasir);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Laporan | Kasirian</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<!-- Author : Syaikhu Rizal -->
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>permanen29@gmail.com
                    &nbsp;&nbsp;
                    <strong>Telepon: </strong>+62 812-3085-6890
                </div>
            </div>
        </div>
    </header>

    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <!-- <img src="assets/img/logo.PNG" style="border-radius: 5px;width: 220px;"> -->
                    <h1 style="color:cyan;cursor:default"><b>KASIRIAN</b></h1>
                </a>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <h4 class="media-heading"><?php echo $isiKasir['nama']; ?></h4>
                                    <h5><?php echo $isiKasir['akses']; ?></h5>
                                </div>
                                <hr />
                                <a href="logout.php" class="btn btn-danger btn-block btn-sm">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="penjualan.php">Penjualan</a></li>
                            <li><a href="pembelian.php">Pembelian</a></li>
                            <li><a href="buku.php">Buku</a></li>
                            <li><a href="distributor.php">Distributor</a></li>
                            <li><a class="menu-top-active" href="laporan.php">Laporan</a></li>
                            <?php
                            if ($isiKasir['akses'] == 'ADMIN') {
                                echo "<li><a href='kasir.php'>Kasir</a></li>";
                            }else{};
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; Copyright 2017 | By : Syaikhu Rizal, SMK PGRI 05 JEMBER
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
