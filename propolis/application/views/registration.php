		<?php
			$this->load->view('template/header_member');
		?>
		   
          <div class="content onload">
            <div class="row">   
				<div class="col-md-12 kilatte">
					
					<div class="menu-main">
					  <div class="row">
						<div class="col-xs-12">
						  <div class="menu-main-header"><span> Beranda > Membership > New Registration
						</div>
					  </div>
					</div>
					
					
					<div class="col-xs-12 no-padding" role="tablist">
						<div class="space-10"></div>
						<div class="row">
						
							<div class="col-md-12">
								<div class="section-item-sub">
								  <div class="card card-dark">
									<div class="card-content">
										<h3>INFO RESELLER</h3>
										<p>
											Rokim Abdul Karim.<br />
											PT.  Maisya Makmur
										</p>
										<p>
											Shahabat yang kami hormati, mulai tanggal 1 Februari 2018  PT Maisya Makmur mengajak shahabat semua untuk bergabung menjadi reseller dengan ketentuan sebagai berikut.<br />
											Paket Belanja awal reseller yang baru bergabung berubah menjadi Rp.385.000,- dengan fasilitas,  1 box propolis lite 20 berisi 7 botol 6 ml, plus tambahan 1 botol propolis lite 20 ml, 1 spanduk,  dan 10 brosur produk propolis. Free ongkir.<br />
										</p>
										<p>
											Adapun untuk yang merekrut  reseller,  komisi rekrutnya naik menjadi Rp.135.000,-
										</p>
									</div>
									
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<form method="post" action="<?php echo base_url()?>registration/save_reg">
								
								<div class="panel panel-default">
								  <div class="panel-heading">Biodata</div>
								  <div class="panel-body">
									<div class="detail_profile">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">First Name</label>
												<input class="form-control" type="text" id="firstname" name="first_name " class="form-control">
												<input class="form-control" type="hidden" value="<?php echo $userProfile->user_id?>" id="firstname" name="upline" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Last Name</label>
												<input class="form-control" type="text"  id="lastname" name="last_name" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Password</label>
												<input class="form-control" type="text"  id="password" name="password" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Birthday</label>
												<input class="form-control" type="text" id="birthday" name="birthday" class="form-control">
											</div>
										</div>
										
										<div class="col-xs-6">

											<div class="form-group">
												<label for="firstname" class="control-label">Phone Number</label>
												<input class="form-control" type="text" id="phone_no" name="phone_no" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Email</label>
												<input class="form-control" type="text" id="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Gender</label><br />
												<label class="">
												  <input type="radio" name="gender" value="L"> Male
												</label>
												<label class="">
												  <input type="radio" name="gender" value="P"> Female 
												</label>
												<br><br />
											</div>
										</div>
										
									</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Address</label>
												<textarea cols="5" name="address" class="form-control"></textarea>
											</div>
										</div>
										
									</div>
								
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">Informasi Rekening</div>
								  <div class="panel-body">
									<div class="detail_profile">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Bank</label>
												<input class="form-control" type="text" id="bank" name="bank" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Nama Akun</label>
												<input class="form-control" type="text"  id="namaakun" name="namaakun" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">No Rekening</label>
												<input class="form-control" type="text"  id="norek" name="norek" class="form-control">
											</div>
										</div>
									</div>
								
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">Keluarga yang bisa dihubungi</div>
								  <div class="panel-body">
									<div class="detail_profile">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Nama</label>
												<input class="form-control" type="text" id="namarum" name="namarum" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">No Tlp</label>
												<input class="form-control" type="text"  id="notlprum" name="notlprum" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Email</label>
												<input class="form-control" type="text"  id="emairum" name="emairum" class="form-control">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="firstname" class="control-label">Alamat Rumah</label>
												<input class="form-control" type="text"  id="alamatrum" name="alamatrum" class="form-control">
											</div>
										</div>
									</div>
								
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">Sponsorship</div>
								  <div class="panel-body">
									<div class="detail_profile">
										<div class="col-xs-6" style="display:block;">
											<div class="form-group">
											<label for="firstname" class="control-label">Id</label>
											<input type="text" id="idpropolis" name="idpropolis" class="form-control" value="<?php echo $sponsor;?>">
										</div>
										<div class="col-xs-6" style="display:block;">
											<div class="form-group">
											<label for="firstname" class="control-label">Name</label>
											<input type="text" id="propolis" name="propolis" class="form-control" value="<?php echo $sponsorname;?>">
										</div>
										<div class="col-xs-12">
											<br />
											<input type="submit" value="Downline Registration" class="btn btn-warning" />  
										</div>
									</div>
								
								  </div>
								</div>
								
							</form>
						</div>
					</div>
				</div><!--/.content-->
			</div>
		</div>
	</div>
		<?php
			$this->load->view('template/footer_cnt');
		?>
		<script>
			$(document).ready(function(){
				$('#birthday').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true,
					minYear: 1960,
					maxYear: parseInt(moment().format('YYYY'),10),
				  locale: {
						format: 'YYYY-MM-DD'
					}
				}, function(start, end, label) {
				  console.log(start.toISOString(), end.toISOString(), label);
				});
			});
		</script>


