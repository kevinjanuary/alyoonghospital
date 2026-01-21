				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_bed');?>
							<a href="<?php echo base_url();?>nurse/list_bed" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_beds');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'nurse/add_bed/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('bed_type');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="bed_type"/ required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('bed_capacity');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="bed_capacity"/ required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('charge');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="charge"/ required>
									
									</div>
									</div>
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"></textarea>


                                    </div>
                                </div>
								
								<hr>
								<div class="form-group">
                                    <div class="col-sm-12">
                                  <input type="radio" class="check" id="square-radio-1" name="status" value="active" data-radio="iradio_square-red" required>
                                <label for="square-radio-1"><?php echo get_phrase('active');?></label>
                                          
                                  <input type="radio" class="check" id="square-radio-2" name="status" value="inactive" checked data-radio="iradio_square-red" required>
                                 <label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
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
                    
      