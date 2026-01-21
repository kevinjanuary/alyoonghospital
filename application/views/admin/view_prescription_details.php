				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase("prescription_information_page");?>
							
					<a href="<?php echo base_url();?>admin/list_prescription" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					<a href="<?php echo base_url();?>admin/add_prescription" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_prescription');?>
                    </a>
					
	<button type="button" name="b_print" class="btn btn-xs btn-info" onClick="printdiv('div_print');"><i class="fa fa-print"></i><?php echo get_phrase('print');?></button>	
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive" id="div_print">
                
				
				
<?php foreach($view_prescription_details as $row):?>			
				
<table class="table" width="1030" border="1">
 
 <div class="alert alert-default" align="center"><img src="<?php echo base_url() ?>uploads/logo.png"  class="img-circle" width="80" height="80"/>
					<h3><?php echo $system_name;?></h3>
					<?php $address = $this->db->get_where('settings', array('type' => 'address'))->row()->description;?>
					<?php echo $address; ?>
					<h5><?php $phone = $this->db->get_where('settings', array('type' => 'phone'))->row()->description;?></h5>
					<?php echo $phone; ?>&nbsp;&nbsp;Email:&nbsp;&nbsp;<?php $system_email = $this->db->get_where('settings', array('type' => 'system_email'))->row()->description;?>
					<?php echo $system_email; ?>

					</div>
					<hr>
 
  <tr>
    <td width="180" rowspan="4"><img src="<?php echo $this->crud_model->get_image_url('doctor',$row['doctor_id']);?>" alt="user" class="img-thumbnail img-responsive" width="260" height="260"></td>
    <td width="135"><div align="right">DOCTOR NAME</div></td>
<td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id']);?></td>  
</tr>
  <tr>
    <td><div align="right">GENDER</div></td>
	
    <td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->gender; ?></td>

  </tr>
  <tr>
    <td><div align="right">PHONE</div></td>
    <td>&nbsp;&nbsp;<?php echo $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->phone; ?></td>
  </tr>
  <tr>
    <td><div align="right">DEPARTMENT</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('department', array('department_id' => $row['department_id']))->row()->name; ?></td>
  </tr>
  
  <tr>
    <td colspan="3"><div class="alert alert-info">PATIENT FULL DETAILS</div> </td>
  </tr>
  <td width="180" rowspan="4"><img src="<?php echo $this->crud_model->get_image_url('patient',$row['patient_id']);?>" alt="user" class="img-thumbnail img-responsive" width="260" height="260"></td>
    <td width="135"><div align="right">PATIENT NAME</div></td>
<td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id']);?></td>  
</tr>
   <tr>
    <td><div align="right">SEX</div></td>
		

    <td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->sex; ?></td>
  </tr>
  <tr>
    <td><div align="right">AGE</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->age; ?></td>
  </tr>
  <tr>
    <td><div align="right">OCCUPATION</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->occupation; ?></td>
  </tr>
  
    <tr>
    <td><div align="right">PRESCRIPTION NUMBER</div></td>
    <td colspan="2">&nbsp;&nbsp;<strong><?php echo $row['presription_number']; ?></strong></td>
  </tr>
  
    <tr>
    <td><div align="right">PRESCRIPTION NAME</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row['presription_name']; ?></td>
  </tr>
  
  <tr>
    <td><div align="right">WEIGHT</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row['weight']; ?></td>
  </tr>
  
   <tr>
    <td><div align="right">HEIGHT</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row['height']; ?></td>
  </tr>


  <tr>
    <td><div align="right">BLOOD PRESSURE</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row['blood_pressure']; ?></td>
  </tr>
  
  
  <tr>
    <td><div align="right">PRESCRIPTION TYPE</div></td>
    <td colspan="2">&nbsp;&nbsp;<span class="label label-<?php if($row['type']=='new')echo 'success';else echo 'warning';?>"><?php echo $row['type'];?></span></td>
  </tr>
  
    
  <tr>
    <td><div align="right">VISITING FEE</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row['visiting_fee']; ?></td>
  </tr>
  
    <tr>
    <td><div align="right">CASE HISTORY</div></td>
    <td colspan="2">&nbsp;&nbsp; <button class="btn btn-sm btn-outline btn-rounded btn-info" type="button" data-toggle="collapse" data-target="#collapseExample11" aria-expanded="false" aria-controls="collapseExample"><?php echo get_phrase ('view_case_history');?></button>
                                    <div class="collapse m-t-15" id="collapseExample11">
                                        <div class="well"> <strong><?php echo $row ['case_history']; ?></strong> </div>
								    </div>
							</td>
  </tr>



 </table>
  <?php endforeach; ?>
<div class="alert alert-info">DIAGNOSE INFORMATION</div>

	<table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('diagnose'); ?></th>
                    <th><?php echo get_phrase('medicine_name'); ?></th>
					 <th><?php echo get_phrase('medicine_type'); ?></th>
                    <th><?php echo get_phrase('prescription'); ?></th>
                    <th><?php echo get_phrase('days'); ?></th>
                </tr>
            </thead>
			<tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
               // echo $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
               // $total_amount       = 0;
                $prescription_entries    = json_decode($row['prescription_entries']);
                $i = 1;
                foreach ($prescription_entries as $prescription_entry)
                {
                  //  $total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <?php echo $prescription_entry->diagnose; ?>
                        </td>
                        <td >
                            <?php echo $prescription_entry->medicine_name; ?>
                        </td>
						
                        <td>
                            <?php echo $prescription_entry->medicine_type; ?>
                        </td>
                        <td >
                            <?php echo $prescription_entry->prescription; ?>
                        </td>
						 <td >
                            <?php echo $prescription_entry->days; ?>
                        </td>
						
                    </tr>
                <?php } 
              //  $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']); 
			  ?>
            </div>
			
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
			</table>
			
  
				

                        </div>
						</div>
						</div>
						</div>
						</div>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>