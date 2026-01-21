				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('edit_pharmacist_profile');?>
							
							<a href="<?php echo base_url();?>admin/list_pharmacist" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					
							</div>
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
														<?php foreach($pharmacists as $row): ?>	

                    <?php echo form_open(base_url() . 'admin/manage_pharmacist/do_update/'.$row['pharmacist_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>

	
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('name');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="name" class="form-control m-r-10" value="<?php echo $row['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('date_of_birth');?>*</span></label>
                                    <div class="col-md-12">
                  <input class="form-control " name="date_of_birth"  type="date" value="<?php echo $row['date_of_birth']; ?>" id="example-date-input" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('place_of_birth');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="place_of_birth" class="form-control m-r-10" value="<?php echo $row['place_of_birth']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('id_card');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                            <input type="text" id="example-text" name="id_card" class="form-control m-r-10" value="<?php echo $row['id_card']; ?>" required>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('gender');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="gender" data-style="btn-primary btn-outline" required>
                                         <option data-tokens="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
										<option data-tokens="Male"><?php echo get_phrase('male');?></option>
                                        <option data-tokens="Female"><?php echo get_phrase('female');?></option>
                                        <option data-tokens="Others"><?php echo get_phrase('others');?></option>
                                    </select>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_tongue');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="mother_tongue" class="form-control m-r-10" value="<?php echo $row['mother_tongue']; ?>" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('marital_status');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="select2 m-b-20 m-r-10 form-control" name="marital_status" data-style="btn-primary btn-outline" required>
                                         <option data-tokens="<?php echo $row['marital_status']; ?>"><?php echo $row['marital_status']; ?></option>
										<option data-tokens="Married"><?php echo get_phrase('married');?></option>
                                        <option data-tokens="Single"><?php echo get_phrase('single');?></option>
                                        <option data-tokens="Divorced"><?php echo get_phrase('divorced');?></option>
                                        <option data-tokens="Engaged"><?php echo get_phrase('engaged');?></option>
                                    </select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('religion');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="religion" class="form-control m-r-10" value="<?php echo $row['religion']; ?>" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="blood_group" class="form-control m-r-10" value="<?php echo $row['blood_group']; ?>" required>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
                             <textarea class="form-control m-r-10" rows="15" name="address" required><?php echo $row['address']; ?></textarea>

                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('city');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="city" class="form-control m-r-10" value="<?php echo $row['city']; ?>" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('qualifications');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="qualification" class="form-control m-r-10" value="<?php echo $row['qualification']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="state" class="form-control m-r-10" value="<?php echo $row['state']; ?>" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('nationality');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="nationality" class="form-control m-r-10" value="<?php echo $row['nationality']; ?>" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('biography');?>*</label>
                                    <div class="col-md-12">
									 <textarea id="mymce" name="biography"><?php echo $row['biography']; ?></textarea>


                                    </div>
                                </div>
								
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);" /required>
       				 <img id="blah" src="<?php echo $this->crud_model->get_image_url('pharmacist',$row['pharmacist_id']);?>" alt="" height="200" width="200"/>
					</div>
					</div>	
						
					<div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('account_information');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('phone');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                               <input type="text" id="example-phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('mobile_no');?></span>
                                    </label>
                                    <div class="col-md-12">
                               <input type="text" id="example-phone" name="mobile_no" class="form-control" value="<?php echo $row['mobile_no']; ?>" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-md-12" for="pwd"><?php echo get_phrase('password');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pwd" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                </div>
                                
								
								
                        </div>
                    </div>
				
						 
						<div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo get_phrase('social_information');?></h3>
                          
                                <div class="form-group">
                                    <label class="col-md-12" for="furl"><?php echo get_phrase('facebook');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="furl" name="facebook" value="<?php echo $row['facebook']; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="turl"><?php echo get_phrase('twitter');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="turl" name="twitter" class="form-control" value="<?php echo $row['twitter']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="gurl"><?php echo get_phrase('google_plus');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="gurl" name="google_plus" class="form-control" value="<?php echo $row['google_plus']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="inurl"><?php echo get_phrase('linkedin');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="inurl" name="linkedin" class="form-control" value="<?php echo $row['linkedin']; ?>">
                                    </div>
                                </div>
								
								</div>
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
