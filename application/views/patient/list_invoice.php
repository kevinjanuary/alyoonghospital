 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-list"></i>&nbsp; <?php echo get_phrase('list_all_invoices');?>
							 
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
        <?php foreach ($list_invoices as $row) { ?>   
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
				
				<?php if ($row ['status']=='paid'):?>
					<a href="<?php echo base_url();?>patient/view_invoice_details/<?php echo $row['invoice_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-print"></i> </button></a>

				<?php endif; ?>
				
				<?php if ($row ['status']=='unpaid'):?>
<a href="<?php echo base_url();?>patient/pay_with_vogue/<?php echo $row['invoice_id'];?>"><button type="button" class="btn btn-info  btn-sm"><i class="fa fa-money"></i> <?php echo get_phrase('pay_with_vogue');?></button></a>
<?php endif; ?>

<?php if ($row ['status']=='unpaid'):?>

<a href="<?php echo base_url();?>patient/pay_with_paypal/<?php echo $row['invoice_id'];?>"><button type="button" class="btn btn-primary  btn-sm"><i class="fa fa-paypal"></i> <?php echo get_phrase('pay_with_paypal');?></button></a>
						               			
<?php endif; ?>
				
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

