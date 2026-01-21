<?php 
foreach ($view_invoice_details as $row):
    // Get Midtrans settings
    $midtrans_server_key = $this->db->get_where('settings', array('type' => 'midtrans_server_key'))->row();
    $midtrans_server_key = $midtrans_server_key ? $midtrans_server_key->description : '';
    
    $midtrans_client_key = $this->db->get_where('settings', array('type' => 'midtrans_client_key'))->row();
    $midtrans_client_key = $midtrans_client_key ? $midtrans_client_key->description : '';
    
    // Calculate grand total
    $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']);
    $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
    
    // Get patient info
    $patient = $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row();
    
    // Cek apakah sudah ada payment link untuk invoice ini (hanya jika invoice masih unpaid)
    $payment_link = '';
    
    // Gunakan invoice_number sebagai source of truth
    // Tambahkan prefix "INV-" jika belum ada
    $invoice_number = $row['invoice_number'];
    $invoice_number_with_prefix = (strpos($invoice_number, 'INV-') === 0) ? $invoice_number : 'INV-' . $invoice_number;
    
    if ($row['status'] == 'unpaid') {
        // Cek payment link berdasarkan invoice_number
        $existing_payment = $this->db->get_where('payment', array(
            'invoice_number' => $invoice_number_with_prefix,
            'payment_method' => 'midtrans'
        ))->row();
        
        // Jika sudah ada payment link, ambil dari description
        if ($existing_payment && !empty($existing_payment->description)) {
            $payment_data_json = json_decode($existing_payment->description, true);
            if (isset($payment_data_json['payment_url'])) {
                $payment_link = $payment_data_json['payment_url'];
            }
        }
        
        // Jika belum ada payment link, buat yang baru
        if (empty($payment_link) && !empty($midtrans_server_key)) {
        // Order ID akan otomatis ditambahkan timestamp oleh Midtrans
        // Format: INV-{invoice_number}-{timestamp}
        $order_id = $invoice_number_with_prefix;
        $amount = (int) $grand_total;
        
        // Prepare payment link request
        $payment_data = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $amount
            ),
            'item_details' => array(
                array(
                    'id' => $row['invoice_id'],
                    'price' => $amount,
                    'quantity' => 1,
                    'name' => $row['title'] . ' - ' . $row['invoice_number']
                )
            ),
            'customer_details' => array(
                'first_name' => $patient->name,
                'email' => $patient->email ? $patient->email : 'patient@example.com',
                'phone' => $patient->phone
            ),
            'callbacks' => array(
                'finish' => base_url() . 'patient/midtrans_success/' . $row['invoice_id'],
                'unfinish' => base_url() . 'patient/midtrans_unfinish/' . $row['invoice_id'],
                'error' => base_url() . 'patient/midtrans_error/' . $row['invoice_id']
            )
        );
        
        // Create payment link using Midtrans Payment Link API
        $is_sandbox = (strpos($midtrans_server_key, 'SB-') === 0);
        $api_url = $is_sandbox ? 'https://api.sandbox.midtrans.com/v1/payment-links' : 'https://api.midtrans.com/v1/payment-links';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payment_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($midtrans_server_key . ':')
        ));
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $payment_link_response = json_decode($response, true);
        
        if ($http_code == 200 && isset($payment_link_response['payment_url'])) {
            $payment_link = $payment_link_response['payment_url'];
            
            // Simpan payment link ke table payment (sesuai struktur tabel)
            $payment_record = array(
                'invoice_number' => $invoice_number_with_prefix,
                'payment_method' => 'midtrans',
                'amount' => (string)$amount,
                'type' => 'income',
                'title' => $row['title'],
                'description' => json_encode(array('payment_url' => $payment_link, 'order_id' => $order_id)),
                'timestamp' => strtotime(date("m/d/Y")),
                'year' => date('Y')
            );
            
            $this->db->insert('payment', $payment_record);
        }
        }
    }
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
                    <?php echo $patient->name; ?><br>
                    <?php echo $patient->address; ?><br>
                    <?php echo $patient->phone; ?><br>
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
                <?php } ?>
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
    <?php if ($payment_link && $payment_link != '#'): ?>
        <a href="<?php echo $payment_link; ?>" target="_blank" class="btn btn-primary btn-sm">
            <i class="fa fa-credit-card"></i> <?php echo get_phrase('pay_with_midtrans');?>
        </a>
    <?php else: ?>
        <div class="alert alert-danger">
            <?php echo get_phrase('payment_link_error'); ?> 
            <br>
            <small><?php echo isset($payment_link_response['status_message']) ? $payment_link_response['status_message'] : 'Error creating payment link'; ?></small>
        </div>
    <?php endif; ?>
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
