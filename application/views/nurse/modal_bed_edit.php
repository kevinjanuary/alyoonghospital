<?php 
$edit_data		=	$this->db->get_where('add_bed' , array('add_bed_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'nurse/add_bed/do_update/'.$row['add_bed_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                          <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('bed_type');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="bed_type"/ required value="<?php echo $row ['bed_type']; ?>">
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('bed_capacity');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="bed_capacity"/ value="<?php echo $row ['bed_capacity']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('charge');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="charge"/ value="<?php echo $row ['charge']; ?>" required>
									
									</div>
									</div>
									   	   		
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"><?php echo $row ['description']; ?></textarea>


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

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_bed');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>