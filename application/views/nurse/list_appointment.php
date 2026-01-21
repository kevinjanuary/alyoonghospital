 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-list"></i>&nbsp; <?php echo get_phrase('list_appointment');?>
							
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
								<?php echo form_open(base_url() . 'nurse/list_appointment');?>					
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
                                            <th><?php echo get_phrase('code');?></th>
                                            <th><?php echo get_phrase('patient_name');?></th>
                                            <th><?php echo get_phrase('department_name');?></th>
                                            <th><?php echo get_phrase('doctor_name');?></th>
											
											<th><?php echo get_phrase('shedule_time');?></th>
                                            <th><?php echo get_phrase('date_created');?></th>
                                            <th><?php echo get_phrase('status');?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									 <?php
                        $department =  $this->db->get_where('appointment' , array('department_id'=>$department_id))->result_array();
                        foreach ($department as $row):
                            ?>
                                        <tr>
                                            <td><?php echo $row['appointment_code'];?></td>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id']);?></td>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>
											<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id']);?></td>
                                            <td><?php echo $row['shedule'];?></td>
                                            <td><?php echo date('d M,Y', $row['create_timestamp']);?></td>
											<td>
											<span class="label label-<?php if($row['status']=='active')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
											</td>
                                            <td>

							 
                             <a href="<?php echo base_url();?>nurse/view_appointment_details/<?php echo $row['appointment_id'].'/'. $row['patient_id'].'/'.$row['department_id'].'/'. $row['doctor_id'].'/';?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-link"></i> </button></a>
                                         
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

