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
//                                    if ($key = $this->session->userdata('login_type') == 'receptionist') {
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
					<a href="<?php echo base_url();?>receptionist/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
				
				
			 <!------receptionist----->
			 
			 
			 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_receptionist');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'search_receptionist' 	|| 
																	$page_name == 'list_receptionist' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'search_receptionist')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/search_receptionist" >
							<i class="fa fa-link p-r-10"></i><?php echo get_phrase('by_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_receptionist')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/list_receptionist">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_receptionists');?>
                 </a>
                </li>
     
                 </ul>
                </li>
	
	<!------nurse----->

		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-stethoscope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_nurse');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'search_nurse' 	|| 
																	$page_name == 'list_nurse' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'search_nurse')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/search_nurse" >
							<i class="fa fa-link p-r-10"></i><?php echo get_phrase('by_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_nurse')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/list_nurse">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_all_nurse');?>
                 </a>
                </li>
     
                 </ul>
                </li>
	
	
	<!------receptionist----->

		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-user p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_doctor');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'search_doctor' 	|| 
																	$page_name == 'list_doctor' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'search_doctor')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/search_doctor" >
							<i class="fa fa-link p-r-10"></i><?php echo get_phrase('by_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_doctor')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/list_doctor">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list__all_doctors');?>
                 </a>
                </li>
     
                 </ul>
                </li>
		
					
       
				<!------shedule information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_shedule');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_shedule' 	|| 

																$page_name == 'list_shedule' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_shedule')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/add_shedule" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_shedule');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_shedule')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/list_shedule">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_shedules');?>
                 </a>
                </li>
     
                 </ul>
                </li>
		


<!------appointment information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('appointments');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_appointment' 	|| 

																$page_name == 'list_appointment' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_appointment')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/add_appointment" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_appointment');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_appointment')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/list_appointment">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_appointments');?>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				
				
				
			
			
			
				<!------communication----->
					<!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-folder-open p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('communications');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'list_noticeboard' 	|| 
																	$page_name == 'manage_sms' )echo 'in';?>">
						
							<li class="<?php if($page_name == 'list_noticeboard')echo 'active';?>">
     						<a href="<?php echo base_url();?>receptionist/list_noticeboard" >
							<i class="fa fa-list p-r-10"></i><?php echo get_phrase('list_noticeboard');?></span>
							</a>
							</li>		
				 
				 <li class="<?php if($page_name == 'manage_sms')echo 'active';?>">
                 <a href="<?php echo base_url();?>receptionist/message">
                 <i class="fa fa-envelope p-r-10"></i> <?php echo get_phrase('send_messages');?>
                 </a>
                </li>
     
                 </ul>
                </li> -->

  <!------profile----->

		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>receptionist/manage_profile" >
					<i class=" fa fa-user p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('my_profile');?></span>
				</a>
		</li>
					
                  
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->