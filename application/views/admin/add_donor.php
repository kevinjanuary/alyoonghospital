				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_donor');?>
							<a href="<?php echo base_url();?>admin/list_donor" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_donors');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'admin/add_donor/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('name');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="name"/ required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('sex');?>*</label>
                                    <div class="col-md-12">
									<select name="sex" class="form-control" data-style="btn-primary">
									<option><?php echo get_phrase ('select_gender'); ?></option>
									<option value="Male"><?php echo get_phrase ('male'); ?></option>
									<option value="Female"><?php  echo get_phrase ('female'); ?></option>
									
									</select>


                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('age');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="age"/ required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('email');?>*</label>
                                    <div class="col-md-12">
									<input type="email" class="form-control" name="email"/ required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('phone');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="phone"/ required>
									
									</div>
									</div>
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="address"></textarea>


                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('blood_group');?>*</label>
                                    <div class="col-md-12">
									<select name="blood_group" class="form-control" data-style="btn-primary">
									<option><?php echo get_phrase ('select_blood_group'); ?></option>
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
                                        <input class="form-control m-r-10" name="last_donation_timestamp" type="date" value="2011-08-19" id="example-date-input" required>
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
                    
      