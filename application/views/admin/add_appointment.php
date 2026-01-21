				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_appointment');?>
							<a href="<?php echo base_url();?>admin/list_appointment" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_appointments');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'admin/add_appointment/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
<?php
function generateRandomString($length = 10) {
    $characters = 'ABCDEFGHIJKLMNO0123456789PQRSTUVWXYZ0123456789ABCDEFGHIJ0123456789KLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>  
                                        <input type="text" id="example-text" name="appointment_code" class="form-control m-r-10" value="<?php echo generateRandomString(); ?>" readonly="true">
										<hr>
										
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
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                      <select name="department_id" class="form-control" data-validate="required" id="class_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_department_doctors(this.value)"  required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$departments = $this->db->get('department')->result_array();
								foreach($departments as $row):
									?>
                            		<option value="<?php echo $row['department_id'];?>">
											<?php echo $row['name'];?>
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
			                        
			                    </select>
								
			                </div>
							</div>
	
							
							 <div class="form-group">
						<label  class="col-sm-12"><?php echo get_phrase('schedule_date_and_time');?></label>
		                    <div class="col-sm-12">
		                        <select name="shedule" class="form-control" id="shedule_selector_holder" required>
		                            <option value=""><?php echo get_phrase('select_doctor_first');?></option>
			                        
			                    </select>
			                </div>
							</div>
							
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('sickness_information');?>*</label>
                                    <div class="col-md-12">
									 <textarea class="form-control" rows="7" name="issue"></textarea>


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