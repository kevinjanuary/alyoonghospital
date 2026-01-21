 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('list_all_invoices');?>
							 <a href="<?php echo base_url();?>accountant/invoice_add" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_invoice');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><?php echo get_phrase('invoice_no'); ?></th>
            <th><?php echo get_phrase('title'); ?></th>
            <th><?php echo get_phrase('patient'); ?></th>
            <th><?php echo get_phrase('creation_date'); ?></th>
            <th><?php echo get_phrase('due_date'); ?></th>
            <th><?php echo get_phrase('vat_%'); ?></th>
            <th><?php echo get_phrase('discount'); ?></th>
            <th><?php echo get_phrase('status'); ?></th>
            <th><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($invoice_info as $row) { ?>   
            <tr>
                <td><?php echo $row['invoice_number'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo $row['creation_timestamp'] ?></td>
                <td><?php echo $row['due_timestamp'] ?></td>
                <td><?php echo $row['vat_percentage'] ?></td>
                <td><?php echo $row['discount_amount'] ?></td>
                <td><span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
</td>
                <td>
                    <a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_invoice/<?php echo $row['invoice_id'] ?>');" 
                        class="btn btn-info btn-sm btn-circle ">
                        <i class="fa fa-edit"></i></a>
						

						
						                             <a href="<?php echo base_url();?>accountant/view_invoice_details/<?php echo $row['invoice_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-print"></i> </button></a>




						
	<a href="#" onclick="confirm_modal('<?php echo base_url();?>accountant/list_invoice/delete/<?php echo $row['invoice_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i> </button></a>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

