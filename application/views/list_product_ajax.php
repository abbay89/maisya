						
								<?php
							//		echo "<pre>";
					//print_r($detail_prod);
					//echo "</pre>sdfa";
					//exit;
								foreach($detail_prod as $listProduct){
								?>
								<div class="col-xs-12 col-md-4 col-sm-4 lst-ctl">
									
									<div class="thumbnail">
										<div class="icon-wh">
											<a href="#" id="wishlist">
												<i class="far fa-heart"></i>
											</a>
										</div>
										<a class="liprod" href="<?php echo base_url()."detailproduct/".$listProduct->ProductID; ?>">
										
											<img src='https://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&width=200&height=200' alt="resized image" class="img-thumbnail image" />
											<?php
												if (file_exists('https://cl.maisya.co.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=10&height=10')) {
											?>
												<div class="overlay">
													<img src="https://cl.maisya.co.id:5060/api/ProductImages2?kodeitem=<?php echo $listProduct->ProductID?>&width=200&height=200" class="img-responsive">
												</div>
											<?php
												}
											?>
											<div class="caption">
												<p>ID : <?php echo $listProduct->ProductID?></p>
												<p>Name : <?php echo $listProduct->ProductName?></p>
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


