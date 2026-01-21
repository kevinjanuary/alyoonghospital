<?php 
foreach ($view_invoice_details as $row):
?>
	<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('print_invoice');?>
							 <a href="<?php echo base_url();?>patient/list_invoice/<?php echo $this->session->userdata('login_user_id'); ?>" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					</div>
					                                <div class="panel-body table-responsive">

    					<div id="invoice_print">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <tr>
                <td width="50%"><img src="<?php echo base_url() ?>uploads/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><?php echo get_phrase('invoice_number'); ?> : <?php echo $row['invoice_number']; ?></h4>
                    <h5><?php echo get_phrase('issue_date'); ?> : <?php echo $row['creation_timestamp']; ?></h5>
                    <h5><?php echo get_phrase('due_date'); ?> : <?php echo $row['due_timestamp']; ?></h5>
                    <h5><?php echo get_phrase('status'); ?> : <strong style="color:#FF0000"><?php echo $row['status']; ?></strong></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo get_phrase('payment_to'); ?> </h4></td>
                <td align="right"><h4><?php echo get_phrase('bill_to'); ?> </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td align="right" valign="top">
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name; ?><br>
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->address; ?><br>
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->phone; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?php echo get_phrase('invoice_entries'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('entry'); ?></th>
                    <th><?php echo get_phrase('price'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
                $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
                $total_amount       = 0;
                $invoice_entries    = json_decode($row['invoice_entries']);
                $i = 1;
                foreach ($invoice_entries as $invoice_entry)
                {
                    $total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo $invoice_entry->description; ?>
                        </td>
                        <td class="text-right">
                            <?php echo $currency_symbol . $invoice_entry->amount; ?>
                        </td>
                    </tr>
                <?php } 
                $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']); ?>
            </div>
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
        </table>
        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('sub_total'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $total_amount; ?></td>
            </tr>
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('vat_percentage'); ?> :</td>
                <td align="right"><?php echo $row['vat_percentage']; ?>% </td>
            </tr>
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('discount'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $row['discount_amount']; ?> </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('grand_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $grand_total; ?> </h4></td>
            </tr>
        </table>
<hr>
<div align="right">       
<form method="POST" action="https://voguepay.com/pay/">
<input type="hidden" name="v_merchant_id" value="<?php echo $this->db->get_where('settings', array('type' => 'vogue'))->row()->description; ?>" />
<input type="hidden" name="memo" value="Payment to <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>" />
<input type="hidden" name="success_url" value="<?php echo base_url();?>patient/success_payment_return/<?php echo $row['invoice_id'];?>" />
<input type="hidden" name="merchant_ref" value="<?php echo $this->db->get_where('settings', array('type' => 'vogue'))->row()->description; ?>" />
<input type="hidden" name="cur" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>" />
<input type="hidden" name="item_1" value="<?php echo $row['invoice_number']; ?>" />
<input type="hidden" name="price_1" value="<?php echo $grand_total; ?>" />
<input type="hidden" name="description_1" value="Payment For <?php echo $row['invoice_number']; ?>" /><br />
<input type="image" src="<?php echo base_url() ?>uploads/pay.jpg" alt="PAY"/>
</form>
</div>   
	   
    </div>

  </div>  </div>  </div></div>
<?php endforeach;?>




<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>