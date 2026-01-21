		<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('send_new_message');?>
							<a href="<?php echo base_url();?>pharmacist/message" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
							</div>
     <div class="panel-body"> 
<?php //echo $this->session->userdata('login_user_id');?>
    <?php echo form_open(base_url() . 'pharmacist/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>

    <div class="form-group">
        <label for="subject"><?php echo get_phrase('select_message_destination'); ?>:</label>
        <br><br>
           <select class="form-control" name="reciever" required>

            <option value=""><?php echo get_phrase('select_a_user'); ?></option>
            <optgroup label="<?php echo get_phrase('admin'); ?>">
                <?php
                $admins = $this->db->get('admin')->result_array();
                foreach ($admins as $row):
                    ?>

                    <option value="admin-<?php echo $row['admin_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
			
			
			<optgroup label="<?php echo get_phrase('doctor'); ?>">
                <?php
                $doctors = $this->db->get('doctor')->result_array();
                foreach ($doctors as $row):
                    ?>

                    <option value="doctor-<?php echo $row['doctor_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
			
            <optgroup label="<?php echo get_phrase('patient'); ?>">
                <?php
                $patients = $this->db->get('patient')->result_array();
                foreach ($patients as $row):
                    ?>

                    <option value="patient-<?php echo $row['patient_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
            <optgroup label="<?php echo get_phrase('nurse'); ?>">
                <?php
                $nurse = $this->db->get('nurse')->result_array();
                foreach ($nurse as $row):
                    ?>

                    <option value="nurse-<?php echo $row['nurse_id']; ?>">
                        - <?php echo $row['name']; ?></option>
						
						
                <?php endforeach; ?>
            </optgroup>
            <optgroup label="<?php echo get_phrase('pharmacist'); ?>">
                <?php
                $pharmacist = $this->db->get('pharmacist')->result_array();
                foreach ($pharmacist as $row):
                    ?>

                    <option value="pharmacist-<?php echo $row['pharmacist_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
			
			 <optgroup label="<?php echo get_phrase('accountant'); ?>">
                <?php
                $accountants = $this->db->get('accountant')->result_array();
                foreach ($accountants as $row):
                    ?>

                    <option value="accountant-<?php echo $row['accountant_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
			 <optgroup label="<?php echo get_phrase('laboratorist'); ?>">
                <?php
                $laboratorist = $this->db->get('laboratorist')->result_array();
                foreach ($laboratorist as $row):
                    ?>

                    <option value="laboratorist-<?php echo $row['laboratorist_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
			<optgroup label="<?php echo get_phrase('receptionist'); ?>">
                <?php
                $laboratorist = $this->db->get('receptionist')->result_array();
                foreach ($laboratorist as $row):
                    ?>

                    <option value="receptionist-<?php echo $row['receptionist_id']; ?>">
                        - <?php echo $row['name']; ?></option>

                <?php endforeach; ?>
            </optgroup>
        </select>
    </div>
	
	<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('subject');?>*</label>
                                    <div class="col-md-12">
									 <input type="text" id="example-text" name="subject" class="form-control m-r-10" placeholder="enter subject" required>


                                    </div>
                                </div>
								<br><br><br><br><br>
	


			
	<div class="form-group">         
        <textarea row="5" class="form-control" name="message" placeholder="<?php echo get_phrase('write_new_message'); ?>" id="mymce"></textarea>
</div>


    <hr>
<div class="form-group">
<div class="col-sm-12">
											
    <button type="submit" class="btn btn-info btn-sm"> <?php echo get_phrase('send_message'); ?><i class="fa fa-plus"></i></button>
	</div>
</form>

</div>
</div>
</div>
</div>
</div>