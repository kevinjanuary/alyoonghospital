 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"><i class="fa fa-list"></i> &nbsp;<?php echo get_phrase('view_payment_history');?>
							 <a href="<?php echo base_url();?>admin/view_payment" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
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
        					<?php
							$this->db->where ('patient_id', $patient_id);
                    		$this->db->where('status' , 'paid');
                    		$this->db->order_by('creation_timestamp' , 'desc');
                    		$invoices = $this->db->get('invoice')->result_array();
                    		foreach($invoices as $row):
                    		?>
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
                <td>
		<span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
				</td>
                <td>
						                             <a href="<?php echo base_url();?>admin/view_invoice_details/<?php echo $row['invoice_id'];?>"><button type="button" class="btn btn-primary btn-circle btn-xs"><i class="fa fa-print"></i> </button></a>

				
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

