<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	/*	
	   *	Developed by: DBCinfotech
       *	Date	: 20 November, 2015
       *	Bizpro Stock Manager ERP
       *	http://codecanyon.net/user/dbcinfotech
    */

class Crud_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	function get_type_name_by_id($type,$type_id='',$field='name')

	{

		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	

	}

	

	

	function create_log($data)

	{

		$data['timestamp']	=	strtotime(date('Y-m-d').' '.date('H:i:s'));

		$data['ip']			=	$_SERVER["REMOTE_ADDR"];

		$location 			=	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));

		$data['location']	=	$location->City.' , '.$location->CountryName;

		$this->db->insert('log' , $data);

	}

	function get_system_settings()

	{

		$query	=	$this->db->get('settings' );

		return $query->result_array();

	}

	

	  // Create a new invoice.
    function create_invoice() 
    {
        $data['title']              = $this->input->post('title');
        $data['invoice_number']     = $this->input->post('invoice_number');
        $data['patient_id']         = $this->input->post('patient_id');
        $data['creation_timestamp'] = $this->input->post('creation_timestamp');
        $data['due_timestamp']      = $this->input->post('due_timestamp');
        $data['vat_percentage']     = $this->input->post('vat_percentage');
        $data['discount_amount']    = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');
		$data['year']               = $this->db->get_where('settings' , array('type' => 'session'))->row()->description;


        $invoice_entries            = array();
        $descriptions               = $this->input->post('entry_description');
        $amounts                    = $this->input->post('entry_amount');
        $number_of_entries          = sizeof($descriptions);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($descriptions[$i] != "" && $amounts[$i] != "")
            {
                $new_entry          = array('description' => $descriptions[$i], 'amount' => $amounts[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->insert('invoice', $data);
    }
    
    function select_invoice_info()
    {
        return $this->db->get('invoice')->result_array();
    }
    
    function select_invoice_info_by_patient_id()
    {
        $patient_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('invoice', array('patient_id' => $patient_id))->result_array();
    }

    function update_invoice($invoice_id)
    {
        $data['title']              = $this->input->post('title');
        $data['invoice_number']     = $this->input->post('invoice_number');
        $data['patient_id']         = $this->input->post('patient_id');
        $data['creation_timestamp'] = $this->input->post('creation_timestamp');
        $data['due_timestamp']      = $this->input->post('due_timestamp');
        $data['vat_percentage']     = $this->input->post('vat_percentage');
        $data['discount_amount']    = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');
		$data['year']               = $this->db->get_where('settings' , array('type' => 'session'))->row()->description;


        $invoice_entries            = array();
        $descriptions               = $this->input->post('entry_description');
        $amounts                    = $this->input->post('entry_amount');
        $number_of_entries          = sizeof($descriptions);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($descriptions[$i] != "" && $amounts[$i] != "")
            {
                $new_entry          = array('description' => $descriptions[$i], 'amount' => $amounts[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->where('invoice_id', $invoice_id);
        $this->db->update('invoice', $data);
    }

    function delete_invoice($invoice_id)
    {
        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('invoice');
    }

    function calculate_invoice_total_amount($invoice_number)
    {
        $total_amount           = 0;
        $invoice                = $this->db->get_where('invoice', array('invoice_number' => $invoice_number))->result_array();
        foreach ($invoice as $row)
        {
            $invoice_entries    = json_decode($row['invoice_entries']);
            foreach ($invoice_entries as $invoice_entry)
                $total_amount  += $invoice_entry->amount;

            $vat_amount         = $total_amount * $row['vat_percentage'] / 100;
            $grand_total        = $total_amount + $vat_amount - $row['discount_amount'];
        }

        return $grand_total;
    }
	
	
	
		  // Create a new prescription.
    function create_prescription() 
    {
        $data['presription_number'] = $this->input->post('presription_number');
        $data['presription_name']   = $this->input->post('presription_name');
        $data['patient_id']         = $this->input->post('patient_id');
        $data['doctor_id'] 			= $this->input->post('doctor_id');
        $data['weight']      		= $this->input->post('weight');
        $data['blood_pressure']    	= $this->input->post('blood_pressure');
        $data['height']     		= $this->input->post('height');
        $data['type']             	= $this->input->post('type');
        $data['visiting_fee']    	= $this->input->post('visiting_fee');
        $data['case_history']       = $this->input->post('case_history');
		//$data['create_timestamp'] 	= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

        $prescription_entries        = array();
        $diagnose               	= $this->input->post('entry_diagnose');
        $medicine_name              = $this->input->post('entry_medicine_name');
		$medicine_type              = $this->input->post('entry_medicine_type');
        $usage_prescription         = $this->input->post('entry_prescription');
        $usage_days                 = $this->input->post('entry_days');
        $number_of_entries          = sizeof($diagnose);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($diagnose[$i] != "" && $medicine_name[$i] != "" && $medicine_type[$i] !="" && $usage_prescription[$i] !="" && $usage_days[$i] !="")
            {
                $new_entry          = array('diagnose' => $diagnose[$i], 'medicine_name' => $medicine_name[$i], 'medicine_type' => $medicine_type[$i], 'prescription' => $usage_prescription[$i], 'days' => $usage_days[$i]);
                array_push($prescription_entries, $new_entry);
            }
        }
        $data['prescription_entries']    = json_encode($prescription_entries);

        $this->db->insert('prescription', $data);
    }
    
    function select_prescription_info()
    {
        return $this->db->get('prescription')->result_array();
    }
    
    function select_prescription_info_by_patient_id()
    {
        $patient_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('prescription', array('patient_id' => $patient_id))->result_array();
    }
	
	
	function update_prescription($prescription_id)
    {
        $data['presription_number'] = $this->input->post('presription_number');
        $data['presription_name']   = $this->input->post('presription_name');
        $data['patient_id']         = $this->input->post('patient_id');
        $data['doctor_id'] 			= $this->input->post('doctor_id');
        $data['weight']      		= $this->input->post('weight');
        $data['blood_pressure']    	= $this->input->post('blood_pressure');
        $data['height']     		= $this->input->post('height');
        $data['type']             	= $this->input->post('type');
        $data['visiting_fee']    	= $this->input->post('visiting_fee');
        $data['case_history']       = $this->input->post('case_history');
		//$data['create_timestamp'] 	= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

        $prescription_entries        = array();
        $diagnose               	= $this->input->post('entry_diagnose');
        $medicine_name              = $this->input->post('entry_medicine_name');
		$medicine_type              = $this->input->post('entry_medicine_type');
        $usage_prescription         = $this->input->post('entry_prescription');
        $usage_days                 = $this->input->post('entry_days');
        $number_of_entries          = sizeof($diagnose);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($diagnose[$i] != "" && $medicine_name[$i] != "" && $medicine_type[$i] !="" && $usage_prescription[$i] !="" && $usage_days[$i] !="")
            {
                $new_entry          = array('diagnose' => $diagnose[$i], 'medicine_name' => $medicine_name[$i], 'medicine_type' => $medicine_type[$i], 'prescription' => $usage_prescription[$i], 'days' => $usage_days[$i]);
                array_push($prescription_entries, $new_entry);
            }
        }
        $data['prescription_entries']    = json_encode($prescription_entries);

        $this->db->where('prescription_id', $prescription_id);
        $this->db->update('prescription', $data);
    }

    function delete_prescription($prescription_id)
    {
        $this->db->where('prescription_id', $prescription_id);
        $this->db->delete('prescription');
    }
	
	
	
	

	

	////////BACKUP RESTORE/////////

	function create_backup($type)

	{
		$this->load->dbutil();
		$options = array(

                'format'      => 'txt',             // gzip, zip, txt

                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file

                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file

                'newline'     => "\n"               // Newline character used in backup file

              );

		

		 

		if($type == 'all')

		{

			$tables = array('');

			$file_name	=	'system_backup';

		}

		else 

		{

			$tables = array('tables'	=>	array($type));

			$file_name	=	'backup_'.$type;

		}
		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 
		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);

	}

	

	

	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////

	function restore_backup()

	{

		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');

		$this->load->dbutil();

		

		

		$prefs = array(

            'filepath'						=> 'uploads/backup.sql',

			'delete_after_upload'			=> TRUE,

			'delimiter'						=> ';'

        );

		$restore =& $this->dbutil->restore($prefs); 

		unlink($prefs['filepath']);

	}

	

	/////////DELETE DATA FROM TABLES///////////////

	function truncate($type)

	{

		if($type == 'all')

		{

			$this->db->truncate('student');

			$this->db->truncate('mark');

			$this->db->truncate('teacher');

			$this->db->truncate('subject');

			$this->db->truncate('class');

			$this->db->truncate('exam');

			$this->db->truncate('grade');

		}

		else

		{	

			$this->db->truncate($type);

		}

	}

	

	

	////////IMAGE URL//////////

	function get_image_url($type = '' , $id = '')

	{

		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))

			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';

		else

			$image_url	=	base_url().'uploads/user.jpg';

			

		return $image_url;

	}
	
	////////private message//////
    function send_new_private_message() {
        $message = $this->input->post('message');
       	$subject = $this->input->post('subject');
        $timestamp = strtotime(date("Y-m-d H:i:s"));

        $reciever = $this->input->post('reciever');
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

//check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
       	$data_message['subject'] = $subject;		
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

// notify email to email reciever
//$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message = $this->input->post('message');
		$subject = $this->input->post('subject');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
       	$data_message['subject'] = $subject;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

// notify email to email reciever
//$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code) {
// mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    function count_unread_message_of_curuser() {
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select count(a.message_id) counts from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $row = $this->db->query($sql)->row_array();
        return $row["counts"];
    }

    function unread_message_of_curuser() {
        $data = array();
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select a.*  from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $rows = $this->db->query($sql)->result_array();
        foreach ($rows as $row) {
            $sender = explode('-', $row['sender']);
            $sender_type = $sender[0];
            $sender_id = $sender[1];

            $sql = "select name from " . $sender_type . " where " . $sender_type . "_id=" . $sender_id;
            $result = $this->db->query($sql)->row_array();
            $row["sender_name"] = $result["name"];

            $key = $row['sender'];
            $face_file = 'uploads/' . $sender_type . '_image/' . $sender_id . '.jpg';
            if (!file_exists($face_file)) {
                $face_file = 'uploads/default.jpg';
            }
            $row["face_file"] = base_url() . $face_file;

//            $cur_time = date('Y-m-d H:i:s', time());
//            $send_time =date('Y-m-d H:i:s', $row["timestamp"]);
//            echo $cur_time;
//            $diff = date_diff($cur_time, $send_time);
            $ago = '';
            $sec = time() - $row["timestamp"];
            $year = (int) ($sec / 31556926);
            $month = (int) ($sec / 2592000);
            $day = (int) ($sec / 86400);
            $hou = (int) ($sec / 3600);
            $min = (int) ($sec / 60);
            if ($year > 0) {
                $ago = $year . ' year(s)';
            } else if ($month > 0) {
                $ago = $month . ' month(s)';
            } else if ($day > 0) {
                $ago = $day . ' day(s)';
            } else if ($hou > 0) {
                $ago = $hou . ' hour(s)';
            } else if ($min > 0) {
                $ago = $min . ' minute(s)';
            } else {
                $ago = $sec . ' second(s)';
            }

            $row["ago"] = $ago;

            array_push($data, $row);
        }
        return $data;
    }


	

	

}



