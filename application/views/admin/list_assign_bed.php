 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_all_assigned_bed');?>
							 <a href="<?php echo base_url();?>admin/assign_bed" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('assign_new_bed');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('patient_id');?></th>
                                            <th><?php echo get_phrase('bed_type');?></th>
											<th><?php echo get_phrase ('assign_date'); ?></th>
											<th><?php echo get_phrase ('discharge_date'); ?></th>
                                            <th><?php echo get_phrase('status');?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php 
						foreach($list_assign_beds as $row):
						?>
                                        <tr>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id']);?></td>
                                            <td><?php echo $row['bed_type'];?></td>
											
											<td><?php echo $row['assign_date'];?></td>
											<td><?php echo $row['discharge_date'];?></td>
                                            <td>
											<span class="label label-<?php if($row['status']=='active')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
</td>
                                            <td>
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/assign_bed/delete/<?php echo $row['assign_bed_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_assign_bed_edit/<?php echo $row['assign_bed_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

