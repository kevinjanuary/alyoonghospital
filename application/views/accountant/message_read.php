<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('chat_page');?>
							 <a href="<?php echo base_url(); ?>accountant/message/message_new" class="btn btn-green btn-sm "> <i class="fa fa-plus"></i> <?php echo get_phrase('compose_new_message'); ?></a>
</div>

<?php
$messages = $this->db->get_where('message', array('message_thread_code' => $current_message_thread_code))->result_array();
foreach ($messages as $row):

    $sender = explode('-', $row['sender']);
    $sender_account_type = $sender[0];
    $sender_id = $sender[1];
    ?>
     <div class="panel-body table-responsive">
        <div class="mail-sender " style="padding:5px;">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" class="img-circle" width="30" height="30"> 
                <span><?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?></span>
            </a>
			 <span class="label label-success pull-right"><?php echo date("d M, Y", $row['timestamp']); ?></span> 
        </div>
    </div>
      <div class="panel-body table-responsive">	
        <p align="justify"> <?php echo $row['message']; ?></p>
    	</div>

<?php endforeach; ?>

<?php echo form_open(base_url() . 'accountant/message/send_reply/' . $current_message_thread_code, array('enctype' => 'multipart/form-data')); ?>
                                <div class="panel-body table-responsive">

        <textarea row="5" class="form-control" name="message" placeholder="<?php echo get_phrase('reply_message'); ?>" id="mymce"></textarea>
    </div>
	
      <div class="panel-body table-responsive">	
    <button type="submit" class="btn btn-success btn-sm btn-icon"><i class="fa fa-envelope"></i>&nbsp;<?php echo get_phrase('send_message'); ?></button>
	</div>
	</div>
</form>

</div>
</div>
</div>