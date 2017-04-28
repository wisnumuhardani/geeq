<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo $setting['keyword']; ?>"/>
        <meta name="description" content="<?php echo $setting['description']; ?>"/>
		
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		
		
        <title><?php echo $setting['site_title']; ?></title>
        <?php if ($this->uri->segment(1) === "read") { ?>             
        <meta property="og:url" content="<?php echo $url_post; ?>"/>
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $setting['site_title']; ?>"/>
        <meta property="og:description" content="<?php echo $setting['description']; ?>"/>
        <?php if (!empty($setting['image'])) { ?>
        <meta property="og:image" content="<?php echo base_url('assets/picture/medium/' . $setting['image'] . ''); ?>"/>                
        <?php } elseif ($setting['video']) { ?>
        <meta property="og:image" content="<?php echo ('http://img.youtube.com/vi/' . $setting['video'] . '/0.jpg'); ?>"/>
        <?php } else { ?>
        <meta property="og:image" content="<?php echo base_url('assets/images/no-img-article.jpg'); ?>"/>
        <?php }} ?> 
		
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/images/favico/32x32.png'); ?>"/>
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/images/favico/96x96.png'); ?>"/>
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favico/16x16.png'); ?>"/>
        <link rel="manifest" href="<?php echo base_url('assets/images/favico/manifest.json'); ?>"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Coda|Exo+2:200,300,400|Oswald:400,800" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="<?php echo base_url('assets/css/geeq.ql.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
		
        <link href="<?php echo base_url('assets/css/geeq-styles06042017.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection">
		
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		
		<!--GA-->
		<script>
 		 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-96614555-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-1341361549322424",
enable_page_level_ads: true
});
</script>

    </head>
	<style>  
		.myloader{
			width:66px;
			height:66px;
			position:absolute;
			left:50%;
			top:50%;
			margin-left:-33px;
			margin-top:-33px;
			z-index:999999!important;
		 }
	</style>
    <body>

 
	<div id="loadingsosmed" class="myloader">  
		<div class="preloader-wrapper big active">
			<div class="spinner-layer spinner-blue-only">
			  <div class="circle-clipper left">
				<div class="circle"></div>
			  </div><div class="gap-patch">
				<div class="circle"></div>
			  </div><div class="circle-clipper right">
				<div class="circle"></div>
			  </div>
			</div>
		</div>
	</div> 