				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('assign_bed');?>
							<a href="<?php echo base_url();?>nurse/list_assign_bed" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_assign_bed');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'nurse/assign_bed/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
								
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('patient');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="patient_id"  required>
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
                                    <label class="col-sm-12"><?php echo get_phrase('bed_type');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="bed_type"  required>
                                         <option data-tokens=""><?php echo get_phrase('select_bed_type');?></option>
                                    	<?php 
										$add_bed = $this->db->get('add_bed')->result_array();
										foreach($add_bed as $row):
										?>
                                    <option value="<?php echo $row['bed_type'];?>"><?php echo $row['bed_type'];?></option>
									 <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
									
									 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('assign_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="assign_date" type="date" value="2011-08-19" id="example-date-input" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('discharge_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="discharge_date" type="date" value="2011-08-19" id="example-date-input" required>
                                    </div>
                                </div>
		
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"></textarea>


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
                    
      