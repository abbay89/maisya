		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			
		?>

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<!-- <link type="text/css" rel="stylesheet" href="../newsTemp/css/bootstrap.min.css"/> -->
		
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?php echo base_url() ?>newsTemp/css/font-awesome.min.css">
	<!-- <div class="row" style="margin:2%">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-5 col-md-5 col-sm-5">
								<a href="<?php echo base_url()?>"   target="_self" title="Maisya" ><img style="margin-left:20px" src='<?php echo base_url() ?>/assets/img/logo.png' alt="maisya_jewellery"  title="maisya_jewellery" border='0' class='logo' alt="logo maisya" height="50px"></a>
                            </div>
                            </div> </div>  -->
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>newsTemp/css/style.css"/>
      <div class="row slider" style="">
    		<div class="col-md-12 blog-title" style="">BLOG</div>
    	</div>
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
                                <div  style="width:100%" align="center"><img width="100%" alt="<?php echo $row->title; ?>" src="<?php echo base_url();?>assets/uploads/img_menu/<?php echo $row->image; ?>" /></div><br><br>
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
		$('#newsContent img').css('width','100%')
		$('#newsContent img').css('height','auto')
		
		$('#newsContent .sosmed').css('width','auto')
		$('#newsContent .sosmed').css('height','50px')
		$('#newsContent .logo').css('height','50px')
		$('#newsContent .logo').css('width','auto')
		$('#newsContent h3').css('font-family','\'Nunito Sans\', sans-serif')
		$('#newsContent h3').css('color','#000')
		$('#newsContent h4').css('font-family','\'Nunito Sans\', sans-serif')
		$('#newsContent h4').css('color','#000')
		$('#newsContent ol').css('font-family','\'Nunito\', sans-serif')
		$('#newsContent ol').css('color','#000')
		$('#newsContent li').css('font-family','\'Nunito\', sans-serif')
		$('#newsContent li').css('color','#000')
		$('#newsContent li').css('white-space','normal')
		
		//$('#newsContent span').css('font-family','\'Nunito Sans\', sans-serif')
		$('#newsContent span').css('font-size','18px')
		
		$('#newsContent span').css('font-family','inherit')
		// $('#newsContent span').css('font-weight', 300);
		$('#newsContent span').css('font-style', 'normal');
		$('#newsContent span').css('font-variant', 'normal');
		$('#newsContent span').css('text-decoration', 'normal');
		$('#newsContent span').css('vertical-align', 'baseline');
		$('#newsContent span').css('white-space', 'pre-wrap');
		</script>

		<?php
			$this->load->view('template/footer');
		?>
	