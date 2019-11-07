<?php
	$datameta = $this->db->query("select * from meta_tag LIMIT 1")->row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="msvalidate.01" content="FF8CDB58BE54CAA8D2321BA84E0CF9D0" />
	<meta name="google-site-verification" content="q_-2GVPiHmUEcoa1t1OD0_tujxEdCLW7-Wm-aYaJc7M" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $datameta->title?>::<?php echo $title_page ?></title>
    <meta name="description" content="<?php echo $datameta->description.' '.$title_page?>" />
    <meta name="Keywords" content="<?php echo $datameta->keyword?>" />
	<meta http-equiv='content-language' content='en' />
    <link rel="image_src" href="<?php echo $img_page?>" />
	<meta name='robots' content='INDEX,FOLLOW' />
    <meta property="og:title" content="<?php echo $ogtitle_page ?>"/>
    <meta property="og:image" content="<?php echo $ogtimg_page ?>"/>
    <meta property="og:image:width" content="400" />
	<meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="<?php echo $ogtitle_page ?>"/>
	<meta property="og:description" content="<?php echo $ogdesc_page ?>">
    <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name=HandheldFriendly content=true />
	<meta name=apple-mobile-web-app-capable content=YES />	
	<?php if(isset($canonical)): ?>
	<link href="<?php echo $canonical;?>" rel="canonical" />
	<?php endif;?>

	<link rel="icon" href="<?php echo base_url()?>assets/img/logo.ico" type="image/x-icon" />

	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
	
	<link href="<?php echo base_url() ?>/assets/jq_ui/jquery-ui.css" rel="stylesheet">
	
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	
	<?php
		foreach ($loadCss as $allCSS){
		//	echo base_url().$allCSS;
			echo '<link rel="stylesheet" href="'.base_url().$allCSS.'" type="text/css" />';
		}
	?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136604215-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-136604215-1');
	</script>


	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N6W48JR');</script>
<!-- End Google Tag Manager -->
<!--
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3750793074655216",
    enable_page_level_ads: true
  });
</script>
	-->
<!-- Hotjar Tracking Code for https://www.maisya.id/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1541634,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

  </head>
	<body>