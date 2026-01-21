 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_nurse_by_department');?>
							 <a href="<?php echo base_url();?>doctor/list_nurse" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('all_doctors');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								
								
								
								
								
								<?php echo form_open(base_url() . 'accountant/search_nurse');?>					
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

<noscript><button type="submit" class="btn btn-green btn-icon icon-left"><i class="fa fa-search"></i><?php echo get_phrase('filter_nurse_list');?></button></noscript>

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
                            <th width="80"><div><?php echo get_phrase('id'); ?></div></th>
                            <th width="80"><div><?php echo get_phrase('photo'); ?></div></th>
                            <th><div><?php echo get_phrase('name'); ?></div></th>
                            <th><div><?php echo get_phrase('mother_tongue'); ?></div></th>
                            <th><div><?php echo get_phrase('date_of_birth'); ?></div></th>
                            <th><div><?php echo get_phrase('religion'); ?></div></th>
                            <th><div><?php echo get_phrase('gender'); ?></div></th>
                            <th><div><?php echo get_phrase('email'); ?></div></th>
                            <th><div><?php echo get_phrase('phone'); ?></div></th>
                            <th><div><?php echo get_phrase('options'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $department =  $this->db->get_where('nurse' , array('department_id'=>$department_id))->result_array();
                        foreach ($department as $row):
                            ?>
                            <tr>
                                <td><?php echo $row['nurse_id']; ?></td>
                                <td><img src="<?php echo $this->crud_model->get_image_url('nurse', $row['nurse_id']); ?>" class="img-circle" width="30" height="30" /></td>
                                <td><?php echo $row['name']; ?></td>
								<td><?php echo $row['mother_tongue']; ?></td>
                                <td><?php echo $row['date_of_birth']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td>
								
																								 <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_nurse_message/<?php echo $row['nurse_id']; ?>');"><button type="button" class="btn btn-info btn-circle btn-sm"><i class="fa fa-envelope"></i></button></a>
											           
                                </td>
                            </tr>
                        <?php endforeach; ?>
						
						
		
                    </tbody>
                </table>
<?php endif;?>
	<?php if ($department_id == ''):?>
				<div class="alert alert-danger" align="center">No Information Selected</div>
	<?php endif; ?>





		
</div>
</div>
</div>
</div>
</div>

