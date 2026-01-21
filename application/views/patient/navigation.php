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
//                                    if ($key = $this->session->userdata('login_type') == 'patient') {
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
					<a href="<?php echo base_url();?>patient/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
					
					
						
  <!------view appointment----->

		<li class="<?php if($page_name == 'list_appointment')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_appointment/<?php echo $this->session->userdata('login_user_id'); ?>" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_appointments');?></span>
				</a>
		</li>
		
		 <!------view appointment----->

		<li class="<?php if($page_name == 'list_prescription')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_prescription/<?php echo $this->session->userdata('login_user_id'); ?>" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_prescriptions');?></span>
				</a>
		</li>
		
		 <!------add document----->

		<li class="<?php if($page_name == 'add_document')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/add_document" >
					<i class=" fa fa-plus p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('add_document');?></span>
				</a>
		</li>
		
		
		 <!------send message----->

		<li class="<?php if($page_name == 'list_doctor')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_doctor" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_doctor');?></span>
				</a>
		</li>
		
		 <!------add document----->

		<li class="<?php if($page_name == 'list_document')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_document/<?php echo $this->session->userdata('login_user_id'); ?>" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_documents');?></span>
				</a>
		</li>
		
		
		 <!------payment----->

		<li class="<?php if($page_name == 'list_invoice')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_invoice/<?php echo $this->session->userdata('login_user_id'); ?>" >
					<i class=" fa fa-money p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_invoices');?></span>
				</a>
		</li>
		
		 <!------send message----->

		<li class="<?php if($page_name == 'message')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/message" >
					<i class=" fa fa-envelope p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('send_message');?></span>
				</a>
		</li>
		
		 <!------send message----->

		<li class="<?php if($page_name == 'list_noticeboard')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/list_noticeboard" >
					<i class=" fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('list_noticeboard');?></span>
				</a>
		</li>
	
	
  <!------profile----->

		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>patient/manage_profile" >
					<i class=" fa fa-edit p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('change_profile');?></span>
				</a>
		</li>
					
                  
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->