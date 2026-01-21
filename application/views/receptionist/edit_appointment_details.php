				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_appointment');?>
							<a href="<?php echo base_url();?>receptionist/list_appointment" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_appointments');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
								<?php foreach($edit_appointments as $row): ?>
                    <?php echo form_open(base_url() . 'receptionist/add_appointment/do_update/'.$row['appointment_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
<input type="text" id="example-text" name="pid" class="form-control m-r-10" value="<?php echo $row ['appointment_code']; ?>" readonly="true">
<hr>
									 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('patient');?>*</label>
                                    <div class="col-sm-12">
                                   <select class="form-control" name="patient_id" data-style="btn-primary" required>
                                         <option value=""><?php echo get_phrase('select_patient'); ?></option>
                                <?php
                                $patients = $this->db->get('patient')->result_array();
                                foreach ($patients as $row3):
                                    ?>
                                    <option value="<?php echo $row3['patient_id']; ?>"
                                            <?php if ($row['patient_id'] == $row3['patient_id']) echo 'selected'; ?>>
                                                <?php echo $row3['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
										 
                                    </select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                      <select name="department_id" class="form-control" data-validate="required" id="class_id" 
									  
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_department_doctors(this.value)"  required>
                              <option value=""><?php echo get_phrase('select');?></option>
                             <?php
                                $patients = $this->db->get('department')->result_array();
                                foreach ($patients as $row3):
                                    ?>
                                    <option value="<?php echo $row3['department_id']; ?>"
                                            <?php if ($row['department_id'] == $row3['department_id']) echo 'selected'; ?>>
                                                <?php echo $row3['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                          </select>
                                    </div>
                                </div>
								
								<div class="form-group">
						<label  class="col-sm-12"><?php echo get_phrase('doctor');?></label>
		                    <div class="col-sm-12">
		                        <select name="doctor_id" class="form-control" id="doctor_selector_holder" onfocus="return get_doctor_shedules(this.value)" required>
		                            <option value=""><?php echo get_phrase('select_department_first');?></option>
									 <?php
                                $patients = $this->db->get('doctor')->result_array();
                                foreach ($patients as $row3):
                                    ?>
                                    <option value="<?php echo $row3['doctor_id']; ?>"
                                            <?php if ($row['doctor_id'] == $row3['doctor_id']) echo 'selected'; ?>>
                                                <?php echo $row3['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
			                        
			                    </select>
								
			                </div>
							</div>
	
							
							 <div class="form-group">
						<label  class="col-sm-12"><?php echo get_phrase('schedule_date_and_time');?></label>
		                    <div class="col-sm-12">
		                        <select name="shedule" class="form-control" id="shedule_selector_holder" required>
		                            <option value=""><?php echo $row['shedule'];?></option>
	
			                    </select>
			                </div>
							</div>
							
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('issue');?>*</label>
                                    <div class="col-md-12">
									 <textarea id="mymce" name="issue"><?php echo $row ['issue']; ?></textarea>


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
					<?php endforeach; ?>              
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      <script type="text/javascript">

	function get_department_doctors(department_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_department_doctor/' + department_id ,
            success: function(response)
            {
                jQuery('#doctor_selector_holder').html(response);
            }
        });

    }
	
	function get_doctor_shedules(doctor_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_doctor_shedule/' + doctor_id ,
            success: function(response)
            {
                jQuery('#shedule_selector_holder').html(response);
            }
        });

    }

</script>