 				<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;<?php echo get_phrase('list_all_prescription');?>
							 
					</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><?php echo get_phrase('presription_number'); ?></th>
            <th><?php echo get_phrase('name'); ?></th>
            <th><?php echo get_phrase('patient'); ?></th>
            <th><?php echo get_phrase('doctor'); ?></th>
            <th><?php echo get_phrase('weight'); ?></th>
            <th><?php echo get_phrase('height'); ?></th>
            <th><?php echo get_phrase('blood_pressure'); ?></th>
            <th><?php echo get_phrase('type'); ?></th>
            <th><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($list_prescriptions as $row) { ?>   
            <tr>
                <td><?php echo $row['presription_number'] ?></td>
                <td><?php echo $row['presription_name'] ?></td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
                        echo $name;?></td>
                <td><?php echo $row['weight'] ?></td>
                <td><?php echo $row['height'] ?></td>
                <td><?php echo $row['blood_pressure'] ?></td>
                <td><span class="label label-<?php if($row['type']=='new')echo 'success';else echo 'warning';?>"><?php echo $row['type'];?></span>
</td>
                <td>
                  
	<a href="<?php echo base_url();?>patient/view_prescription_details/<?php echo $row['prescription_id'];?>"><button type="button" class="btn btn-primary  btn-xs"><i class="fa fa-print"></i>&nbsp;<?php echo get_phrase('view_prescription'); ?> </button></a>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

