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
 LOCATION : application - controller - Pharmacist.php
 */



class Pharmacist extends CI_Controller

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

		if ($this->session->userdata('pharmacist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		if ($this->session->userdata('pharmacist_login') == 1)

			redirect(base_url() . 'pharmacist/dashboard', 'refresh');

	}

	

	/***pharmacist DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('pharmacist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('pharmacist_dashboard');

		$this->load->view('index', $page_data);

	}
	
	
	/***ADD MEDINICE CATEGORY********/

	function add_category($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('pharmacist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['name']        = $this->input->post('name');
			$data['description']        = $this->input->post('description');
			$this->db->insert('medicine_category', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('add_category_opened'));
			redirect(base_url() . 'pharmacist/list_category', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['name']        = $this->input->post('name');
			
			$this->db->where('medicine_category_id', $param2);
			$this->db->update('medicine_category', $data);
			$this->session->set_flashdata('flash_message', get_phrase('add_category_updated'));
			redirect(base_url() . 'pharmacist/list_category', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('add_category', array(
				'add_category_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('medicine_category_id', $param2);
			$this->db->delete('medicine_category');
			$this->session->set_flashdata('flash_message', get_phrase('add_category_deleted'));
			redirect(base_url() . 'pharmacist/list_category', 'refresh');
		}

		$page_data['page_name']   = 'add_category';
		$page_data['page_title']  = get_phrase('add_category');
		$page_data['add_categorys'] = $this->db->get('medicine_category')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	/******* LIST ALL CATEGORS PAGE********/

	function list_category($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('pharmacist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_category';
		$page_data['page_title']   = get_phrase('list_beds');
		$page_data['list_categorys'] = $this->db->get('medicine_category')->result_array();
		$this->load->view('index', $page_data);

	}
	
	
	/***ADD MEDICINE PAGE********/

	function medicine($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('pharmacist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			
			$data['name']                  = $this->input->post('name');

			$data['medicine_category_id']  = $this->input->post('medicine_category_id');

			$data['description']           = $this->input->post('description');

			$data['price']                 = $this->input->post('price');
			
			$data['quantity']                 = $this->input->post('quantity');

			$data['manufacturing_company'] = $this->input->post('manufacturing_company');

			$data['status']                = $this->input->post('status');
			
			$data['date'] 				= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			
			$this->db->insert('medicine', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('medicine_opened'));
			redirect(base_url() . 'pharmacist/view_medicine', 'refresh');

		}

		if ($param1 == 'do_update') {
			
			$data['name']                  = $this->input->post('name');

			$data['medicine_category_id']  = $this->input->post('medicine_category_id');

			$data['description']           = $this->input->post('description');

			$data['price']                 = $this->input->post('price');
			
			$data['quantity']                 = $this->input->post('quantity');

			$data['manufacturing_company'] = $this->input->post('manufacturing_company');

			$data['status']                = $this->input->post('status');
			
			$data['date'] 				= strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			
			$this->db->where('medicine_id', $param2);
			$this->db->update('medicine', $data);
			$this->session->set_flashdata('flash_message', get_phrase('medicine_updated'));
			redirect(base_url() . 'pharmacist/view_medicine', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('medicine', array(
				'medicine_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('medicine_id', $param2);
			$this->db->delete('medicine');
			$this->session->set_flashdata('flash_message', get_phrase('medicine_deleted'));
			redirect(base_url() . 'pharmacist/view_medicine', 'refresh');
		}

		$page_data['page_name']   = 'medicine';
		$page_data['page_title']  = get_phrase('add_new_medicine');
		$page_data['medicines'] = $this->db->get('medicine')->result_array();
		$this->load->view('index', $page_data);
	}

	

	/*******VIEW MEDICINE********/

	function view_medicine($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('pharmacist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']  = 'view_medicine';

		$page_data['page_title'] = get_phrase('view_medicine');

		$page_data['medicines']  = $this->db->get('medicine')->result_array();

		$this->load->view('index', $page_data);

	}

	

	
	
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '') {
    if ($this->session->userdata('pharmacist_login') != 1)
        redirect(base_url(), 'refresh');

    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'pharmacist/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'pharmacist/message/message_read/' . $param2, 'refresh');
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


/******* LIST ALL pharmacist PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		 if ($this->session->userdata('pharmacist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}
	

	

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('pharmacist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('pharmacist_id', $this->session->userdata('pharmacist_id'));
			$this->db->update('pharmacist', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/pharmacist_image/' . $this->session->userdata('pharmacist_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'pharmacist/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['new_password']         = sha1($this->input->post('new_password'));

			$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));


			if ($data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('pharmacist_id', $this->session->userdata('pharmacist_id'));

				$this->db->update('pharmacist', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('error_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'pharmacist/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('pharmacist', array(

			'pharmacist_id' => $this->session->userdata('pharmacist_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	

}