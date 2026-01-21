				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_shedule');?>
							<a href="<?php echo base_url();?>doctor/list_shedule/<?php echo $this->session->userdata('login_user_id'); ?>" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
					<?php foreach($edit as $row):?>			

						<?php echo form_open(base_url() . 'doctor/add_shedule/do_update/'.$row['shedule_id'] , array('class' => 'form-horizontal form-groups-bordered 			validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
					
                          <div class="form-group">
                                    <label class="col-sm-12"><?php // echo get_phrase('doctor');?></label>
                                    <div class="col-sm-12">
                                  <?php echo $this->crud_model->get_type_name_by_id('doctor' ,$this->session->userdata('doctor_id') , 'name');?>

                                    <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('doctor_id');?>"  />
                                    </div>
                                </div>
								
								 <div class="form-group">
                                      <label class="col-md-12" for="example-text"><?php echo get_phrase('shedule_date');?>*</span></label>
                                    <div class="col-md-12">
                                        <input class="form-control select2 m-r-10" name="avail_day" type="date" value="<?php echo $row['avail_day']; ?>" id="example-date-input" required>
                                    </div>
                                </div>
								
								
								 <div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('department');?>*</label>
                                    <div class="col-sm-12">
                                   <select class="form-control" name="department_id" data-style="btn-primary" required>
                                         <option value=""><?php echo get_phrase('select'); ?></option>
                                <?php
                                $department = $this->db->get('department')->result_array();
                                foreach ($department as $row4):
                                    ?>
                                    <option value="<?php echo $row4['department_id']; ?>"
                                            <?php if ($row['department_id'] == $row4['department_id']) echo 'selected'; ?>>
                                                <?php echo $row4['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
										 
                                    </select>
                                    </div>
                                </div>
								
								<div class="col-md-12">
								<div class="form-group">
									<div class="input-group clockpicker">
                                    <input class="form-control" id="single-input" name="start_time" value="<?php echo $row['start_time']; ?>" placeholder="Start date">
                                     <span class="input-group-btn">
                  					<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('start_time');?></button>
                 					</span> 

									</div>
                                    </div>
                                    </div>
									
									
									<div class="col-md-12">
								<div class="form-group">
								 <div class="input-group clockpicker">
                                <input class="form-control" id="single-input" name="end_time" value="<?php echo $row['end_time']; ?>" placeholder="End date">
                                <span class="input-group-btn">
                  				<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('end_time');?></button>
                  				</span> 

                                </div>
								</div>
                                </div>
								
								
								<div class="col-md-12">
								<div class="form-group">
								 <div class="input-group clockpicker">
                     <input class="form-control" id="single-input" name="per_patient_time" value="<?php echo $row['per_patient_time']; ?>" placeholder="Time for each patient">
                                <span class="input-group-btn">
                  				<button type="button" id="check-minutes" class="btn waves-effect waves-light btn-success"><?php echo get_phrase('per_patient_time');?></button>
                  				</span> 

                                </div>
								</div>
                                </div>
								
								
								<div class="form-group">
                                    <div class="col-sm-12">
                                  <input type="radio" class="check" id="square-radio-1" name="status" value="active" data-radio="iradio_square-red">
                                <label for="square-radio-1"><?php echo get_phrase('active');?></label>
                                          
                                  <input type="radio" class="check" id="square-radio-2" name="status" value="inactive" checked data-radio="iradio_square-red">
                                 <label for="square-radio-2"><?php echo get_phrase('inactive');?></label>
								 </div>
								 </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('update_shedule');?></button>
                        </div>
                    </form>
					<br>
                    <?php endforeach;?>
                        </div>
						</div>
						</div>
						</div></div>
						</div>
                    
      