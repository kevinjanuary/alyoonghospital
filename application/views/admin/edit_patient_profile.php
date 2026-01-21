						<?php foreach($patients as $row): ?>	
				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('edit_patient_profile');?>
							
							<a href="<?php echo base_url();?>admin/list_patient" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					
							</div>
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                    <?php echo form_open(base_url() . 'admin/manage_patient/do_update/'.$row['patient_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>

	
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('full_name');?>
                                    </label>
                                    <div class="col-md-12">
										
                                        <input type="text" id="example-text" name="pid" class="form-control m-r-10" value="<?php echo $row ['pid']; ?>" readonly="true">
                                        <input type="text" id="example-text" name="name" class="form-control m-r-10" value="<?php echo $row ['name']; ?>" >
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('gender');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="sex" data-style="btn-primary btn-outline" required>
                                         <option data-tokens="Male"<?php if($row['sex'] == 'Male')echo 'selected="selected"' ?>>Male</option>
                                        <option data-tokens="Male"<?php if($row['sex'] == 'Female')echo 'selected="selected"' ?>>Female</option>
                                       <option data-tokens="Male"<?php if($row['sex'] == 'Others')echo 'selected="selected"' ?>>Others</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-12" ><?php echo get_phrase('date_of_birth');?>*</label>
                                    <div class="col-md-12">
                                        <input class="form-control " name="birth_date" type="date" value="<?php echo $row ['birth_date']; ?>" id="example-date-input" required>
										<input type="text" id="example-text" name="age" class="form-control" value="<?php echo $row ['age']; ?>" required>
										<input type="text" id="example-text" name="place_of_birth" class="form-control" value="<?php echo $row ['place_of_birth']; ?>" required>


                                    </div>
                                </div>
								
								<div class="col-md-4">
                                                    <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('id_card');?></label>
                                  <input type="text" name="idcard" id="firstName" class="form-control" value="<?php echo $row ['idcard']; ?>">
                                                    </div>
                                                </div>
												
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo get_phrase('issue_at');?></label>
                                                        <input type="text" name="issue_at" id="firstName" class="form-control" value="<?php echo $row ['issue_at']; ?>">
                                                 </div>
                                                </div>
												
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo get_phrase('issue_on');?></label>
                            <input class="form-control " name="issue_on" type="date" value="2011-08-19" id="example-date-input" value="<?php echo $row ['issue_on']; ?>">
                                                 </div>
                                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('occupation');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="occupation" class="form-control m-r-10" value="<?php echo $row ['occupation']; ?>" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_tongue');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="mother_tongue" class="form-control m-r-10" value="<?php echo $row ['mother_tongue']; ?>" required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('marital_status');?>*</label>
                                       <select class="form-control" name="marital_status"  required>
                                         <option data-tokens="<?php echo $row ['marital_status']; ?>"><?php echo $row ['marital_status']; ?></option>
										<option data-tokens="Married"<?php if($row ['marital_status'] == 'Married') echo 'selected="selected"'; ?>>Married</option>
                                        <option data-tokens="Single"<?php if($row ['marital_status'] == 'Single') echo 'selected="selected"'; ?>>Single</option>
                                        <option data-tokens="Divorced"<?php if($row ['marital_status'] == 'Divorced') echo 'selected="selected"'; ?>>Divorced</option>
                                        <option data-tokens="Engaged"<?php if($row ['marital_status'] == 'Engaged') echo 'selected="selected"'; ?>>Engaged</option>
                                    </select>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('religion');?>*</label>
                                       <select class="form-control" name="religion"  required>
                                         <option data-tokens="<?php echo $row ['religion']; ?>"><?php echo $row ['religion']; ?></option>
										<option data-tokens="Christianity">Christianity</option>
                                        <option data-tokens="Islam">Islam</option>
                                        <option data-tokens="Traditional">Traditional</option>
                                        <option data-tokens="Others">Others</option>
                                    </select>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
                             <textarea class="form-control m-r-10" rows="5" name="address"><?php echo $row ['address']; ?></textarea>

                                    </div>
                                </div>
								 <div class="row">
								<div class="col-md-4">
                                  <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('city');?>*</label>
                              
                                        <input type="text" id="example-text" name="city" class="form-control m-r-10" value="<?php echo $row ['city']; ?>" required>
                                    </div>
                                </div>
								
									<div class="col-md-4">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('state');?>*</label>
                                        <input type="text" id="example-text" name="state" class="form-control m-r-10" value="<?php echo $row ['state']; ?>" required>
                                    </div>
                                </div>
								
								<div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('nationality');?>*</label>
                                        <input type="text" id="example-text" name="nationality" class="form-control m-r-10" value="<?php echo $row ['nationality']; ?>" required>
                                    </div>
                                </div>
								</div>
								
								 <div class="row">
								 <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('phone');?>*</label>
                               <input type="text" id="example-phone" name="phone" class="form-control" value="<?php echo $row ['phone']; ?>" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('mobile_no');?></label>
                               <input type="text" id="example-phone" name="mobile_no" class="form-control" value="<?php echo $row ['mobile_no']; ?>" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								</div>
		
		<div class="alert alert-info"><?php echo get_phrase('medical_history');?>*</div>
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                       <select class="selectpicker m-b-20 m-r-10 form-control" name="blood_group"  data-style="btn-success btn-outline" required>

                                    	<option value="A+">A+</option>

                                        <option value="A-">A-</option>

                                        <option value="B+">B+</option>

                                        <option value="B-">B-</option>

                                        <option value="AB+">AB+</option>

                                        <option value="AB-">AB-</option>

                                        <option value="O+">O+</option>

                                        <option value="O-">O-</option>

                                    </select>                                    </div>
                                </div>
								
								 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('date_of_last_admission');?></label>
                                    <div class="col-md-12">
                                        <input class="form-control " name="date_of_last_admission" type="date" value="<?php echo $row ['date_of_last_admission']; ?>" id="example-date-input" >
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('diagnose');?></label>
                                    <div class="col-md-12">
                             <textarea class="form-control m-r-10" rows="5" name="diagnose"><?php echo $row ['diagnose']; ?></textarea>

                                    </div>
                                </div>
								
                                
                                 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?></label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="department_id"  required>
                                         <option value=""><?php echo get_phrase('select'); ?></option>
                                <?php
                                $parents = $this->db->get('department')->result_array();
                                foreach ($parents as $row3):
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
                                    <label class="col-md-12"><?php echo get_phrase('discharge_condition');?></label>
                                    <div class="col-md-12">
									 <textarea id="mymce" name="discharge_condition"><?php echo $row ['discharge_condition']; ?></textarea>
                                    </div>
                                </div>
		<div class="alert alert-info"><?php echo get_phrase('login_details');?></div>

								
								 <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" value="<?php echo $row ['email']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="pwd"><?php echo get_phrase('password');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="pwd" name="password" class="form-control" value="<?php echo $row ['password']; ?>" required>
                                    </div>
                                </div>
						
						
		
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);" /required>
       				 <img id="blah" src="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>" alt="" height="200" width="200"/>
					</div>
					</div>	
						
					
								
                    
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;Save</button>
                                <button type="reset" class="btn btn-inverse waves-effect waves-light">Reset</button>
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                   
      							 <?php endforeach; ?>	
