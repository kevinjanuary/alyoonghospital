 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;<?php echo get_phrase('list_appointment');?>
							 
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
							 
                             <a href="<?php echo base_url();?>patient/view_appointment_details/<?php echo $row['appointment_id'].'/'. $row['patient_id'].'/'.$row['department_id'].'/'. $row['doctor_id'].'/';?>"><button type="button" class="btn btn-info  btn-sm"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('view_appointment');?> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

