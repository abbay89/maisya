 <!-- Sidebar -->
                        <div id="da-sidebar">
							
                            <!-- Main Navigation -->
                            <div id="da-main-nav" class="da-button-container">
                                <ul>
                                    <li class="<?php echo $nav == 'order' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/order">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/shopping_basket.png" alt="Order" />
                                            </span>
                                            Order
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'menu' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/menu">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/plate_diner.png" alt="Menu" />
                                            </span>
                                            Menu
                                        </a>
                                        <ul class="<?php echo $nav == 'menu' ? '' : 'closed' ?>">
                                            <li><a href="<?php echo base_url() ?>admin/menu/category">Categories</a></li>
                                            <li><a href="<?php echo base_url() ?>admin/menu/">Menu</a></li>
                                        </ul>
                                    </li>

                                    <li class="<?php echo $nav == 'reff' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/reff">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/tools.png" alt="Setting" />
                                            </span>
                                            Setting
                                        </a>
                                        <ul class="<?php echo $nav == 'reff' ? '' : 'closed' ?>">
											<li><a href="<?php echo base_url() ?>admin/reff/slideshow">Slideshow</a></li>
											<li><a href="<?php echo base_url() ?>admin/reff/masterimage">Default Image</a></li>
											<li><a href="<?php echo base_url() ?>admin/user">Users</a></li>
											<li><a href="<?php echo base_url() ?>admin/filter">Filter Product</a></li>
											<li><a href="<?php echo base_url() ?>admin/contact_us">Contact Us</a></li>
											<li><a href="<?php echo base_url() ?>admin/master_bank">Master Bank</a></li>
											<li><a href="<?php echo base_url() ?>admin/img_menu">Image Menu</a></li>
											<li><a href="<?php echo base_url() ?>admin/static_page">Page Static</a></li>
											<li><a href="<?php echo base_url() ?>admin/reff/company_profile">Company Profile</a></li>
											<li><a href="<?php echo base_url() ?>admin/reff/header_footer">Banner Header & Footer</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?php echo $nav == 'loc' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/location">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/tags_2.png" alt="Location" />
                                            </span>
                                            Store Location
                                        </a>
                                    </li>
									<li class="<?php echo $nav == 'our_collection' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/our_collection">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/trolly.png" alt="Location" />
                                            </span>
                                            Our Collection
                                        </a>
                                    </li>
                                    <li class="<?php echo $nav == 'hot' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/whatshot">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/pacman.png" alt="Whats Hot" />
                                            </span>
                                            Home Page
                                        </a>
                                    </li>
									<li class="<?php echo $nav == 'testi' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/testimonial">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/post_card.png" alt="Whats Hot" />
                                            </span>
                                            Testimonial
                                        </a>
                                    </li>
									<li class="<?php echo $nav == 'events' ? 'active' : '' ?>">
                                        <a href="<?php echo base_url() ?>admin/whatshot/events">
                                            <!-- Icon Container -->
                                            <span class="da-nav-icon">
                                                <img src="<?php echo base_url() ?>assets/grocery_crud/images/icons/black/32/calendar_today.png" alt="Events" />
                                            </span>
                                            Events
                                        </a>
                                    </li>
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
                                            <li><a href="<?php echo base_url() ?>admin/customer/contact_us">Contact</a></li>
                                        </ul>
                                    </li>
									
                                    <li>
                                        <div align="center"><img src="<?php echo base_url() ?>assets-front/img/logo.png"/></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
