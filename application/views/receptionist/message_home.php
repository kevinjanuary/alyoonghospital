<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('all_messages');?>
							 <a href="<?php echo base_url(); ?>receptionist/message/message_new" class="btn btn-green btn-sm "> <i class="fa fa-plus"></i> <?php echo get_phrase('compose_new_message'); ?>
               
            </a>

					</div>

            
<div class="panel-body table-responsive">
<table class="table" >
                	<thead>
                		<tr>
						<th>Sender</th>
						<th>Message</th>
						<th>Actions</th>
						</tr>
					</thead>
                    <tbody>
					<?php
					$current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
					$this->db->where('sender', $current_user);
					$this->db->or_where('reciever', $current_user);
					$message_threads = $this->db->get('message_thread')->result_array();
					foreach ($message_threads as $row):

                	// defining the user to show
                	if ($row['sender'] == $current_user)
                    $user_to_show = explode('-', $row['reciever']);
                	if ($row['reciever'] == $current_user)
                    $user_to_show = explode('-', $row['sender']);

                $user_to_show_type = $user_to_show[0];
                $user_to_show_id = $user_to_show[1];
                $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                ?>
					 <tr>
					<td><?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'active'; ?>
                    <a href="<?php echo base_url(); ?>receptionist/message/message_read/<?php echo $row['message_thread_code']; ?>" style="padding:12px;">
                        <i class="fa fa-envelope"></i>

                        <?php echo $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?>
						
					 <?php if ($unread_message_number > 0): ?>
                            <span>
                                <?php echo $unread_message_number; ?> New Message(s)
                            </span>
                        <?php endif; ?></a>
                 
					</td>
					<td><a href="<?php echo base_url(); ?>receptionist/message/message_read/<?php echo $row['message_thread_code']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i>&nbsp;<?php echo get_phrase ('read_message'); ?></button></a>
					</td>
					<td>  <a href="<?php echo base_url(); ?>receptionist/message/message_read/<?php echo $row['message_thread_code']; ?>"><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-mail-reply-all"></i></button></a></td>
					</tr>
		  <?php endforeach; ?>
                    </tbody>
                </table>
				
				<?php if($row['message_thread_code'] == ''):?>
							<div class="alert alert-danger" align="center">No message for you, Please check back later !</div>
							<?php endif;?>
				
 

    <div>
      <!-- SELECT INBOX MESSAGE -->
    </div>
</div>
</div>
</div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      