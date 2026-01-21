<div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-warning"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('report');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_report/birth">
<?php echo get_phrase('birth_report');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-primary"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('report');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_report/death">
<?php echo get_phrase('death_report');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('report');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_report/operation">
<?php echo get_phrase('operation_report');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-info"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('invoice');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_payment">
<?php echo get_phrase('invoices');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<!--- ANOTHER INFORMAATION ABOUT DASHBOARD    -->
					
					<div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-primary"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('laboratorist');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/manage_laboratorist">
<?php echo get_phrase('laboratorists');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-warning"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('accountant');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/manage_accountant">
<?php echo get_phrase('accountants');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-info"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('appointment');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_appointment">
<?php echo get_phrase('appointments');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('blood_bank');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/view_blood_bank">
<?php echo get_phrase('blood_banks');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<!--- ANOTHER INFORMAATION ABOUT DASHBOARD    -->
					
					<div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-primary"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('medicine');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/medicine">
<?php echo get_phrase('medicine');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-warning"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('prescription');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/list_prescription">
<?php echo get_phrase('prescription');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-info"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('doctor');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/list_doctor">
<?php echo get_phrase('all_doctors');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('pharmacist');?></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?>admin/list_pharmacist">
<?php echo get_phrase('all_pharmacists');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('operation_,_death_,birth_reports');?></div>
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>
							
                    		<th><div><?php echo get_phrase('department');?></div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('patient');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						foreach($reports as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['description'];?></td>
						
						    <td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id'],'name');?></td>

                            <td><?php echo date('d M,Y', $row['timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>
				</div>
				</div>
				</div>

					
					
					
					
					
</div>