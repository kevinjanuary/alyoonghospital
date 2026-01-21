 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-list"></i> &nbsp;<?php echo get_phrase('list_all_bed');?>
							 <a href="<?php echo base_url();?>nurse/add_bed" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_bed');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('bed_type');?></th>
                                            <th><?php echo get_phrase('bed_capacity');?></th>
											<th><?php echo get_phrase ('charge'); ?></th>
											<th><?php echo get_phrase ('status'); ?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php 
						foreach($list_beds as $row):
						?>
                                        <tr>
                                            <td><?php echo $row['bed_type'];?></td>
                                            <td><?php echo $row['bed_capacity'];?></td>
											<td><?php $currency = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?><?php echo $currency; ?>&nbsp;<?php echo $row['charge'];?></td>
                                            <td>
											<span class="label label-<?php if($row['status']=='active')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
</td>
                                            <td>
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>nurse/add_bed/delete/<?php echo $row['add_bed_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_bed_edit/<?php echo $row['add_bed_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a></td>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

