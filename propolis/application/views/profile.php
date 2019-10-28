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
						  <div class="menu-main-header"><span> Profile </span></div>
						</div>
					  </div>
					</div>
					<div class="space-30"></div>
					<div class="col-xs-12 no-padding" role="tablist">
						<ul id="tabs" class="nav nav-tabs">
						  <li role="presentation" class="active">
							<a data-toggle="tab" href="#biodata">Biodata Diri
							</a>
						  </li>
						  <li role="presentation">
							<a data-toggle="tab" href="#alamat">Daftar Alamat
							</a>
						  </li>
						  <?php
							if(!$this->session->userdata("status")){
						  ?>
						  <li role="presentation">
							<a data-toggle="tab" href="#rekbank">Rekening Bank
							</a>
						  </li>
						  <li role="presentation">
							<a data-toggle="tab" href="#lstdownline">List Downline
							</a>
						  </li>
						  <li role="presentation">
							<a data-toggle="tab" href="#family">List Family
							</a>
						  </li>
						  <?php
							}
						  ?>
						</ul>
						<div class="tab-content">	
							<div id="family" class="tab-pane" role="tabpanel">
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<input type="button" value="Tambah Keluarga Baru" class="btn btn-warning" id="addfamily"/>
											<div id="frmfamily" style="display:none;">
												<form id="inpFamily">
													<div class="row detail_profile">
														<div class="col-xs-6">
															<div class="form-group">
																<label for="penerima" class="control-label">Name</label>
																<input class="form-control" type="text" id="penerima" name="name" class="form-control">
															</div>
														</div>
														
														
														<div class="col-xs-6">
															<div class="form-group">
																<label for="phone" class="control-label">Phone</label>
																<input class="form-control" type="text"  id="phone" name="phone" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label for="phone" class="control-label">Email</label>
																<input class="form-control" type="text"  id="email" name="email" class="form-control">
															</div>
														</div>
														<div class="col-xs-12">
															<div class="form-group">
																<label for="firstname" class="control-label">Address</label>
																<textarea cols="5" name="address" class="form-control"></textarea>
															</div>
														</div>
														<div class="col-xs-12">
															<br />
															<input type="button" value="Save Family" class="btn btn-warning" id="procfamily"/>  
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<table class="table table-striped">
										<thead>
										  <tr>                
											<th>Name</th>
											<th>Address</th>
											<th>Phone</th>
											<th>email</th>
											<th>Action</th>
											<th class="cell-view"></th>
										  </tr>
										</thead>
										<tbody id="detfamily"> 
											<?php
												foreach($allFamily  as $listFamily)
												{
													//print_r($listFamily);
											?>
												<tr>
													<td><?php echo $listFamily['cust_name']?></td>
													<td><?php echo $listFamily['cust_ad_address']?></td>
													<td><?php echo $listFamily['cust_phone']?></td>
													<td><?php echo $listFamily['cust_email']?></td>
													<td><a class="btn btn-warning" href="<?php echo base_url()?>profile/deleteFamily/<?php echo $listFamily['cust_ad_id']?>">Delete</a></td>										
												<td class="cell-view"></td>										
													<td class="cell-view"></td>
												</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div id="biodata" class="tab-pane active" role="tabpanel">
								<div class="container">
									<div class="product-details clearfix">
										<form method="post" action="<?php echo base_url()?>Membership/updateProfile">
											<div class="row detail_profile">
												<div class="col-xs-6">
													<div class="form-group">
														<label for="firstname" class="control-label">First Name</label>
														<input class="form-control" type="text" value="<?php echo $userProfile->first_name?>" id="firstname" name="firstname" class="form-control">
														<input class="form-control" type="hidden" value="<?php echo $userProfile->user_id?>" id="firstname" name="user_id" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label for="firstname" class="control-label">Last Name</label>
														<input class="form-control" type="text" value="<?php echo $userProfile->last_name?>" id="lastname" name="lastname" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label for="firstname" class="control-label">Birthday</label>
														<input class="form-control" type="text" value="<?php echo $userProfile->birthday?>" id="birthday" name="birthday" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label for="firstname" class="control-label">Gender</label><br />
														<label class="radio-inline">
														  <input type="radio" name="gender" value="L"<?php if($userProfile->gender == 'L'){ echo "checked";}?>> Male
														</label>
														<label class="radio-inline">
														  <input type="radio" name="gender" value="P"<?php if($userProfile->gender == 'P'){ echo "checked";}?>> Female 
														</label>
														<br><br />
													</div>
												</div>
												<div class="col-xs-6">

													<div class="form-group">
														<label for="firstname" class="control-label">Phone Number</label>
														<input class="form-control" type="text" value="<?php echo $userProfile->phone_no?>" id="phone_no" name="phone_no" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label for="firstname" class="control-label">Email</label>
														<input class="form-control" type="text" value="<?php echo $userProfile->email?>" id="email" name="email" class="form-control">
													</div>
												</div>
												<div class="col-xs-6" style="display:none;">
													<div class="form-group">
													<label for="firstname" class="control-label">Propolis Number Id</label>
													<input type="text" value="<?php echo $userProfile->propolis_id?>" id="propolis" name="propolis" class="form-control">
												</div>
											</div>
												<div class="col-xs-12">
													<div class="form-group">
														<label for="firstname" class="control-label">Address</label>
														<textarea cols="5" name="address" class="form-control"><?php echo $userProfile->address?></textarea>
													</div>
												</div>
												<div class="col-xs-12">
													<br />
													<input type="submit" value="Update Profile" class="btn btn-warning" />  
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div id="alamat" class="tab-pane" role="tabpanel">
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<input type="button" value="Tambah Alamat Baru" class="btn btn-warning" id="addaddress"/>
											<div id="frmAlamat" style="display:none;">
												<form id="inpAlamat">
													<div class="row detail_profile">
														<div class="col-xs-6">
															<div class="form-group">
																<label for="penerima" class="control-label">Penerima</label>
																<input class="form-control" type="text" id="penerima" name="penerima" class="form-control">
															</div>
														</div>
														
														
														<div class="col-xs-6">
															<div class="form-group">
																<label for="phone" class="control-label">Phone</label>
																<input class="form-control" type="text"  id="phone" name="phone" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label for="kecamatan" class="control-label">Kecamatan</label>
																<input class="form-control" type="text" id="kecamatan" name="kecamatan" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label for="city" class="control-label">City</label>
																<input class="form-control" type="text" id="city" name="city" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label for="city" class="control-label">Kode pos</label>
																<input class="form-control" type="text" id="kodepos" name="kodepos" class="form-control">
															</div>
														</div>
														<div class="col-xs-12">
															<div class="form-group">
																<label for="firstname" class="control-label">Address</label>
																<textarea cols="5" name="address" class="form-control"></textarea>
															</div>
														</div>
														<div class="col-xs-12">
															<br />
															<input type="button" value="Save Alamat" class="btn btn-warning" id="proctambah"/>  
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<table class="table table-striped">
										<thead>
										  <tr>                
											<th>Penerima</th>
											<th>Address</th>
											<th>City</th>
											<th>Phone</th>
											<th>Action</th>
											<th class="cell-view"></th>
										  </tr>
										</thead>
										<tbody id="detAddress"> 
											<?php
												foreach($allAddress  as $listAddress)
												{
													
											?>
												<tr>
													<td><?php echo $listAddress['cust_name']?></td>
													<td><?php echo $listAddress['cust_ad_address']?></td>
													<td><?php echo $listAddress['city_name']?></td>
													<td><?php echo $listAddress['cust_phone']?></td>
													<td><a class="btn btn-warning" href="<?php echo base_url()?>profile/deleteAddress/<?php echo $listAddress['id_server']?>">Delete</a></td>										
												<td class="cell-view"></td>										
													<td class="cell-view"></td>
												</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div id="rekbank" class="tab-pane" role="tabpanel">
								<div class="row">
									<div class="col-xs-12">
										<input type="button" value="Tambah Bank Baru" class="btn btn-warning" id="addbank"/>
										<div id="frmBank" style="display:none;">
											<form id="inpBank">
												<div class="row detail_profile">
													<div class="col-xs-6">
														<div class="form-group">
															<label for="penerima" class="control-label">Atas Nama</label>
															<input class="form-control" type="text" id="atasnama" name="atasnama" class="form-control">
															<input class="form-control" type="hidden" id="cust_id" name="cust_id" value="<?php echo $this->session->userdata("email")?>" class="form-control">
														</div>
													</div>
													
													
													<div class="col-xs-6">
														<div class="form-group">
															<label for="phone" class="control-label">No Rekening</label>
															<input class="form-control" type="text"  id="norek" name="norek" class="form-control">
														</div>
													</div>
													<div class="col-xs-6">
														<div class="form-group">
															<label for="kecamatan" class="control-label">Nama Bank</label>
															<input class="form-control" type="text" id="namabank" name="namabank" class="form-control">
														</div>
													</div>
													<div class="col-xs-12">
														<br />
														<input type="button" value="Save Bank" class="btn btn-warning" id="proctambahbank"/>  
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<table class="table table-striped">
									<thead>
									  <tr>                
										<th>No Rek</th>
										<th>Atas Nama</th>
										<th>Bank</th>
										<th>Active</th>
										<th>Action </th>
										<th class="cell-view"></th>
									  </tr>
									</thead>
									<tbody id="detBank"> 
										<?php
											foreach($allBank  as $listbank)
											{
										?>
											<tr>
												<td><?php echo $listbank['no_rek']?></td>
												<td><?php echo $listbank['atas_nama']?></td>
												<td><?php echo $listbank['nama_bank']?></td>
												<td><?php echo $listbank['active']?></td>
												<td><a class="btn btn-warning" href="<?php echo base_url()?>profile/deleteBank/<?php echo $listbank['bank_id']?>">Delete</a></td>										
												<td class="cell-view"></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
							<div id="lstdownline" class="tab-pane" role="tabpanel">
								
								<table class="table table-striped">
									<thead>
									  <tr>                
										<th>Email</th>
										<th>Name</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Status </th>
										<th>Action </th>
										<th class="cell-view"></th>
									  </tr>
									</thead>
									<tbody id="detBank"> 
										<?php
											foreach($allDownline  as $downline)
											{
										?>
											<tr>
												<td><?php echo $downline['email']?></td>
												<td><?php echo $downline['first_name']." ". $downline['last_name']?></td>
												<td><?php echo $downline['address']?></td>
												<td><?php echo $downline['phone_no']?></td>
												<td><span class="btn  btn-warning"><?php echo $downline['status']?></span></td>										
												<td>
												<?php if(($downline['status'] == 'new') || ($downline['status'] == 'reg')){?>
												<a href="<?php echo base_url()?>profile/activation/<?php echo $downline['user_id']?>" class="btn  btn-warning">Confirmation</a>
												<?php
												}else{
												?>
													<a href="<?php echo base_url()?>profile/notactivation/<?php echo $downline['user_id']?>" class="btn  btn-danger">Delete</a>
												<?php
												}
												?>
												</a>
												</td>										
												<td class="cell-view"></td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
							
				</div><!--/.content-->
			</div>
		</div>
	</div>
		<script>
			$(document).ready(function(){
				$('#birthday').daterangepicker({
				  singleDatePicker: true,
				  singleClasses: "picker_1",
				  timePicker : false,
				  timePicker24Hour : true,
				  timePickerSeconds: false,
				  locale: {
						format: 'YYYY-MM-DD'
					}
				}, function(start, end, label) {
				  console.log(start.toISOString(), end.toISOString(), label);
				});
				
				///
				$("#addfamily").click(function(){ //alert("masuk");
					$("#frmfamily").toggle("slow");
				});
				$("#addaddress").click(function(){
					$("#frmAlamat").toggle("slow");
				});
				$("#addbank").click(function(){
					$("#frmBank").toggle("slow");
				});
				//
				$("#proctambah").click(function(){
					$.ajax({
					  method: "POST",
					  url: "<?php echo base_url()?>membership/addAddress",
					  data: $("#inpAlamat").serialize()
					})
					.done(function( msg ) {
						//alert( "Data Saved: " + msg );
						$("#frmAlamat").toggle();						
						$("#detAddress").append(msg);
					});
				});
				
				//
				$("#proctambahbank").click(function(){
					$.ajax({
					  method: "POST",
					  url: "<?php echo base_url()?>membership/addBank",
					  data: $("#inpBank").serialize()
					})
					.done(function( msg ) {
						//alert( "Data Saved: " + msg );
						$("#frmBank").toggle();						
						$("#detBank").append(msg);
					});
				});
				$("#procfamily").click(function(){
					$.ajax({
					  method: "POST",
					  url: "<?php echo base_url()?>membership/addFamily",
					  data: $("#inpFamily").serialize()
					})
					.done(function( msg ) {
						if(msg == 'Alamat Max. 2'){
							alert( "Data Saved: " + msg );
						}else{
						//alert( "Data Saved: " + msg );
							$("#frmfamily").toggle();						
							$("#detfamily").append(msg);
						}
					});
				});
			});
		</script>
		<?php
			$this->load->view('template/footer_cnt');
		?>


