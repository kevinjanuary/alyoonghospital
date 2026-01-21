				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_category');?>
							<a href="<?php echo base_url();?>pharmacist/list_category" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('list_categories');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
<?php echo form_open(base_url() . 'pharmacist/add_customer/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

								
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('customer_name');?>*</label>
                                    <div class="col-md-12">
							<input type="text" class="form-control" name="customer_name"/>
									
									</div>
									</div>
									
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('customer_email');?>*</label>
                                    <div class="col-md-12">
							<input type="text" class="form-control" name="email"/>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('customer_mobile');?>*</label>
                                    <div class="col-md-12">
							<input type="number" class="form-control" name="mobile"/>
									
									</div>
									</div>
									
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('customer_address');?>*</label>
                                    <div class="col-md-12">
									<textarea  class="form-control" name="address"/></textarea>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('previous_balance');?>*</label>
                                    <div class="col-md-12">
							<input type="number" class="form-control" name="previous_balance"/>
									
									</div>
									</div>
									   	   		
								<hr>
                               <input type="submit" id="add-customer" class="btn btn-primary btn-large" name="add-customer" value="<?php echo get_phrase('save');?>" />
								<input type="submit" value="<?php echo get_phrase('save_and_add_another');?>" name="add-customer-another" class="btn btn-large btn-success" id="add-customer-another">
                    <?php echo form_close();?>                
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      