				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase("appointment_information");?>
							
					<a href="<?php echo base_url();?>doctor/list_appointment/<?php echo $this->session->userdata('login_user_id'); ?>" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					
					<a href="<?php echo base_url();?>doctor/add_appointment" 
                     class="btn btn-orange btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_new_appointment');?>
                    </a>
					
	<button type="button" name="b_print" class="btn btn-xs btn-info" onClick="printdiv('div_print');"><i class="fa fa-print"></i><?php echo get_phrase('print');?></button>	
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive" id="div_print">
                
				
				
<?php foreach($view_appointment_details as $row):?>			
				
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
    <td colspan="2">&nbsp;&nbsp;<?php echo $this->crud_model->get_type_name_by_id('department',$row['department_id']);?></td>
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
    <td colspan="3"><div class="alert alert-info">PATIENT APPOINTMENT DETAILS</div> </td>
  </tr>
   <tr>
    <td><div align="right">APPOINT CODE</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row ['appointment_code']; ?></td>
  </tr>
  <tr>
    <td><div align="right">SHEDULE</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row ['shedule']; ?></td>
  </tr>
  <tr>
    <td><div align="right">SICKNESS INFORMATION</div></td>
    <td colspan="2">&nbsp;&nbsp;<?php echo $row ['issue']; ?></td>
  </tr>
  
 <?php endforeach; ?>
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