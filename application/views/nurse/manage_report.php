                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('report_information');?>
							
							</div>
<div class="panel-body">
                      <div class="white-box">
                            <!-- Nav tabs -->
                            <ul class="nav customtab2 nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#home6" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> <?php echo get_phrase('operation_reports');?></span></a></li>
                                <li role="presentation" class="nav-item"><a href="#profile6" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs"><?php echo get_phrase('birth_reports');?></span></a></li>
                                <li role="presentation" class="nav-item"><a href="#messages6" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs"><?php echo get_phrase('death_reports');?></span></a></li>
                                <li role="presentation" class="nav-item"><a href="#settings6" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs"><?php echo get_phrase('other_reports');?></span></a></li>
								 <li role="presentation" class="nav-item"><a href="#form6" class="nav-link" aria-controls="forms" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs"><?php echo get_phrase('add_report');?></span></a></li>
                            </ul>
                            <!-- Tab panes -->

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade" id="home6">
                                    <div class="col-md-12">

 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>

                    		<th><div><?php echo get_phrase('department');?></div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('patient');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						$birth_reports	=	$this->db->get_where('report' , array('type'=>'operation'))->result_array();

						foreach($birth_reports as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['description'];?></td>
                            
							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>

                            <td><?php echo date('d M,Y', $row['timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>nurse/manage_report/delete/<?php echo $row['report_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-danger btn-circle">

                                		<i class="fa fa-times" style="color:#FFFFFF"></i>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>
								   </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile6">
                                    <div class="col-md-12">
									
									
                                <table id="myTable" class="table table-striped">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>
							
	                    	<th><div><?php echo get_phrase('department');?></div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('patient');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						$birth_reports	=	$this->db->get_where('report' , array('type'=>'birth'))->result_array();

						foreach($birth_reports as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['description'];?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>

                            <td><?php echo date('d M,Y', $row['timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>nurse/manage_report/delete/<?php echo $row['report_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-danger btn-circle">

                                		<i class="fa fa-times" style="color:#FFFFFF"></i>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

									
                                        
                                    </div>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade active in" id="messages6">
                                    <div class="col-md-12">
                                <table id="myTable" class="table table-striped">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>

                    		<th><div><?php echo get_phrase('department');?></div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('patient');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						$birth_reports	=	$this->db->get_where('report' , array('type'=>'death'))->result_array();

						foreach($birth_reports as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['description'];?></td>
							
							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>

                            <td><?php echo date('d M,Y', $row['timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>nurse/manage_report/delete/<?php echo $row['report_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-danger btn-circle">

                                		<i class="fa fa-times" style="color:#FFFFFF"></i>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>
                                    </div>
                                  
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings6">
                                    <div class="col-md-12">
                                        
                                <table id="example" class="table display">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>
				
                    		<th><div><?php echo get_phrase('department');?></div></th>

                    		<th><div><?php echo get_phrase('date');?></div></th>

                    		<th><div><?php echo get_phrase('patient');?></div></th>

                    		<th><div><?php echo get_phrase('doctor');?></div></th>

                    		<th><div><?php echo get_phrase('options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						$birth_reports	=	$this->db->get_where('report' , array('type'=>'other'))->result_array();

						foreach($birth_reports as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

                            <td><?php echo $row['description'];?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>

                            <td><?php echo date('d M,Y', $row['timestamp']);?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>nurse/manage_report/delete/<?php echo $row['report_id'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('delete');?>" class="btn btn-danger btn-circle">

                                		<i class="fa fa-times" style="color:#FFFFFF"></i>

                                </a>
        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
								
								
								
								<div role="tabpanel" class="tab-pane fade" id="form6">
                                 <div class="col-md-12">

                                        
 								
                    <?php echo form_open('nurse/manage_report/create/' , array('class' => 'form-horizontal validatable'));?>


                          	<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('type');?>*</label>
                                    <div class="col-md-12">

                                    <select name="type" class="form-control" style="width:100%;">

                                    	<option value="operation"><?php echo get_phrase('operation');?></option>

                                    	<option value="birth"><?php echo get_phrase('birth');?></option>

                                    	<option value="death"><?php echo get_phrase('death');?></option>

                                    	<option value="other"><?php echo get_phrase('other');?></option>

                                    </select>

                                </div>

                            </div>
							
							
							 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                       <select class=" form-control" name="department_id" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_department');?></option>
                                    	<?php 
										$departments = $this->db->get('department')->result_array();
										foreach($departments as $row):
										?>
                                    <option value="<?php echo $row['department_id'];?>"><?php echo $row['name'];?></option>
									 <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>

                          	<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">

                                    <input type="text" class="form-control" name="description"/>

                                </div>

                            </div>

                           	<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('doctor');?>*</label>
                                    <div class="col-md-12">

                                    <select class="form-control" name="doctor_id">

                                    		<option value="">select</option>

										<?php 

										$doctors	=	$this->db->get('doctor')->result_array();

										foreach($doctors as $row2):

										?>

                                        	<option value="<?php echo $row2['doctor_id'];?>" ><?php echo $row2['name'];?></option>

                                        <?php

										endforeach;

										?>

									</select>

                                </div>

                            </div>

                            	<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('patient');?>*</label>
                                    <div class="col-md-12">

                                    <select class="form-control" name="patient_id">

                                    		<option value="">select</option>

										<?php 

										$patients	=	$this->db->get('patient')->result_array();

										foreach($patients as $row):

										?>

                                        	<option value="<?php echo $row['patient_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

										endforeach;

										?>

									</select>

                                </div>

                            </div>
							
							
							<div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="timestamp" type="date" value="2011-08-19" id="example-date-input" required>
                                    </div>
                                </div>

                           
<hr>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                                <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>

                    <?php echo form_close();?>                
								
			</div>
           <div class="clearfix"></div>
                                </div>
								
                            </div>
                        </div>
						</div>	
						</div>
						</div>
								
