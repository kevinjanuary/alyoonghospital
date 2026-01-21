<div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
					 <?php echo get_phrase('language_information_page'); ?>
				
				<?php 
	$language = $this->db->get_where('settings' , array(
		'type' => 'language'
	))->row()->description;
?>

<?php if ($language == 'english'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'arabic'):?>  
<span class="badge bg-orange" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'spanish'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'russian'):?>  
<span class="badge bg-blue" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'turkish'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'hindi'):?>  
<span class="badge bg-blue" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'german'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'french'):?>  
<span class="badge bg-blue" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'chinese'):?>  
<span class="badge bg-orange" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'bengali'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'portuguese'):?>  
<span class="badge bg-green" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>


<?php if ($language == 'thai'):?>  
<span class="badge bg-blue" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>


<?php if ($language == 'japanese'):?>  
<span class="badge bg-red" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'urdu'):?>  
<span class="badge bg-green" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>

<?php if ($language == 'korean'):?>  
<span class="badge bg-blue" style="color:#FFFFFF"><?php echo get_phrase('active_language');?>:&nbsp;<?php echo $language; ?></span>
<?php endif;?>


 <a href="<?php echo base_url(); ?>admin/manage_language"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?></button></a>

<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_language_add/');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_language');?></button></a>

<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_phrase_add/');"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_string');?></button></a>
				</div>
	


<div class="table-responsive">
		<div class="tab-content">
            <!----PHRASE EDITING TAB STARTS-->
            <?php if (isset($edit_profile)):?>
			<div class="tab-pane active" id="edit" style="padding: 5px">
                    <div class="col-lg-12 col-sm-12">
						<div class="panel-body table-responsive">
                    	<?php 
						$current_editing_language	=	$edit_profile;
						echo form_open('admin/manage_language/update_phrase/'.$current_editing_language  , array('id' => 'phrase_form'));
						$count = 1;
						$language_phrases	=	$this->db->query("SELECT `phrase_id` , `phrase` , `$current_editing_language` FROM `language`")->result_array();
						foreach($language_phrases as $row)
						{
							$phrase_id			=	$row['phrase_id'];					//id number of phrase
							$phrase				=	$row['phrase'];						//basic phrase text
							$phrase_language	=	$row[$current_editing_language];	//phrase of current editing language
							?>
                            <!----phrase box starts-->
                            <div class="panel panel-info">
                           	<div class="panel-heading">
                             <?php echo $count++;?>.&nbsp;<?php echo $row['phrase'];?>
							 </div>
                             <div class="panel-body">
                               <input type="text" name="phrase<?php echo $row['phrase_id'];?>" value="<?php echo $phrase_language;?>" class="form-control"/>
                             </div>
                                
                            </div>
                            <!----phrase box ends-->
							<?php 
						}
						?>
						
                        <input type="hidden" name="total_phrase" value="<?php echo $count;?>" />
						
			<button type="submit" class="btn btn-success waves-effect waves-light m-r-10" onClick="document.getElementById('phrase_form').submit();"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('update_phrase');?></button>

                        <?php
						echo form_close();
						?>
                                     
                </div>                
			</div>
			</div>
		
            <?php endif;?>
			
            <!----PHRASE EDITING TAB ENDS-->
            <!----TABLE LISTING STARTS-->

            <div class="tab-pane <?php if(!isset($edit_profile))echo 'active';?>" id="list">  
			<div class="panel-body table-responsive">
                <table class="table" id="table_export">
                	<thead>
                    	<tr>
                        	<th><?php echo get_phrase('all_languages');?> </th>
                        	<th><div align="right"><?php echo get_phrase('actions');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
								$fields = $this->db->list_fields('language');
								foreach($fields as $field)
								{
									 if($field == 'phrase_id' || $field == 'phrase')continue;
									?>
                    	<tr>
                        	<td> <?php echo ucwords($field);?> </td>
                        	<td><div align="right">
<a href="<?php echo base_url();?>admin/manage_language/edit_phrase/<?php echo $field;?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>
							<a href="<?php echo base_url();?>admin/manage_language/delete_language/<?php echo $field;?>"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times" onclick="return confirm('Delete Language ?');"></i></button></a></div>		
							</div>		
							
							
      
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
				</div>	
			</div>            
		</div>
		</div>
			</div>
			</div>
					</div>		

