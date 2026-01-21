<?php 
$edit_data		=	$this->db->get_where('blood_donor' , array('blood_donor_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'laboratorist/add_donor/do_update/'.$row['blood_donor_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                         <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('name');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="name" value="<?php echo $row ['name']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('sex');?>*</label>
                                    <div class="col-md-12">
									<select name="sex" class="form-control" data-style="btn-primary">
									<option><?php echo $row ['sex']; ?></option>
									<option value="Male"><?php echo get_phrase ('male'); ?></option>
									<option value="Female"><?php  echo get_phrase ('female'); ?></option>
									
									</select>


                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('age');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="age" value="<?php echo $row ['age']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('email');?>*</label>
                                    <div class="col-md-12">
									<input type="email" class="form-control" name="email" value="<?php echo $row ['email']; ?>"required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('phone');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="phone" value="<?php echo $row ['phone']; ?>" required>
									
									</div>
									</div>
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="address"><?php echo $row ['address']; ?></textarea>


                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('blood_group');?>*</label>
                                    <div class="col-md-12">
									<select name="blood_group" class="form-control" data-style="btn-primary">
									<option value="<?php echo $row ['blood_group']; ?>"><?php echo $row ['blood_group']; ?></option>
									<option value="A+"><?php echo get_phrase ('a+'); ?></option>
									<option value="A"><?php echo get_phrase ('a'); ?></option>
									<option value="B+"><?php echo get_phrase ('b+'); ?></option>
									<option value="B"><?php echo get_phrase ('b'); ?></option>
									<option value="AB+"><?php echo get_phrase ('ab+'); ?></option>
									<option value="AB"><?php echo get_phrase ('ab'); ?></option>
									<option value="O+"><?php echo get_phrase ('o+'); ?></option>
									<option value="O"><?php echo get_phrase ('o'); ?></option>
									
									</select>


                                    </div>
                                </div>
								
								 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('last_donation_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="last_donation_timestamp" type="date" value="<?php echo $row ['last_donation_timestamp']; ?>" id="example-date-input" required>
                                    </div>
                                </div>
								 <hr>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_blood_donor');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>