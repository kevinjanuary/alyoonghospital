 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_patient');?>
							 <a href="<?php echo base_url();?>nurse/add_document" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_document');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('patient_name');?></th>
                                            <th><?php echo get_phrase('view_documents');?></th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									<?php 
						foreach($patient_documents as $row):
						?>
                                        <tr>
                                            <td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id']);?></td>
                                            <td>

                             <a href="<?php echo base_url();?>nurse/view_patient_document/<?php echo $row['patient_id'];?>"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-link"></i> </button></a>
                                         
             </tr>
			 <?php endforeach;?>
</tbody>
					

</table>
</div>
</div>
</div>
</div>
</div>

