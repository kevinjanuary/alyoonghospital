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
 LOCATION : application - controller - Nurse.php
 */


class Nurse extends CI_Controller

{

	

	

	function __construct()

	{

		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*cache control*/
	}

	

	/***Default function, redirects to login page if no nurse logged in yet***/

	public function index()

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		if ($this->session->userdata('nurse_login') == 1)

			redirect(base_url() . 'nurse/dashboard', 'refresh');

	}

	

	/***nurse DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('nurse_dashboard');

		$this->load->view('index', $page_data);

	}

	

	

	/***Manage patients**/

	function manage_patient($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
		if ($param1 == 'create') {

			$data['pid']          		= $this->input->post('pid');
			$data['name']          		= $this->input->post('name');
			$data['email']         		= $this->input->post('email');
			$data['idcard']       		= $this->input->post('idcard');
			$data['issue_at']       	= $this->input->post('issue_at');
			$data['issue_on']       	= $this->input->post('issue_on');
			$data['occupation']       	= $this->input->post('occupation');
			$data['mother_tongue'] 		= $this->input->post('mother_tongue');
			$data['marital_status']     = $this->input->post('marital_status');
			$data['religion']         	= $this->input->post('religion');
			$data['password'] 			= $this->input->post('password');
			$data['address']       		= $this->input->post('address');
			$data['city']       		= $this->input->post('city');
			$data['state']         		= $this->input->post('state');
			$data['nationality']       	= $this->input->post('nationality');
			$data['phone']         		= $this->input->post('phone');
			$data['mobile_no']      	= $this->input->post('mobile_no');
			$data['sex']         		= $this->input->post('sex');
			$data['birth_date']      	= $this->input->post('birth_date');
			$data['age']      			= $this->input->post('age');
			$data['place_of_birth']     = $this->input->post('place_of_birth');
			$data['blood_group']      	= $this->input->post('blood_group');
			
			$data['date_of_last_admission']      = $this->input->post('date_of_last_admission');
			$data['diagnose']       	= $this->input->post('diagnose');
		//	$data['file_name'] 			= $_FILES["file_name"]["name"];
			
			$data['department_id'] 		= $this->input->post('department_id');
			$data['discharge_condition'] = $this->input->post('discharge_condition');
			$data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));


			$this->db->insert('patient', $data);
			$patient_id = $this->db->insert_id();

        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $patient_id . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('patient_added_successfully'));
			// $this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
			// $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			redirect(base_url() . 'nurse/manage_patient', 'refresh');
		}
		
		if ($param1 == 'do_update') {

			$data['pid']          		= $this->input->post('pid');
			$data['name']          		= $this->input->post('name');
			$data['email']         		= $this->input->post('email');
			$data['idcard']       		= $this->input->post('idcard');
			$data['issue_at']       	= $this->input->post('issue_at');
			$data['issue_on']       	= $this->input->post('issue_on');
			$data['occupation']       	= $this->input->post('occupation');
			$data['mother_tongue'] 		= $this->input->post('mother_tongue');
			$data['marital_status']     = $this->input->post('marital_status');
			$data['religion']         	= $this->input->post('religion');
			$data['password'] 			= $this->input->post('password');
			$data['address']       		= $this->input->post('address');
			$data['city']       		= $this->input->post('city');
			$data['state']         		= $this->input->post('state');
			$data['nationality']       	= $this->input->post('nationality');
			$data['phone']         		= $this->input->post('phone');
			$data['mobile_no']      	= $this->input->post('mobile_no');
			$data['sex']         		= $this->input->post('sex');
			$data['birth_date']      	= $this->input->post('birth_date');
			$data['age']      			= $this->input->post('age');
			$data['place_of_birth']     = $this->input->post('place_of_birth');
			$data['blood_group']      	= $this->input->post('blood_group');
			
			$data['date_of_last_admission']      = $this->input->post('date_of_last_admission');
			$data['diagnose']       	= $this->input->post('diagnose');
		//	$data['file_name'] 			= $_FILES["file_name"]["name"];
			
			$data['department_id'] 		= $this->input->post('department_id');
			$data['discharge_condition'] = $this->input->post('discharge_condition');
			$data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$this->db->where('patient_id', $param2);
			$this->db->update('patient', $data);
			
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $param2 . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			redirect(base_url() . 'nurse/list_patient', 'refresh');
			
			}

		if ($param1 == 'delete') {
			$this->db->where('patient_id', $param2);
			$this->db->delete('patient');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'nurse/manage_patient', 'refresh');

		}
		$page_data['page_name']  = 'manage_patient';
		$page_data['page_title'] = get_phrase('manage_patient');
		$page_data['patients']   = $this->db->get('patient')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST ALL PATIENTS PAGES********/

	function list_patient($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');


		$page_data['page_name']    = 'list_patient';
		$page_data['page_title']   = get_phrase('list_patients');
		$page_data['patients'] = $this->db->get('patient')->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* EDIT PATIENT PROFILE********/

	function edit_patient_profile($patient_id)

	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'edit_patient_profile';
		$page_data['patients'] 		=	$this->db->get_where('patient' , array('patient_id' => $patient_id) )->result_array();
		$page_data['page_title']   	= get_phrase('edit_patient_profile');
		$this->load->view('index', $page_data);

	}
	
	/******* VIEW PATIENT PROFILE********/
	function view_patient_profile($patient_id)
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'view_patient_profile';
		$page_data['patients'] 		=	$this->db->get_where('patient' , array('patient_id' => $patient_id) )->result_array();
		$page_data['page_title']   	= get_phrase('view_patient_profile');
		$this->load->view('index', $page_data);

	}
	
	/******* ADD PATIENTS DOCUMENT********/

		function add_document($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		if ($param1 == 'create') {

			$data['name']        		= $this->input->post('name');
			$data['patient_id']         = $this->input->post('patient_id');
			$data['file_name'] 			= $_FILES["file_name"]["name"];
			$data['doctor_id']         	= $this->input->post('doctor_id');
			$data['description']       	= $this->input->post('description');
			$data['date'] 				= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$this->db->insert('add_document', $data);
			$add_document_id = $this->db->insert_id();
			
			move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/patient_image/" . $_FILES["file_name"]["name"]);
			$this->session->set_flashdata('flash_message', get_phrase('document_added_successfully'));
			redirect(base_url() . 'nurse/list_document', 'refresh');
		}
		
		

		if ($param1 == 'delete') {
			$this->db->where('add_document_id', $param2);
			$this->db->delete('add_document');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'nurse/list_document', 'refresh');

		}
		$page_data['page_name']  = 'add_document';
		$page_data['page_title'] = get_phrase('add_document');
		$page_data['add_documents']   = $this->db->get('add_document')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST PATIENT DOCUMENT********/
	function list_document($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			
		$page_data['page_name']    = 'list_document';
		$page_data['page_title']   = get_phrase('list_document');
		$page_data['list_documents'] = $this->db->get('add_document')->result_array();
		$this->load->view('index', $page_data);
	}
	
	/******* PATIENT DOCUMENT********/
	function patient_document($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			
		$page_data['page_name']    = 'patient_document';
		$page_data['page_title']   = get_phrase('list_document');
		$page_data['patient_documents'] = $this->db->get('patient')->result_array();
		$this->load->view('index', $page_data);
	}
	
	/******* VIEW ALL PATIENT DOCUMENT********/
	function view_patient_document($patient_id)
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			
		$page_data['page_name']    = 'view_patient_document';
		$page_data['page_title']   = get_phrase('view_patient_document');
		$page_data['view_patient_documents']=	$this->db->get_where('add_document' , array('patient_id' => $patient_id) )->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	
	/******* EDIT APPOINTMENT DETAILS********/

	function view_appointment_details($appointment_id, $doctor_id, $patient_id)

	{
		if ($this->session->userdata('nurse_login') != 1)
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

	function nurse($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'nurse';
		$page_data['page_title']   = get_phrase('nurses');
		$page_data['nurses'] = $this->db->get('appointment')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/***DEPARTMENTS OF DOCTORS********/

	function manage_department($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$this->db->insert('department', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('department_opened'));
			redirect(base_url() . 'nurse/list_department', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			
			$this->db->where('department_id', $param2);
			$this->db->update('department', $data);
			$this->session->set_flashdata('flash_message', get_phrase('department_updated'));
			redirect(base_url() . 'nurse/list_department', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('department', array(
				'department_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('department_id', $param2);
			$this->db->delete('department');
			$this->session->set_flashdata('flash_message', get_phrase('department_deleted'));
			redirect(base_url() . 'nurse/list_department', 'refresh');
		}

		$page_data['page_name']   = 'manage_department';
		$page_data['page_title']  = get_phrase('manage_department');
		$page_data['departments'] = $this->db->get('department')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST ALL DEPARTMENT PAGES********/

	function list_department($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_department';
		$page_data['page_title']   = get_phrase('list_departments');
		$page_data['list_departments'] = $this->db->get('department')->result_array();
		$this->load->view('index', $page_data);

	}

	
	
	/******* LIST ALL DOCTORS appointment PAGES********/

function list_appointment($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'nurse/list_appointment/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'nurse/list_appointment/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'list_appointment';

    $page_data['page_name'] = 'list_appointment';
    $page_data['page_title'] = get_phrase('list_appointment');
    $this->load->view('index', $page_data);
}
	
	
	/*  PRESCRIPTION CODE HERE */
	function add_prescription($param1 = '', $param2 = '', $param3 = '')
	 {
       if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
   
        if ($param1 == 'create') {
            $this->crud_model->create_prescription();
            
			$this->session->set_flashdata('flash_message', get_phrase('add_prescriptioned'));
			redirect(base_url() . 'nurse/list_prescription', 'refresh');
        }

        $data['page_name'] = 'add_prescription';
        $data['page_title'] = get_phrase('add_prescription');
        $this->load->view('index', $data);
    }
	
	function list_prescription($task = "", $prescription_id = "") {
       if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			{
        }

        if ($task == "update") {
            $this->crud_model->update_prescription($prescription_id);
            $this->session->set_flashdata('message', get_phrase('prescription_updated_successfuly'));
			redirect(base_url() . 'nurse/list_prescription', 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_prescription($prescription_id);
			redirect(base_url() . 'nurse/list_prescription', 'refresh');
        }

        $data['prescription_info'] = $this->crud_model->select_prescription_info();
        $data['page_name'] = 'list_prescription';
        $data['page_title'] = get_phrase('list_prescription');
        $this->load->view('index', $data);
    }
	
	
	/******* VIEW SCHEDULE DETAILS********/

	function view_prescription_details($prescription_id)

	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'view_prescription_details';
		$page_data['page_title']   	= get_phrase('view_prescription_details');
		$page_data['view_prescription_details'] 	=	$this->db->get_where('prescription' , array('prescription_id' => $prescription_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* LIST ALL DOCTORS PAGES********/

	function list_doctor($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_doctor';
		$page_data['page_title']   = get_phrase('list_doctor');
		$page_data['doctors'] = $this->db->get('doctor')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	
	



	

	/***ADD BED OF PAGE********/

	function add_bed($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['bed_type']        = $this->input->post('bed_type');
			$data['bed_capacity'] = $this->input->post('bed_capacity');
			$data['charge']        = $this->input->post('charge');
			$data['description'] = $this->input->post('description');
			$data['status']        = $this->input->post('status');
			$this->db->insert('add_bed', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('add_bed_opened'));
			redirect(base_url() . 'nurse/list_bed', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['bed_type']        = $this->input->post('bed_type');
			$data['bed_capacity'] = $this->input->post('bed_capacity');
			$data['charge']        = $this->input->post('charge');
			$data['description'] = $this->input->post('description');
			$data['status']        = $this->input->post('status');
			
			$this->db->where('add_bed_id', $param2);
			$this->db->update('add_bed', $data);
			$this->session->set_flashdata('flash_message', get_phrase('add_bed_updated'));
			redirect(base_url() . 'nurse/list_bed', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('add_bed', array(
				'add_bed_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('add_bed_id', $param2);
			$this->db->delete('add_bed');
			$this->session->set_flashdata('flash_message', get_phrase('add_bed_deleted'));
			redirect(base_url() . 'nurse/list_bed', 'refresh');
		}

		$page_data['page_name']   = 'add_bed';
		$page_data['page_title']  = get_phrase('add_new_bed');
		$page_data['add_beds'] = $this->db->get('add_bed')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST ALL bed PAGES********/

	function list_bed($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_bed';
		$page_data['page_title']   = get_phrase('list_beds');
		$page_data['list_beds'] = $this->db->get('add_bed')->result_array();
		$this->load->view('index', $page_data);

	}
	

	/***ASSIGN BED OF PAGE********/

	function assign_bed($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['patient_id']      = $this->input->post('patient_id');
			$data['bed_type'] 	= $this->input->post('bed_type');
			$data['assign_date']    = $this->input->post('assign_date');
			$data['discharge_date'] = $this->input->post('discharge_date');
			$data['description'] 	= $this->input->post('description');
			$data['status']       	= $this->input->post('status');
			$this->db->insert('assign_bed', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('assign_bed_opened'));
			redirect(base_url() . 'nurse/list_assign_bed', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['patient_id']     = $this->input->post('patient_id');
			$data['bed_type'] 		= $this->input->post('bed_type');
			$data['assign_date']    = $this->input->post('assign_date');
			$data['discharge_date'] = $this->input->post('discharge_date');
			$data['description'] 	= $this->input->post('description');
			$data['status']       	= $this->input->post('status');
			
			$this->db->where('assign_bed_id', $param2);
			$this->db->update('assign_bed', $data);
			$this->session->set_flashdata('flash_message', get_phrase('assign_bed_updated'));
			redirect(base_url() . 'nurse/list_assign_bed', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('assign_bed', array(
				'assign_bed_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('assign_bed_id', $param2);
			$this->db->delete('assign_bed');
			$this->session->set_flashdata('flash_message', get_phrase('assign_bed_deleted'));
			redirect(base_url() . 'nurse/list_assign_bed', 'refresh');
		}

		$page_data['page_name']   = 'assign_bed';
		$page_data['page_title']  = get_phrase('assign_new_bed');
		$page_data['assign_beds'] = $this->db->get('assign_bed')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/*******LIST ASSIGN BED PAGES********/

	function list_assign_bed($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_assign_bed';
		$page_data['page_title']   = get_phrase('list_assign_beds');
		$page_data['list_assign_beds'] = $this->db->get('assign_bed')->result_array();
		$this->load->view('index', $page_data);

	}
	

	

	/*******WATCH AND MANAGE STATUS OF BLOOD GROUPS AND THEIR AVAILABLE AMOUNT OF BAGS********/

	function manage_blood_bank($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['status'] = $this->input->post('status');

			$this->db->where('blood_group_id', $param3);

			$this->db->update('blood_bank', $data);

			$this->session->set_flashdata('flash_message', get_phrase('blood_status_updated'));

			redirect(base_url() . 'nurse/manage_blood_bank', 'refresh');

			

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('blood_bank', array(

				'blood_group_id' => $param2

			))->result_array();

		}

		$page_data['page_name']  = 'manage_blood_bank';

		$page_data['page_title'] = get_phrase('manage_blood_bank');

		$page_data['blood_bank'] = $this->db->get('blood_bank')->result_array();

		$this->load->view('index', $page_data);

	}



	

	/******MANAGE BLOOD DONORS*****/

	function manage_blood_donor($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		//create a new allotment only in available / unalloted beds. beds can be ward,cabin,icu,other types

		if ($param1 == 'create') {

			$data['name']                    = $this->input->post('name');

			$data['blood_group']             = $this->input->post('blood_group');

			$data['sex']                     = $this->input->post('sex');

			$data['age']                     = $this->input->post('age');

			$data['phone']                   = $this->input->post('phone');

			$data['email']                   = $this->input->post('email');

			$data['address']                 = $this->input->post('address');

			$data['last_donation_timestamp'] = strtotime($this->input->post('last_donation_timestamp'));

			$this->db->insert('blood_donor', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));

			redirect(base_url() . 'nurse/manage_blood_donor', 'refresh');

		}

		if ($param1 == 'edit' && $param2 == 'do_update') {

			$data['name']                    = $this->input->post('name');

			$data['blood_group']             = $this->input->post('blood_group');

			$data['sex']                     = $this->input->post('sex');

			$data['age']                     = $this->input->post('age');

			$data['phone']                   = $this->input->post('phone');

			$data['email']                   = $this->input->post('email');

			$data['address']                 = $this->input->post('address');

			$data['last_donation_timestamp'] = strtotime($this->input->post('last_donation_timestamp'));

			$this->db->where('blood_donor_id', $param3);

			$this->db->update('blood_donor', $data);

			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			redirect(base_url() . 'nurse/manage_blood_donor', 'refresh');

			

		} else if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('blood_donor', array(

				'blood_donor_id' => $param2

			))->result_array();

		}

		if ($param1 == 'delete') {

			$this->db->where('blood_donor_id', $param2);

			$this->db->delete('blood_donor');

			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));

			redirect(base_url() . 'nurse/manage_blood_donor', 'refresh');

		}

		$page_data['page_name']    = 'manage_blood_donor';

		$page_data['page_title']   = get_phrase('manage_blood_donor');

		$page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();

		$this->load->view('index', $page_data);

	}

	

	/***CREATE REPORT BIRTH,DEATH,OPERATION**/

	function manage_report($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		//create a new report baby birth,patient death, operation , other types

		if ($param1 == 'create') {

			$data['type']        = $this->input->post('type');
			
			$data['department_id']        = $this->input->post('department_id');

			$data['description'] = $this->input->post('description');

			$data['timestamp']   = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

			$data['doctor_id']   = $this->input->post('doctor_id');

			$data['patient_id']  = $this->input->post('patient_id');

			$this->db->insert('report', $data);

			$this->session->set_flashdata('flash_message', get_phrase('report_created'));

			redirect(base_url() . 'nurse/manage_report', 'refresh');

		}

		if ($param1 == 'delete') {

			$this->db->where('report_id', $param2);

			$this->db->delete('report');

			$this->session->set_flashdata('flash_message', get_phrase('report_deleted'));

			redirect(base_url() . 'nurse/manage_report', 'refresh');

		}

		$page_data['page_name']  = 'manage_report';

		$page_data['page_title'] = get_phrase('manage_report');

		$page_data['reports']    = $this->db->get('report')->result_array();

		$this->load->view('index', $page_data);

	}
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '')
   {
		 if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'nurse/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'nurse/message/message_read/' . $param2, 'refresh');
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


/******* LIST ALL NOTICEBOARD PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		 if ($this->session->userdata('nurse_login') != 1)
			redirect(base_url() . 'login', 'refresh');


			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}





	

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('nurse_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('nurse_id', $this->session->userdata('nurse_id'));
			$this->db->update('nurse', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/nurse_image/' . $this->session->userdata('nurse_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'nurse/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {


			$data['new_password']         = sha1($this->input->post('new_password'));

			$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

			if ($data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('nurse_id', $this->session->userdata('nurse_id'));

				$this->db->update('nurse', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('error_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'nurse/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('nurse', array(

			'nurse_id' => $this->session->userdata('nurse_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	
	

}

