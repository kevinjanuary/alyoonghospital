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
//                                    if ($key = $this->session->userdata('login_type') == 'nurse') {
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
					<a href="<?php echo base_url();?>nurse/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
					
					
					
					 <!------patient----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-wheelchair p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_patients');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_patient' 	|| 
																	$page_name == 'patient_document' 	|| 

																$page_name == 'list_patient' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_patient')echo 'active';?>">
     						<a href="<?php echo base_url();?>nurse/manage_patient" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_patients');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_patient')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/list_patient">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_patients');?>
                 </a>
                </li>
				
				 <li class="<?php if($page_name == 'add_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/add_document">
                 <i class="fa fa-plus p-r-10"></i> <?php echo get_phrase('add_documents');?>
                 </a>
                </li>
				
				 <li class="<?php if($page_name == 'list_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/list_document">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_documents');?>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'patient_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/patient_document">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('patient_document');?>
                 </a>
                </li>
     
                 </ul>
                </li>
					
					
        <!------department----->
		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('departments');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_department' 	|| 
																	$page_name == 'list_department' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_department')echo 'active';?>">
     						<a href="<?php echo base_url();?>nurse/manage_department" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_department')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/list_department">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_department');?>
                 </a>
                </li>
				
                 </ul>
                </li>
				
					
					
						
  <!------view appointment----->

		<li class="<?php if($page_name == 'list_appointment')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/list_appointment" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_appointments');?></span>
				</a>
		</li>
		
		
		<!------manage beds  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bed p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_beds');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_bed' 	|| 
																	$page_name == 'assign_bed' 	|| 
																	$page_name == 'list_assign_bed' 	|| 
																	$page_name == 'list_bed' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_bed')echo 'active';?>">
     						<a href="<?php echo base_url();?>nurse/add_bed" >
							<i class="fa fa-plus p-r-10"></i><?php echo get_phrase('add_bed');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/list_bed">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_beds');?>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'assign_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/assign_bed">
                 <i class="fa fa-plus p-r-10"></i> <?php echo get_phrase('assign_bed');?>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'list_assign_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>nurse/list_assign_bed">
                 <i class="fa fa-list p-r-10"></i> <?php echo get_phrase('list_assign_bed');?>
                 </a>
                </li>
     
                 </ul>
                </li>
				
		
		 <!------view appointment----->

		<li class="<?php if($page_name == 'list_prescription')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/list_prescription" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_prescriptions');?></span>
				</a>
		</li>
		
		 <!------add report----->

		<li class="<?php if($page_name == 'manage_report')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/manage_report" >
					<i class=" fa fa-plus p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_report');?></span>
				</a>
		</li>
		
		
		
		 <!------send message----->

		<li class="<?php if($page_name == 'list_doctor')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/list_doctor" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_doctor');?></span>
				</a>
		</li>
		
		

		 <!------send message----->

		<!-- <li class="<?php if($page_name == 'message')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/message" >
					<i class=" fa fa-envelope p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('send_message');?></span>
				</a>
		</li> -->
		
		 <!------send message----->

		<!-- <li class="<?php if($page_name == 'list_noticeboard')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/list_noticeboard" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_noticeboard');?></span>
				</a>
		</li> -->
	
	
  <!------profile----->

		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>nurse/manage_profile" >
					<i class=" fa fa-edit p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('change_profile');?></span>
				</a>
		</li>
					
                  
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->