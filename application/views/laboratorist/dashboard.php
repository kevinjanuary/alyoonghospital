<div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-warning"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('doctor');?></h4>
                                    <span class="text-muted"><a href="#">
<?php echo get_phrase('doctors');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-primary"></i>
                                <div class="bodystate">
                                    <h4><?php echo $this->db->count_all_results('nurse');?></h4>
                                    <span class="text-muted"><a href="#">
<?php echo get_phrase('nurses');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-success"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('patient');?></h4>
                                    <span class="text-muted"><a href="#">
<?php echo get_phrase('patients');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-info"></i>
                                <div class="bodystate">
                                     <h4><?php echo $this->db->count_all_results('receptionist');?></h4>
                                    <span class="text-muted"><a href="#">
<?php echo get_phrase('receptionists');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
		

	
		<div class="col-md-4 col-lg-4">
				  	<div class="panel panel-info">
                    <div class="panel-heading"><?php echo get_phrase('recently_added_doctors');?></div>
					<div class="panel-body">
 					<?php 

					$this->db->order_by('doctor_id' , 'desc');
					$this->db->limit('3');
                    $doctors	=	$this->db->get('doctor')->result_array();

                    foreach($doctors as $row):

                    ?>
					
					<div class="message-center">
<a href="#">
<div class="user-img"><img src="<?php echo $this->crud_model->get_image_url('doctor',$row['doctor_id']);?>" alt="user" class="img-circle"><span class="profile-status online pull-right"></span> </div>
<div class="mail-contnet">
<h5> <?php echo $row['name'];?></h5> <span class="mail-desc"><?php echo $row['gender'];?>&nbsp;<?php echo $row['phone'];?></span></div>
</a>
</div>
<?php endforeach;?>

</div>	
</div>
</div>	
					<div class="col-md-8 col-lg-8">
				  	<div class="panel panel-info">
                    <div class="panel-heading"><?php echo get_phrase('hospital_event');?></div>
					<div class="panel-body">
 					<?php 

					$this->db->order_by('notice_id' , 'desc');
					$this->db->limit('3');
                    $notices	=	$this->db->get('noticeboard')->result_array();
                    foreach($notices as $row):
                    ?>
					
					<div class="message-center">
<a href="#">
<div class="user-img"><img src="<?php echo base_url() ?>uploads/logo.png" alt="user" class="img-circle"><span class="profile-status online pull-right"></span> </div>
<div class="mail-contnet">
<h5> <?php echo $row['notice_title'];?></h5> <span class="mail-desc"><?php echo $row['notice'];?>&nbsp;<?php echo date('d',$row['create_timestamp']);?>&nbsp;<?php echo date('M',$row['create_timestamp']);?></span></div>
</a>
</div>
<?php endforeach;?>

</div>	
</div>

</div>


			
	
</div> 
   
  