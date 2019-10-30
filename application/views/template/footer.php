	
	</div>

	<div id="footer">		
		<span class="back-top transition5s" style="display:none">
		  <span class="icon-up-arrow">
		  </span>
		</span>
		<div class="clearfix">
			<div class="">
				<div class="clearfix">
					<div class="footermenublock">
						<div class="clearfix">
							<div class="footermenu">
								<div class="row ftr-top">
									 
								</div>
								<div class="container ftr-menu">
									<ul class="row hidden-xs hidden-sm">	
										<li class="col-xs-12 col-md-2 col-sm-2 ">
											<span  > <a href="<?php echo base_url();?>staticpage/page/help_contact"><i class="far fa-envelope-open"></i> &nbsp; Contact</a></span> 
											
										</li>
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > <a target="_BLANK" href="									https://web.whatsapp.com/send?phone=+6281514331660&text=Assalammualaikum Maisya.."><i class="far fa-user"></i> &nbsp; Chat Available</a></span>
											
											
											
										</li>
										
										<li class="col-xs-12 col-md-2 col-sm-2 ">
											<span> <img width="30px" src="<?php echo base_url()?>assets/img/Footer-Logo.png"  alt="maisya jewellery" title="maisya jewellery" /></span> 
											
										</li>
										<li class="col-xs-12 col-md-2 col-sm-2 ">
											<span  > <a href="<?php echo base_url()?>orderstatus"><i class="fas fa-search"></i> &nbsp; Order Status</a></span> 
											
										</li>
										<li class="col-xs-12 col-md-3 col-sm-3  pull-right">
											<span  > <a href="<?php echo base_url();?>about_us/store_location"><i class="fas fa-map-marker-alt"></i> &nbsp; Store Location</a> </span> 
											
										</li>
									</ul>
									<div class="footer-line col-xs-6 col-md-6 col-sm-6 hidden-lg">
										<a href="<?php echo base_url();?>staticpage/page/help_contact"><i class="far fa-envelope-open"></i> <br /> Contact</a>
									</div>
									<div class=" footer-line col-xs-6 col-md-6 col-sm-6 hidden-lg">
										 <a href="whatsapp://send?text=Assalammualaikum Maisya..&phone=+6281514331660"><i class="far fa-user"></i> <br /> Chat Available</a>
									</div>
									<div class="footer-line col-xs-6 col-md-6 col-sm-6 hidden-lg">
										<a href="<?php echo base_url()?>orderstatus"><i class="fas fa-search"></i> <br /> Order Status</a>
									</div>
									<div class="footer-line col-xs-6 col-md-6 col-sm-6 hidden-lg"> 
										<a href="<?php echo base_url();?>about_us/store_location"><i class="fas fa-map-marker-alt"></i> <br /> Store Location</a>
									</div>
								</div>
								
							</div>
							<div class="bottom-footer">
								<div class="container">
									<ul class="row">	
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Help</span> 
											<ul >
												<li class="no-child" >
													<a href="<?php echo base_url()?>about-us" >About Us</a>
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>contact-us">Contact Us</a> 
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>shop">Shop</a>
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>waranty-and-maintanance">Warranty And Maintenance</a>
												</li>
											</ul>
										</li>
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Information</span> 
											<ul>
												<li class="no-child">
													<a href="<?php echo  base_url()?>terms-and-policy">Terms And Policy</a>
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>privacy-policy">Privacy Policy</a> 
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>exchange-policy">Buy Back / Exchange Policy</a>
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>faq">FAQ</a>
												</li>
											</ul>
										</li>
										
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Guide & Education</span> 
											<ul>
												<li class="no-child">
													<a href="<?php echo  base_url()?>shopping-and-payment">Shopping & Payment</a>
												</li>
												<li class="no-child">
													<a href="<?php echo  base_url()?>delivery-terms">Delivery Terms</a> 
												</li>
												<!--<li class="no-child">
													<a href="<?php echo  base_url()?>material-guide">Material Guide</a>
												</li>-->
												<li class="no-child">
													<a href="<?php echo  base_url()?>news">News</a>
												</li>
											</ul>
										</li>
										
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											
												<?php
													$qryDS  = $this->db->query("select * from img_content where category = 'Bottom Image'")->result_array();
													foreach($qryDS as $dataDS){
												?>
													<img src="<?php echo base_url();?>/assets/uploads/reff/<?php echo $dataDS['imgfile']?>" alt="<?php echo $dataDS['name']?>" title="<?php echo $dataDS['name']?>">
												<?php
													}
												?>
										</li>
										
									</ul>
									
									<div class="col-xs-12 col-md-12 col-sm-12 line"></div>
									<ul class="row">	
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Customer Service</span> 
											<?php echo $footer[0]->customer_service ?>
										</li>
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Head Office</span> 
											
											<?php echo $footer[0]->office_address ?>
										</li>
										
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Delivery Service</span> 
											<ul>
												<?php
													$qryDS  = $this->db->query("select * from img_content where category = 'Delivery Service'")->result_array();
													foreach($qryDS as $dataDS){
												?>
													<li class="no-child">
														<a href="<?php echo $dataDS['link']?>">
															<img src="<?php echo base_url();?>/assets/uploads/reff/<?php echo $dataDS['imgfile']?>" alt="<?php echo $dataDS['name']?>" title="<?php echo $dataDS['name']?>">
														</a>
													</li>
												<?php
													}
												?>
											</ul>
										</li>
										
										<li class="col-xs-12 col-md-3 col-sm-3 ">
											<span  > Payment Service</span> 
											<ul>
												<?php
													$qryDS  = $this->db->query("select * from img_content where category = 'Payment Service'")->result_array();
													foreach($qryDS as $dataDS){
												?>
													<li class="no-child">
														<a href="<?php echo $dataDS['link']?>">
															<img src="<?php echo base_url();?>/assets/uploads/reff/<?php echo $dataDS['imgfile']?>" alt="<?php echo $dataDS['name']?>" title="<?php echo $dataDS['name']?>">
														</a>
													</li>
												<?php
													}
												?>
											</ul>
										</li>
										
									</ul>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>		
	</div>
	<div class="col-xs-12 col-md-12 col-sm-12 btm-form">
		<div class="container">    
			<ul class="row">	
				<li class="col-xs-12 col-md-6 col-sm-6">
					
					<ul>
						<h2>
							Let's stay in touch 
						</h2>
						<li class="no-child">
							<div class="col-xs-12 col-md-5 col-sm-6">
								Sign up to our email newsletter
							</div>
							<div class="col-xs-7 col-md-7col-sm-7">
								<input type="text" class="email" placeholder="Enter Your Email Address">
								<input type="submit" value="Submit" class="email" />
							</div>
						</li>
					</ul>
					
				</li>
				<li class="col-xs-12 col-md-6 col-sm-6">
					<ul>
						<h2>
							Follow Us
						</h2>
						<li class="no-child">
							
							<div class="col-xs-2 col-md-2 col-sm-2 hidden-sm">
							
							</div>
							<div class="col-xs-10 col-md-10 col-sm-10">
								
								<?php
									$qryDS  = $this->db->query("select * from img_content where category = 'sosmed'")->result_array();
									foreach($qryDS as $dataDS){
								?>
									<a href="<?php echo $dataDS['link']?>" target="_BLANK">
										<img src="<?php echo base_url();?>/assets/uploads/reff/<?php echo $dataDS['imgfile']?>" alt="<?php echo $dataDS['name']?>" title="<?php echo $dataDS['name']?>"/>
									</a>&nbsp;&nbsp;
								<?php
									}
								?>
							
							</div>
						</li>
					</ul>
				</li>
			</ul>			
		</div>
		<br />
	</div>
	<?php
		if($banner_bottom){
			
			echo '<div class="col-xs-12 col-md-12 col-sm-12 bannerbt"><div class="container">';
			//print_r($banner_top);
			foreach($banner_bottom as $lstbtm){
				if($lstbtm->banner_align == 'Center')
				{
					echo '<div class="col-xs-12 col-md-12 col-sm-12" style = "text-align:center;">';
				}
				else if($lstbtm->banner_align == 'Left')
				{
					echo '<div class="col-xs-12 col-md-12 col-sm-12" style = "text-align:left;">';
				}
				else if($lstbtm->banner_align == 'Right')
				{
					echo '<div class="col-xs-12 col-md-12 col-sm-12 " style = "text-align:right;">';
				}
				else
				{
					echo '<div class="col-xs-4 col-md-4 col-sm-4">';
				}
			
	?>
					
				
				<a href="<?php echo $lstbtm->banner_link; ?>" target='parent'>
					<?php echo $lstbtm->banner_text; ?>
				</a>
			</div>
	<?php
			}
			echo "</div></div>";
		}
	?>
	<!-- Modal -->
	
	
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<ul class="nav nav-pills">
				<li class="active"><a data-toggle="pill" href="#sign-in">Sign In</a></li>
				<li class="pull-right"><a data-toggle="pill" href="#registration">Registration</a></li>
			</ul>
			  
			  <div class="tab-content">
				<div id="sign-in" class="tab-pane fade in active">
					<div class="pageforgot">
						<form action="<?php echo base_url() ?>home/forgot" method="post" class="frmchild">
							<div class="form-group">
								<h3>
									Reset Password
								</h3>
								<p>
									
									To request a new password, please enter your most current registered email on Maisya.id
								</p>
								<input type="text" class="form-control" id="emailforgot" name="emailforgot" placeholder="Type Your Email Here">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-buynow col-xs-5 backforgot" >Back To Sign in</button>
								<button type="submit" class="btn btn-buynow col-xs-5" >Reset</button>
							</div>
						</form>
					
						<form  class="frmmaster"  action="<?php echo base_url() ?>home/login" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="username" placeholder="email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password (Alphanumeric with min 5 characters)">
							</div>
                            <div class="form-group">
								<input type="hidden" class="form-control" name="redirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-signin col-xs-12 ">Sign In</button>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">
								<a href="#" class="forgotpass">Forgot Password</a></label>							
							</div>
							
						
						</form>
					</div>
				</div>
				<div id="registration" class="tab-pane fade">
					<div class="pageforgot">
						<form action="<?php echo base_url() ?>home/forgot" method="post" class="frmchild">
							<div class="form-group">
								<h3>
									Reset Password
								</h3>
								<p>
									
									To request a new password, please enter your most current registered email on Maisya.id
								</p>
								<input type="text" class="form-control" id="emailforgot" name="emailforgot" placeholder="Type Your Email Here">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-buynow col-xs-5 backforgot" >Back To Sign in</button>
								<button type="submit" class="btn btn-buynow col-xs-5" >Reset</button>
							</div>
						</form>
					
					
						<form class="frmmaster" action="<?php echo base_url()?>home/register" onsubmit="return validateForm()"  name="frmReg" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="email">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password (Alphanumeric with min 5 characters)">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password (Alphanumeric with min 5 characters)">
							</div>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="checkAgree">
								<label class="form-check-label" for="exampleCheck1">
									I Agree to the terms of use and privacy statement
								</label>
							</div>
							<div class="form-group">
								<button type="submit" id="btn-register" class="btn btn-signin col-xs-12 ">Register Now</button>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1" class="col-xs-12 col-md-12 col-sm-12">
								<a href="#" class="forgotpass">Forgot Password</a></label>
								
							</div>
                            
                            	<div class="form-group">
								<!--<button type="button"  onClick="fblogin()"  class="btn btn-primary col-xs-12 ">Register with Facebook</button>-->
								<a  href="<?php echo base_url()?>fblogin/fbconfig.php" class="btn btn-primary col-xs-12 ">Register with Facebook</a>
							</div>
							<div class="form-group">
							
								<!--<button type="button" onclick="googlelogin()" class="btn btn-google col-xs-12 ">Register with Google</button>-->
								<?php

									/* Google App Client Id */
									define('CLIENT_ID', '199030119534-c5ucg8tqi67b27ibhb1lhd87i2dsn6bi.apps.googleusercontent.com');
									/* Google App Client Secret */
									define('CLIENT_SECRET', 'i28Vwu3PWesNNyaTBJ7gkscE');
									/* Google App Redirect Url */
									define('CLIENT_REDIRECT_URL', 'https://www.maisya.id/home/validatelogingoogle');

									$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

								?>
								<a  href="<?php echo $login_url?>" class="btn btn-google col-xs-12 ">Register with Google</a>
							</div>
							
						</form>
					</div>
				</div>
			  </div>

        </div>
        
      </div>
      
    </div>
  </div>
	<script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script>
		var  base_url = '<?php echo base_url() ?>';
	</script>
	<?php
		foreach ($loadjs as $alljs){
			echo '<script src="'.base_url().$alljs.'"></script>';
		}
	?>
	<script>
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 100) {
			$(".header-top").hide();
		}
		else {
			$(".header-top").show();
		}
	});
	</script>
	<script>
			$(document).ready(function() {   
				var sideslider = $('[data-toggle=collapse-side]');
				var sel = sideslider.attr('data-target');
				var sel2 = sideslider.attr('data-target-2');
				sideslider.click(function(event){
					$(sel).toggleClass('in');
					$(sel2).toggleClass('out');
				});
				
				
				//$(".Search").
			});
		</script>
	<script>
			$( function() {
				$(document).ready(function() {
					$(".accordion").multiaccordion();
				});
				
			
				var url = window.location.pathname;
				var array = url.split('/');
				console.log(array);
				var lastsegment = array[array.length-1];
				if(lastsegment > 0)
				{
					var pager = lastsegment;
				}
				else
				{
					var pager = 1;
				}
				
				
				var icons = {
					 header: "iconClosed",    // custom icon class
					 activeHeader: "iconOpen" // custom icon class
				};
				
				
				$("#filterOrderBy").change(function(e){
					//alert($("#filterOrderBy").val());
					postFilter('1')
					e.unbind()
				});
				
				$("#filterOrderByM").change(function(e){
					//alert($(".filterOrderBy").val());
					postFilter('1')
					e.unbind()
				});
				
				
				
				//filter json_decode
				$('.chkbox').click(function() {
				  //if ($(this).is(':checked')) {
					 $("#no_result").hide()
					$(".thumbnail").hide()
					$(".pagination").hide()
					$("#proLoader").show()
					$("#frmfilter").submit();
				  //}
				  //alert("klik");
				});
				
				$('#tags').tagInput({labelClass:"badge badge-success"});
				$(".ui-accordion-content").removeAttr("style")
				
				$("#btn-mob-filter").click(function(){	
					if($( "#filterpage" ).hasClass( "hidden-xs hidden-sm" ))
					{
						$("#filterpage").removeClass("hidden-xs hidden-sm");
					}
					else
					{
						$("#filterpage").addClass("hidden-xs hidden-sm");
					}
					
				});
				$(".wishlist").click(function(){	
					if($(this).find(".iduser").val())
					{
						$(this).find(".love").css("color", "#8c1c21"); 
					}
					$.ajax({
						  method: "POST",
						  url: base_url+"product/savewishlist",
						  data: "idprod="+$(this).find(".idprod").val()+"&iduser="+$(this).find(".iduser").val()+"&name="+$(this).find(".nameid").val()
						})
						.done(function( msg ) {
							//alert( "Data Saved: " + msg );
							//$(".all-catalog").html(msg);
							if(msg == 'error'){								
								location.href =  base_url + 'checkout';
							}
							else
							{
								$("#totalwhs").html(msg);
								$("#txtdialog").html('Product Success Add To Wish List');
							}
							//$("#dialog").dialog("open");
						});
				})
				
				
				  
			} );
		</script>
		<script type="text/javascript">
			$(function() {
				 
				jQuery('#demo1').skdslider({
				  slideSelector: '.slide',
				  delay:5000,
				  animationSpeed:3000,
				  showNextPrev:false,
				  showPlayButton:false,
				  autoSlide:true,
				  animationType:'fading'
				});
			});
			
			(function(){
			  // setup your carousels as you normally would using JS
			  // or via data attributes according to the documentation
			  // https://getbootstrap.com/javascript/#carousel
			  $('#carousel123').carousel({ interval: 4000 });
			  $('#carouselABC').carousel({ interval: 4000 });
			}());

			(function(){
			  $('.carousel-showmanymoveone .item').each(function(){
				var itemToClone = $(this);

				for (var i=1;i<4;i++) {
				  itemToClone = itemToClone.next();

				  // wrap around if at end of item collection
				  if (!itemToClone.length) {
					itemToClone = $(this).siblings(':first');
				  }

				  // grab item, clone, add marker class, add to collection
				  itemToClone.children(':first-child').clone()
					.addClass("cloneditem-"+(i))
					.appendTo($(this));
				}
			  });
			}());
		</script>
	
	
	
	
	
	
	<script>
		$(document).ready(function(){
			
			var exp=''
			$('#searchText').unbind('keyup').keyup(function(e){
				var prefix = $(this).val()
				prefix = prefix.replace(' ','-')
				exp = "<?php echo base_url()?>product/search/"+prefix
				$('#postSearch').attr('action',exp)
				
			})
			
			$('#searchTextM').unbind('keyup').keyup(function(e){
				var prefix = $(this).val()
				prefix = prefix.replace(' ','-')
				exp = "<?php echo base_url()?>product/search/"+prefix
				$('#postSearchM').attr('action',exp)
				
			})
			
			$('.frm-header').hide();
			$('.frmchild').hide();
			$('.fa-search').click(function(){
				$('.frm-header').toggle('slow');
			});
			$('#btn-register').attr("disabled", "disabled");
			$("#checkAgree").click(function(){
				if ( $('#checkAgree').is(':checked') ) {
					$('#btn-register').removeAttr("disabled");
				} 
				else {
					$('#btn-register').attr("disabled", "disabled");
				}
			});
			
			$(".forgotpass").click(function(){
				$(this).closest(".pageforgot").find(".frmmaster").hide();
				$(this).closest(".pageforgot").find(".frmchild").show();
				
			})
			$(".backforgot").click(function(){
				$(this).closest(".pageforgot").find(".frmchild").hide();
				$(this).closest(".pageforgot").find(".frmmaster").show();
			});
			
		});
		
		function postFilter(page){
			
			
			<?php if(isset($keywordSearch)) {?>
				var keyword = "<?php echo urldecode($keywordSearch); ?>"
				
			<?php }else{ ?>
				
				var keyword = ''
			<?php } ?>
			
			
			var category 	= $("#category").val();
			var type   	= $("#type").val();
			
			if(category==""){
				category="empty"
			}
			
			if(type==""){
				type="empty"
			}
			
			var filter = '' 
			var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			if(width < 800){
				filter = $("#filterOrderByM").val()
			}else{
				filter = $("#filterOrderBy").val()
			}
					
					$(".all-catalog").html('<div id="proLoader" align="center" style="width:100%"><img style="margin-top:100px;margin-bottom:100px" src="<?php echo base_url()."assets/img/loader.svg";?>" /></div>')
					$("#proLoader").show()
					
					//alert(base_url+"ajax_category/"+category+"/type/"+type+"/page/"+page+"/"+filter+"?keyword="+keyword);
					
					$.ajax({
						  method: "POST",
						  url: base_url+"ajax_category/"+category+"/type/"+type+"/page/"+page+"/"+filter+"?keyword="+encodeURIComponent(keyword),
						  data: $("#frmfilter").serialize(),
						  cache:false,
						  error:function(e){
							  alert('error')
						  }
						})
						.done(function( msg ) {
							//alert( "Data Saved: " + msg );
							$("#proLoader").hide()
							$(".all-catalog").html(msg);
							
							$('.paging').click(function(e){
								postFilter($(this).attr('data-page'))
								e.unbind()
							})
							
						});
			
		}
		
		function validateForm() {
			var fullname 		= document.forms["frmReg"]["fullname"].value;
			var email 			= document.forms["frmReg"]["email"].value;
			var phone 			= document.forms["frmReg"]["phone"].value;
			var password 		= document.forms["frmReg"]["password"].value;
			var confirmPassword = document.forms["frmReg"]["confirmpassword"].value;
			if (fullname == "") {
				alert("Fullname is Empty");
				document.forms["frmReg"]["fullname"].setAttribute("style", "border-bottom:1px solid red;");
				return false;
			}
			if (email == "") {
				alert("Email is Empty");
				document.forms["frmReg"]["email"].setAttribute("style", "border-bottom:1px solid red;");
				return false;
			}else{
				 var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  				if(!re.test(email)){
  					alert("Email not valid");
					document.forms["frmReg"]["email"].setAttribute("style", "border-bottom:1px solid red;");
					return false;
  				}
			}
			if (phone == "") {
				alert("Phone is Empty");
				document.forms["frmReg"]["phone"].setAttribute("style", "border-bottom:1px solid red;");
				return false;
			}else{
				if(isNaN(phone)){
					alert("Phone is not a number");
					document.forms["frmReg"]["phone"].setAttribute("style", "border-bottom:1px solid red;");
					return false;
				}
			}
			if (password == "") {
				alert("Passeword is Empty");
				document.forms["frmReg"]["password"].setAttribute("style", "border-bottom:1px solid red;");
				return false;
			}
			if (password != confirmPassword) {
				alert("Wrong Password");
				document.forms["frmReg"]["password"].setAttribute("style", "border-bottom:1px solid red;");
				document.forms["frmReg"]["confirmpassword"].setAttribute("style", "border-bottom:1px solid red;");
				return false;
			}
		}
	</script>	
<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b4f0961df040c3e9e0bae64/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122881501-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122881501-1');
</script>
	<!-- Google Tag Manager (noscript) -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N6W48JR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	</body>
</html>

  
		