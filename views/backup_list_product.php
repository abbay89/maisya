		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
			
		<div class="container">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 slider">
						<div class="col-xs-12 col-md-3 col-sm-3 category">
							<div class="accordion">
								<h3>
									<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
									Price
									</span>
								</h3>
								<div>
									
									<div class="lst-checkbox"><input type="checkbox" value="price/100-5" class="chkbox"> &nbsp; IDR 100K - 5M</div>
									<div class="lst-checkbox"><input type="checkbox" value="price/5-10" class="chkbox"> &nbsp; IDR 5M - 10M</div>
									<div class="lst-checkbox"><input type="checkbox" value="price/10-50" class="chkbox"> &nbsp; IDR 10M - 50M</div>
									<div class="lst-checkbox"><input type="checkbox" value="price/>50" class="chkbox"> &nbsp; IDR 50M+</div>
									
								</div>
							</div>
							<div class="accordion">
								<h3>
									<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
									Type
									</span>
								</h3>
								<div>
									
									<div class="lst-checkbox"><input type="checkbox" value=""> &nbsp; IDR 100K - 5M</div>
									<div class="lst-checkbox"><input type="checkbox" value=""> &nbsp; IDR 5M - 10M</div>
									<div class="lst-checkbox"><input type="checkbox" value=""> &nbsp; IDR 10M - 50M</div>
									<div class="lst-checkbox"><input type="checkbox" value=""> &nbsp; IDR 50M+</div>
									
							  </div>
							</div>
							
						</div>
						<div class="col-xs-12 col-md-9 col-sm-9 category">
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog ">
								
								<div class="form-control tags" id="tags">
									<label>Filter :</label>
									<input type="text" class="labelinput">
									<input type="hidden" value="jQuery,Script,Net" name="result" id="resultFilter">
								</div>
							</div>
							<div class=" col-xs-12 col-md-12 col-sm-12 all-catalog ">
								<?php
									
									foreach($detail_prod->ProductList as $listProduct){
								?>
								<div class="col-xs-12 col-md-4 col-sm-4 lst-ctl">
									
									<div class="thumbnail">
										<div class="icon-wh">
											<a href="#" id="wishlist">
												<i class="far fa-heart"></i>
											</a>
										</div>
										<a href="<?php echo base_url()."detailproduct/".$listProduct->ProductID; ?>">
										
											<!--<img src='<?php echo base_url()?>resizer.php?url=http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>' />-->
											<img src='<?php echo base_url()?>timthumb.php?src=http://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&w=100&h=80' alt="resized image" />
											
											<div class="caption">
												<p><?php echo $listProduct->ProductName?></p>
												<p class="price">
													IDR <?php echo number_format($listProduct->UnitPrice)?>
												</p>
											</div>
										</a>
									</div>
								</div>
								<?php
									}
								?>
								<div class="col-xs-12 col-md-12 col-sm-12 text-center">
									<div id="pagingHere" class="text-center"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$( function() {
				
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
				$( ".accordion" ).accordion({
					icons: icons,
					collapsible: true,
					clearStyle: true,
					active: false,
				})
				$("#pagingHere").pagination({
					items: <?php echo $detail_prod->TotalCount ?>,
					itemsOnPage: 21,
					cssStyle: 'light-theme',
					onPageClick:function(pageNumber,event){
						location.href = base_url +array[2]+"/"+array[3] + "/"+array[4]+"/"+array[5]+"/page/"+pageNumber;
					},
					currentPage: pager
				});
				
				
				//filter json_decode
				$('.chkbox').click(function() {
				  if ($(this).is(':checked')) {
					// Do stuff					
					//$("#resultFilter").val($(this).val());
					var currentLocation = window.location+"/"+$(this).val();
					location.href = currentLocation;
				  }
				});
				
				$('#tags').tagInput({labelClass:"badge badge-success"});
				  
			} );
		</script>
		<?php
			$this->load->view('template/footer');
		?>


