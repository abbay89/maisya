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
								<div id="data-container" class="col-xs-12 col-md-12 col-sm-12"></div>
								<div id="pagination-container" class="col-xs-12 col-md-12 col-sm-12"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			function simpleTemplating(data) {
					
				var html = '';
				$.each(data, function(index, item){
					html += '<div class="col-xs-12 col-md-4 col-sm-4 lst-ctl"> '+
							'<div class="thumbnail"> '+
								'<div class="icon-wh"> '+
									'<a href="#" id="wishlist"> '+
										'<i class="far fa-heart"></i> '+
									'</a> '+
								'</div> '+
								'<a href="'+base_url+'detailproduct/'+ item.ProductID +'"> '+
								
									'<img src="http://cl.maisya.co.id:5060/api/ProductImages?kodeitem='+ item.ProductID +'" class="img-thumbnail" /> '+
									'<div class="caption"> '+
										'<p>'+item.ProductName+'</p> '+
										'<p class="price"> '+
											'IDR '+item.UnitPrice +
										'</p> '+
									'</div> '+
								'</a> '+
							'</div></div>';
				});
				
				return html;
			}
			$( function() {
				var people 		= [];
				var jsondata	= JSON.parse('<?php echo $detail_prod ?>');
				
				$('#pagination-container').pagination({
					dataSource: jsondata.ProductList,
					pageSize: 9,
					callback: function(data, pagination) {
						// template method of yourself
						var html = simpleTemplating(data);
						$('#data-container').html(html);
					}
				})
				
				$('.chkbox').click(function() {
				  if ($(this).is(':checked')) {
					var product = $.grep(jsondata.ProductList, function (element, index) {
						// return whether myData.products.category == 'Toy'
						console.log(element.ProductList);
						return element.UnitPrice < 7000000;
					});
					
					$('#pagination-container').pagination({
						dataSource: product.ProductList,
						pageSize: 9,
						callback: function(data, pagination) {
							// template method of yourself
							var html = simpleTemplating(data);
							$('#data-container').html(html);
						}
					})
				  }
				});
				
			} );
		</script>
		<?php
			$this->load->view('template/footer');
		?>


