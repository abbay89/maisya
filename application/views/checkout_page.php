<?php
	$this->load->view('template/header');
	$this->load->view('template/navigation');
?>
<div class="det_payment container  slider">				
	<div class="space-top">
		<div class="row detail-cart">
		
			
		
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Check Out</a></li>
							</ol>
							
							
						</div>
				<div class="col-xs-12 col-md-8 col-sm-8">
					
					<div class="col-xs-12 col-md-12 col-sm-12 detail-cart">	
						<div class="panel panel-default">
							 <div class="btn btn-google">Alamat Pengiriman</div>
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
										<div class="col-xs-1 col-md-1 col-sm-1" style="text-align:center;">
											<br />
											<br />
											<br />
											<input type="radio" name="address_id" class="address_id" class="form-check-input" value="<?php echo $lstAdd->Id?>">
										</div>
										<div class="col-xs-10 col-md-10 col-sm-10">
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
					</div>
					
					<div class="col-xs-12 col-md-12 col-sm-12"  id="frm-other-add">
					
					<div class="panel panel-default">
					  <div class="btn btn-google">Tambah Alamat Pengiriman</div>
					  <div id="checkout-address" class="panel-body">
						<!--<form action="<?php echo base_url()?>checkout/prosescheckout" method="post">-->
						<form action="<?php echo base_url()?>checkout/save_address" method="post">
						  <div class="form-group">
							<label for="fname"><i class="fa fa-user faclear"></i> &nbsp;&nbsp;&nbsp;Nama Alamat</label>
							<input type="text"  class="form-control" id="cust_type" name="cust_type" placeholder="Rumah,Kantor, dst">
						  </div>
						  <div class="form-group">
							<label for="fname"><i class="fa fa-user faclear"></i>&nbsp;&nbsp;&nbsp; Nama Lengkap</label>
							<input type="text" id="fname"  class="form-control" name="cust_name" placeholder="FullName">
							<input type="hidden" id="cust_id"  class="form-control" name="cust_id" value="<?php echo $this->session->userdata('cust_username')?>">
						  </div>
						  <div class="form-group">
							<label for="email"><i class="fa fa-phone faclear"></i> &nbsp;&nbsp;&nbsp;No Tlp</label>
							<input type="text"  class="form-control" id="phone" name="cust_phone" placeholder="Phone" onkeydown="return CheckValue(event)">
						  </div>
						  <div class="form-group">
							<label for="email"><i class="fa fa-envelope faclear"></i> &nbsp;&nbsp;&nbsp;Email</label>
							<input type="text"  class="form-control" id="email" name="cust_email" placeholder="Email">
						  </div>
						  <div class="form-group">
							 <label for="adr"><i class="fa fa-address-card-o faclear"></i> &nbsp;&nbsp;&nbsp;Alamat Lengkap</label>
							<textarea name="cust_ad_address" id="address"  class="form-control" rows="5" cols="50" placeholder="Shipping Address"></textarea>
						  </div>
						   <div class="form-group">
							 <label for="adr"><i class="fa fa-address-card-o faclear"></i> &nbsp;&nbsp;&nbsp; Kecamatan</label>
							<input type="text"  class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
						  </div>
						  <div class="form-group">
							 <label for="adr"><i class="fa fa-address-card-o faclear"></i> &nbsp;&nbsp;&nbsp;Kota</label>
							<input type="text"  class="form-control" id="kota" name="city_name" placeholder="Kota">
						  </div>
						  <div class="form-group">
							 <label for="adr"><i class="fa fa-address-card-o faclear"></i> &nbsp;&nbsp;&nbsp;Kode Pos</label>
							<input type="text"  class="form-control" id="kode_pos" name="cust_postel_code" placeholder="Kode Pos" onkeydown="return CheckValue(event)">
						  </div>
						  
						  <div class="form-group">
							<input type="submit" value="Submit" id="addressklik" class="btn btn-buynow btn-lg btn-block">
						  </div>
						</form>
					  </div>
					</div>
					</div>
					<form id="frm-trans" action="<?php echo base_url()?>checkout/prosescheckout" method="post">
					<?php					
						foreach($chart as $lstChart)
						{
					?>
						<div class="col-xs-12 col-md-12 col-sm-12 detail-cart">	
							<div class="panel panel-default">
								<div id="sign-in" class="panel-body">
									<div class="col-xs-12 col-md-12 col-sm-12">
										<p>
											<b>Penjual : </b> Maisya
										</p>
										<div class="">
											<div class="col-xs-12 col-md-12 col-sm-12">
												<div class="col-xs-5 col-md-2 col-sm-2">
													<a href="<?php echo base_url()."detailproduct/all/".str_replace(".","",str_replace(" ","-",$lstChart['name']."--k--".$lstChart['id'])); ?>">
														<img src="https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $lstChart['id']?>&width=120&height=100" class="img-thumbnail image">
													</a>
												</div>
												<div class="col-xs-1 col-md-1 col-sm-1">
												</div>
												<div class="col-xs-6 col-md-9 col-sm-9">
													<b>
														<a href="<?php echo base_url()."detailproduct/all/".str_replace(" ","_",$lstChart['name']."--k--".$lstChart['id']); ?>">
														<?php echo $lstChart['name']; ?>
														</a>
													</b>
													<p>
														<input type="hidden" name="price[]" value="<?php echo $lstChart['price']?>" />
														
															Rp. <?php echo number_format($lstChart['price']); ?><br />
															Weight : <?php echo $lstChart['weight_item']; ?> Gr
														
													</p>
												</div>
											</div>
											<div class="col-xs-12 col-md-12 col-sm-12">
												<br />
												<textarea name="descitem[]" placeholder="Catatan Untuk Penjual " class="col-xs-12 col-md-12 col-sm-12"></textarea>
											</div>
											<div class="col-xs-12 col-md-12 col-sm-12">
												<br />
												<div class="col-xs-6 col-md-6 col-sm-6">
													<div class="plus-min">
														<a href="<?php echo base_url()?>checkout/minuschart/<?php echo $lstChart['id']; ?>/<?php echo $lstChart['qty']; ?>">
															<i class="fas fa-minus-circle"></i>
														</a>
															&nbsp;&nbsp;
															<?php echo $lstChart['qty']; ?>
															&nbsp;&nbsp;
														<a href="<?php echo base_url()?>checkout/pluschart/<?php echo $lstChart['id']; ?>/<?php echo $lstChart['qty']; ?>">
															<i class="fas fa-plus-circle"></i>
														</a>
													</div>
												</div>
												<div class="col-xs-1 col-md-1 col-sm-1 pull-right">
													<a href="<?php echo base_url()?>checkout/minuschart/<?php echo $lstChart['id']; ?>/1">
														<i class="fas fa-trash-alt"></i>
													</a>
												</div>
												<div class="col-xs-5 col-md-5 col-sm-5">
													<input type="hidden" name="qty[]" value="<?php echo $lstChart['qty']?>" />
													<h4 class=" pull-right"><?php echo number_format($lstChart['qty'] * $lstChart['price']); ?>&nbsp;</h4>
												</div>
												
											</div>
										</div> 
										
										
									</div>
								</div>
							</div>
						</div>
					<?php
							$subtotal = $subtotal + ($lstChart['qty'] * $lstChart['price']);
						}
					?>
					
				</div>
				<div class="col-xs-12 col-md-4 col-sm-8 ">
					
					<div class="col-xs-12 col-md-10 col-sm-10 pull-right">
						<div class="panel panel-default">
							<div class="btn btn-google">Ringkasan Belanja</div>
							<div id="sign-in" class="panel-body">
								
									<div class="col-xs-12 col-md-12 col-sm-12" >
										<div class="col-xs-5 col-md-5 col-sm-5"><b>Total </b> </div>
										<div class="col-xs-7 col-md-7 col-sm-7 side-right">
											<h2><?php echo  number_format($subtotal) ?></h2>&nbsp;&nbsp;
										</div>
									</div>
															
								
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-10 col-sm-10 pull-right">
						<div class="panel panel-default">
							<div class="btn btn-google">Metode Pengiriman</div>
							<div id="sign-in" class="panel-body">
								
									
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="col-xs-2 col-md-2 col-sm-2"><b>Kurir </b> </div>
										<div class="col-xs-10 col-md-10 col-sm-10  side-right">
											<select name="kurir">
												<option value="0">Pilih</option>
												<option value="jnereguler">JNE Regular</option>
												<option value="jneexpress">JNE Express</option>
											</select>
										</div>
										<div class="col-xs-12 col-md-12 col-sm-12">
											<b>Free Insurance </b> 
										</div>
									</div>
									
									<div class="col-xs-12 col-md-12 col-sm-12"><br /></div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<hr />
										<b>Take Away </b>
										
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="col-xs-12 col-md-12 col-sm-12  side-right">
											<select name="location">
												<option value="0">Pilih</option>
												<?php
													foreach($allstore as $lst_store){
												?>
														<option value="<?php echo $lst_store['location_id']?>">
															<?php echo $lst_store['location_name_en']?>
														</option>
												<?php
													}
												?>
											</select>
										</div>
									<br />
									</div>
									
									<input type="hidden" id="idalamat" name="idalamat" />
									<div class="col-xs-12 col-md-12 col-sm-12">							  
										<input type="button" value="Continue to checkout" id="checkout" class="btn btn-buynow btn-lg btn-block">
									</div>							
								
							</div>
						</div>
					</div>
					</form>
					<div class="col-xs-12 col-md-10 col-sm-10 pull-right">
						<?php
							foreach($allBank as $lstBank)
							{
						?>
							<div class="bank col-xs-5 col-md-5 col-sm-5 lst-bank">
								<p>
									<img width="100px" src="<?php echo base_url()?>assets/uploads/img_menu/<?php echo $lstBank['bank_pic'] ?>" /> 
								</p>
								<p><?php echo $lstBank['bank_name'] ?></p>
								<p><?php echo $lstBank['bank_rek'] ?><p>
								<p><?php echo $lstBank['bank_rek_name'] ?><p>
							</div>
						<?php
							}
						?>
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
		$("#frm-other-add").attr("display", "none");
		$("#add-kirim").click(function(){
			if ( $('#add-kirim').is(':checked') ) {
				//alert("masuk");
				$("#frm-other-add").toggle("slow");
			} 
			else {
				$("#frm-other-add").toggle("slow");
			}
		});

		$(".address_id").click(function(e){
			$("#idalamat").val($(this).val());
			e.unbind()
		});		
		$("#checkout").click(function(e){
			$("#frm-trans").submit();
			e.unbind()
		});
		
		$("#kecamatan").autocomplete({
			source: base_url+"search_kecamatan.php",
		});
	});

	function CheckValue(e){
		var charCode = (e.which) ? e.which : e.keyCode
		return !(charCode > 31 && (charCode < 48 || charCode > 57));
	}   
</script>