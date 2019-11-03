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
    <meta name="description" content="<?php echo $datameta->description?>" />
    <meta name="Keywords" content="<?php echo $datameta->keyword?>" />
	<meta http-equiv='content-language' content='en' />
    <link rel="image_src" href="<?php echo $img_page?>" />
	<meta name='robots' content='' />
    <meta property="og:title" content="<?php echo $ogtitle_page ?>"/>
    <meta property="og:image" content="<?php echo $ogtimg_page ?>"/>
    <meta property="og:image:alt" content="<?php echo $ogtitle_page ?>"/>
	<meta property="og:description" content="<?php echo $ogdesc_page ?>">
    <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name=HandheldFriendly content=true />
	<meta name=apple-mobile-web-app-capable content=YES />	
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
	
  </head>
  <style>
	@media only screen and (max-width: 600px) {
	#newsContent{
		
		padding-right:5% !important;
		padding-left:5%  !important;
		
	}
	ol, ul {
    list-style: outside none none;
    margin: 0;
    padding-left: 5%;
	}
	}
	</style>
	<body>
	

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../newsTemp/css/bootstrap.min.css"/>
		
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../newsTemp/css/font-awesome.min.css">
	<div class="row" style="margin:2%">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-5 col-md-5 col-sm-5">
								<a href="<?php echo base_url()?>"   target="_self" title="Maisya" ><img style="margin-left:20px" src='<?php echo base_url() ?>/assets/img/logo.png' alt="maisya_jewellery"  title="maisya_jewellery" border='0' class='logo' alt="logo maisya" height="50px"></a>
                            </div>
                            </div> </div> 
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../newsTemp/css/style.css"/>
        
      <div id="newsContent" align="justify" class="section-row sticky-container" style="padding-left:20%;padding-right:20%;">
							<div class="main-post" style="font-size:18px !important;font-family: 'Nunito', sans-serif !important">
                             <?php 
							$i=1;
							foreach($news as $row){ 
					
								?>
								<h3 style="text-align: left;font-size:27px !important;font-family: 'Nunito Sans', sans-serif !important;color:#000"><?php echo $row->title; ?></h3>
                                <h5><?php 
								$date=date_create($row->date_added);
								echo tgl_indo(date_format($date,"Y-m-d"));
								 ?></h5>
								<!-- <div>
								<img class="sosmed" src="../../../assets/uploads/sosmed/fb.png" height="50" />
								<img class="sosmed" src="../../../assets/uploads/sosmed/wa.png" height="50" />
								<img class="sosmed" src="../../../assets/uploads/sosmed/ig.png" height="50" /></div> -->
								<!-- AddToAny BEGIN -->
								<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
								<a class="a2a_button_facebook"></a>
								<a class="a2a_button_twitter"></a>
								<a class="a2a_button_whatsapp"></a>
								<a class="a2a_button_copy_link"></a>
								<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
								</div>
								<script async src="https://static.addtoany.com/menu/page.js"></script>
								<!-- AddToAny END -->
				            	
				            	<br><br>
                                <div  style="width:100%" align="center"><img width="100%" src="../../../assets/uploads/img_menu/<?php echo $row->image; ?>" /></div><br><br>
								<?php 
								$cont = str_replace("height=","",$row->content);
								$cont = str_replace("width=","",$cont);
								echo $cont;
								?>
							
                            <?php } ?>
                            </div>
							
						</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>				
	    <script>
		$('img').css('width','100%')
		$('img').css('height','auto')
		
		$('.sosmed').css('width','auto')
		$('.sosmed').css('height','50px')
		$('.logo').css('height','50px')
		$('.logo').css('width','auto')
		$('h3').css('font-family','\'Nunito Sans\', sans-serif')
		$('h3').css('color','#000')
		$('h4').css('font-family','\'Nunito Sans\', sans-serif')
		$('h4').css('color','#000')
		$('ol').css('font-family','\'Nunito Sans\', sans-serif')
		$('ol').css('color','#000')
		$('li').css('font-family','\'Nunito Sans\', sans-serif')
		$('li').css('color','#000')
		$('li').css('white-space','normal')
		
		//$('span').css('font-family','\'Nunito Sans\', sans-serif')
		$('span').css('font-size','18px')
		
		$('span').css('font-family','inherit')
		$('span').css('font-weight', 300);
		$('span').css('font-style', 'normal');
		$('span').css('font-variant', 'normal');
		$('span').css('text-decoration', 'normal');
		$('span').css('vertical-align', 'baseline');
		$('span').css('white-space', 'pre-wrap');
		</script>
	