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
        <a class="navbar-brand mr-1" href="<?= site_url('staf'); ?>">Staff</a>

        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="pesan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger" id="jmlh"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#"> barang masuk # dari #</a>
                </div>
            </li>
            <a class="navbar-brand mr-1" href="#">#</a>
            <a href="#"><button class="btn btn-info btn-sm">Logout</button></a>
        </ul>
    </nav>