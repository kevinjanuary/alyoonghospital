 <!-- .row -->
                <div class="row el-element-overlay">
                    <!-- .usercard -->
					                    
						<?php 
						foreach($patients as $row):
						?>	
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="white-box">
							
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>"><i class="icon-magnifier"></i></a></li>
                                            <li><a class="btn default btn-outline" href="<?php echo base_url();?>nurse/edit_patient_profile/<?php echo $row['patient_id'];?>"><i class="icon-link"></i></a></li>
                                            <li><a class="btn default btn-outline" href="<?php echo base_url();?>nurse/view_patient_profile/<?php echo $row['patient_id'];?>"><i class="icon-book-open "></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h3 class="box-title"><?php echo $row ['name'];?></h3> <small><?php echo $row ['occupation'];?></small>
                                    <br/> <small>Age: <?php echo $row ['age'];?> years</small> </div>
                            </div>
                        </div>
                    </div>
												<?php endforeach;?>

                    </div>