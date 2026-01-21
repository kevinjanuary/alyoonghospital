<!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="user-pro hide-menu">
                        <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default.jpg';
//                                    if ($key = $this->session->userdata('login_type') == 'accountant') {
//                                        $face_file = base_url() . 'uploads/' . $this->session->userdata('login_type') . '_image/1.jpg';
//                                    }
                            }
                            ?>
						
						<a href="#" class="waves-effect"><img src="<?php echo base_url() . $face_file; ?>" alt="user-img" class="img-circle"> <span class="hide-menu">
								<?php 
								$account_type	=	$this->session->userdata('login_type');
								$account_id		=	$account_type.'_id';
								$name			=	$this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id) , 'name');
								echo $name;
								?>
								</span></span>
                   </a>
				   </li>
                    <li class="<?php if($page_name == 'dashboard')echo 'active';?>">
					<a href="<?php echo base_url();?>accountant/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
				
				
			 <!------accountant----->
			 
			
				 
				 <li class="<?php if($page_name == 'list_accountant')echo 'active';?>">
                 <a href="<?php echo base_url();?>accountant/list_accountant">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_accountants');?>
                 </a>
                </li>
     
                
	<!------nurse----->
	
	 <li class="<?php if($page_name == 'add_invoice')echo 'active';?>">
     						<a href="<?php echo base_url();?>accountant/invoice_add" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_invoice');?></span>
							</a>
							</li>	
							
							
								 
				 <li class="<?php if($page_name == 'list_invoice')echo 'active';?>">
                 <a href="<?php echo base_url();?>accountant/list_invoice">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_invoices');?>
                 </a>
                </li>

		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-stethoscope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_nurse');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'search_nurse' 	|| 
																	$page_name == 'list_nurse' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'search_nurse')echo 'active';?>">
     						<a href="<?php echo base_url();?>accountant/search_nurse" >
							<i class="fa fa-link p-r-10"></i><?php echo get_phrase('by_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_nurse')echo 'active';?>">
                 <a href="<?php echo base_url();?>accountant/list_nurse">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_all_nurse');?>
                 </a>
                </li>
     
                 </ul>
                </li>
	
	
	<!------accountant----->

		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-user p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_doctor');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'search_doctor' 	|| 
																	$page_name == 'list_doctor' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'search_doctor')echo 'active';?>">
     						<a href="<?php echo base_url();?>accountant/search_doctor" >
							<i class="fa fa-link p-r-10"></i><?php echo get_phrase('by_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_doctor')echo 'active';?>">
                 <a href="<?php echo base_url();?>accountant/list_doctor">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list__all_doctors');?>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				


			
			
				<!------communication----->
					<!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('communications');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'list_noticeboard' 	|| 
																	$page_name == 'manage_sms' )echo 'in';?>">
						
							<li class="<?php if($page_name == 'list_noticeboard')echo 'active';?>">
     						<a href="<?php echo base_url();?>accountant/list_noticeboard" >
							<i class="fa fa-list p-r-10"></i><?php echo get_phrase('list_noticeboard');?></span>
							</a>
							</li>		
				 
				 <li class="<?php if($page_name == 'manage_sms')echo 'active';?>">
                 <a href="<?php echo base_url();?>accountant/message">
                 <i class="fa fa-envelope p-r-10"></i> <?php echo get_phrase('send_messages');?>
                 </a>
                </li>
     
                 </ul>
                </li> -->

  <!------profile----->

		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>accountant/manage_profile" >
					<i class=" fa fa-user p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('change_profile');?></span>
				</a>
		</li>
					
                  
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->