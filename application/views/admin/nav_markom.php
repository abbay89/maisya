 <!-- Sidebar -->
                        <div id="da-sidebar">
							<?php
								if($this->session->userdata('who') != 13)
								{
							?>
                            <!-- Main Navigation -->
                            <div id="da-main-nav" class="da-button-container">
                                <ul>
                                    <li class="<?php echo $nav == 'customer' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/customer">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/user.png" alt="Customer" />
                                            </span>
                                            Customer
                                        </a>
                                        <ul class="<?php echo $nav == 'customer' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/customer">List Customer</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/customer/reservation">Reservation</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/customer/contact_us">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div align="center"><img src="<?php echo base_url() ?>assets-front/img/logo.png"/></div>
                                    </li>
                                </ul>
                            </div> 
							<?php
								}else{
							?>
								<div id="da-main-nav" class="da-button-container">
									<ul>
										 <li class="<?php echo $nav == 'apps_backend' ? 'active' : '' ?>">
											<a href="<?php echo base_url() ?>admin/customer">
												<!-- Icon Container -->
												<span class="da-nav-icon">
													<img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/iphone_4.png" alt="Apps Backend" />
												</span>
												Apps Backend
											</a>
											<ul class="<?php echo $nav == 'apps_backend' ? '' : 'closed' ?>">
												<li><a href="<?php echo base_url() ?>admin/promo_apps">Banner Promo Apps</a></li>
												<li><a href="<?php echo base_url() ?>admin/promo_apps/setting_promo">Setting promo</a></li>
												<li><a href="<?php echo base_url() ?>admin/detail_order_apps">Detail Order Apps</a></li>
												<li><a href="<?php echo base_url() ?>admin/tracking_store">Tracking Store Around Me</a></li>
												<li><a href="<?php echo base_url() ?>admin/promo_apps/minimum_fee">Minimum Fee</a></li>
												<li><a href="<?php echo base_url() ?>admin/mobile">Push Notification</a></li>
												<li><a href="<?php echo base_url() ?>admin/notification">Notification</a></li>
											</ul>
										</li>
									</ul>	
								</div>
							<?php
								}
							?>
                        </div>
