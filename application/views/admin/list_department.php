 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_patient_document');?>
							 <a href="<?php echo base_url();?>admin/manage_department" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_department');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('departmentname');?></th>
                                            <th><?php echo get_phrase('description');?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php 
						foreach($list_departments as $row):
						?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td>
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/manage_department/delete/<?php echo $row['department_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_department_edit/<?php echo $row['department_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

