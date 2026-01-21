				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_patient_document');?>
							<a href="<?php echo base_url();?>nurse/list_document" 
                     class="btn btn-orange btn-xs"><i class="fa fa-eye"></i>&nbsp;<?php echo get_phrase('view_patient_document');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
								               <?php echo form_open(base_url() . 'nurse/add_document/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
											   
											   <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('document_name');?>*</label>
                                    <div class="col-md-12">
									 <input type="text" id="example-text" name="name" class="form-control m-r-10" placeholder="enter documen name" required>


                                    </div>
                                </div>
											   
											   
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('patient');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="selectpicker m-b-20 m-r-10 form-control" name="patient_id" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_patient');?></option>
                                    	<?php 
										$patient = $this->db->get('patient')->result_array();
										foreach($patient as $row):
										?>
                                    <option value="<?php echo $row['patient_id'];?>"><?php echo $row['name'];?></option>
									 <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
								
								<div class="form-group">
                         <label class="col-sm-12" for="example-text"><?php echo get_phrase('document');?></label>
                        <div class="col-sm-12">
                        <input type="file" name="file_name" class="form-control  m-r-10">

                        </div>
                    	</div>
						
						<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('doctor');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="selectpicker m-b-20 m-r-10 form-control" name="doctor_id" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_doctor');?></option>
                                    	<?php 
										$doctor = $this->db->get('doctor')->result_array();
										foreach($doctor as $row):
										?>
                                    <option value="<?php echo $row['doctor_id'];?>"><?php echo $row['name'];?></option>
									 <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"></textarea>


                                    </div>
                                </div>
						
                    
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                                <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      