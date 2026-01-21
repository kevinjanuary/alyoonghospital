
                <?php echo form_open(base_url() . 'admin/manage_language/add_language/' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
                            <div class="form-group">
                                <label class="col-sm-12"><?php echo get_phrase('language');?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="language"  placeholder = "Add New Language Here" required/>
                                </div>
                            </div>
                            
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-sm btn-icon icon-left"><i class="fa fa-plus"></i><?php echo get_phrase('add_language');?></button>
                              </div>
							</div>
                    <?php echo form_close();?> 
