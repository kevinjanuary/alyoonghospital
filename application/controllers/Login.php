<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

		$this->load->database();
		$this->load->library('session');
    }


    public function index() {
      	if ($this->session->userdata('admin_login') == 1)redirect(base_url() . 'admin/dashboard', 'refresh');
	  	if ($this->session->userdata('doctor_login') == 1) redirect(base_url() . 'doctor/dashboard', 'refresh');
		if ($this->session->userdata('patient_login') == 1) redirect(base_url() . 'patient/dashboard', 'refresh');
		if ($this->session->userdata('nurse_login') == 1) redirect(base_url() . 'nurse/dashboard', 'refresh');
		if ($this->session->userdata('pharmacist_login') == 1) redirect(base_url() . 'pharmacist/dashboard', 'refresh');
		if ($this->session->userdata('laboratorist_login') == 1) redirect(base_url() . 'laboratorist/dashboard', 'refresh');
		if ($this->session->userdata('accountant_login') == 1) redirect(base_url() . 'accountant/dashboard', 'refresh');
		if ($this->session->userdata('receptionist_login') == 1) redirect(base_url() . 'receptionist/dashboard', 'refresh');
        $this->load->view('login');
    }

	//Validating login
    function check_detail() {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $credential = array('email' => $email, 'password' => sha1($password));
      
	  // Checking login credential for admin
      $query = $this->db->get_where('admin', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('admin_login', '1');
          $this->session->set_userdata('admin_id', $row->admin_id);
          $this->session->set_userdata('login_user_id', $row->admin_id);
          $this->session->set_userdata('login_type', 'admin');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
		  redirect(base_url() . 'admin/dashboard', 'refresh');
		      
	  }
	  
	  // Checking login credential for doctor
      $query = $this->db->get_where('doctor', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('doctor_login', '1');
          $this->session->set_userdata('doctor_id', $row->doctor_id);
          $this->session->set_userdata('login_user_id', $row->doctor_id);
          $this->session->set_userdata('login_type', 'doctor');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('doctor/dashboard'), 'refresh');
      }
	
	  
	  // Checking login credential for patient
      $query = $this->db->get_where('patient', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('patient_login', '1');
          $this->session->set_userdata('patient_id', $row->patient_id);
          $this->session->set_userdata('login_user_id', $row->patient_id);
          $this->session->set_userdata('login_type', 'patient');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('patient/dashboard'), 'refresh');
      }
	  
	   // Checking login credential for nurse
      $query = $this->db->get_where('nurse', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('nurse_login', '1');
          $this->session->set_userdata('nurse_id', $row->nurse_id);
          $this->session->set_userdata('login_user_id', $row->nurse_id);
          $this->session->set_userdata('login_type', 'nurse');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('nurse/dashboard'), 'refresh');
      }
	  
	  
	   // Checking login credential for pharmacist
      $query = $this->db->get_where('pharmacist', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('pharmacist_login', '1');
          $this->session->set_userdata('pharmacist_id', $row->pharmacist_id);
          $this->session->set_userdata('login_user_id', $row->pharmacist_id);
          $this->session->set_userdata('login_type', 'pharmacist');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('pharmacist/dashboard'), 'refresh');
      }
	  
	   // Checking login credential for laboratorist
      $query = $this->db->get_where('laboratorist', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('laboratorist_login', '1');
          $this->session->set_userdata('laboratorist_id', $row->laboratorist_id);
          $this->session->set_userdata('login_user_id', $row->laboratorist_id);
          $this->session->set_userdata('login_type', 'laboratorist');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('laboratorist/dashboard'), 'refresh');
      }
	  
	   // Checking login credential for accountant
      $query = $this->db->get_where('accountant', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('accountant_login', '1');
          $this->session->set_userdata('accountant_id', $row->accountant_id);
          $this->session->set_userdata('login_user_id', $row->accountant_id);
          $this->session->set_userdata('login_type', 'accountant');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('accountant/dashboard'), 'refresh');
      }
	  
	  // Checking login credential for receptionist
      $query = $this->db->get_where('receptionist', $credential);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          $this->session->set_userdata('receptionist_login', '1');
          $this->session->set_userdata('receptionist_id', $row->receptionist_id);
          $this->session->set_userdata('login_user_id', $row->receptionist_id);
          $this->session->set_userdata('login_type', 'receptionist');
		  $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
          redirect(site_url('receptionist/dashboard'), 'refresh');
      }
	  
	   $this->session->set_flashdata('error_message', get_phrase('Invalid Login Detail'));
       redirect(site_url('login'), 'refresh');
	  
	  }


    function logout()

	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login', 'refresh');
	}

	

	/***DEFAULT NOR FOUND PAGE*****/

	function four_zero_four()
	{
		$this->load->view('four_zero_four');
	}

	

	/***RESET AND SEND PASSWORD TO REQUESTED EMAIL****/

	function reset_password()
	{
		$email  = $this->input->post('email');

		$result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL

		if ($result == true) {

			$this->session->set_flashdata('flash_message', get_phrase('password_sent'));

		} else if ($result == false) {

			$this->session->set_flashdata('flash_message', get_phrase('account_not_found'));

		}

	}

}
