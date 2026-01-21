 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('shedule_list');?>
							 <a href="<?php echo base_url();?>receptionist/add_shedule" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_shedule');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
								<?php echo form_open(base_url() . 'receptionist/list_shedule');?>					
                            <select name="department_id" class="form-control select2" onchange='this.form.submit()'>
                              <option value=""><?php echo get_phrase('select_department_first');?></option>
                              		<?php 
									$department = $this->db->get('department')->result_array();
									foreach($department as $row):
										?>
                                		<option value="<?php echo $row['department_id'];?>">
												<?php echo $row['name'];?>
                                                </option>
                                    <?php
									endforeach;
								?>
                          </select>


				<input type="hidden" name="operation" value="selection">

<noscript><button type="submit" class="btn btn-green btn-icon icon-left"><i class="entypo-search"></i><?php echo get_phrase('get_doctor_list');?></button></noscript>

		<?php echo form_close();?>
		
		<hr>
		
		<?php if ($department_id != ''):?>
 				<?php 
                //STUDENTS ATTENDANCE
                $a   =   $this->db->get_where('department' , array('department_id'=>$department_id))->result_array();
                foreach($a as $row):
             
                    ?>
					
<div align="center"> SELECTED DEPARTMENT:&nbsp;<strong><?php echo $row['name']; ?></strong></div>
<?php endforeach; ?>
<hr>
										
								
								
								
								
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('doctor_name');?></th>
                                            <th><?php echo get_phrase('date');?></th>
                                            <th><?php echo get_phrase('start_time');?></th>
											
											<th><?php echo get_phrase('end_time');?></th>
                                            <th><?php echo get_phrase('patient_time');?></th>
                                            <th><?php echo get_phrase('department');?></th>
                                            <th><?php echo get_phrase('status');?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php
                        $department =  $this->db->get_where('shedule' , array('department_id'=>$department_id))->result_array();
                        foreach ($department as $row):
                            ?>
                                        <tr>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id']);?></td>
                                            <td><?php echo $row['avail_day'];?></td>
											<td><?php echo $row['start_time'];?></td>
                                            <td><?php echo $row['end_time'];?></td>
											<td><?php echo $row['per_patient_time'];?></td>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>
											<td>
											<span class="label label-<?php if($row['status']=='active')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
											</td>
                                            <td>
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>receptionist/add_shedule/delete/<?php echo $row['shedule_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                             <a href="<?php echo base_url();?>receptionist/edit_shedule_details/<?php echo $row['shedule_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
<?php endif; ?>
	<?php if ($department_id == ''):?>
				<div class="alert alert-warning" align="center">No Department Selected</div>
	<?php endif; ?>
</div>
</div>
</div>
</div>
</div>