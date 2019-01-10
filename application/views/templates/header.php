<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/images/icon/blog-icon.png');?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('public/mdb_hack/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('public/mdb_hack/css/mdb.min.css');?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url('public/assets/css/custom_css.css');?>" rel="stylesheet">
    <style>
        .stickyTop{        
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1;
        }
    </style>
    <!-- This is script for ck editor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>
<body>