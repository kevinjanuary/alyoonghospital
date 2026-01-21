<?php 
$edit_data		=	$this->db->get_where('blood_bank' , array('blood_group_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'admin/add_blood/do_update/'.$row['blood_group_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                          <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('blood_group');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="blood_group" class="form-control m-r-10" value="<?php echo $row ['blood_group']; ?>" required>
                                    </div>
                                </div>
								
								
								 <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('quantity');?></label>
                                    <div class="col-md-12">
                             <input class="form-control m-r-10" name="status" value="<?php echo $row ['status']; ?>">

                                    </div>
                                </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_blood_bank');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>