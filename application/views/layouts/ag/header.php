<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gudang In - Transit Merge</title>
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url('assets/vendor/chartjs/chart.min.js'); ?>"></script>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="<?= site_url('ag/adminG_halaman'); ?>">Petugas Gudang</a>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <a class="navbar-brand mr-1" href="#"><?= $name; ?></a>
        <a href="<?= site_url('welcome/logout'); ?>"><button class="btn btn-info btn-sm">Logout</button>
    </nav>