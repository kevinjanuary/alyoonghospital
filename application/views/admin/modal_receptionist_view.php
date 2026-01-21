<?php 
$edit_data		=	$this->db->get_where('receptionist' , array('receptionist_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'admin/manage_receptionist/do_update/'.$row['receptionist_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
					
					
                               
                                       <div class="form-group"> 
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" value="" name="userfile" onChange="readURL(this);" />
       				 <img id="blah" src="<?php echo $this->crud_model->get_image_url('receptionist', $row['receptionist_id']); ?>" alt="" height="200" width="200"/>
					</div>
					</div>	
					
					
                          <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('name');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="name" class="form-control m-r-10" value="<?php echo $row ['name']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('id_card');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                            <input type="text" id="example-text" name="id_card" class="form-control m-r-10" value="<?php echo $row ['id_card']; ?>">
                                    </div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('marital_status');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="marital_status" class="form-control m-r-10" value="<?php echo $row ['marital_status']; ?>">
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('religion');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="religion" class="form-control m-r-10" value="<?php echo $row ['religion']; ?>">
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" value="<?php echo $row ['email']; ?>" required>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12" for="pwd"><?php echo get_phrase('password');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="pwd" name="password" class="form-control"  value="<?php echo $row ['password']; ?>">
                                    </div>
                                </div>
								
								
								
								 <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
                             <textarea class="textarea_editor form-control m-r-10" rows="5" name="address" required><?php echo $row ['address']; ?></textarea>

                                    </div>
                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('city');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="city" class="form-control m-r-10" value="<?php echo $row ['city']; ?>" >
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('qualifications');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="qualification" class="form-control m-r-10" value="<?php echo $row ['qualification']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="state" class="form-control m-r-10" value="<?php echo $row ['state']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('nationality');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="nationality" class="form-control m-r-10" value="<?php echo $row ['nationality']; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-phone"><?php echo get_phrase('phone');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                               <input type="text" id="example-phone" name="phone" class="form-control" value="<?php echo $row ['phone']; ?>" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                   <select class="form-control" name="department_id" data-style="btn-primary" required>
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
                           
                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('update_receptionist');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>