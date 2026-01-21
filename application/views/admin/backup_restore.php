 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <?php echo get_phrase('backup_database');?>
							 <a href="<?php echo base_url();?>admin/dashboard" 
                     class="btn btn-orange btn-xs"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 				<table id="example23" class="display nowrap" cellspacing="0" width="100%">

                    <tbody>

                    	<?php 

						for($i = 1; $i<= 14; $i++):

						

							if($i	==	1)	$type	=	'doctor';

							else if($i	==	2)$type	=	'patient';

							else if($i	==	3)$type	=	'nurse';

							else if($i	==	4)$type	=	'pharmacist';

							else if($i	==	5)$type	=	'laboratorist';

							else if($i	==	6)$type	=	'accountant';

							else if($i	==	7)$type	=	'appointment';

							else if($i	==	8)$type	=	'payment';

							else if($i	==	9)$type	=	'blood_bank';

							else if($i	==	10)$type=	'medicine';

							else if($i	==	11)$type=	'report';

							else if($i	==	12)$type=	'noticeboard';

							else if($i	==	13)$type=	'language';

							else if($i	==	14)$type=	'all';

							?>

							<tr>

								<td><?php echo get_phrase($type);?></td>

								<td align="center">
<a href="<?php echo base_url();?>admin/backup_restore/create/<?php echo $type;?>"> <button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-download"></i> </button></a>

			<a href="<?php echo base_url();?>admin/backup_restore/delete/<?php echo $type;?>"><button type="button" class="btn btn-danger btn-circle btn-xs" onclick="return confirm('delete confirm?');"><i class="fa fa-times"></i> </button>
			
			
			

											</a>

								</td>

							</tr>

							<?php 

						endfor;

						?>

                    </tbody>

                </table>
</div>
</div>
</div>
</div>
</div>

