 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('shedule_list');?>
							 <a href="<?php echo base_url();?>doctor/add_shedule" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_shedule');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
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
						foreach($list_shedules as $row):
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
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>doctor/add_shedule/delete/<?php echo $row['shedule_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                             <a href="<?php echo base_url();?>doctor/edit_shedule_details/<?php echo $row['shedule_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

