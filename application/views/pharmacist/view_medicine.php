				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_all_medicines');?>
							<a href="<?php echo base_url();?>pharmacist/medicine" 
                     class="btn btn-orange btn-xs"><i class="fa fa-link"></i>&nbsp;<?php echo get_phrase('add_medicine');?>
                    </a>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('name');?></div></th>

                    		<th><div><?php echo get_phrase('category');?></div></th>

                    		<th><div><?php echo get_phrase('description');?></div></th>

                    		<th><div><?php echo get_phrase('price');?></div></th>
                    		<th><div><?php echo get_phrase('quantity');?></div></th>

							<th><?php echo get_phrase ('status'); ?></th>

                    		<th><div><?php echo get_phrase('manufacturer');?></div></th>
							<th><div><?php echo get_phrase('actions');?></div></th>


						</tr>

					</thead>

                    <tbody>

                    	<?php 

						$count = 1;

						foreach($medicines as $row):

							?>

							<tr>

								<td><?php echo $count++;?></td>

								<td><?php echo $row['name'];?></td>

                                <td><?php echo $this->crud_model->get_type_name_by_id('medicine_category',$row['medicine_category_id'],'name');?></td>

								<td><?php echo $row['description'];?></td>

								<td><?php $currency = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;?><?php echo $currency; ?>&nbsp;<?php echo $row['price'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td>
											<span class="label label-<?php if($row['status']=='active')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
</td>
                                        

								<td><?php echo $row['manufacturing_company'];?></td>
								 <td>
						<a href="#" onclick="confirm_modal('<?php echo base_url();?>pharmacist/medicine/delete/<?php echo $row['medicine_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_medicine_edit/<?php echo $row['medicine_id'];?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i> </button></a></td>

							</tr>

							<?php 

						endforeach;

						?>

                    </tbody>

                </table>
								
								
								
</div>
</div>
</div>
</div>
</div>
