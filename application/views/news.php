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
	<style>
	@media only screen and (max-width: 600px) {
	#firstimg{
		
		display:block !important;
		
	}
	
	#second{
		
		display:none;
		
	}
	
	}
	</style>
	
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

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../newsTemp/css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../newsTemp/css/font-awesome.min.css">
		<div class="row" style="margin:2%">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-3 col-md-3 col-sm-3">
								<a href="<?php echo base_url()?>"  class="img-responsive" target="_self" title="Maisya" >
								<img src='<?php echo base_url() ?>/assets/img/logo.png' alt="maisya_jewellery"  title="maisya_jewellery" border='0' class='logo' alt="logo maisya" height="50px"></a>
							
                            </div>
                            </div> </div> 
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../newsTemp/css/style.css"/>
    
		<div class="row" style="margin-top:5%;margin-left:7%;margin-right:7%">
					<div class="col-md-12">
						
					</div>

					<!-- post -->
                   <div class="row" >
                 
					  <?php 
					 $j=1; 
					 $i=0;
				   
				   foreach($news as $row){ 
				   
				   
				    $ex = explode(' ',$row->title);
					 $title = implode('-',$ex);
				   
					if($j==1){
						
					?>
					<div class="row">
					<div id="firstimg" style="display:none" align="center" class="col-md-6">
						<img src="../assets/uploads/img_menu/<?php echo $row->image;?>" width="90%">
				
					</div>
					<div style="margin-top:5%;" class="col-md-6">
						<div style="margin-left:5%;">
						<h3 class="post-title"><?php echo $row->title; ?></a></h3>
						<p style="font-size:18px;"><?php echo $row->intro; ?>...</p>
						<a  style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a>
						</div>
					</div>
					<div id="second" align="center" class="col-md-6">
						<img src="../assets/uploads/img_menu/<?php echo $row->image;?>" width="90%">
				
					</div>
				
					</div><div style="float:right;width:100%;border-top:0.5px #ccc solid;height:40px;margin-top:5%"><br></div>
					<?php
					
					}else if($j>=2 && $j<=4){
					
					 $total = $i%3;
					
					if($total==0){
						$i=0;
						echo ' <div class="row">';
					}
					?>
					<div class="col-md-4" >
						<div class="post">
						<a class="post-img" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">
						<div style="margin-top:20px;height:200px;width:100%;background:url(../assets/uploads/img_menu/<?php echo $row->image; ?>) no-repeat;background-position:center;background-size:auto 100%"></div>
						</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="#"><?php echo $row->author ?></a>
									<span class="post-date"> <?php	$date=date_create($row->date_added);
									echo date_format($date,"d F Y"); ?></span>
								</div>
								
								
								<h3 class="post-title"><a href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>"> <?php echo $row->title ?></a></h3>
								<p style="font-size:18px;"> <?php echo substr($row->intro,0,100); ?>...</p>
									<a style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a><br><br>
							</div>
						</div>
					</div>
                    <?php 
					 
					if($total==0){
						echo ' </div><div style="margin-top:10px;float:right;width:100%;border-bottom:0.5px #ccc solid;height:1px"></div>';
					}
					}else{
					?>
					
					<div class="row" style="margin-top:5%;margin-left:1%;margin-right:1%">
					<div style="margin-top:5%;" class="col-md-8">
					
						<div class="post">
						<a class="post-img" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">
						
						<img src="../assets/uploads/img_menu/<?php echo $row->image; ?>" />
						</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="#"><?php echo $row->author ?></a>
									<span class="post-date"> <?php 
									$date=date_create($row->date_added);
									echo date_format($date,"d F Y");
									?></span>
								</div>
								
								
								<h3 class="post-title"><a href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>"> <?php echo $row->title ?></a></h3>
								<p style="font-size:18px;"><?php echo $row->intro; ?>...</p>
									<a style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a><br><br>
									<div style="margin-top:10px;float:right;width:100%;border-bottom:0.5px #ccc solid;height:1px"></div>
							</div>
						
						</div>
						
					</div></div>
					
					<?php
					}
					
					$i++;
					$j++;
					
					}
					
					?>
                    </div>
					<!-- /post -->

					
				</div>
				<!-- /row -->

			