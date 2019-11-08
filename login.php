<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Login | Kasirian</title>
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
                
            </div>
            <div class="left-div">
                <!-- <img src="assets/img/logo.PNG" style="border-radius: 5px"> -->
                <h1 style="color:cyan;cursor:default"><b>KASIRIAN</b></h1>
        	</div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Silahkan Login Terlebih Dahulu</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                     	<label>Masukkan Username : </label>
                        	<input type="text" class="form-control" id="username"><br>
                        <label>Masukkan Password :  </label>
                        	<input type="password" class="form-control" id="password">
                        <hr>
                        <button type="button" class="btn btn-info btn-lg" id="masuk"><span class="glyphicon glyphicon-user"></span> &nbsp;MASUK</button>&nbsp;<hr>
                        <div id="kotak"></div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <p align="justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
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
    <script>
    $(document).ready(function() {
        $('#username').focus();
    	$('#masuk').click(function() {
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                url: 'login_do.php',
                type: 'GET',
                data: 'username='+username+'&password='+password,
                success:function(data){
                    $('#kotak').html(data);
                    if ($('#uhu').text() == "Berhasil Login !! ") {
                        window.location="penjualan.php";
                    }
                }
            });
        });
    });
    </script>
</body>
</html>
