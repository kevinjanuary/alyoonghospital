				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_invoice');?>
							<a href="<?php echo base_url();?>accountant/list_invoice" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_invoices');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
				<?php echo form_open(base_url() . 'accountant/invoice_add/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
				
								
					<div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('invoice_title'); ?></label>

                     <div class="col-md-12">
                        <input type="text" class="form-control" name="title" required  />
                              
                    </div>
                </div>

                <div class="form-group">
                      <label class="col-md-12"><?php echo get_phrase('invoice_number'); ?></label>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="invoice_number"  value="<?php echo rand(10000, 100000); ?>"  readonly>
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
                                <option value="<?php echo $row2['patient_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"><?php echo get_phrase('creation_date'); ?></label>
                    <div class="col-sm-12">
					<input class="form-control m-r-10" name="creation_timestamp" type="date" value="" id="example-date-input" required>
                    </div>
                </div>

                <div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('due_date'); ?></label>
                    <div class="col-sm-12">
					<input class="form-control m-r-10" name="due_timestamp" type="date" value="" id="example-date-input" required>

                    </div>
                </div>

                <div class="form-group">
                     <label class="col-md-12"><?php echo get_phrase('vat_percentage'); ?></label>

                    <div class="col-md-12">
                            <input type="text" class="form-control" name="vat_percentage" value="" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"><?php echo get_phrase('discount_amount'); ?></label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" name="discount_amount"  value="" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"><?php echo get_phrase('payment_status'); ?></label>
                    <div class="col-sm-12">
                        <select name="status" class="form-control">
                            <option><?php echo get_phrase('select_a_status'); ?></option>
                            <option value="paid"><?php echo get_phrase('paid'); ?></option>
                            <option value="unpaid"><?php echo get_phrase('unpaid'); ?></option>
                        </select>
                    </div>
                </div>

                <hr>

                <!-- FORM ENTRY STARTS HERE-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label class="col-md-12"><?php echo get_phrase('invoice_entry'); ?></label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="entry_description[]"  value="" 
                                   placeholder="<?php echo get_phrase('description'); ?>" >
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="entry_amount[]"  value="" 
                                   placeholder="<?php echo get_phrase('amount'); ?>" >
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
                        <label class="col-md-12"><?php echo get_phrase('invoice_entry'); ?></label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="entry_description[]"  value="" 
                                   placeholder="<?php echo get_phrase('description'); ?>" >
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="entry_amount[]"  value="" 
                                   placeholder="<?php echo get_phrase('amount'); ?>" >
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
                        <label class="col-md-12"><?php echo get_phrase('invoice_entry'); ?></label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="entry_description[]"  value="" 
                                   placeholder="<?php echo get_phrase('description'); ?>" >
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="entry_amount[]"  value="" 
                                   placeholder="<?php echo get_phrase('amount'); ?>" >
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