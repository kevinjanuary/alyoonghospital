				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_notice');?>
							<a href="<?php echo base_url();?>admin/dashboard" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					
					<?php 
                                            if ($active_sms_service == 'clickatell')
                                                echo 'Clickatell ' . get_phrase('clickatell_activated');
                                            if ($active_sms_service == 'twilio')
                                                echo 'Twilio ' . get_phrase('twilio_activated');
												 if ($active_sms_service == 'smsteams')
                                                echo 'smsteams ' . get_phrase('smsteams_activated');
                                            if ($active_sms_service == '' || $active_sms_service == 'disabled')
                                                echo get_phrase('activate_sms_to_send');
                                        ?>
					
					</div>
<?php echo form_open(base_url() . 'admin/noticeboard/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="panel-body table-responsive">
					
					
					<div class="form-group">
                              <label class="col-md-12" for="example-text"><?php echo get_phrase('notice_title');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="notice_title"/ required>
                                </div>
                            </div>
							
                            <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('notice_content_here');?></label>
                                    <div class="col-md-12">
									 <textarea id="mymce" name="notice" class="form-control"></textarea>
                                    </div>
                                	</div>
                          
                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('date');?></label>
                                <div class="col-sm-12">
				<input class="form-control select2 m-r-10" name="create_timestamp" type="date" value="2011-08-19" id="example-date-input" required>

                                </div>
                            </div>
							
							<div class="form-group">
                               <label class="col-md-12" for="example-text"><?php echo get_phrase('location');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="location"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12" for="example-text"><?php echo get_phrase('sms_to_all_users');?></label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="check_sms">
                                        <option value="1"><?php echo get_phrase('yes');?></option>
                                        <option value="2"><?php echo get_phrase('no');?></option>
                                    </select>                                   
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info btn-sm btn-icon icon-left"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_notice');?></button>
                            </div>
						</div>
                                    <?php echo form_close();?>
					

							
							
							
							
</div>							
</div>
</div>
</div>
