<!doctype html>
<html class="no-js" lang="">
<head>
    <script language="javascript">
        if (document.location.protocol != "https:"){
            document.location.href = "https://bellyfullfoods.com" + document.location.pathname;
        };
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title itemprop='name'>BellyFull - Admin</title>
    <link rel="canonical" href="<?php echo base_url();?>" itemprop="url">
    <meta name="description" content="<?=$this->lang->line('head_description')?>">
    <meta name="keywords" content="<?=$this->lang->line('keywords')?>">
    <meta name="author" content="Juan C. Rois">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <link rel="alternate" hreflang="en-us" href="alternateURL">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin/layout.css">
    <link rel="stylesheet" href="/css/admin/format.css">
</head>
<body class="<?=$page_class?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://bellyfullfoods.com">Main Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/orders">View orders<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/menu">View Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/coupons">View Coupons</a>
                </li>
                <li class="nav-item">
                    <form class="form-inline" action="/admin/set_maintenance" method="post">
                        <div class="form-group">
                            <span>The website is "<?= ($status['status']? "On line": "OFFLINE"); ?>"&nbsp;</span>
                            <label class="switch">
                                <input onchange="this.form.submit()" value="<?= ($status['status']? "on": "off"); ?>" id="setMaintenance" type="checkbox" <?= ($status['status']? "checked": ""); ?> name="setMaintenance">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <main>
