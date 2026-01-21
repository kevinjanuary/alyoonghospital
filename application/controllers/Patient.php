<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');



/* ...................................................................
......................................................................
 * 	Author 			: Optimum Linkup Software ........................
 * 	date			: 27 June, 2017 ..................................
 * 	Website			:http://optimumlinkupsoftware.com/optimumhms.....
 * 	Email			:info@optimumlinkupsoftware.com ..................
 .....................................................................
 .....................................................................
 LOCATION : application - controller - Patient.php
 */


class Patient extends CI_Controller

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

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		if ($this->session->userdata('patient_login') == 1)

			redirect(base_url() . 'patient/dashboard', 'refresh');

	}

	

	/***patient DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('patient_dashboard');

		$this->load->view('index', $page_data);

	}

	

	/***LIST APPOINTMENTS******/

	function list_prescription($patient_id)
	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']    = 'list_prescription';
		$page_data['page_title']   = get_phrase('list_prescriptions');
		$page_data['list_prescriptions'] = $this->db->get_where('prescription', array(
			'patient_id' => $this->session->userdata('patient_id')
		))->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/******* ADD PATIENTS DOCUMENT********/

		function add_document($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('patient_login') != 1)
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
			redirect(base_url() . 'patient/list_document/'.$this->session->userdata('login_user_id').'', 'refresh');
		}
		
		

		if ($param1 == 'delete') {
			$this->db->where('add_document_id', $param2);
			$this->db->delete('add_document');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'patient/list_document/'.$this->session->userdata('login_user_id').'', 'refresh');

		}
		$page_data['page_name']  = 'add_document';
		$page_data['page_title'] = get_phrase('add_document');
		$page_data['add_documents']   = $this->db->get('add_document')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/***LIST DOCUMENT******/

	function list_document($patient_id)
	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']    = 'list_document';
		$page_data['page_title']   = get_phrase('list_documents');
		$page_data['list_documents'] = $this->db->get_where('add_document', array(
			'patient_id' => $this->session->userdata('patient_id')
		))->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/***LIST DOCUMENT******/

	function list_appointment($patient_id)
	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']    = 'list_appointment';
		$page_data['page_title']   = get_phrase('list_appointments');
		$page_data['list_appointments'] = $this->db->get_where('appointment', array(
			'patient_id' => $this->session->userdata('patient_id')
		))->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	
	/******MANAGE BILLING/ MAKE PAYMENT*****/

	function list_invoice($param1 = '', $param2 = '', $param3 = '', $patient_id = '')

	{

		//if($this->session->userdata('patient_login')!=1)redirect(base_url().'login' , 'refresh');

		if ($param1 == 'make_payment') {
		
			$data['amount'] = $this->input->post('amount');
			$this->db->where('invoice_id', $param2);
			$this->db->update('invoice', $data);

			$invoice_id      = $this->input->post('invoice_id');

			$system_settings = $this->db->get_where('settings', array(

				'type' => 'paypal_email'

			))->row();

			$invoice_details = $this->db->get_where('invoice', array(

				'invoice_id' => $invoice_id

			))->row();
			
			/****TRANSFERRING USER TO PAYPAL TERMINAL****/

			$this->paypal->add_field('rm', 2);

			$this->paypal->add_field('no_note', 0);

			$this->paypal->add_field('item_name', $invoice_details->title);

			$this->paypal->add_field('amount', $invoice_details->amount);

			$this->paypal->add_field('custom', $invoice_details->invoice_id);

			$this->paypal->add_field('business', $system_settings->description);

			$this->paypal->add_field('notify_url', base_url() . 'patient/list_invoice/paypal_ipn');

			$this->paypal->add_field('cancel_return', base_url() . 'patient/list_invoice/paypal_cancel');

			$this->paypal->add_field('return', base_url() . 'patient/list_invoice/paypal_success');

			

			$this->paypal->submit_paypal_post();

			// submit the fields to paypal

		}

		if ($param1 == 'paypal_ipn') {

			if ($this->paypal->validate_ipn() == true) {

				$ipn_response = '';

				foreach ($_POST as $key => $value) {

					$value = urlencode(stripslashes($value));

					$ipn_response .= "\n$key=$value";

				}

				$invoice_id     = $_POST['custom'];

				$data['status'] = 'paid';

				$this->db->where('invoice_id', $invoice_id);

				$this->db->update('invoice', $data);

				

				$data2['transaction_id'] = rand(10000, 100000);

				$data2['invoice_id']     = $invoice_id;

				$data2['patient_id']     = $this->crud_model->get_type_name_by_id('invoice', $invoice_id, 'patient_id');

				$data2['payment_method'] = 'paypal';

				$data2['description']    = $ipn_response;

				$data2['amount']         = $this->crud_model->get_type_name_by_id('invoice', $invoice_id, 'amount');

				$data2['timestamp']      = strtotime(date("m/d/Y"));

				

				$this->db->insert('payment', $data2);

			}

		}

		if ($param1 == 'paypal_cancel') {

			$this->session->set_flashdata('flash_message', get_phrase('payment_cancelled'));

			redirect(base_url() . 'patient/list_invoice/'.$this->session->userdata('login_user_id').'', 'refresh');

		}

		if ($param1 == 'paypal_success') {

			$this->session->set_flashdata('flash_message', get_phrase('payment_successfull'));

			redirect(base_url() . 'patient/list_invoice/', 'refresh');

		}

		

		$page_data['page_name']  = 'list_invoice';

		$page_data['page_title'] = get_phrase('list_invoice');

		$page_data['list_invoices']   = $this->db->get_where('invoice', array( 'patient_id' => $this->session->userdata('patient_id') ))->result_array();

		$this->load->view('index', $page_data);

	}

	
	
	/******* VIEW SCHEDULE DETAILS********/

	function view_invoice_details($invoice_id)

	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'view_invoice_details';
		$page_data['page_title']   	= get_phrase('view_invoice_details');
		$page_data['view_invoice_details'] 	=	$this->db->get_where('invoice' , array('invoice_id' => $invoice_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/******* PAY WITH VOGUE PAYMENT GATEWAY*******/

	function pay_with_vogue($invoice_id)

	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'pay_with_vogue';
		$page_data['page_title']   	= get_phrase('pay_with_vogue');
		$page_data['view_invoice_details'] 	=	$this->db->get_where('invoice' , array('invoice_id' => $invoice_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/******* PAY WITH PAYPAL PAYMENT GATEWAY*******/

	function pay_with_paypal($invoice_id)

	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'pay_with_paypal';
		$page_data['page_title']   	= get_phrase('pay_with_paypal');
		$page_data['view_invoice_details'] 	=	$this->db->get_where('invoice' , array('invoice_id' => $invoice_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '')
   {
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'patient/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'patient/message/message_read/' . $param2, 'refresh');
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
	
	
	/******* VIEW APPOINTMENT DETAILS********/

	function view_appointment_details($appointment_id, $doctor_id, $patient_id)

	{
		if ($this->session->userdata('patient_login') != 1)

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
	
	
	/******* VIEW SCHEDULE DETAILS********/

	function view_prescription_details($prescription_id)

	{
		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'view_prescription_details';
		$page_data['page_title']   	= get_phrase('view_prescription_details');
		$page_data['view_prescription_details'] 	=	$this->db->get_where('prescription' , array('prescription_id' => $prescription_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	

	
	



	/******VIEW ADMIT HISTORY*****/

	function view_admit_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']      = 'view_admit_history';

		$page_data['page_title']     = get_phrase('view_admit_history');

		$page_data['bed_allotments'] = $this->db->get_where('bed_allotment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}



	/******VIEW COMPLETED PAYMENT HISTORY*****/

	function payment_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']  = 'payment_history';

		$page_data['page_title'] = get_phrase('payment_history');

		$page_data['payments']   = $this->db->get_where('payment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	
	/******* LIST ALL DOCTORS PAGES********/

	function list_doctor($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_doctor';
		$page_data['page_title']   = get_phrase('list_doctor');
		$page_data['doctors'] = $this->db->get('doctor')->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* LIST ALL laboratorist PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		if ($this->session->userdata('patient_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}
	

	

	/******VIEW OPERATION HISTORY*****/

	function view_operation_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		

		$page_data['page_name']  = 'view_operation_history';

		$page_data['page_title'] = get_phrase('view_operation_history');

		$page_data['reports']    = $this->db->get_where('report', array(

			'patient_id' => $this->session->userdata('patient_id'),

			'type' => 'operation'

		))->result_array();

		$this->load->view('index', $page_data);

	}


/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('patient_id', $this->session->userdata('patient_id'));
			$this->db->update('patient', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $this->session->userdata('patient_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'patient/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['new_password']         = sha1($this->input->post('new_password'));

			$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));


			if ($data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('patient_id', $this->session->userdata('patient_id'));

				$this->db->update('patient', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'patient/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('patient', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

}