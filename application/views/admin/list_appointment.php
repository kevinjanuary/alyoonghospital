 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('add_appointment');?>
							 <a href="<?php echo base_url();?>admin/add_appointment" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_appointment');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
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
						foreach($list_appointments as $row):
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
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/add_appointment/delete/<?php echo $row['appointment_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                             <a href="<?php echo base_url();?>admin/edit_appointment_details/<?php echo $row['appointment_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
							 
                             <a href="<?php echo base_url();?>admin/view_appointment_details/<?php echo $row['appointment_id'].'/'. $row['patient_id'].'/'.$row['department_id'].'/'. $row['doctor_id'].'/';?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-link"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

