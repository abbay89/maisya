		<?php
			$this->load->view('template/header_cnt');
		?>
		   
          <div class="content onload">
            <div class="row">   
				<div class="col-md-12 kilatte">			
					
					<div class="invoice-container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								

								

								
								<div class="row">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<img title="pgas-logo" src="<?php echo base_url()?>assets_front/images/pgas-logo.png" width="70px">
										</div>
										<div class="col-md-8 col-sm-8" style="text-align:right;">
											<h3>Invoice <?php echo $datajson->invoice_no?></h3>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<h5>Invoiced To:</h5>
										<address>
										<?php echo $userProfile->user_name ?> <br />
										<?php echo $userProfile->user_address ?> <br />
										<?php echo $userProfile->user_email?>
										</address>
									</div>
									<div class="col-md-4 col-sm-6">
										<h5>Pay To:</h5>							
								
										 
									</div>
									<div class="col-md-4 col-sm-6">
										<h5>Invoice Date:</h5>
										<p><?php
												echo date("F j, Y, g:i a",strtotime($datajson->statement_date));
										?></p>

										<h5>Due Date:</h5>
										<p><?php
												echo date("F j, Y, g:i a",strtotime($datajson->due_date));
										?></p>
												

									</div> 
									
								</div>
												
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title"><strong>Detail :</strong></h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<td>Description</td>
														<td>Periode</td>
														<td class="text-right">Unit</td>
														<td class="text-right">Amount</td>
														<td class="text-right">TAX Amount</td>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($datajson->invoice_detail as $detaiInv){
													?>
													<tr>
														<td><?php echo  $detaiInv->item_name ?></td>
														<td ><?php echo  $detaiInv->period_start ?> s.d <?php echo  $detaiInv->period_end ?></td>
														<td class="text-right"><?php echo  $detaiInv->unit_price ?></td>
														<td class="text-right"><?php echo  $detaiInv->amount ?></td>
														<td class="text-right"><?php echo  $detaiInv->tax_amount ?></td>
													</tr>
													<?php	
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
						
								
							</div>
						</div>
									  

							</div><!--/.content-->
						</div>
					</div>
				</div>
	
		<?php
			$this->load->view('template/footer_cnt');
		?>


