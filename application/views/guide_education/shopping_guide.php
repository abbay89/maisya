		<?php
			$this->load->view('template/header');
			$this->load->view('template/navigation');
		?>
		
		<div class="container slider">				
			<div class="space-top">
				<div class="">
					<div class="col-xs-12 col-md-12 col-sm-12 text-about">
						<div class="">
							<ol class="breadcrumb aboutpage">
							  <li><a href="#">Home</a></li>
							  <li><a href="#">Guide & Education</a></li>
							  <li class="active">Shopping & Payment</li>
							</ol>
						</div>
					</div>
					<div class="col-xs-12 col-md-3 col-sm-3">
						<ul class="list-group">
							<?php
								foreach($leftmenu as $lstmenu){
							?>
								<li class="list-group-item">
									<?php echo $lstmenu->guide_title?></li>
							<?php
								}
							?>
						</ul>
					</div>
					<div class="col-xs-12 col-md-9 col-sm-9 text-about">
						<H3><?php echo $right->guide_title ?></H3>
						<?php
							echo  $right->guide_content ;
						?>
									


					</div>						
				</div>
			</div>
		</div>
		
		<?php
			$this->load->view('template/footer');
		?>
	</body>
</html>

