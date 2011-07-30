<!DOCTYPE html>

<!-- 
320 and Up boilerplate extension
Author: Andy Clarke
Version: 0.9b
URL: http://stuffandnonsense.co.uk/projects/320andup 
-->

<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" manifest="default.appcache?v=1" lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<title>CodeIgniter Google Maps Library</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- http://t.co/dKP3o1e -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1">

<!-- For less capable mobile browsers
<link rel="stylesheet" media="handheld" href="assets/css/handheld.css?v=1">  -->

<!-- For all browsers -->
<link rel="stylesheet" media="screen" href="<?php echo site_url(); ?>assets/css/style.css?v=1">
<link rel="stylesheet" media="screen" href="assets/css/forms.css?v=1">
<link rel="stylesheet" media="print" href="assets/css/print.css?v=1">
<!-- For progressively larger displays -->
<link rel="stylesheet" media="only screen and (min-width: 480px)" href="assets/css/480.css?v=1">
<link rel="stylesheet" media="only screen and (min-width: 768px)" href="assets/css/768.css?v=1">
<link rel="stylesheet" media="only screen and (min-width: 992px)" href="assets/css/992.css?v=1">
<link rel="stylesheet" media="only screen and (min-width: 1382px)" href="assets/css/1382.css?v=1">
<!-- For Retina displays -->
<link rel="stylesheet" media="only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)" href="assets/css/2x.css?v=1">
<!-- Display css loaded through carabiner --> 
<?php $this->carabiner->display('css'); ?>

<!-- JavaScript at bottom except for Modernizr -->
<script src="assets/javascript/libs/modernizr-1.7.min.js"></script>

<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="assets/images/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="assets/images/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="/favicon.ico">

<!--iOS. Delete if not required -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="apple-touch-startup-image" href="assets/images/splash.png">

<!--Microsoft. Delete if not required -->
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- http://t.co/y1jPVnT -->
<link rel="canonical" href="/">
</head>

<body class="clearfix">

<header role="banner" class="clearfix">
<h1><?php echo anchor(site_url(), 'CodeIgniter Google Maps Library'); ?></h1>
</header>

<div class="content clearfix">

<div role="main">
	<?php $this->load->view($main_view); ?>
</div>

<div role="complementary">
</div>

</div>

<footer role="contentinfo" class="clearfix">
</footer>

<!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
<script>window.jQuery || document.write('<script src="assets/javascript/libs/jquery-1.5.1.min.js">\x3C/script>')</script>
<!-- Scripts -->
<script src="assets/javascript/plugins.js"></script>
<script src="assets/javascript/script.js"></script>

<!-- Display javascript loaded through carabiner --> 
<?php $this->carabiner->display('js'); ?>

<!-- Output Google Maps scripts -->
<?php echo $this->google_maps->output(); ?>

<!--[if (lt IE 9) & (!IEMobile)]>
<script src="assets/javascript/libs/DOMAssistantCompressed-2.8.js"></script>
<script src="assets/javascript/libs/selectivizr-1.0.1.js"></script>
<script src="assets/javascript/libs/respond.min.js"></script>
<![endif]-->

<!-- http://t.co/HZe9oJ4 -->
<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<noscript>Your browser does not support JavaScript!</noscript>
</body>
</html>