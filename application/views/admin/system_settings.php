	<div class="row">
                    <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('system_settings');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'admin/system_settings/do_update', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top'));
                ?>
                <div class="form-group">
                 <label class="col-md-12" for="example-text"><?php echo get_phrase('system_name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="system_name" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('system_title'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="system_title" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('address'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="address" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('phone'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="phone" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('paypal_email'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="paypal_email" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('currency'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="currency" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('system_email'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="system_email" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('language'); ?></label>
                    <div class="col-sm-12">
                        <select name="language" class="form-control ">
                            <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field) {
                                if ($field == 'phrase_id' || $field == 'phrase')
                                    continue;

                                $current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description;
                                ?>
                                <option value="<?php echo $field; ?>"
                                        <?php if ($current_default_language == $field) echo 'selected'; ?>> <?php echo $field; ?> </option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('text_align'); ?></label>
                    <div class="col-sm-12">
                        <select name="text_align" class="form-control select2">
                            <?php $text_align = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description; ?>
                            <option value="left-to-right" <?php if ($text_align == 'left-to-right') echo 'selected'; ?>> left-to-right</option>
                            <option value="right-to-left" <?php if ($text_align == 'right-to-left') echo 'selected'; ?>> right-to-left</option>
                        </select>
                    </div>
                </div>
				
				  <div class="form-group">
                      <label class="col-md-12" for="example-text"><?php echo get_phrase('running_session');?></label>
                      <div class="col-sm-12">
						  <select name="running_session" class="form-control" >
                          <?php $running_session = $this->db->get_where('settings', array('type' => 'session'))->row()->description; ?>
                          <option value=""><?php echo get_phrase('select_running_session');?></option>
                          <?php for($i = 0; $i < 10; $i++):?>
                              <option value="<?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>"
                                <?php if($running_session == (2017+$i).'-'.(2017+$i+1)) echo 'selected';?>>
                                  <?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>
                              </option>
                          <?php endfor;?>
                          </select>
                      </div>
                  </div>

                
					
					<div class="form-group">
                    <label class="col-md-12" for="example-text"><?php echo get_phrase('tawk_to_code'); ?></label>
                    <div class="col-sm-12">
					<textarea  class="form-control" name="tawkto"><?php echo $this->db->get_where('settings', array('type' => 'tawkto'))->row()->description; ?></textarea>
                    </div>
                </div>
				
                <div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('system_footer'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="system_footer" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'footer'))->row()->description; ?>">
                    </div>
                </div>
				
				<div class="form-group">
                   <label class="col-md-12" for="example-text"><?php echo get_phrase('vogue_merchant_id'); ?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="vogue" 
                               value="<?php echo $this->db->get_where('settings', array('type' => 'vogue'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>

        </div>
		</div>
		</div>
			
		
                    <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('system_logo');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
					<?php echo form_open(base_url() . 'admin/system_settings/upload_logo', array(
            'class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data'));
        ?>			
								
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile" onChange="readURL(this);" /required>
       				 <img id="blah" src="<?php echo base_url(); ?>uploads/logo.png" alt="" height="200" width="200"/>
					</div>
					</div>	
					
					<div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-info btn-sm btn-rounded"><i class="fa fa-upload"></i>&nbsp;<?php echo get_phrase('update_logo');?></button>
                                            </div>
                                        </div>
								
								
								
								</div>
								</div>
								</div>
								</div>
				<?php echo form_close(); ?>

								</div>
								
		
		