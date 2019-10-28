		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
			$allarray	= explode(",",$validatefilter);
		?>
			
		<div class="container  slider">				
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
						<div class=" col-xs-12 col-md-12 col-sm-12 hidden-lg">
							<div class="col-xs-6 col-md-6 col-sm-6">
								<button type="button" id="btn-mob-filter" class="btn btn-listprod">Filter</button>
							</div>
							<div class="col-xs-6 col-md-6 col-sm-6">
									<select id="filterOrderByM" name="filterOrderBy" class="filterOrderBy" id="sort_mob">
										<option value="ProductID">Newest</option>
										<option value="rating">Popularity</option>
										<option value="UnitPrice">Price Low To High</option>
										<option value="UnitPrice-">Price High To Low</option>
										</select>
							</div>
						</div>	
						
						<form id="frmfilter" method="post" action="<?php echo str_replace("index.php/","",$_SERVER['PHP_SELF'])?>">
						<div id="filterpage" class="col-xs-12 col-md-3 col-sm-3 category hidden-xs hidden-sm">
							<div class="accordion odd">
							  <h3>PRICE RANGE</h3>
							  <div class="content">
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

							<div class="accordion odd">
							  <h3>GENDER</h3>
							  <div class="content">
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
							<div class="accordion odd">
							  <h3>KARAT</h3>
							  <div class="content">
								<input name="karatfrom" class="form-control" style="width: 97%" type="text" placeholder="From karat">
									<br />
								<input name="karatto"  class="form-control" style="width: 97%"  type="text" placeholder="To karat">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input type="submit" class="btn btn-buynow btn-lg btn-block" value="Proses">
								</div>						  
							  </div>
							</div>
							<div class="accordion odd">
							  <h3>METAL TYPE</h3>
							  <div class="content">
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
							
							<div class="accordion odd">
							  <h3>SHAPE</h3>
							  <div class="content">
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
							
							
							<div class="accordion odd">
							  <h3>STONE TYPE</h3>
							  <div class="content">
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
						</div>
						
						</form>	
						<div class="col-xs-12 col-md-9 col-sm-9 category ">
							<input type="hidden" id='category' value="<?php echo $category ?>" />
							<input type="hidden" id='type' value="<?php echo $type ?>" />
							<input type="hidden" id='sortby' value="<?php echo $sortby ?>" />
							<div class=" col-xs-12 col-md-12 col-sm-12 top-catalog hidden-xs hidden-sm">
								<div class="">
									<div class=" col-xs-9 col-md-9 col-sm-9">
										<span class="hidden-xs hidden-sm">Filter :</span>
										<input type="text" class="labelinput">
										<input type="hidden" value="" name="result" id="resultFilter">
									
									</div>
									<div class=" col-xs-3 col-md-3 col-sm-3 pull-right">
										<select id="filterOrderBy" name="filterOrderBy" class="filterOrderBy" id="sort_mob">
										<option value="ProductID">Newest</option>
										<option value="rating">Popularity</option>
										<option value="UnitPrice">Price Low To High</option>
										<option value="UnitPrice-">Price High To Low</option>
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
									
									
									$type = $listProduct->StoneInformations;
									//echo var_dump($listProduct);exit;
									$types='';
									foreach($type as $row){
										$types = $row->tipe;
									}
									
									if(empty($types)){
										$productEx = explode('-',$listProduct->ProductID);
										$types = $productEx[0];
									}
									
									//echo 'coba '.$types;exit;
									
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
											<span class="kd-item" style="width:150px;"><?php echo $listProduct->ProductID?></span>
										</div>
											<a class="liprod" href="<?php echo base_url()."detailproduct/".$types."/".str_replace(".","",str_replace(" ","-",$listProduct->ProductName)."--k--".$listProduct->ProductID); ?>">
										
											<img src='https://www.maisya.id:5060/api/ProductImages?kodeitem=<?php echo $listProduct->ProductID?>&width=200&height=200' alt="resized image" class=" img-responsive img-thumbnail image" />
											<?php
												$src = 'https://www.maisya.id:5060/api/ProductImages2?kodeitem='.$listProduct->ProductID.'&width=10&height=10';

												if (@getimagesize($src))
												{
											?>
												<div class="overlay">
													<img src="https://www.maisya.id:5060/api/ProductImages2?kodeitem=<?php echo $listProduct->ProductID?>&width=210&height=200" class="img-responsive img-thumbnail image">
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
									echo $pagingny;
								?>
								
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

		<?php
			
			$data['keywordSearch'] = '';
			if(isset($keySearch)){
				$data['keywordSearch'] = $keySearch;
			}
			
			$this->load->view('template/footer',$data);
		?>

