 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_all_donors');?>
							 <a href="<?php echo base_url();?>laboratorist/add_donor" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_donor');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('name');?></th>
                                            <th><?php echo get_phrase('age');?></th>
											<th><?php echo get_phrase ('sex'); ?></th>
											<th><?php echo get_phrase ('email'); ?></th>
											<th><?php echo get_phrase ('blood_group'); ?></th>
                                            <th><?php echo get_phrase('last_donation_date');?></th>
                                            <th><?php echo get_phrase('actions');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php 
						foreach($list_donors as $row):
						?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['age'];?></td>
											
											<td><?php echo $row['sex'];?></td>
											<td><?php echo $row['email'];?></td>
											<td><?php echo $row['blood_group'];?></td>
											<td><?php echo date('d M,Y',$row['last_donation_timestamp']);?></td>
											
                                           
                                            <td>
																					<a href="#" onclick="confirm_modal('<?php echo base_url();?>laboratorist/add_donor/delete/<?php echo $row['blood_donor_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_blood_donor_edit/<?php echo $row['blood_donor_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

