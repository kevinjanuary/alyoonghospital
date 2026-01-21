<?php
$edit_data = $this->db->get_where('prescription', array('prescription_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_prescription'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'admin/list_prescription/update/' . $param2, array('class' => 'form-horizontal form-groups validate invoice-edit', 'enctype' => 'multipart/form-data')); ?>


                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('presription_number'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="presription_number" id="title" data-validate="required" 
                                   data-message-required="<?php echo get_phrase('value_required'); ?>" 
                                   value="<?php echo $row['presription_number']; ?>" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                       <label class="col-md-12"><?php echo get_phrase('presription_name'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="presription_name"  value="<?php echo $row['presription_name']; ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12"><?php echo get_phrase('patient'); ?></label>

                        <div class="col-sm-12">
                            <select name="patient_id" class="form-control">
                                <option><?php echo get_phrase('select_a_patient'); ?></option>
                                <?php
                                $patients = $this->db->get('patient')->result_array();
                                foreach ($patients as $row2):
                                    ?>
                                    <option value="<?php echo $row2['patient_id']; ?>"	
                                        <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
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
                                <option><?php echo get_phrase('select_a_doctor'); ?></option>
                                <?php
                                $patients = $this->db->get('doctor')->result_array();
                                foreach ($patients as $row2):
                                    ?>
                                    <option value="<?php echo $row2['doctor_id']; ?>"	
                                        <?php if ($row['doctor_id'] == $row2['doctor_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
						
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('patient_weight'); ?></label>

                        <div class="col-sm-12">

                                <input type="text" class="form-control" name="weight"  
                                       value="<?php echo $row['weight']; ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('patient_height'); ?></label>

                        <div class="col-sm-12">
                                <input type="text" class="form-control" name="height"  
                                       value="<?php echo $row['height']; ?>" >
                        </div>
                    </div>


				 <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('blood_pressure'); ?></label>

                        <div class="col-sm-12">
                                <input type="text" class="form-control" name="blood_pressure"  
                                       value="<?php echo $row['blood_pressure']; ?>" >
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
                                <input type="text" class="form-control" name="visiting_fee"  
                                       value="<?php echo $row['visiting_fee']; ?>" >
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('case_history'); ?></label>

                        <div class="col-sm-12">
					 <textarea  name="case_history" rows="5" class="form-control"><?php echo $row['case_history']; ?></textarea>
                        </div>
                    </div>
					
                    <hr>
                    <!-- INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry">
                        <?php
                        $prescription_entries = json_decode($row['prescription_entries']);
                        foreach ($prescription_entries as $prescription_entry) {
                            ?>
                            <div class="form-group">
                                <label class="col-md-12">
                                    <?php echo get_phrase('prescription_entry'); ?></label>


                                <div class="col-md-4">
                            <input type="text" class="form-control" name="entry_diagnose[]"  value="<?php echo $prescription_entry->diagnose; ?>" placeholder="<?php echo get_phrase('diagnosis'); ?>" >
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_name[]"  value="<?php echo $prescription_entry->medicine_name; ?>" placeholder="<?php echo get_phrase('medicine_name'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_medicine_type[]"  value="<?php echo $prescription_entry->medicine_type; ?>" placeholder="<?php echo get_phrase('medicine_type'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_prescription[]"  value="<?php echo $prescription_entry->prescription; ?>" placeholder="<?php echo get_phrase('usage_prescription'); ?>" >
                        </div>
						<div class="col-md-2">
                            <input type="text" class="form-control" name="entry_days[]"  value="<?php echo $prescription_entry->days; ?>" placeholder="<?php echo get_phrase('usage_days'); ?>" >
                        </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- INVOICE ENTRY ENDS HERE-->

                    <!-- TEMPORARY INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry_temp">
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
                    <!-- TEMPORARY INVOICE ENTRY ENDS HERE-->


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-success btn-sm"
                                    onClick="add_entry()">
                                        <?php echo get_phrase('add_prescription_entry'); ?>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo get_phrase('update_prescription'); ?></button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>	



<script>

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry_temp').html();
        $('#invoice_entry_temp').remove();
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
