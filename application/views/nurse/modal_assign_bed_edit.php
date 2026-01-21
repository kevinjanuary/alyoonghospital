<?php 
$edit_data		=	$this->db->get_where('assign_bed' , array('assign_bed_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

                    <?php echo form_open(base_url() . 'nurse/assign_bed/do_update/'.$row['assign_bed_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                         <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('patient');?></label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="patient_id" data-style="btn-primary" required>
                                         <option value=""><?php echo get_phrase('select'); ?></option>
                                <?php
                                $parents = $this->db->get('patient')->result_array();
                                foreach ($parents as $row3):
                                    ?>
                                    <option value="<?php echo $row3['patient_id']; ?>"
                                            <?php if ($row['patient_id'] == $row3['patient_id']) echo 'selected'; ?>>
                                                <?php echo $row3['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
										 
                                    </select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('bed_type');?></label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="bed_type" data-style="btn-primary" required>
                                         <option value=""><?php echo get_phrase('select_add_type'); ?></option>
                                <?php
                                $parents = $this->db->get('add_bed')->result_array();
                                foreach ($parents as $row4):
                                    ?>
                                    <option value="<?php echo $row4['bed_type']; ?>"
                                            <?php if ($row['bed_type'] == $row4['bed_type']) echo 'selected'; ?>>
                                                <?php echo $row4['bed_type']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
										 
                                    </select>
                                    </div>
                                </div>
								
								 
									
									 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('assign_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="assign_date" type="date" value="assign_date" id="example-date-input" required>
                                    </div>
                                </div>
								
								 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('discharge_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control m-r-10" name="discharge_date" type="date" value="discharge_date" id="example-date-input" required>
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
								 <hr>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_assign_bed');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                </div>
			</div>