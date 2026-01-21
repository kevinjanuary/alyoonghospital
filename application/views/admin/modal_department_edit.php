<?php 
$edit_data		=	$this->db->get_where('department' , array('department_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'admin/manage_department/do_update/'.$row['department_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                          <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('name');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="name" class="form-control m-r-10" value="<?php echo $row ['name']; ?>" required>
                                    </div>
                                </div>
								
								
								 <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?></label>
                                    <div class="col-md-12">
                             <textarea class="textarea_editor form-control m-r-10" rows="5" name="description"><?php echo $row ['description']; ?></textarea>

                                    </div>
                                </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_department');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>