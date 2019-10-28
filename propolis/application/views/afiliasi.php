		<?php
			$this->load->view('template/header_cnt');
		?>
		   
          <div class="content onload">
            <div class="row">   
				<div class="col-md-12 kilatte">
					<div class="container">
						<div class="row navbar-container">  
							<div class="navbar-right">
								<nav role="navigation" class="navbar">
									<div class="collapse navbar-collapse">
									  <ul id="user-menu" class="nav navbar-nav user-menu navbar-right">
										<li class="login" style="margin-right:10px;"><a href="<?php echo base_url()?>pembelian/checkout"><span class="icon icon-bag" aria-hidden="true"></span> Cart</a></li>
										<li class="login"><a href="<?php echo base_url()?>profile/logout"><span class="icon icon-power" aria-hidden="true"></span> Logout</a></li>
									  </ul>
									</div>
								</nav>
							</div>						  
						</div>
					</div>
					<div class="menu-main">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="menu-main-header"><span> Beranda > Membership > Afiliasi
						</div>
					  </div>
					</div>	
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="row">
							<div class="afiliasi">
								<div class="col-xs-8">
									<div class="form-group">
										<label for="firstname" class="control-label">
											Link Afiliasi  
										</label>
										<input  class="form-control col-xs-8" type="text"
											value="<?php echo base_url()?>registration/request/<?php echo $this->session->userdata('email')."_".$idserver."_".str_replace(" ","",$profilename)?>"
											name="link_afiliasi" 
										/>
									</div>
									<div class="form-group">
										<label for="firstname" class="control-label">
											Share Link Via
										</label>
										<hr />
										<button class="btn btn-warning btnLink" id="email_link"><i class="glyphicon glyphicon-envelope"></i></button>
									</div>
									<div id="frm_email_link" class="col-xs-12" style="display:none;">
										<form id="frmEmail">
											<div class="form-group mb-2 mr-sm-2 mb-sm-0">									
												<input type="hidden" name="link" value="<?php echo base_url()?>registration/request/<?php echo $this->session->userdata('email')."_".$idserver."_".str_replace(" ","",$profilename)?>" />
												<input  class="form-control" type="email"
													placeholder="Type Your Email Here"
													name="email_afilia" id="emailhere"
												/>
												<h2 id="waitemail">Waiting send email.... </h2>
											</div>
											<div class="form-group">
												<a id="proc_email" class="btn btn-warning col-xs-12" href="#">Send Afiliasi</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.content-->
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#frm_email_link").hide();
			$("#waitemail").hide();
			$("#email_link").click(function(){
				$("#frm_email_link").toggle("slow");
			});
			
			$("#proc_email").click(function(){
				$("#emailhere").hide();
				$("#waitemail").show();
				$.ajax({
				  method: "POST",
				  url: "<?php echo base_url()?>afiliasi/send_email",
				  data:  $("#frmEmail").serialize() 
				})
				  .done(function( msg ) {
					$("#emailhere").show();
					$("#waitemail").hide();
					alert("Email Afiliasi Sudah Terkirim");
				});
			});
			
		});
	</script>
		<?php
			$this->load->view('template/footer_cnt');
		?>


