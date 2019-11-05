		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			
		?>

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<!-- <link type="text/css" rel="stylesheet" href="../newsTemp/css/bootstrap.min.css"/> -->

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../newsTemp/css/font-awesome.min.css">
		<!-- <div class="row" style="margin:2%">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="col-xs-3 col-md-3 col-sm-3">
								<a href="<?php echo base_url()?>"  class="img-responsive" target="_self" title="Maisya" >
								<img src='<?php echo base_url() ?>/assets/img/logo.png' alt="maisya_jewellery"  title="maisya_jewellery" border='0' class='logo' alt="logo maisya" height="50px"></a>
							
                            </div>
                            </div> </div>  -->
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../newsTemp/css/style.css"/>
    	<div class="row slider" style="">
    		<div class="col-md-12 blog-title" style="">BLOG</div>
    	</div>
		<div class="row" style="margin-left:7%;margin-right:7%">
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
					<div class="col-md-12 first-content">
					<div id="firstimg" style="display:none" align="center" class="col-md-6">
						<img src="../assets/uploads/img_menu/<?php echo $row->image;?>" width="90%">
				
					</div>
					<div style="margin-top:5%;" class="col-md-6">
						<div style="">
						<h3 class="post-title"><?php echo $row->title; ?></a></h3>
						<p style="font-size:18px;"><?php echo $row->intro; ?>...</p>
						<a  style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a>
						</div>
					</div>
					<div id="second" align="center" class="col-md-6">
						<img src="../assets/uploads/img_menu/<?php echo $row->image;?>" width="100%">
				
					</div>
				
					</div><div style="float:right;width:100%;border-top:0.5px #ccc solid;height:40px;margin-top:5%"><br></div>
					<?php
					
					}else if($j>=2 && $j<=4){
					
					 $total = $i%3;
					
					if($total==0){
						$i=0;
						//echo ' <div class="row">';
					}
					?>
					<div class="col-md-4" >
						<div class="post">
						<a class="post-img" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">
						<div style="margin-top:20px;height:200px;width:100%;background:url(../assets/uploads/img_menu/<?php echo $row->image; ?>) no-repeat;background-position:center;background-size:100% auto"></div>
						</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="#"><?php echo $row->author ?></a>
									<span class="post-date"> <?php	$date=date_create($row->date_added);
									echo tgl_indo(date_format($date,"Y-m-d")); ?></span>
								</div>
								
								
								<h3 class="post-title"><a href="<?php echo base_url(); ?>blog/page/<?php echo urlencode($title); ?>/?id=<?php echo $row->news_id; ?>"> <?php echo $row->title ?></a></h3>
								<p style="font-size:18px;"> <?php echo substr($row->intro,0,100); ?>...</p>
									<a style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a><br><br>
							</div>
						</div>
					</div>
                    <?php 
					 
					if($total==0){
						//echo ' </div><div style="margin-top:10px;float:right;width:100%;border-bottom:0.5px #ccc solid;height:1px"></div>';
					}
					}else{
					?>
					
					<!-- <div class="row" style="margin-top:5%;margin-left:1%;margin-right:1%"> -->
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
										echo tgl_indo(date_format($date,"Y-m-d"));
										?></span>
									</div>
									
									
									<h3 class="post-title"><a href="<?php echo base_url(); ?>blog/page/<?php echo urlencode($title); ?>/?id=<?php echo $row->news_id; ?>"> <?php echo $row->title ?></a></h3>
									<p style="font-size:18px;"><?php echo $row->intro; ?>...</p>
										<a style="float:right" href="/blog/page/<?php echo $title; ?>/?id=<?php echo $row->news_id; ?>">Selanjutnya</a><br><br>
										<div style="margin-top:10px;float:right;width:100%;border-bottom:0.5px #ccc solid;height:1px"></div>
								</div>
							
							</div>
							
						</div>
					<!-- </div> -->
					
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

		<?php
			$this->load->view('template/footer');
		?>

			