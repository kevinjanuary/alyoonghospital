<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Accountant extends CI_Controller { 

    function __construct() {
        parent::__construct();
        		$this->load->database();                        
                $this->load->library('session');	
               
    }

    public function index() 
	{
        if($this->session->userdata('accountant_login') != 1) redirect(base_url(). 'login', 'refresh');
        if($this->session->userdata('accountant_login') == 1) redirect(base_url(). 'accountant/dashboard', 'refresh');
    
    }

    function dashboard() {

        if($this->session->userdata('accountant_login') != 1) redirect(base_url(). 'login', 'refresh');
        
       	$page_data['page_name']  = 'dashboard';
        $page_data['page_title'] =  get_phrase('Accountant Dashboard');
        $this->load->view('index', $page_data);
    }
	
	
	function list_accountant($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_accountant';
		$page_data['page_title']   = get_phrase('list_accountant');
		$page_data['accountant'] = $this->db->get('accountant')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	
	

	/*  INVOICE CODE HERE */
	function invoice_add($param1 = '', $param2 = '', $param3 = '')
	 {
       if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');
   
        if ($param1 == 'create') {
            $this->crud_model->create_invoice();
            
			$this->session->set_flashdata('flash_message', get_phrase('invoice_added'));
			redirect(base_url() . 'accountant/list_invoice', 'refresh');
        }

        $data['page_name'] = 'invoice_add';
        $data['page_title'] = get_phrase('invoice');
        $this->load->view('index', $data);
    }

    function list_invoice($task = "", $invoice_id = "") {
       if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			{
        }

        if ($task == "update") {
            $this->crud_model->update_invoice($invoice_id);
            $this->session->set_flashdata('message', get_phrase('invoice_info_updated_successfuly'));
			redirect(base_url() . 'accountant/list_invoice', 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_invoice($invoice_id);
			redirect(base_url() . 'accountant/list_invoice', 'refresh');
        }

        $data['invoice_info'] = $this->crud_model->select_invoice_info();
        $data['page_name'] = 'list_invoice';
        $data['page_title'] = get_phrase('invoice');
        $this->load->view('index', $data);
    }
	
	
	 function form($task = "") {
       if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			{
        }

        $data['page_name'] = 'form_create';
        $data['page_title'] = get_phrase('create_form');
        $this->load->view('index', $data);
    }

    function get_form_element($element_type) {
       if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			{
        }

        echo $html = $this->db->get_where('form_element', array('type' => $element_type))->row()->html;
        //$this->load->view('backend/accountant/form_create_body', $html);
        //echo $element_type;
    }
	
	
	
	/******* VIEW SCHEDULE DETAILS********/

	function view_invoice_details($invoice_id)

	{
		if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			
		
		$page_data['page_name']    	= 'view_invoice_details';
		$page_data['page_title']   	= get_phrase('view_invoice_details');
		$page_data['view_invoice_details'] 	=	$this->db->get_where('invoice' , array('invoice_id' => $invoice_id) )->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/******* LIST ALL NURSE PAGES********/

	function list_nurse($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('accountant_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_nurse';
		$page_data['page_title']   = get_phrase('list_nurse');
		$page_data['nurse'] = $this->db->get('nurse')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/* * ****MANAGE SEARCH nurse PAGE** */
function search_nurse($department_id = '', $param2 = '', $sparam3 = '') {
    if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'accountant/search_nurse/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'accountant/search_nurse/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'search_nurse';

    $page_data['page_name'] = 'search_nurse';
    $page_data['page_title'] = get_phrase('nurse_by_department');
    $this->load->view('index', $page_data);
}

	
	
	/* * ****MANAGE SEARCH doctor PAGE** */
function search_doctor($department_id = '', $param2 = '', $sparam3 = '') {
   if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['department_id'] = $this->input->post('department_id');

        if ($page_data['department_id'] > 0 ) 
		{
            redirect(base_url() . 'accountant/search_doctor/' . $page_data['department_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'accountant/search_doctor/', 'refresh');
        }
    }
	
	$page_data['department_id'] = $department_id;
    $page_data['page_info'] = 'search_doctor';

    $page_data['page_name'] = 'search_doctor';
    $page_data['page_title'] = get_phrase('doctor_by_department');
    $this->load->view('index', $page_data);
}


	/******* LIST ALL DOCTORS PAGES********/

	function list_doctor($param1 = '', $param2 = '', $param3 = '')
	{
			if ($this->session->userdata('accountant_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_doctor';
		$page_data['page_title']   = get_phrase('list_doctor');
		$page_data['doctors'] = $this->db->get('doctor')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	
	/******* LIST ALL laboratorist PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		 if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');


			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '')
   {
		 if ($this->session->userdata('accountant_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'accountant/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'accountant/message/message_read/' . $param2, 'refresh');
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

		if ($this->session->userdata('accountant_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('accountant_id', $this->session->userdata('accountant_id'));
			$this->db->update('accountant', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $this->session->userdata('accountant_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'accountant/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['new_password']         = sha1($this->input->post('new_password'));

			$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

		
			if ($data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('accountant_id', $this->session->userdata('accountant_id'));

				$this->db->update('accountant', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'accountant/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('accountant', array(

			'accountant_id' => $this->session->userdata('accountant_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	
	

}