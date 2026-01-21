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
//                                    if ($key = $this->session->userdata('login_type') == 'admin') {
//                                        $face_file = base_url() . 'uploads/' . $this->session->userdata('login_type') . '_image/1.jpg';
//                                    }
                            }
                            ?>
						
						<a href="javascript:void(0);" class="waves-effect"><img src="<?php echo base_url() . $face_file; ?>" alt="user-img" class="img-circle"> <span class="hide-menu">
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
					<a href="<?php echo base_url();?>admin/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					 <span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
				
				
			 <!------doctor----->
			 
			 
			 <li> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-user p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_doctors');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_doctor' 	|| 
																	$page_name == 'view_doctor_profile' || 
																	$page_name == 'list_doctor' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_doctor')echo 'active';?> hide-menu">
     						<a href="<?php echo base_url();?>admin/manage_doctor" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_doctors');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_doctor' || $page_name == 'view_doctor_profile')echo 'active';?> hide-menu">
                 <a href="<?php echo base_url();?>admin/list_doctor">
                 <i class="fa fa-list p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('list_doctors');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
	
	<!------nurse----->

		<li> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-stethoscope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_nurses');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_nurse' 	|| 

																$page_name == 'list_nurse' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_nurse')echo 'active';?>hide-menu">
     						<a href="<?php echo base_url();?>admin/manage_nurse" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_nurses');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_nurse')echo 'active';?>hide-menu">
                 <a href="<?php echo base_url();?>admin/list_nurse">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_nurses');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
	
		
		 <!------patient----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-wheelchair p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_patients');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_patient' 	|| 
																	$page_name == 'patient_document' 	|| 

																$page_name == 'list_patient' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_patient')echo 'active';?>hide-menu">
     						<a href="<?php echo base_url();?>admin/manage_patient" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_patients');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_patient')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_patient">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_patients');?></span>
                 </a>
                </li>
				
				 <li class="<?php if($page_name == 'add_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/add_document">
                 <i class="fa fa-plus p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('add_documents');?></span>
                 </a>
                </li>
				
				 <li class="<?php if($page_name == 'list_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_document">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_documents');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'patient_document')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/patient_document">
                 <i class="fa fa-book p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('patient_document');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
					
					
        <!------department----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('departments');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_department' 	|| 
																	$page_name == 'list_department' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_department')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_department" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_departments');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_department')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_department">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_department');?></span>
                 </a>
                </li>
				
                 </ul>
                </li>
				
				
				
				<!------shedule information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_shedule');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_shedule' 	|| 

																$page_name == 'list_shedule' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_shedule')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_shedule" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_shedule');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_shedule')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_shedule">
                 <i class="fa fa-list p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('list_shedules');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
		


<!------appointment information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('appointments');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_appointment' 	|| 

																$page_name == 'list_appointment' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_appointment')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_appointment" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_appointment');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_appointment')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_appointment">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_appointments');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				
				
				<!------manage beds  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bed p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_beds');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_bed' 	|| 
																	$page_name == 'assign_bed' 	|| 
																	$page_name == 'add_bed_ward' 	|| 
																	$page_name == 'list_assign_bed' 	|| 
																	$page_name == 'list_bed' )echo 'in';?>">
						
						<li class="<?php if($page_name == 'manage_bed_ward')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_bed_ward" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_bed_ward');?></span>
							</a>
							</li>	
							
							<li class="<?php if($page_name == 'list_bed_ward')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/list_bed_ward" >
							<i class="fa fa-list p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('list_bed_ward');?></span>
							</a>
							</li>	
						
						
                 			 <li class="<?php if($page_name == 'add_bed')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_bed" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_bed');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_bed">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_beds');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'assign_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/assign_bed">
                 <i class="fa fa-plus p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('assign_bed');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'list_assign_bed')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_assign_bed">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_assign_bed');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
			
			
			 <!------pharmacist----->
		 
		 
		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('prescriptions');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_prescription' 	|| 

																$page_name == 'list_prescription' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_prescription')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_prescription" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_prescription');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_prescription')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_prescription">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_prescription');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>




		 <!------pharmacist----->
		 
		 
		 <!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-medkit p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('pharmacists');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_pharmacist' 	|| 

																$page_name == 'list_pharmacist' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_pharmacist')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_pharmacist" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_pharmacists');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_pharmacist')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_pharmacist">
                 <i class="fa fa-list p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('list_pharmacist');?></span>
                 </a>
                </li>
     
                 </ul>
                </li> -->

		  <!------accountant----->
		   <!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-user p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('accountants');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_accountant' 	|| 

																$page_name == 'list_accountant' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_accountant')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_accountant" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_accountants');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_accountant')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_accountant">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_accountants');?></span>
                 </a>
                </li>
     
                 </ul>
                </li> -->
					
					<!------laboratorist----->
					
					<!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-filter p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('laboratorists');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_laboratorist' 	|| 

																$page_name == 'list_laboratorist' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_laboratorist')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_laboratorist" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_laboratorists');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_laboratorist')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_laboratorist">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_laboratorists');?></span>
                 </a>
                </li>
     
                 </ul>
                </li> -->
				
				
				<!------laboratorist----->
					
					<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('receptionists');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_receptionist' 	|| 

																$page_name == 'list_receptionist' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'manage_receptionist')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/manage_receptionist" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_receptionists');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_receptionist')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_receptionist">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_receptionists');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				<!------manage blood  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_blood');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_donor' 	|| 
																	$page_name == 'list_donor' 	|| 
																	$page_name == 'add_blood' 	|| 
																	$page_name == 'list_blood' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_donor')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_donor" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_donor');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_donor')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_donor">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_donors');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'add_blood')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/add_blood">
                 <i class="fa fa-plus p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('add_blood');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'list_blood')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_blood">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_blood');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				
				
				<!------manage blood  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-plus-square p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_medicine');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_category' 	|| 
																	$page_name == 'list_category' 	|| 
																	$page_name == 'medicine' 	|| 
																	$page_name == 'view_medicine' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_category')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/add_category" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_category');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_category')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_category">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_categories');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'medicine')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/medicine">
                 <i class="fa fa-plus p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('add_medicine');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'view_medicine')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/view_medicine">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_medicines');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				
				  <!------medicine page----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_payments');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'add_invoice' 	|| 

																$page_name == 'list_invoice' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'add_invoice')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/invoice_add" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_invoice');?></span>
							</a>
							</li>	
				 
				 <li class="<?php if($page_name == 'list_invoice')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/list_invoice">
                 <i class="fa fa-list p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('list_invoices');?></span>
                 </a>
                </li>
     
                 </ul>
                </li>
				
				
				
				<!------communication----->
					<!-- <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-folder-open p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('communications');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'noticeboard' 	|| 
																	$page_name == 'list_noticeboard' 		|| 
																	$page_name == 'manage_sms' )echo 'in';?>">
						
                 			 <li class="<?php if($page_name == 'noticeboard')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/noticeboard" >
							<i class="fa fa-plus p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('add_noticeboard');?></span>
							</a>
							</li>
							
							<li class="<?php if($page_name == 'list_noticeboard')echo 'active';?>">
     						<a href="<?php echo base_url();?>admin/list_noticeboard" >
							<i class="fa fa-list p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('list_noticeboard');?></span>
							</a>
							</li>		
				 
				 <li class="<?php if($page_name == 'manage_sms')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/message">
                 <i class="fa fa-envelope p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('send_messages');?></span>
                 </a>
                </li>
     
                 </ul>
                </li> -->

		
		  <!------MONITOR HOSPIRAL----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('general_reports');?><span class="fa arrow"></span ></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	 

																		$page_name == 'view_payment' 		|| 
																		$page_name == 'view_report'  )echo 'in';?>">
						
                 
				 <li class="<?php if($page_name == 'view_payment')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/view_payment">
                 <i class="fa fa-money p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('view_payment');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'view_report')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/view_report">
                 <i class="fa fa-money p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('view_report');?></span>
                 </a>
                </li>
				
				<li class="<?php if($page_name == 'manage_report')echo 'active';?>">
				<a href="<?php echo base_url();?>admin/manage_report" >
					<i class=" fa fa-plus p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_report');?></span>
				</a>
		</li>
				
                           
                 </ul>
                </li>
				
				
				
				 <!------MONITOR HOSPIRAL----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gears p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('general_settings');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level <?php if(	$page_name == 'manage_email_template' 	|| 

																$page_name == 'system_settings' 		|| 

																$page_name == 'sms_settings' 		|| 
																
																$page_name == 'manage_language' 		|| 

																$page_name == 'backup_restore' )echo 'in';?>">  
				 
				 <li class="<?php if($page_name == 'system_settings')echo 'active';?>">
                 <a href="<?php echo base_url();?>admin/system_settings">
                 <i class="fa fa-gear p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('system_settings');?></span>
                 </a>
                </li>

                 <li class="<?php if($page_name == 'manage_language')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/manage_language">
                      <i class="fa fa-language p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('manage_language');?></span>
                  </a>
                </li>

                <li class="<?php if($page_name == 'backup_restore')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/backup_restore">
                      <i class="fa fa-download p-r-10"></i>  <span class="hide-menu"><?php echo get_phrase('backup_restore');?></span>
                  </a>
                </li>
				
				<li class="<?php if($page_name == 'sms_settings')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/sms_settings">
                      <i class="fa fa-gear p-r-10"></i> <span class="hide-menu"> <?php echo get_phrase('sms_settings');?></span>
                  </a>
                </li>
     
                 </ul>
                </li>

  <!------profile----->

		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/manage_profile" >
					<i class=" fa fa-user p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('change_profile');?></span>
				</a>
		</li>
					
                  
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->