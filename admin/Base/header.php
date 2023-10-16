<?php
    ini_set("display_errors", 0);
    session_start();
    if (!isset($_SESSION['nik'])) {
        $_SESSION['response'] = $response;
        header('location:../index.php?response=BelumLogin');
        exit; 
    }
    if ($_SESSION['level'] != '1') {
        die('Page Error !');
    }
    require(__DIR__ . '/../../function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../Controller/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../Controller/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../Controller/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<style>
    .pagination {
        margin: 1px 0;
        text-align: right; /* Menentukan posisi kanan untuk pagination */
    }

    .pagination a {
        display: inline-block;
        padding: 4px 9px;
        text-decoration: none;
        color: #367df7;
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 1px;
    }

    .pagination a:hover {
        background-color: #367df7;
        color: white;
    }

    .pagination .current {
        background-color: #4CAF50;
    }

    .pagination .disabled {
        background-color: #ddd;
        color: #aaa;
        pointer-events: none;
    }
    .card-footer1 {
        padding: 0.1rem 1rem;
}
</style>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
