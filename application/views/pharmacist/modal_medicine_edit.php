<?php 
$edit_data		=	$this->db->get_where('medicine' , array('medicine_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'pharmacist/medicine/do_update/'.$row['medicine_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                         
						<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('name');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="name" value="<?php echo $row ['name']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('medicine_category');?></label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="medicine_category_id" data-style="btn-primary" required>
                                         <option value=""><?php echo get_phrase('select_medicine_category'); ?></option>
                                <?php
                                $parents = $this->db->get('medicine_category')->result_array();
                                foreach ($parents as $row3):
                                    ?>
                                    <option value="<?php echo $row3['medicine_category_id']; ?>"
                                            <?php if ($row['medicine_category_id'] == $row3['medicine_category_id']) echo 'selected'; ?>>
                                                <?php echo $row3['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
										 
                                    </select>
                                    </div>
                                </div>
									
									
								<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
									<textarea class="form-control" name="description"><?php echo $row ['description']; ?></textarea>


                                    </div>
                                </div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('price');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="price" value="<?php echo $row ['price']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('quantity');?>*</label>
                                    <div class="col-md-12">
									<input type="number" class="form-control" name="quantity" value="<?php echo $row ['quantity']; ?>" required>
									
									</div>
									</div>
									
									<div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('manufactured_by');?>*</label>
                                    <div class="col-md-12">
									<input type="text" class="form-control" name="manufacturing_company" value="<?php echo $row ['manufacturing_company']; ?>" required>
									
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
                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_medicine');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>