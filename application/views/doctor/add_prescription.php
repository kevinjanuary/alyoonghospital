				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_prescription');?>
							<a href="<?php echo base_url();?>doctor/list_prescription" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('list_all_prescriptions');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
				<?php echo form_open(base_url() . 'doctor/add_prescription/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
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
				<div class="form-group">
                      <label class="col-md-12"><?php echo get_phrase('presription_number'); ?></label>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="presription_number"  value="<?php echo generateRandomString(); ?>"  readonly>
                    </div>
                </div>
				
								
					<div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('presription_name'); ?></label>

                     <div class="col-md-12">
                        <input type="text" class="form-control" name="presription_name" required  />
                              
                    </div>
                </div>
				
				<div class="form-group">
                   <label class="col-md-12"><?php echo get_phrase('patient'); ?></label>

                    <div class="col-sm-12">
                        <select name="patient_id" class="form-control">
                            <option><?php echo get_phrase('select_patient'); ?></option>
                            <?php
                            $patients = $this->db->get('patient')->result_array();
                            foreach ($patients as $row2):
                                ?>
                                <option value="<?php echo $row2['patient_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                   <label class="col-md-12"><?php echo get_phrase('doctor'); ?></label>

                    <div class="col-sm-12">
                        <select name="doctor_id" class="form-control">
                            <option><?php echo get_phrase('select_doctor'); ?></option>
                            <?php
                            $doctor = $this->db->get('doctor')->result_array();
                            foreach ($doctor as $row2):
                                ?>
                                <option value="<?php echo $row2['doctor_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
				
				  <div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('patient_weight'); ?></label>

                    <div class="col-md-12">
                            <input type="text" class="form-control" name="weight" value="" >
                    </div>
                </div>
				
				  <div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('patient_height'); ?></label>

                    <div class="col-md-12">
                            <input type="text" class="form-control" name="height" value="" >
                    </div>
                </div>
				
				<div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('blood_pressure'); ?></label>

                    <div class="col-md-12">
                            <input type="text" class="form-control" name="blood_pressure" value="" >
                    </div>
                </div>
				
				
								<hr>
								<div class="form-group">
                                    <div class="col-sm-12">
                                  <input type="radio" class="check" id="square-radio-1" name="type" value="old" data-radio="iradio_square-red" required>
                                <label for="square-radio-1"><?php echo get_phrase('old_prescription');?></label>
                                          
                                  <input type="radio" class="check" id="square-radio-2" name="type" value="new" checked data-radio="iradio_square-red" required>
                                 <label for="square-radio-2"><?php echo get_phrase('new_prescription');?></label>
								 </div>
								 </div>
								 <hr>
								 
					 <div class="form-group">
                    <label class="col-md-12"><?php echo get_phrase('visiting_fee'); ?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" name="visiting_fee"  value="" >
                    </div>
                </div>
				
				 <div class="form-group">
                    <label class="col-md-12"><?php echo get_phrase('case_history'); ?></label>
                    <div class="col-sm-12">
					<textarea id="mymce" name="case_history" class="form-control"></textarea>
                    </div>
                </div>


                <!-- FORM ENTRY STARTS HERE-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('prescription_entry'); ?></label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="entry_diagnose[]"  value="" placeholder="<?php echo get_phrase('diagnosis'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_name[]"  value="" placeholder="<?php echo get_phrase('medicine_name'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_type[]"  value="" placeholder="<?php echo get_phrase('medicine_type'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_prescription[]"  value="" placeholder="<?php echo get_phrase('usage_prescription'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_days[]"  value="" placeholder="<?php echo get_phrase('usage_days'); ?>" >
                        </div>
						
						 <div class="col-sm-2">
                            <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>

                    </div>
                </div>
				
				<!-- FORM ENTRY STARTS HERE-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('prescription_entry'); ?></label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="entry_diagnose[]"  value="" placeholder="<?php echo get_phrase('diagnosis'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_name[]"  value="" placeholder="<?php echo get_phrase('medicine_name'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_type[]"  value="" placeholder="<?php echo get_phrase('medicine_type'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_prescription[]"  value="" placeholder="<?php echo get_phrase('usage_prescription'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_days[]"  value="" placeholder="<?php echo get_phrase('usage_days'); ?>" >
                        </div>
						
						 <div class="col-sm-2">
                            <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>

                    </div>
                </div>
				
				<!-- FORM ENTRY STARTS HERE-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('prescription_entry'); ?></label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" name="entry_diagnose[]"  value="" placeholder="<?php echo get_phrase('diagnosis'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_name[]"  value="" placeholder="<?php echo get_phrase('medicine_name'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_type[]"  value="" placeholder="<?php echo get_phrase('medicine_type'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_prescription[]"  value="" placeholder="<?php echo get_phrase('usage_prescription'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_days[]"  value="" placeholder="<?php echo get_phrase('usage_days'); ?>" >
                        </div>
						
						 <div class="col-sm-2">
                            <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>

                    </div>
                </div>
				
				 <!-- FORM ENTRY ENDS HERE-->

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="button" class="btn btn-info btn-sm"
                                onClick="add_entry()">
                                    <?php echo get_phrase('add_invoice_entry'); ?>
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>

                <hr>
				
 					<div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-success" id="submit-button">
                            <?php echo get_phrase('save'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
<script>
    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>