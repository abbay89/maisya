		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		<br />
		<div class="container slider">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<?php if($msg){ ?>
						<div class="alert alert-danger" style="text-align:center;">
						  <?php echo $msg ?>
						</div>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class="col-xs-12 col-md-3 col-sm-3 left-profile">
							<img src="<?php echo base_url()?>assets/uploads/foto/<?php echo $profile->picuser?>" class="img-circle img-responsive" alt="e"> 			
							<div class="caption cp-profile">
									<address>
									Name:<br>
									<?php echo $profile->cust_name?><br><br>
									Email:<br>
									<?php echo $profile->cust_email?><br><br>
									Phone:<br>
									<?php echo $profile->cust_phone?><br><br>
									Address:<br>
									<?php echo $profile->alamat_customer?>
								</address>
								
							</div>
							
						</div>
						<div class="col-xs-12 col-md-9 col-sm-9">
							<div id="tabs">
							  <ul>
								<li><a href="#tabs-1">Profile</a></li>
								<li><a href="#tabs-2">Address</a></li>
								<li><a href="#tabs-3">Order Status</a></li>
							  </ul>
							  <div id="tabs-1" class=" right-profile">
								<form method="post" id="registration" action="<?php echo base_url()?>profile/update" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" class="form-control" value="<?php echo $profile->cust_name?>" placeholder="Full Name" name="fullname">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email" value="<?php echo $profile->cust_email?>"  name="email">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="phone" value="<?php echo $profile->cust_phone?>"  name="phone">
									</div>
									<div class="form-group">
										<textarea class="form-control" placeholder="Address" name="address"><?php echo $profile->alamat_customer?></textarea>
									</div>
									<?php if((!$msg) or ($profile->cust_password)){ 
									if($profile->cust_password == "cbfdac6008f9cab4083784cbd1874f76618d2a97"){
									?>
                                    <div class="form-group">
										<font color="#FF0000">You're using facebook or gmail registration with default password 'password123', please change your new password before transaction</font>
									</div>
                                    
                                    <?php } ?>
									
									<?php } ?>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="New Password" name="newpassword">
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Upload Picture <span>Max: 100 KB </span></label>
										<input type="file" name="pic_profile" id="exampleInputFile">
									</div>
									 <button type="submit" class="btn btn-signin">Update Profile</button>
								</form>
							  
								<div class="panel panel-default">
									<div class="btn btn-google">Send Testimonial</div>
									<div class="panel-body">
										<form method="post" action="<?php echo base_url()?>profile/sendtestimonial"> 
											<div class="form-group">
												<textarea class="form-control inp_testi" maxlength="160" placeholder="Maximum Text 160 Character" name="testi_desc"></textarea>
												<span id="rchars">160</span> characters remaining
											</div>
											 <input type="submit" class="btn btn-signin" value="Send Testimonial">
										</form>
									</div>
								</div>

							  </div>
							  <div id="tabs-2">
								<div class=" ">	
									 <div id="sign-in" class="panel-body">
											<?php
												$i = 0;
												foreach ($listAddress as $lstAdd){
													if($i%2 == 0){
														$style = 'style="background-color:#f2f2f2;"';
													}else{
														$style = '';
													}
													//print_r($lstAdd);
											?>
												<div class="col-xs-12 col-md-12 col-sm-12" <?php echo $style?>>
													
													<div class="col-xs-11 col-md-11 col-sm-11">
														<h4>
															<?php echo $lstAdd->LabelAlamat ?>
														</h4>
														<b>
															Nama Penerima : &nbsp;<?php echo $lstAdd->NamaPenerima ?><br />
														</b>
														Alamat Kirim : <br /><?php echo $lstAdd->Alamat ?>,&nbsp;
														Kota : &nbsp;<?php echo $lstAdd->Kota_Kecamatan ?>,&nbsp;
														Kode Pos : &nbsp;<?php echo $lstAdd->KodePos ?>,&nbsp;
														Tlp : &nbsp;<?php echo $lstAdd->NoHP ?><br />
													</div>
													<div  class="col-xs-1 col-md-1 col-sm-1" style="text-align:center;" >
														<a  href="<?php echo base_url()?>checkout/del_address/<?php echo $lstAdd->Id ?>">
															<br />
															<br />
															<i style="font-size:20px;" class="fas fa-trash-alt"></i>
														</a>
													</div>
												</div>
													
											<?php
													$i++;
												}
											?>
											<div class="col-xs-12 col-md-12 col-sm-12">
												<input type="button" value="Tambah Alamat" id="add-kirim" class="btn btn-google" />
											</div>
										</div>
									
								</div>
								
								<div class="col-xs-12 col-md-12 col-sm-12"  id="frm-other-add">
								
								<div class="panel panel-default">
								  <div class="btn btn-google">Tambah Alamat Pengiriman</div>
								  <div id="checkout-address" class="panel-body">
									<!--<form action="<?php echo base_url()?>checkout/prosescheckout" method="post">-->
									<form action="<?php echo base_url()?>checkout/save_address" method="post">
									  <div class="form-group">
										<label for="fname"><i class="fa fa-user"></i> Nama Alamat</label>
										<input type="text"  class="form-control" id="cust_type" name="cust_type" placeholder="Rumah,Kantor, dst">
									  </div>
									  <div class="form-group">
										<label for="fname"><i class="fa fa-user"></i> Nama Lengkap</label>
										<input type="text" id="fname"  class="form-control" name="cust_name" placeholder="FullName">
										<input type="hidden" id="cust_id"  class="form-control" name="cust_id" value="<?php echo $this->session->userdata('cust_username')?>">
									  </div>
									  <div class="form-group">
										<label for="email"><i class="fa fa-phone"></i> No Tlp</label>
										<input type="text"  class="form-control" id="phone" name="cust_phone" placeholder="Phone">
									  </div>
									  <div class="form-group">
										<label for="email"><i class="fa fa-envelope"></i> Email</label>
										<input type="text"  class="form-control" id="email" name="cust_email" placeholder="Email">
									  </div>
									  <div class="form-group">
										 <label for="adr"><i class="fa fa-address-card-o"></i> Alamat Lengkap</label>
										<textarea name="cust_ad_address" id="address"  class="form-control" rows="5" cols="50" placeholder="Shipping Address"></textarea>
									  </div>
									  <div class="form-group">
										 <label for="adr"><i class="fa fa-address-card-o"></i> Kota</label>
										<input type="text"  class="form-control" id="kota" name="city_name" placeholder="Kota">
									  </div>
									  <div class="form-group">
										 <label for="adr"><i class="fa fa-address-card-o"></i> Kode Pos</label>
										<input type="text"  class="form-control" id="kode_pos" name="cust_postel_code" placeholder="Kode Pos">
									  </div>
									   <div class="form-group">
										 <label for="adr"><i class="fa fa-address-card-o"></i> Kecamatan</label>
										<input type="text"  class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
									  </div>
									  <div class="form-group">
										<input type="submit" value="Submit" id="addressklik" class="btn btn-buynow btn-lg btn-block">
									  </div>
									</form>
								  </div>
								</div>
								</div>
							  </div>
							  <div id="tabs-3">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="col-xs-6 col-md-2 col-sm-2 lst-order-h">
										<label>No Invoice</label>								
									</div>
									<div class="col-xs-3 col-md-3 col-sm-3 price hidden-xs hidden-sm">
										<label>Total Amount</label>
									</div>
									<div class="col-xs-2 col-md-2 col-sm-2 hidden-xs hidden-sm">
										<label>Status</label>
									</div>
									<div class="col-xs-6 col-md-2 col-sm-2">
										<label>JNE Tracking</label>
									</div>
									<div class="col-xs-3 col-md-3 col-sm-3 hidden-xs hidden-sm">
										
										<div class="col-xs-6 col-md-6 col-sm-6">
											<label>Show</label>
										</div>
										<div class="col-xs-6 col-md-6 col-sm-6">
											<label>Status</label>
										</div>
									</div>
								</div>
								<?php
									
								foreach($detail_prod as $listProduct){
									//print_r("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'");
									$row		= $this->db->query("select konfirmasidate from konfirmasi_order where invoiceid = '".$listProduct->order_code."'")->row();
									$datebayar  = date("d M Y",strtotime($listProduct->order_date));
								?>
									<div class="col-xs-12 col-md-12 col-sm-12 lst-order">
										<div class="col-xs-6 col-md-2 col-sm-2">
											<?php echo $listProduct->order_code?>										
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 price hidden-xs hidden-sm">
											<?php 
												$getamount = $this->db->query("select sum(ord_det_price) as total from order_detail where order_id = '".$listProduct->order_id."'")->row();
												echo  number_format($getamount->total);
											?>
										</div>
										<div class="col-xs-2 col-md-2 col-sm-2 hidden-xs hidden-sm" >
											<?php 
												if($listProduct->order_status)
												{
													echo "Sudah Dibayar <br />Tanggal :".$datebayar;
												}
												else
												{
													echo  "Belum Di Bayar";
												}
											?>
										</div>
										<div class="col-xs-6 col-md-2 col-sm-2">
											<a style="text-decoration:underline;"  href="#">
													<?php echo $listProduct->jne_id ?>
											</a>
										</div>
										<div class="col-xs-3 col-md-3 col-sm-3 hidden-xs hidden-sm">
											<div class="col-xs-6 col-md-6 col-sm-6">
												<a style="text-decoration:underline;" href="<?php echo base_url()?>invoice/detail/<?php echo $listProduct->order_code?>">
														Detail
												</a>
											</div>
											<div class="col-xs-6 col-md-6 col-sm-6">
											<?php
												if(!$listProduct->order_status)
												{
											?>
												<a class="btn btn-confirm" href="<?php echo base_url()?>konfirmasi/formconfirm/<?php echo $listProduct->order_code?>">
														Confirm
												</a>	
											<?php
												}else{
											?>
													<a class="btn btn-signincomplete" href="#">
														Lunas
													</a>
											<?php
												}
											?>
											</div>
										</div>
									</div>
								<?php
									}
								?>
								<div class="clearfix"></div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			$this->load->view('template/footer');
		?>
		<script>
			$(document).ready(function(){
				var maxLength = 160;
				$('.inp_testi').keyup(function() {
				  var textlen = maxLength - $(this).val().length;
				  $('#rchars').text(textlen);
				});
				
				$( "#tabs" ).tabs();
				$("#add-kirim").click(function(){
					if ( $('#add-kirim').is(':checked') ) {
						//alert("masuk");
						$("#frm-other-add").toggle("slow");
					} 
					else {
						$("#frm-other-add").toggle("slow");
					}
				});
				$("#kecamatan").autocomplete({
					source: base_url+"search_kecamatan.php",
				});
			});
		</script>
		


