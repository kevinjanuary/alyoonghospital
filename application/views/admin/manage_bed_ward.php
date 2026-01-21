				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_bed_ward');?>
							<a href="<?php echo base_url();?>admin/list_bed_ward" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_bed_wards');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'admin/manage_bed_ward/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('bed_ward_name');?>*</label>
                                    <div class="col-md-12">
							<input type="text" class="form-control" name="name"/>
									
									</div>
									</div>
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"></textarea>


                                    </div>
                                </div>
						
                    
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                                <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo get_phrase('reset');?></button>
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      