		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider-content">				
			<div class="space-top">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div>
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Product</a></li>
							  <?php echo $titlepage; ?>
							</ol>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-3 category hidden-xs hidden-sm">
							<form id="frmfilter" method="post" action="<?php echo str_replace("index.php/","",$_SERVER['PHP_SELF'])?>">
								<input type="hidden" name="parampaging" id="parampaging" value="<?php echo $parampaging ?>" />
								<div class="accordion active">
									<h3>
										<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
										PRICE
										</span>
									</h3>
									<div>
										<?php
											foreach($filterprice as $lstPrice)
											{
												
												if (in_array($lstPrice['kodeFilter'], $allarray)) {
													$select = "checked=checked";
													//echo "ada";
												}
												else
												{
													$select = "";
													//echo "ga ada";
												}
										?>
											
											 <div class="lst-checkbox pretty p-default p-fill">
												<input name="unitprice[]" id='c1'  type="checkbox" value="<?php echo $lstPrice['kodeFilter']; ?>" class="chkbox " <?php echo $select ?>>
												<div class="state">
													<label>&nbsp;&nbsp;<?php echo $lstPrice['nameFilter']; ?></label>
												</div>
											</div>
											<br />
										<?php
											}
										?>
									</div>
								</div>
								<div class="accordion active">
									<h3>
										<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
										GENDER
										</span>
									</h3>
									<div>
										<?php
											foreach($filtergender as $lstgender)
											{
												if (in_array($lstgender['kodeFilter'], $allarray)) {
													$select = "checked=checked";
													//echo "ada";
												}
												else
												{
													$select = "";
													//echo "ga ada";
												}
										?>
											 <div class="lst-checkbox pretty p-default p-fill">
												<input name="gender[]" id='c1'  type="checkbox" value="<?php echo $lstgender['kodeFilter']; ?>" class="chkbox " <?php echo $select ?>>
												<div class="state">
													<label>&nbsp;&nbsp;<?php echo $lstgender['nameFilter']; ?></label>
												</div>
											</div>
											<br />
										<?php
											}
										?>
									</div>
								</div>
								<div class="accordion active">
									<h3>
										<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
										METAL TYPE
										</span>
									</h3>
									<div>
										<?php
											foreach($filtermetal as $lstmetal)
											{
												//print_r($allarray);
												//echo "======>".$lstmetal['kodeFilter'];
												if (in_array($lstmetal['kodeFilter'], $allarray)) {
													$select = "checked=checked";
													//echo "ada";
												}
												else
												{
													$select = "";
													//echo "ga ada";
												}
										?>
											<div class="lst-checkbox pretty p-default p-fill">
												<input name="metal[]"  type="checkbox" value="<?php echo $lstmetal['kodeFilter']; ?>" class="chkbox " <?php echo $select ?>>
												<div class="state">
													<label>&nbsp;&nbsp;<?php echo $lstmetal['nameFilter']; ?></label>
												</div>
											</div>
											<br />
										<?php
											}
										?>
									</div>
								</div>
								<div class="accordion active">
									<h3>
										<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
										SHAPE
										</span>
									</h3>
									<div>
										<?php
											foreach($filtershape as $lstshape)
											{
												//print_r($allarray);
												//echo "======>".$lstshape['kodeFilter'];
												if (in_array($lstshape['kodeFilter'], $allarray)) {
													$select = "checked=checked";
													//echo "ada";
												}
												else
												{
													$select = "";
													//echo "ga ada";
												}
										?>
											
											<div class="lst-checkbox pretty p-default p-fill">
												<input name="shape[]"  type="checkbox" value="<?php echo $lstshape['kodeFilter']; ?>" class="chkbox " <?php echo $select ?>>
												<div class="state">
													<label>&nbsp;&nbsp;<?php echo $lstshape['nameFilter']; ?></label>
												</div>
											</div>
											<br />
										<?php
											}
										?>
									</div>
								</div>
								<div class="accordion active">
									<h3>
										<span  class='head-acc col-xs-12 col-md-12 col-sm-12'>
										STONE TYPE
										</span>
									</h3>
									<div>
										<?php
											foreach($filterstone as $lststone)
											{
												if (in_array($lststone['kodeFilter'], $allarray)) {
													$select = "checked=checked";
													//echo "ada";
												}
												else
												{
													$select = "";
													//echo "ga ada";
												}
										?>
											
											<div class="lst-checkbox pretty p-default p-fill">
												<input name="stoneshape[]"  type="checkbox" value="<?php echo $lststone['kodeFilter']; ?>" class="chkbox " <?php echo $select ?>>
												<div class="state">
													<label>&nbsp;&nbsp;<?php echo $lststone['nameFilter']; ?></label>
												</div>
											</div>
											<br />
										<?php
											}
										?>
									</div>
								</div>
							</form>
						</div>
						<div class="col-xs-12 col-md-9 col-sm-9 category">
							<input type="hidden" id='category' value="<?php echo $category ?>" />
							<input type="hidden" id='type' value="<?php echo $type ?>" />
							<input type="hidden" id='sortby' value="<?php echo $sortby ?>" />
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog ">
								<div class="bagena">
									<div class=" col-xs-8 col-md-8 col-sm-8">
										<div class="form-control tags" id="tags">
											<label class="hidden-xs hidden-sm">Filter :</label>
											<input type="text" class="labelinput">
											<input type="hidden" value="" name="result" id="resultFilter">
										</div>
									</div>
									<div class=" col-xs-2 col-md-2 col-sm-2">
										<select name="filterOrderBy" id="filterOrderBy">
											<option value="ProductID">Newest</option>
											<option value="rating">Popularity</option>
											<option value="price">Price Low To Hight</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class=" col-xs-12 col-md-12 col-sm-12 all-catalog ">
								
								<?php
							//		echo "<pre>";
					//print_r($detail_prod);
					//echo "</pre>sdfa";
					//exit;
								foreach($detail_prod as $listProduct){
									
									
									
								
									$wh = $this->db->query("select wishlistid from wishlist where productid = '".$listProduct->ProductID."' and userid = '".$this->session->userdata('cust_username')."' limit 1 ")->row();
									
									
									if($wh->wishlistid)
									{
										$style = 'style="color:#8c1c21;"';
									}
									else
									{
										$style = '';
									}
								?>
								<div class="col-xs-6 col-md-4 col-sm-4 lst-ctl">
									
									<div class="thumbnail thumb-detail">
										
										<div class="icon-wh" style="z-index:1;">
											<a href="#" class="wishlist">
												<i class="far fa-heart love" <?php echo $style ?>></i>
												<input type="hidden" value="<?php echo urlencode($listProduct->ProductName); ?>" class="nameid" />
												<input type="hidden" value="<?php echo $listProduct->ProductID; ?>" class="idprod" />
												<input type="hidden" value="<?php echo $this->session->userdata('cust_username'); ?>" class="iduser" />
											</a>
										</div>
										<a class="liprod" href="<?php echo base_url()."detailproduct/".$listProduct->ProductID; ?>/1">
										
											<img src='https://cl.maisya.co.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&width=200&height=200' alt="resized image" class="img-thumbnail image" />
											<?php
												$src = 'https://cl.maisya.co.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=10&height=10';

												if (@getimagesize($src))
												{
											?>
												<div class="overlay">
													<img src="https://cl.maisya.co.id:5060/api/ProductImages2?kodeitem=<?php echo $listProduct->ProductID?>&width=210&height=200" class="img-thumbnail image">
												</div>
											<?php
												}
											?>
											<div class="caption">
												<!--<p><?php echo $listProduct->ProductID?></p>-->
												<p class="title_p"><?php echo $listProduct->ProductName?></p>
												<p class="sugestprice">
													IDR <?php echo number_format($listProduct->SuggestPrice)?>
												</p>
												<!--<p class="price">
													Disc <?php echo number_format($listProduct->DiscountPrice)?>%
												</p>-->
												<p class="txtprice">
													IDR <?php echo number_format($listProduct->UnitPrice)?>
												</p>
											</div>
										</a>
									</div>
								</div>
								<?php
									}
								?>
								
							</div>
							<div class="col-xs-12 col-md-12 col-sm-12 text-center">
								<div id="pagingHere" class="text-center"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div id="dialog" title="Wish List">
			<p>
				<div id="txtdialog"></div>
			</p>
			<!--
			<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
			<input class="myInput" type="text" />
			<button class="formSaver">Save me!</button>-->
		</div>
		<?php
		//PRINT_R($count_product->totalPages);
		?>
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
				
				$('.ui-accordion-content').show();
				
				
				$("#resultFilter").val('<?php echo $resultfilter;?>');
				$("#pagingHere").pagination({
					items: <?php echo $count_product->TotalCount ?>,
					itemsOnPage: 24,
					cssStyle: 'light-theme',
					displayedPages: 2,
					edges: 1,
					onPageClick:function(pageNumber,event){
						var category 	= $("#category").val();
						var type 		= $("#type").val();
						
						if(type == '')
						{
							type = 'all';
						}
						//alert(base_url+"ajax_category/"+category+"/type/"+type+"/page/"+pageNumber);
						//alert(category);
						//alert(type);
						$.ajax({
						  method: "POST",
						  url: base_url+"ajax_category/"+category+"/type/"+type+"/page/"+pageNumber,
						  data: $("#frmfilter").serialize() 
						})
						.done(function( msg ) {
							//alert( "Data Saved: " + msg );
							$(".all-catalog").html(msg);
						});
					},
					currentPage: pager
				});
				$("#filterOrderBy").change(function(){
					//alert($("#filterOrderBy").val());
					var category 	= $("#category").val();
					var type 		= $("#type").val();
					
					//alert(base_url+"ajax_category/"+category+"/type/"+type+"/page/1/sortby/"+$("#filterOrderBy").val());
					
					$.ajax({
						  method: "POST",
						  url: base_url+"ajax_category/"+category+"/type/"+type+"/page/1/"+$("#filterOrderBy").val(),
						  data: $("#frmfilter").serialize() 
						})
						.done(function( msg ) {
							//alert( "Data Saved: " + msg );
							$(".all-catalog").html(msg);
						});
					
				});
				
				
				//filter json_decode
				$('.chkbox').click(function() {
				  //if ($(this).is(':checked')) {
					
					$("#frmfilter").submit();
				  //}
				  //alert("klik");
				});
				
				$('#tags').tagInput({labelClass:"badge badge-success"});
				
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
								$("#txtdialog").html('Product Not Success Add To Wish List, You Must Be Login First');
							}
							else
							{
								$("#totalwhs").html(msg);
								$("#txtdialog").html('Product Success Add To Wish List');
							}
							$("#dialog").dialog("open");
						});
				})
				
				$("#dialog").dialog({
					autoOpen: false,
					show: {
						effect: "blind",
						duration: 500
					},
					hide: {
						effect: "blind",
						duration: 500
					}
				});
				  
			} );
		</script>
		<?php
			$this->load->view('template/footer');
		?>


