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
 LOCATION : application - controller - Laboratorist.php
 */


class Laboratorist extends CI_Controller

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

		if ($this->session->userdata('laboratorist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		if ($this->session->userdata('laboratorist_login') == 1)

			redirect(base_url() . 'laboratorist/dashboard', 'refresh');

	}

	

	/***laboratorist DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('laboratorist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = get_phrase('laboratorist_dashboard');

		$this->load->view('index', $page_data);

	}

	

	

/******MANAGE BLOOD DONORS*****/
function add_donor($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');
		


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
			redirect(base_url() . 'laboratorist/list_donor', 'refresh');

		}

		if ($param1 == 'do_update') {

			$data['name']                    = $this->input->post('name');
			$data['blood_group']             = $this->input->post('blood_group');
			$data['sex']                     = $this->input->post('sex');
			$data['age']                     = $this->input->post('age');
			$data['phone']                   = $this->input->post('phone');
			$data['email']                   = $this->input->post('email');
			$data['address']                 = $this->input->post('address');
			
			$data['last_donation_timestamp'] = strtotime($this->input->post('last_donation_timestamp'));
			
			$this->db->where('blood_donor_id', $param2);
			$this->db->update('blood_donor', $data);
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			redirect(base_url() . 'laboratorist/list_donor', 'refresh');

			

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('blood_donor', array(
				'blood_donor_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('blood_donor_id', $param2);
			$this->db->delete('blood_donor');
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'laboratorist/list_donor', 'refresh');
		}

		$page_data['page_name']    = 'add_donor';
		$page_data['page_title']   = get_phrase('manage_blood_donor');
		$page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();
		$this->load->view('index', $page_data);

	}
	
	/******* LIST ALL DOCTORS SHEDULE PAGES********/

	function list_donor($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_donor';
		$page_data['page_title']   = get_phrase('list_donors');
		$page_data['list_donors'] = $this->db->get('blood_donor')->result_array();
		$this->load->view('index', $page_data);

	}
	


	/***BLOOD BANK INFORMATION PAGE********/

	function add_blood($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

		if ($param1 == 'create') {
			$data['blood_group']        = $this->input->post('blood_group');
			$data['status'] = $this->input->post('status');
			$this->db->insert('blood_bank', $data);
			
			$this->session->set_flashdata('flash_message', get_phrase('blood_bank_opened'));
			redirect(base_url() . 'laboratorist/list_blood', 'refresh');

		}

		if ($param1 == 'do_update') {
			$data['blood_group']        = $this->input->post('blood_group');
			$data['status'] = $this->input->post('status');
			
			$this->db->where('blood_group_id', $param2);
			$this->db->update('blood_bank', $data);
			$this->session->set_flashdata('flash_message', get_phrase('blood_bank_updated'));
			redirect(base_url() . 'laboratorist/list_blood', 'refresh');

		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('blood_bank', array(
				'blood_group_id' => $param2
			))->result_array();
		}

		if ($param1 == 'delete') {
			$this->db->where('blood_group_id', $param2);
			$this->db->delete('blood_bank');
			$this->session->set_flashdata('flash_message', get_phrase('blood_bank_deleted'));
			redirect(base_url() . 'laboratorist/list_blood', 'refresh');
		}

		$page_data['page_name']   = 'add_blood';
		$page_data['page_title']  = get_phrase('add_blood_bank');
		$page_data['blood_banks'] = $this->db->get('blood_bank')->result_array();
		$this->load->view('index', $page_data);
	}
	
	/******* LIST ALL DOCTORS SHEDULE PAGES********/

	function list_blood($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');

			

		$page_data['page_name']    = 'list_blood';
		$page_data['page_title']   = get_phrase('list_all_bloods');
		$page_data['list_bloods'] = $this->db->get('blood_bank')->result_array();
		$this->load->view('index', $page_data);

	}
	

	

	

	/******* LIST ALL laboratorist PAGES*******	*/

	function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
		{
		 if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


			
		$page_data['page_name']    = 'list_noticeboard';
		$page_data['page_title']   = get_phrase('list_noticeboard');
		$page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
		$this->load->view('index', $page_data);
	}
	
	
	
	/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '')
   {
		 if ($this->session->userdata('laboratorist_login') != 1)
			redirect(base_url() . 'login', 'refresh');


    if ($param1 == 'send_new') {
        $message_thread_code = $this->crud_model->send_new_private_message();
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'laboratorist/message/message_read/' . $message_thread_code, 'refresh');
    }

    if ($param1 == 'send_reply') {
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(base_url() . 'laboratorist/message/message_read/' . $param2, 'refresh');
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

		if ($this->session->userdata('laboratorist_login') != 1)

			redirect(base_url() . 'login', 'refresh');

			

		if ($param1 == 'update_profile_info') {

			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			

			$this->db->where('laboratorist_id', $this->session->userdata('laboratorist_id'));
			$this->db->update('laboratorist', $data);
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/laboratorist_image/' . $this->session->userdata('laboratorist_id') . '.jpg');
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));

			

			redirect(base_url() . 'laboratorist/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('laboratorist', array(

				'laboratorist_id' => $this->session->userdata('laboratorist_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('laboratorist_id', $this->session->userdata('laboratorist_id'));

				$this->db->update('laboratorist', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

			} else {

				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

			}

			

			redirect(base_url() . 'laboratorist/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = get_phrase('manage_profile');

		$page_data['edit_profile'] = $this->db->get_where('laboratorist', array(

			'laboratorist_id' => $this->session->userdata('laboratorist_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}
	
}