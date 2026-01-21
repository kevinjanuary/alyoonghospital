               <?php echo form_open(base_url() . 'admin/manage_language/add_phrase/' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('new_string');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phrase" placeholder = "Add New Phrase Here" required/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-sm btn-icon icon-left"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_string');?></button>
                              </div>
							</div>
                    <?php echo form_close();?>       
   