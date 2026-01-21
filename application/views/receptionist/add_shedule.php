				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_shedule');?>
							<a href="<?php echo base_url();?>receptionist/list_shedule" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_shedules');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'receptionist/add_shedule/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
									<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('doctor');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="doctor_id" data-style="btn-primary btn-outline" required>
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
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('shedule_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control select2 m-r-10" name="avail_day" type="date" value="2011-08-19" id="example-date-input" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="department_id" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_department');?></option>
                                    	<?php 
										$department = $this->db->get('department')->result_array();
										foreach($department as $row):
										?>
                                    <option value="<?php echo $row['department_id'];?>"><?php echo $row['name'];?></option>
									 <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
								
								<div class="col-md-6">
								<div class="form-group">
									<div class="input-group clockpicker">
                                    <input class="form-control" id="single-input" name="start_time" value="" placeholder="Start date" required>
                                     <span class="input-group-btn">
                  					<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('start_time');?></button>
                 					</span> 

									</div>
                                    </div>
                                    </div>
								
								<div class="col-md-6">
								<div class="form-group">
								 <div class="input-group clockpicker">
                                <input class="form-control" id="single-input" name="end_time" value="" placeholder="End date" required>
                                <span class="input-group-btn">
                  				<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('end_time');?></button>
                  				</span> 

                                </div>
								</div>
                                </div>
								
								<div class="col-md-12">
								<div class="form-group">
								 <div class="input-group clockpicker">
                                <input class="form-control" id="single-input" name="per_patient_time" value="" placeholder="Time for each patient" required>
                                <span class="input-group-btn">
                  				<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('per_patient_time');?></button>
                  				</span> 

                                </div>
								</div>
                                </div>
								
								
								<hr>
								<div class="form-group">
                                    <div class="col-sm-12">
                                  <input type="radio" class="check" id="square-radio-1" name="status" value="active" data-radio="iradio_square-red" required>
                                <label for="square-radio-1"><?php echo get_phrase('active');?></label>
                                          
                                  <input type="radio" class="check" id="square-radio-2" name="status" value="inactive" checked data-radio="iradio_square-red" required>
                                 <label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
								 </div>
								 </div>
								 
								 <hr>
                                             
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      