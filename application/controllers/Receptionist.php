<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');



/* ...................................................................
......................................................................
 * 	Author 			: Optimum Linkup Software ........................
 * 	date			: 27 June, 2017 ..................................
 * 	Website			:http://optimumlinkupsoftware.com/superschool.....
 * 	Email			:info@optimumlinkupsoftware.com ..................
 .....................................................................
 .....................................................................
 LOCATION : application - controller - Receptionist.php
 */



class Receptionist extends CI_Controller

{

	

	

	function __construct()

	{

		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*cache control*/

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		$this->output->set_header('Pragma: no-cache');

		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	

	/***Default function, redirects to login page if no admin logged in yet***/

	public function index()
	{
		if ($this->session->userdata('receptionist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		if ($this->session->userdata('receptionist_login') == 1)

			redirect(base_url() . 'receptionist/dashboard', 'refresh');
	}

	

	/***receptionist DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('receptionist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('receptionist_dashboard');

		$this->load->view('index', $page_data);

	}
	
	
	/******* LIST ALL DOCTORS PAGES********/

	function list_doctor($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('receptionist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_doctor';
		$page_data['page_title']   = get_phrase('list_doctor');
		$page_data['doctors'] = $this->db->get('doctor')->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* LIST ALL NURSE PAGES********/

	function list_nurse($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('receptionist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_nurse';
		$page_data['page_title']   = get_phrase('list_nurse');
		$page_data['nurse'] = $this->db->get('nurse')->result_array();
		$this->load->view('index', $page_data);

	}
	
	function list_receptionist($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_receptionist';
		$page_data['page_title']   = get_phrase('list_receptionist');
		$page_data['receptionist'] = $this->db->get('receptionist')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/* * ****MANAGE SEARCH doctor PAGE** */
function search_doctor($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'receptionist/search_doctor/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'receptionist/search_doctor/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'search_doctor';

    $page_data['page_name'] = 'search_doctor';
    $page_data['page_title'] = get_phrase('doctor_by_department');
    $this->load->view('index', $page_data);
}


/* * ****MANAGE SEARCH nurse PAGE** */
function search_nurse($department_id = '', $param2 = '', $sparam3 = '') {
    if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'receptionist/search_nurse/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'receptionist/search_nurse/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'search_nurse';

    $page_data['page_name'] = 'search_nurse';
    $page_data['page_title'] = get_phrase('nurse_by_department');
    $this->load->view('index', $page_data);
}


/* * ****MANAGE SEARCH receptionist PAGE** */
function search_receptionist($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'receptionist/search_receptionist/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'receptionist/search_receptionist/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'search_receptionist';

    $page_data['page_name'] = 'search_receptionist';
    $page_data['page_title'] = get_phrase('search_receptionist');
    $this->load->view('index', $page_data);
}

/***ADD appointment FOR DOCTOR********/

	function add_appointment($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['appointment_code']      	= $this->input->post('appointment_code');
			$data['patient_id']      	= $this->input->post('patient_id');
			$data['department_id']  	= $this->input->post('department_id');
			$data['doctor_id']  		= $this->input->post('doctor_id');
			$data['shedule'] 		= $this->input->post('shedule');
			$data['issue']        		= $this->input->post('issue');
			$data['create_timestamp'] 	= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$data['status']        		= $this->input->post('status');
			
			$this->db->insert('appointment', $data);
			$this->session->set_flashdata('flash_message', get_phrase('appointment_created'));
			redirect(base_url() . 'receptionist/list_appointment', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['appointment_code']      	= $this->input->post('appointment_code');
			$data['patient_id']      	= $this->input->post('patient_id');
			$data['department_id']  	= $this->input->post('department_id');
			$data['doctor_id']  		= $this->input->post('doctor_id');
			$data['shedule'] 			= $this->input->post('shedule');
			$data['issue']        		= $this->input->post('issue');
			$data['create_timestamp'] 	= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$data['status']        		= $this->input->post('status');
			
			$this->db->where('appointment_id', $param2);
			$this->db->update('appointment', $data);
			$this->session->set_flashdata('flash_message', get_phrase('appointment_updated'));
			redirect(base_url() . 'receptionist/list_appointment', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('appointment', array(
				'appointment_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('appointment_id', $param2);
			$this->db->delete('appointment');
			$this->session->set_flashdata('flash_message', get_phrase('appointment_deleted'));
			redirect(base_url() . 'receptionist/list_appointment', 'refresh');
		}

		$page_data['page_name']   = 'add_appointment';
		$page_data['page_title']  = get_phrase('add_appointment');
		$page_data['appointments'] = $this->db->get('appointment')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	
	/******* EDIT APPOINTMENT DETAILS********/

	function edit_appointment_details($appointment_id)

	{
		if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'edit_appointment_details';
		$page_data['page_title']   	= get_phrase('edit_appointment_details');
		$page_data['edit_appointments'] =	$this->db->get_where('appointment' , array('appointment_id' => $appointment_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* EDIT APPOINTMENT DETAILS********/

	function view_appointment_details($appointment_id, $doctor_id, $patient_id)

	{
		if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		$doctor_id = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
        $patient_id = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
		
		$page_data['page_name']    	= 'view_appointment_details';
		$page_data['page_title']   	= get_phrase('view_appointment_details');
		$page_data['view_appointment_details'] = $this->db->get_where('appointment' , array('appointment_id' => $appointment_id) )->result_array();
		$page_data['doctor_id'] =  $doctor_id;
		$page_data['patient_id'] = $patient_id;
		$this->load->view('index', $page_data);

	}
	
	
	/******* LIST ALL DOCTORS appointment PAGES********/

function list_appointment($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'receptionist/list_appointment/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'receptionist/list_appointment/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'list_appointment';

    $page_data['page_name'] = 'list_appointment';
    $page_data['page_title'] = get_phrase('list_appointment');
    $this->load->view('index', $page_data);
}
	
	
	
	/***ADD SHEDULE FOR DOCTOR********/

	function add_shedule($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['doctor_id']      = $this->input->post('doctor_id');
			$data['avail_day'] 		= $this->input->post('avail_day');
			$data['department_id']  = $this->input->post('department_id');
			$data['start_time'] 	= $this->input->post('start_time');
			
			$data['end_time']        	= $this->input->post('end_time');
			$data['per_patient_time'] 	= $this->input->post('per_patient_time');
			$data['status']        		= $this->input->post('status');
			
			$this->db->insert('shedule', $data);
			$this->session->set_flashdata('flash_message', get_phrase('shedule_created'));
			redirect(base_url() . 'receptionist/list_shedule', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['doctor_id']      = $this->input->post('doctor_id');
			$data['avail_day'] 		= $this->input->post('avail_day');
			$data['department_id']  = $this->input->post('department_id');
			$data['start_time'] 	= $this->input->post('start_time');
			
			$data['end_time']        	= $this->input->post('end_time');
			$data['per_patient_time'] 	= $this->input->post('per_patient_time');
			$data['status']        		= $this->input->post('status');
			
			
			$this->db->where('shedule_id', $param2);
			$this->db->update('shedule', $data);
			$this->session->set_flashdata('flash_message', get_phrase('shedule_updated'));
			redirect(base_url() . 'receptionist/list_shedule', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('shedule', array(
				'shedule_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('shedule_id', $param2);
			$this->db->delete('shedule');
			$this->session->set_flashdata('flash_message', get_phrase('shedule_deleted'));
			redirect(base_url() . 'receptionist/list_shedule', 'refresh');
		}

		$page_data['page_name']   = 'add_shedule';
		$page_data['page_title']  = get_phrase('add_shedule');
		$page_data['shedules'] = $this->db->get('shedule')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST ALL DOCTORS SHEDULE PAGES********/

function list_shedule($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'receptionist/list_shedule/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'receptionist/list_shedule/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'list_shedule';

    $page_data['page_name'] = 'list_shedule';
    $page_data['page_title'] = get_phrase('list_shedule');
    $this->load->view('index', $page_data);
}
	
	/******* VIEW SCHEDULE DETAILS********/

	function edit_shedule_details($shedule_id)

	{
		if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'edit_shedule_details';
		$page_data['page_title']   	= get_phrase('edit_shedule_details');
		$page_data['edit'] 			=	$this->db->get_where('shedule' , array('shedule_id' => $shedule_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	

/******* LIST ALL laboratorist PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		 if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '')
   {
		 if ($this->session->userdata('receptionist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'receptionist/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'receptionist/message/message_read/' . $param2, 'refresh');
    }

    if ($param1 == 'message_read') {
        $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
        $this->crud_model->mark_thread_messages_read($param2);
    }

    $page_data['message_inner_page_name'] = $param1;
    $page_data['page_name'] = 'message';
    $page_data['page_title'] = get_phrase('private_messaging');
	$this->load->view('index', $page_data);
}


/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('receptionist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('receptionist_id', $this->session->userdata('receptionist_id'));
			$this->db->update('receptionist', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/receptionist_image/' . $this->session->userdata('receptionist_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'receptionist/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['new_password']         = sha1($this->input->post('new_password'));

			$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

			if ($data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('receptionist_id', $this->session->userdata('receptionist_id'));

				$this->db->update('receptionist', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'receptionist/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('receptionist', array(

			'receptionist_id' => $this->session->userdata('receptionist_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	
	
	
	
	
	
	


}