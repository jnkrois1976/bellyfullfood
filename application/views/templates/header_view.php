<!doctype html>
<html class="no-js" lang="">
    <head>
        <?php if($this->config->item('google_analytics')): ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107620707-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-107620707-1');
            </script>
        <?php endif; ?>
        <script language="javascript">
            if (document.location.protocol != "https:"){
                document.location.href = "https://bellyfullfoods.com" + document.location.pathname;
            };
        </script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title itemprop='name'>Welcome to BellyFullFoods</title>
        <link rel="canonical" href="<?php echo base_url();?>" itemprop="url">
        <meta name="description" content="<?=$this->lang->line('head_description')?>">
        <meta name="keywords" content="<?=$this->lang->line('keywords')?>">
        <meta name="author" content="Juan C. Rois">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no" />
        <meta name="google-site-verification" content="RBUnCKbI9lmvQg6RbKVe5aXOM3izigpk8A-NzDP8cfQ" />
        <link rel="alternate" hreflang="en-us" href="alternateURL">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/layout.css">
        <link rel="stylesheet" href="/css/format.css">
        <link rel="stylesheet" href="/css/skin.css">
        <link rel="stylesheet" href="/css/breakpoints.css">
    </head>
    <body class="<?=$page_class?>">
        <header class="container-fluid">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center">
                    <h4 class="cursive mt-2">BellyFullFoods - Your Healthy Meal Delivery Service</h4>
                </div>
            </div>
        </header>
        <div class="navWrapper">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <img class="navbar-toggler-icon" src="/img/ic_menu_black_24px.svg" alt="Menu" />
            </button>
            <nav class="container collapse" id="navbarToggleExternalContent">
                <ul class="row">
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/home">Home</a>
                    </li>
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/menu">Menu</a>
                    </li>
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/faq">FAQ</a>
                    </li>
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/order">Order</a>
                    </li>
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/cart">Cart&nbsp;</a>
                        <?php if($this->input->cookie('mealInCart')): ?>
                            <span class="badge badge-primary"> 1</span>
                        <?php endif; ?>
                    </li>
                    <li class="col d-flex align-items-center justify-content-center">
                        <a href="/contact">Contact Us</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="infoBanner" class="container-fluid">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center">
                    <h4 class="cursive" style="margin-bottom: 0;">Currently serving Boca Raton, Delray Beach, Coral Springs and Parkland</h4>
                </div>
            </div>
        </div>


        <main class="<?=$page_class?>">
