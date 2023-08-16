<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/izitoast/dist/css/iziToast.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/select2/dist/css/select2.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">

    <!-- JS Script Libraries -->
    <?= $map['js']; ?>

    <style>
        .bunder {
            object-fit: cover;
            object-position: 50% 0;
            border-radius: 50%;
            height: 35px;
            width: 35px;
        }

        .bunder2 {
            object-fit: cover;
            object-position: 50% 0;
            border-radius: 50%;
            height: 100px;
        }

        .img-thumbnail {
            object-fit: cover;
            object-position: 50% 0;
            padding: 0.25rem;
            border-radius: 0.25rem;
            width: 250px;
            height: 250px
        }
    </style>
</head>