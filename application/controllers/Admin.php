<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Barcode_model');                //Load library for model (Crud Models)	

    }

    public function index()
    {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('admin_login') == 1) redirect(base_url() . 'admin/dashboard', 'refresh');
    }

    function dashboard()
    {

        if ($this->session->userdata('admin_login') != 1) redirect(base_url() . 'login', 'refresh');

        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] =  get_phrase('Admin Dashboard');
        $this->load->view('index', $page_data);
    }

    /***DEPARTMENTS OF DOCTORS********/

    function manage_department($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $this->db->insert('department', $data);

            $this->session->set_flashdata('flash_message', get_phrase('department_opened'));
            redirect(base_url() . 'admin/list_department', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');

            $this->db->where('department_id', $param2);
            $this->db->update('department', $data);
            $this->session->set_flashdata('flash_message', get_phrase('department_updated'));
            redirect(base_url() . 'admin/list_department', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('department', array(
                'department_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('department_id', $param2);
            $this->db->delete('department');
            $this->session->set_flashdata('flash_message', get_phrase('department_deleted'));
            redirect(base_url() . 'admin/list_department', 'refresh');
        }

        $page_data['page_name']   = 'manage_department';
        $page_data['page_title']  = get_phrase('manage_department');
        $page_data['departments'] = $this->db->get('department')->result_array();
        $this->load->view('index', $page_data);
    }



    /**MANAGE BED WARDS********/

    function manage_bed_ward($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $this->db->insert('bed_ward', $data);

            $this->session->set_flashdata('flash_message', get_phrase('bed_ward_opened'));
            redirect(base_url() . 'admin/list_bed_ward', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');

            $this->db->where('bed_ward_id', $param2);
            $this->db->update('bed_ward', $data);
            $this->session->set_flashdata('flash_message', get_phrase('bed_ward_updated'));
            redirect(base_url() . 'admin/list_bed_ward', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('bed_ward', array(
                'bed_ward_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('bed_ward_id', $param2);
            $this->db->delete('bed_ward');
            $this->session->set_flashdata('flash_message', get_phrase('bed_ward_deleted'));
            redirect(base_url() . 'admin/list_bed_ward', 'refresh');
        }

        $page_data['page_name']   = 'manage_bed_ward';
        $page_data['page_title']  = get_phrase('manage_bed_ward');
        $page_data['bed_wards'] = $this->db->get('bed_ward')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL BED WARD PAGE********/

    function list_bed_ward($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_bed_ward';
        $page_data['page_title']   = get_phrase('list_bed_ward');
        $page_data['list_bed_ward'] = $this->db->get('bed_ward')->result_array();
        $this->load->view('index', $page_data);
    }



    /***ADD MEDINICE CATEGORY********/

    function add_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description']        = $this->input->post('description');
            $this->db->insert('medicine_category', $data);

            $this->session->set_flashdata('flash_message', get_phrase('add_category_opened'));
            redirect(base_url() . 'admin/list_category', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');

            $this->db->where('medicine_category_id', $param2);
            $this->db->update('medicine_category', $data);
            $this->session->set_flashdata('flash_message', get_phrase('add_category_updated'));
            redirect(base_url() . 'admin/list_category', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('add_category', array(
                'add_category_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('medicine_category_id', $param2);
            $this->db->delete('medicine_category');
            $this->session->set_flashdata('flash_message', get_phrase('add_category_deleted'));
            redirect(base_url() . 'admin/list_category', 'refresh');
        }

        $page_data['page_name']   = 'add_category';
        $page_data['page_title']  = get_phrase('add_category');
        $page_data['add_categorys'] = $this->db->get('medicine_category')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL CATEGORS PAGE********/

    function list_category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_category';
        $page_data['page_title']   = get_phrase('list_beds');
        $page_data['list_categorys'] = $this->db->get('medicine_category')->result_array();
        $this->load->view('index', $page_data);
    }



    /***ADD BED OF PAGE********/

    function add_bed($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['bed_type']        = $this->input->post('bed_type');
            $data['bed_capacity'] = $this->input->post('bed_capacity');
            $data['charge']        = $this->input->post('charge');
            $data['description'] = $this->input->post('description');
            $data['status']        = $this->input->post('status');
            $data['bed_ward_id']        = $this->input->post('bed_ward_id');
            $data['department_id']        = $this->input->post('department_id');
            $this->db->insert('add_bed', $data);

            $this->session->set_flashdata('flash_message', get_phrase('add_bed_opened'));
            redirect(base_url() . 'admin/list_bed', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['bed_type']        = $this->input->post('bed_type');
            $data['bed_capacity'] = $this->input->post('bed_capacity');
            $data['charge']        = $this->input->post('charge');
            $data['description'] = $this->input->post('description');
            $data['status']        = $this->input->post('status');
            $data['bed_ward_id']        = $this->input->post('bed_ward_id');
            $data['department_id']        = $this->input->post('department_id');

            $this->db->where('add_bed_id', $param2);
            $this->db->update('add_bed', $data);
            $this->session->set_flashdata('flash_message', get_phrase('add_bed_updated'));
            redirect(base_url() . 'admin/list_bed', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('add_bed', array(
                'add_bed_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('add_bed_id', $param2);
            $this->db->delete('add_bed');
            $this->session->set_flashdata('flash_message', get_phrase('add_bed_deleted'));
            redirect(base_url() . 'admin/list_bed', 'refresh');
        }

        $page_data['page_name']   = 'add_bed';
        $page_data['page_title']  = get_phrase('add_new_bed');
        $page_data['add_beds'] = $this->db->get('add_bed')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL bed PAGES********/

    function list_bed($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_bed';
        $page_data['page_title']   = get_phrase('list_beds');
        $page_data['list_beds'] = $this->db->get('add_bed')->result_array();
        $this->load->view('index', $page_data);
    }

    /*  INVOICE CODE HERE */
    function invoice_add($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $this->crud_model->create_invoice();

            $this->session->set_flashdata('flash_message', get_phrase('invoice_added'));
            redirect(base_url() . 'admin/list_invoice', 'refresh');
        }

        $data['page_name'] = 'invoice_add';
        $data['page_title'] = get_phrase('invoice');
        $this->load->view('index', $data);
    }

    function list_invoice($task = "", $invoice_id = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh'); {
        }

        if ($task == "update") {
            $this->crud_model->update_invoice($invoice_id);
            $this->session->set_flashdata('message', get_phrase('invoice_info_updated_successfuly'));
            redirect(base_url() . 'admin/list_invoice', 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_invoice($invoice_id);
            redirect(base_url() . 'admin/list_invoice', 'refresh');
        }

        $data['invoice_info'] = $this->crud_model->select_invoice_info();
        $data['page_name'] = 'list_invoice';
        $data['page_title'] = get_phrase('invoice');
        $this->load->view('index', $data);
    }


    function form($task = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh'); {
        }

        $data['page_name'] = 'form_create';
        $data['page_title'] = get_phrase('create_form');
        $this->load->view('index', $data);
    }

    function get_form_element($element_type)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh'); {
        }

        echo $html = $this->db->get_where('form_element', array('type' => $element_type))->row()->html;
        //$this->load->view('backend/accountant/form_create_body', $html);
        //echo $element_type;
    }



    /******* VIEW INVOICE  DETAILS********/

    function view_invoice_details($invoice_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_invoice_details';
        $page_data['page_title']       = get_phrase('view_invoice_details');
        $page_data['view_invoice_details']     =    $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /*  PRESCRIPTION CODE HERE */
    function add_prescription($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $this->crud_model->create_prescription();

            $this->session->set_flashdata('flash_message', get_phrase('add_prescriptioned'));
            redirect(base_url() . 'admin/list_prescription', 'refresh');
        }

        $data['page_name'] = 'add_prescription';
        $data['page_title'] = get_phrase('add_prescription');
        $this->load->view('index', $data);
    }

    function list_prescription($task = "", $prescription_id = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh'); {
        }

        if ($task == "update") {
            $this->crud_model->update_prescription($prescription_id);
            $this->session->set_flashdata('message', get_phrase('prescription_updated_successfuly'));
            redirect(base_url() . 'admin/list_prescription', 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_prescription($prescription_id);
            redirect(base_url() . 'admin/list_prescription', 'refresh');
        }

        $data['prescription_info'] = $this->crud_model->select_prescription_info();
        $data['page_name'] = 'list_prescription';
        $data['page_title'] = get_phrase('list_prescription');
        $this->load->view('index', $data);
    }


    /******* VIEW SCHEDULE DETAILS********/

    function view_prescription_details($prescription_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_prescription_details';
        $page_data['page_title']       = get_phrase('view_prescription_details');
        $page_data['view_prescription_details']     =    $this->db->get_where('prescription', array('prescription_id' => $prescription_id))->result_array();
        $this->load->view('index', $page_data);
    }



    /***ASSIGN BED OF PAGE********/

    function assign_bed($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['patient_id']      = $this->input->post('patient_id');
            $data['bed_type']     = $this->input->post('bed_type');
            $data['assign_date']    = $this->input->post('assign_date');
            $data['discharge_date'] = $this->input->post('discharge_date');
            $data['description']     = $this->input->post('description');
            $data['status']           = $this->input->post('status');
            $this->db->insert('assign_bed', $data);

            $this->session->set_flashdata('flash_message', get_phrase('assign_bed_opened'));
            redirect(base_url() . 'admin/list_assign_bed', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['patient_id']     = $this->input->post('patient_id');
            $data['bed_type']         = $this->input->post('bed_type');
            $data['assign_date']    = $this->input->post('assign_date');
            $data['discharge_date'] = $this->input->post('discharge_date');
            $data['description']     = $this->input->post('description');
            $data['status']           = $this->input->post('status');

            $this->db->where('assign_bed_id', $param2);
            $this->db->update('assign_bed', $data);
            $this->session->set_flashdata('flash_message', get_phrase('assign_bed_updated'));
            redirect(base_url() . 'admin/list_assign_bed', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('assign_bed', array(
                'assign_bed_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('assign_bed_id', $param2);
            $this->db->delete('assign_bed');
            $this->session->set_flashdata('flash_message', get_phrase('assign_bed_deleted'));
            redirect(base_url() . 'admin/list_assign_bed', 'refresh');
        }

        $page_data['page_name']   = 'assign_bed';
        $page_data['page_title']  = get_phrase('assign_new_bed');
        $page_data['assign_beds'] = $this->db->get('assign_bed')->result_array();
        $this->load->view('index', $page_data);
    }


    /*******LIST ASSIGN BED PAGES********/

    function list_assign_bed($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_assign_bed';
        $page_data['page_title']   = get_phrase('list_assign_beds');
        $page_data['list_assign_beds'] = $this->db->get('assign_bed')->result_array();
        $this->load->view('index', $page_data);
    }




    /******MANAGE BLOOD DONORS*****/
    function add_donor($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
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
            redirect(base_url() . 'admin/list_donor', 'refresh');
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
            redirect(base_url() . 'admin/list_donor', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('blood_donor', array(
                'blood_donor_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('blood_donor_id', $param2);
            $this->db->delete('blood_donor');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_donor', 'refresh');
        }

        $page_data['page_name']    = 'add_donor';
        $page_data['page_title']   = get_phrase('manage_blood_donor');
        $page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* LIST ALL DOCTORS SHEDULE PAGES********/

    function list_donor($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_donor';
        $page_data['page_title']   = get_phrase('list_donors');
        $page_data['list_donors'] = $this->db->get('blood_donor')->result_array();
        $this->load->view('index', $page_data);
    }



    /***BLOOD BANK INFORMATION PAGE********/

    function add_blood($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['blood_group']        = $this->input->post('blood_group');
            $data['status'] = $this->input->post('status');
            $this->db->insert('blood_bank', $data);

            $this->session->set_flashdata('flash_message', get_phrase('blood_bank_opened'));
            redirect(base_url() . 'admin/list_blood', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['blood_group']        = $this->input->post('blood_group');
            $data['status'] = $this->input->post('status');

            $this->db->where('blood_group_id', $param2);
            $this->db->update('blood_bank', $data);
            $this->session->set_flashdata('flash_message', get_phrase('blood_bank_updated'));
            redirect(base_url() . 'admin/list_blood', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('blood_bank', array(
                'blood_group_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('blood_group_id', $param2);
            $this->db->delete('blood_bank');
            $this->session->set_flashdata('flash_message', get_phrase('blood_bank_deleted'));
            redirect(base_url() . 'admin/list_blood', 'refresh');
        }

        $page_data['page_name']   = 'add_blood';
        $page_data['page_title']  = get_phrase('add_blood_bank');
        $page_data['blood_banks'] = $this->db->get('blood_bank')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* LIST ALL DOCTORS SHEDULE PAGES********/

    function list_blood($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_blood';
        $page_data['page_title']   = get_phrase('list_all_bloods');
        $page_data['list_bloods'] = $this->db->get('blood_bank')->result_array();
        $this->load->view('index', $page_data);
    }



    /***ADD SHEDULE FOR DOCTOR********/

    function add_shedule($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['doctor_id']      = $this->input->post('doctor_id');
            $data['avail_day']         = $this->input->post('avail_day');
            $data['department_id']  = $this->input->post('department_id');
            $data['start_time']     = $this->input->post('start_time');

            $data['end_time']            = $this->input->post('end_time');
            $data['per_patient_time']     = $this->input->post('per_patient_time');
            $data['status']                = $this->input->post('status');

            $this->db->insert('shedule', $data);
            $this->session->set_flashdata('flash_message', get_phrase('shedule_created'));
            redirect(base_url() . 'admin/list_shedule', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['doctor_id']      = $this->input->post('doctor_id');
            $data['avail_day']         = $this->input->post('avail_day');
            $data['department_id']  = $this->input->post('department_id');
            $data['start_time']     = $this->input->post('start_time');

            $data['end_time']            = $this->input->post('end_time');
            $data['per_patient_time']     = $this->input->post('per_patient_time');
            $data['status']                = $this->input->post('status');


            $this->db->where('shedule_id', $param2);
            $this->db->update('shedule', $data);
            $this->session->set_flashdata('flash_message', get_phrase('shedule_updated'));
            redirect(base_url() . 'admin/list_shedule', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('shedule', array(
                'shedule_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('shedule_id', $param2);
            $this->db->delete('shedule');
            $this->session->set_flashdata('flash_message', get_phrase('shedule_deleted'));
            redirect(base_url() . 'admin/list_shedule', 'refresh');
        }

        $page_data['page_name']   = 'add_shedule';
        $page_data['page_title']  = get_phrase('add_shedule');
        $page_data['shedules'] = $this->db->get('shedule')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL DOCTORS SHEDULE PAGES********/

    function list_shedule($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_shedule';
        $page_data['page_title']   = get_phrase('list_shedules');
        $page_data['list_shedules'] = $this->db->get('shedule')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* VIEW SCHEDULE DETAILS********/

    function edit_shedule_details($shedule_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_shedule_details';
        $page_data['page_title']       = get_phrase('edit_shedule_details');
        $page_data['edit']             =    $this->db->get_where('shedule', array('shedule_id' => $shedule_id))->result_array();
        $this->load->view('index', $page_data);
    }




    /***ADD appointment FOR DOCTOR********/

    function add_appointment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $data['appointment_code']          = $this->input->post('appointment_code');
            $data['patient_id']          = $this->input->post('patient_id');
            $data['department_id']      = $this->input->post('department_id');
            $data['doctor_id']          = $this->input->post('doctor_id');
            $data['shedule']         = $this->input->post('shedule');
            $data['issue']                = $this->input->post('issue');
            $data['create_timestamp']     = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
            $data['status']                = $this->input->post('status');

            $this->db->insert('appointment', $data);
            $this->session->set_flashdata('flash_message', get_phrase('appointment_created'));
            redirect(base_url() . 'admin/list_appointment', 'refresh');
        }

        if ($param1 == 'do_update') {
            $data['appointment_code']          = $this->input->post('appointment_code');
            $data['patient_id']          = $this->input->post('patient_id');
            $data['department_id']      = $this->input->post('department_id');
            $data['doctor_id']          = $this->input->post('doctor_id');
            $data['shedule']             = $this->input->post('shedule');
            $data['issue']                = $this->input->post('issue');
            $data['create_timestamp']     = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
            $data['status']                = $this->input->post('status');

            $this->db->where('appointment_id', $param2);
            $this->db->update('appointment', $data);
            $this->session->set_flashdata('flash_message', get_phrase('appointment_updated'));
            redirect(base_url() . 'admin/list_appointment', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('appointment', array(
                'appointment_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('appointment_id', $param2);
            $this->db->delete('appointment');
            $this->session->set_flashdata('flash_message', get_phrase('appointment_deleted'));
            redirect(base_url() . 'admin/list_appointment', 'refresh');
        }

        $page_data['page_name']   = 'add_appointment';
        $page_data['page_title']  = get_phrase('add_appointment');
        $page_data['appointments'] = $this->db->get('appointment')->result_array();
        $this->load->view('index', $page_data);
    }



    /******* EDIT APPOINTMENT DETAILS********/

    function edit_appointment_details($appointment_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_appointment_details';
        $page_data['page_title']       = get_phrase('edit_appointment_details');
        $page_data['edit_appointments'] =    $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT APPOINTMENT DETAILS********/

    function view_appointment_details($appointment_id, $doctor_id, $patient_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        $doctor_id = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
        $patient_id = $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();

        $page_data['page_name']        = 'view_appointment_details';
        $page_data['page_title']       = get_phrase('view_appointment_details');
        $page_data['view_appointment_details'] = $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->result_array();
        $page_data['doctor_id'] =  $doctor_id;
        $page_data['patient_id'] = $patient_id;
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL DOCTORS appointment PAGES********/

    function list_appointment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_appointment';
        $page_data['page_title']   = get_phrase('list_appointments');
        $page_data['list_appointments'] = $this->db->get('appointment')->result_array();
        $this->load->view('index', $page_data);
    }




    /******* LIST ALL DEPARTMENT PAGES********/

    function list_department($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_department';
        $page_data['page_title']   = get_phrase('list_departments');
        $page_data['list_departments'] = $this->db->get('department')->result_array();
        $this->load->view('index', $page_data);
    }


    /***Manage doctors**/

    function manage_doctor($param1 = '', $param2 = '', $param3 = '')

    {
        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['department_id']         = $this->input->post('department_id');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('doctor', $data);
            $doctor_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/doctor_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/doctor_image/' . $doctor_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('doctor_added_successfully'));
            // $this->email_model->account_opening_email('doctor', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'admin/list_doctor', 'refresh');
        }

        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['id_card']               = $this->input->post('id_card');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['city']               = $this->input->post('city');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['phone']                 = $this->input->post('phone');
            $data['department_id']         = $this->input->post('department_id');


            $this->db->where('doctor_id', $param2);
            $this->db->update('doctor', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/doctor_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_doctor', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('doctor', array(
                'doctor_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('doctor_id', $param2);
            $this->db->delete('doctor');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_doctor', 'refresh');
        }

        $page_data['page_name']  = 'manage_doctor';
        $page_data['page_title'] = get_phrase('manage_doctor');
        $page_data['doctors']    = $this->db->get('doctor')->result_array();
        $this->load->view('index', $page_data);
    }

    function get_department_doctor($department_id)
    {
        $doctors = $this->db->get_where('doctor', array(
            'department_id' => $department_id
        ))->result_array();
        foreach ($doctors as $row) {
            echo '<option value="' . $row['doctor_id'] . '">' . $row['name'] . '</option>';
        }
    }

    function get_doctor_shedule($doctor_id)
    {
        $shedules = $this->db->get_where('shedule', array(
            'doctor_id' => $doctor_id
        ))->result_array();

        if ($shedules !== '') {
            foreach ($shedules as $row) {
                echo '<option value="' . 'Date:' . $row['avail_day'] . '&nbsp;&nbsp;Time:&nbsp;&nbsp;' . $row['start_time'] . '&nbsp;&nbsp;To:&nbsp;&nbsp;' . $row['end_time'] . '">' . 'Date:&nbsp;&nbsp;' . $row['avail_day'] . '&nbsp;&nbsp;Time:&nbsp;&nbsp;' . $row['start_time'] . '&nbsp;&nbsp;To:&nbsp;&nbsp;' . $row['end_time'] . '</option>';
            }
        } else {
            echo 'No shedule for selected doctor yet!';
        }
    }

    /******* LIST ALL DOCTORS PAGES********/

    function list_doctor($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_doctor';
        $page_data['page_title']   = get_phrase('list_doctor');
        $page_data['doctors'] = $this->db->get('doctor')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* VIEW DOCTORS PROFILE********/

    function view_doctor_profile($doctor_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_doctor_profile';
        $page_data['doctors']         =    $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
        $page_data['page_title']       = get_phrase('view_doctor_profile');
        $this->load->view('index', $page_data);
    }


    /***Manage nurses**/

    function manage_nurse($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['department_id']         = $this->input->post('department_id');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('nurse', $data);
            $nurse_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/nurse_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/nurse_image/' . $nurse_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('nurse_added_successfully'));
            // $this->email_model->account_opening_email('nurse', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/list_nurse', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['id_card']               = $this->input->post('id_card');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['city']               = $this->input->post('city');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['phone']                 = $this->input->post('phone');
            $data['department_id']         = $this->input->post('department_id');


            $this->db->where('nurse_id', $param2);
            $this->db->update('nurse', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/nurse_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_nurse', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('nurse', array(
                'nurse_id' => $param2
            ))->result_array();
        }


        if ($param1 == 'delete') {

            $this->db->where('nurse_id', $param2);
            $this->db->delete('nurse');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_nurse', 'refresh');
        }

        $page_data['page_name']  = 'manage_nurse';
        $page_data['page_title'] = get_phrase('manage_nurse');
        $page_data['nurses']     = $this->db->get('nurse')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL NURSE PAGES********/

    function list_nurse($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_nurse';
        $page_data['page_title']   = get_phrase('list_nurse');
        $page_data['nurse'] = $this->db->get('nurse')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL DOCTORS PAGES********/

    function view_nurse_profile($nurse_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_nurse_profile';
        $page_data['nurses']         =    $this->db->get_where('nurse', array('nurse_id' => $nurse_id))->result_array();
        $page_data['page_title']       = get_phrase('view_nurse_profile');
        $this->load->view('index', $page_data);
    }




    /***Manage patients**/

    function manage_patient($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['pid']                  = $this->input->post('pid');
            $data['name']                  = $this->input->post('name');
            $data['email']                 = $this->input->post('email');
            $data['idcard']               = $this->input->post('idcard');
            $data['issue_at']           = $this->input->post('issue_at');
            $data['issue_on']           = $this->input->post('issue_on');
            $data['occupation']           = $this->input->post('occupation');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['city']               = $this->input->post('city');
            $data['state']                 = $this->input->post('state');
            $data['nationality']           = $this->input->post('nationality');
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['sex']                 = $this->input->post('sex');
            $data['birth_date']          = $this->input->post('birth_date');
            $data['age']                  = $this->input->post('age');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['blood_group']          = $this->input->post('blood_group');

            $data['date_of_last_admission']      = $this->input->post('date_of_last_admission');
            $data['diagnose']           = $this->input->post('diagnose');
            //	$data['file_name'] 			= $_FILES["file_name"]["name"];

            $data['department_id']         = $this->input->post('department_id');
            $data['discharge_condition'] = $this->input->post('discharge_condition');
            $data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));


            $this->db->insert('patient', $data);
            $patient_id = $this->db->insert_id();

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $patient_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('patient_added_successfully'));
            // $this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/manage_patient', 'refresh');
        }

        if ($param1 == 'do_update') {

            $data['pid']                  = $this->input->post('pid');
            $data['name']                  = $this->input->post('name');
            $data['email']                 = $this->input->post('email');
            $data['idcard']               = $this->input->post('idcard');
            $data['issue_at']           = $this->input->post('issue_at');
            $data['issue_on']           = $this->input->post('issue_on');
            $data['occupation']           = $this->input->post('occupation');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['city']               = $this->input->post('city');
            $data['state']                 = $this->input->post('state');
            $data['nationality']           = $this->input->post('nationality');
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['sex']                 = $this->input->post('sex');
            $data['birth_date']          = $this->input->post('birth_date');
            $data['age']                  = $this->input->post('age');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['blood_group']          = $this->input->post('blood_group');

            $data['date_of_last_admission']      = $this->input->post('date_of_last_admission');
            $data['diagnose']           = $this->input->post('diagnose');
            //	$data['file_name'] 			= $_FILES["file_name"]["name"];

            $data['department_id']         = $this->input->post('department_id');
            $data['discharge_condition'] = $this->input->post('discharge_condition');
            $data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $this->db->where('patient_id', $param2);
            $this->db->update('patient', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_patient', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('patient_id', $param2);
            $this->db->delete('patient');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/manage_patient', 'refresh');
        }
        $page_data['page_name']  = 'manage_patient';
        $page_data['page_title'] = get_phrase('manage_patient');
        $page_data['patients']   = $this->db->get('patient')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL PATIENTS PAGES********/

    function list_patient($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_patient';
        $page_data['page_title']   = get_phrase('list_patients');
        $page_data['patients'] = $this->db->get('patient')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT PATIENT PROFILE********/

    function edit_patient_profile($patient_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_patient_profile';
        $page_data['patients']         =    $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
        $page_data['page_title']       = get_phrase('edit_patient_profile');
        $this->load->view('index', $page_data);
    }

    /******* VIEW PATIENT PROFILE********/
    function view_patient_profile($patient_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_patient_profile';
        $page_data['patients']         =    $this->db->get_where('patient', array('patient_id' => $patient_id))->result_array();
        $page_data['page_title']       = get_phrase('view_patient_profile');
        $this->load->view('index', $page_data);
    }

    /******* ADD PATIENTS DOCUMENT********/

    function add_document($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {

            $data['name']                = $this->input->post('name');
            $data['patient_id']         = $this->input->post('patient_id');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['doctor_id']             = $this->input->post('doctor_id');
            $data['description']           = $this->input->post('description');
            $data['date']                 = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $this->db->insert('add_document', $data);
            $add_document_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/patient_image/" . $_FILES["file_name"]["name"]);
            $this->session->set_flashdata('flash_message', get_phrase('document_added_successfully'));
            redirect(base_url() . 'admin/list_document', 'refresh');
        }



        if ($param1 == 'delete') {
            $this->db->where('add_document_id', $param2);
            $this->db->delete('add_document');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_document', 'refresh');
        }
        $page_data['page_name']  = 'add_document';
        $page_data['page_title'] = get_phrase('add_document');
        $page_data['add_documents']   = $this->db->get('add_document')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST PATIENT DOCUMENT********/
    function list_document($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_document';
        $page_data['page_title']   = get_phrase('list_document');
        $page_data['list_documents'] = $this->db->get('add_document')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* PATIENT DOCUMENT********/
    function patient_document($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'patient_document';
        $page_data['page_title']   = get_phrase('list_document');
        $page_data['patient_documents'] = $this->db->get('patient')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* VIEW ALL PATIENT DOCUMENT********/
    function view_patient_document($patient_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'view_patient_document';
        $page_data['page_title']   = get_phrase('view_patient_document');
        $page_data['view_patient_documents'] =    $this->db->get_where('add_document', array('patient_id' => $patient_id))->result_array();
        $this->load->view('index', $page_data);
    }





    /***Manage receptionists**/

    function manage_receptionist($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['department_id']         = $this->input->post('department_id');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('receptionist', $data);
            $receptionist_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/receptionist_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/receptionist_image/' . $receptionist_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('receptionist_added_successfully'));
            // $this->email_model->account_opening_email('receptionist', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/list_receptionist', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['id_card']               = $this->input->post('id_card');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['city']               = $this->input->post('city');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['phone']                 = $this->input->post('phone');
            $data['department_id']         = $this->input->post('department_id');


            $this->db->where('receptionist_id', $param2);
            $this->db->update('receptionist', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/receptionist_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_receptionist', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('receptionist', array(
                'receptionist_id' => $param2
            ))->result_array();
        }


        if ($param1 == 'delete') {

            $this->db->where('receptionist_id', $param2);
            $this->db->delete('receptionist');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_receptionist', 'refresh');
        }

        $page_data['page_name']  = 'manage_receptionist';
        $page_data['page_title'] = get_phrase('manage_receptionist');
        $page_data['receptionists']     = $this->db->get('receptionist')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL receptionist PAGES********/

    function list_receptionist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_receptionist';
        $page_data['page_title']   = get_phrase('list_receptionist');
        $page_data['receptionist'] = $this->db->get('receptionist')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL receptionist PAGES********/

    function view_receptionist_profile($receptionist_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_receptionist_profile';
        $page_data['receptionists']         =    $this->db->get_where('receptionist', array('receptionist_id' => $receptionist_id))->result_array();
        $page_data['page_title']       = get_phrase('view_receptionist_profile');
        $this->load->view('index', $page_data);
    }



    /***Manage pharmacists**/

    function manage_pharmacist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('pharmacist', $data);
            $pharmacist_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/pharmacist_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/pharmacist_image/' . $pharmacist_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('pharmacist_added_successfully'));
            // $this->email_model->account_opening_email('pharmacist', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/manage_pharmacist', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            //$data['file_name'] 			= $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');


            $this->db->where('pharmacist_id', $param2);
            $this->db->update('pharmacist', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/pharmacist_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_pharmacist', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('pharmacist', array(
                'pharmacist_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {

            $this->db->where('pharmacist_id', $param2);
            $this->db->delete('pharmacist');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_pharmacist', 'refresh');
        }

        $page_data['page_name']  = 'manage_pharmacist';
        $page_data['page_title'] = get_phrase('manage_pharmacist');
        $page_data['pharmacists']     = $this->db->get('pharmacist')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL pharmacist PAGES*******	*/

    function list_pharmacist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_pharmacist';
        $page_data['page_title']   = get_phrase('list_pharmacist');
        $page_data['pharmacists'] = $this->db->get('pharmacist')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT PHARMACIST PAGES********/

    function edit_pharmacist_profile($pharmacist_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_pharmacist_profile';
        $page_data['page_title']       = get_phrase('edit_pharmacist_profile');
        $page_data['pharmacists']     =    $this->db->get_where('pharmacist', array('pharmacist_id' => $pharmacist_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT PHARMACIST PAGES********/

    function view_pharmacist_profile($pharmacist_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_pharmacist_profile';
        $page_data['page_title']       = get_phrase('view_pharmacist_profile');
        $page_data['pharmacists']     =    $this->db->get_where('pharmacist', array('pharmacist_id' => $pharmacist_id))->result_array();
        $this->load->view('index', $page_data);
    }



    /***Manage laboratorists**/

    function manage_laboratorist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('laboratorist', $data);
            $laboratorist_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/laboratorist_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/laboratorist_image/' . $laboratorist_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('laboratorist_added_successfully'));
            // $this->email_model->account_opening_email('laboratorist', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/manage_laboratorist', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            //$data['file_name'] 			= $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');


            $this->db->where('laboratorist_id', $param2);
            $this->db->update('laboratorist', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/laboratorist_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_laboratorist', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('laboratorist', array(
                'laboratorist_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {

            $this->db->where('laboratorist_id', $param2);
            $this->db->delete('laboratorist');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_laboratorist', 'refresh');
        }

        $page_data['page_name']  = 'manage_laboratorist';
        $page_data['page_title'] = get_phrase('manage_laboratorist');
        $page_data['laboratorists']     = $this->db->get('laboratorist')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL laboratorist PAGES*******	*/

    function list_laboratorist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_laboratorist';
        $page_data['page_title']   = get_phrase('list_laboratorist');
        $page_data['laboratorists'] = $this->db->get('laboratorist')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT laboratorist PAGES********/

    function edit_laboratorist_profile($laboratorist_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_laboratorist_profile';
        $page_data['page_title']       = get_phrase('edit_laboratorist_profile');
        $page_data['laboratorists']     =    $this->db->get_where('laboratorist', array('laboratorist_id' => $laboratorist_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT laboratorist PAGES********/

    function view_laboratorist_profile($laboratorist_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_laboratorist_profile';
        $page_data['page_title']       = get_phrase('view_laboratorist_profile');
        $page_data['laboratorists']     =    $this->db->get_where('laboratorist', array('laboratorist_id' => $laboratorist_id))->result_array();
        $this->load->view('index', $page_data);
    }



    /***Manage accountants**/

    function manage_accountant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            $data['file_name']             = $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');

            $this->db->insert('accountant', $data);
            $accountant_id = $this->db->insert_id();

            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/accountant_image/" . $_FILES["file_name"]["name"]);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $accountant_id . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('accountant_added_successfully'));
            // $this->email_model->account_opening_email('accountant', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            // $this->session->set_flashdata('flash_message', get_phrase('account_opened'));
            redirect(base_url() . 'admin/manage_accountant', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');
            $data['date_of_birth']      = $this->input->post('date_of_birth');
            $data['place_of_birth']     = $this->input->post('place_of_birth');
            $data['id_card']               = $this->input->post('id_card');
            $data['gender']             = $this->input->post('gender');
            $data['mother_tongue']         = $this->input->post('mother_tongue');
            $data['marital_status']     = $this->input->post('marital_status');
            $data['religion']             = $this->input->post('religion');
            $data['blood_group']          = $this->input->post('blood_group');
            $data['city']               = $this->input->post('city');
            $data['email']                 = $this->input->post('email');
            $data['password']             = sha1($this->input->post('password'));
            $data['address']               = $this->input->post('address');
            $data['state']                 = $this->input->post('state');
            $data['qualification']      = $this->input->post('qualification');
            $data['nationality']           = $this->input->post('nationality');
            $data['biography']           = $this->input->post('biography');
            //$data['file_name'] 			= $_FILES["file_name"]["name"];
            $data['phone']                 = $this->input->post('phone');
            $data['mobile_no']          = $this->input->post('mobile_no');
            $data['facebook']           = $this->input->post('facebook');
            $data['twitter']               = $this->input->post('twitter');
            $data['google_plus']           = $this->input->post('google_plus');
            $data['linkedin']           = $this->input->post('linkedin');


            $this->db->where('accountant_id', $param2);
            $this->db->update('accountant', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/list_accountant', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('accountant', array(
                'accountant_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {

            $this->db->where('accountant_id', $param2);
            $this->db->delete('accountant');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'admin/list_accountant', 'refresh');
        }

        $page_data['page_name']  = 'manage_accountant';
        $page_data['page_title'] = get_phrase('manage_accountant');
        $page_data['accountants']     = $this->db->get('accountant')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL accountant PAGES*******	*/

    function list_accountant($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_accountant';
        $page_data['page_title']   = get_phrase('list_accountant');
        $page_data['accountants'] = $this->db->get('accountant')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT accountant PAGES********/

    function edit_accountant_profile($accountant_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_accountant_profile';
        $page_data['page_title']       = get_phrase('edit_accountant_profile');
        $page_data['accountants']     =    $this->db->get_where('accountant', array('accountant_id' => $accountant_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT accountant PAGES********/

    function view_accountant_profile($accountant_id)

    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'view_accountant_profile';
        $page_data['page_title']       = get_phrase('view_accountant_profile');
        $page_data['accountants']     =    $this->db->get_where('accountant', array('accountant_id' => $accountant_id))->result_array();
        $this->load->view('index', $page_data);
    }





    /*******VIEW APPOINTMENT REPORT	********/

    function view_appointment($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'view_appointment';

        $page_data['page_title']   = get_phrase('view_appointment');

        $page_data['appointments'] = $this->db->get('appointment')->result_array();

        $this->load->view('index', $page_data);
    }



    /*******VIEW PAYMENT REPORT	********/

    function view_payment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'view_payment';
        $page_data['page_title']   = get_phrase('view_payment');
        $page_data['view_payment'] = $this->db->get('patient')->result_array();
        $this->load->view('index', $page_data);
    }



    /******* VIEW ALL PATIENT DOCUMENT********/
    function view_payment_history($patient_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'view_payment_history';
        $page_data['page_title']   = get_phrase('view_payment_history');
        $page_data['view_payment_history'] =    $this->db->get_where('invoice', array('patient_id' => $patient_id))->result_array();
        $this->load->view('index', $page_data);
    }



    /*******VIEW BED STATUS	********/

    function view_bed_status($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']      = 'view_bed_status';

        $page_data['page_title']     = get_phrase('view_blood_bank');

        $page_data['bed_allotments'] = $this->db->get('bed_allotment')->result_array();

        $page_data['beds']           = $this->db->get('bed')->result_array();

        $this->load->view('index', $page_data);
    }



    /*******VIEW BLOOD BANK	********/

    function view_blood_bank($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'view_blood_bank';

        $page_data['page_title']   = get_phrase('view_blood_bank');

        $page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();

        $page_data['blood_bank']   = $this->db->get('blood_bank')->result_array();

        $this->load->view('index', $page_data);
    }

    /***ADD MEDICINE PAGE********/

    function medicine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {

            $data['name']                  = $this->input->post('name');

            $data['medicine_category_id']  = $this->input->post('medicine_category_id');

            $data['description']           = $this->input->post('description');

            $data['price']                 = $this->input->post('price');

            $data['quantity']                 = $this->input->post('quantity');

            $data['manufacturing_company'] = $this->input->post('manufacturing_company');

            $data['status']                = $this->input->post('status');

            $data['date']                 = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $this->db->insert('medicine', $data);

            $this->session->set_flashdata('flash_message', get_phrase('medicine_opened'));
            redirect(base_url() . 'admin/view_medicine', 'refresh');
        }

        if ($param1 == 'do_update') {

            $data['name']                  = $this->input->post('name');

            $data['medicine_category_id']  = $this->input->post('medicine_category_id');

            $data['description']           = $this->input->post('description');

            $data['price']                 = $this->input->post('price');

            $data['quantity']                 = $this->input->post('quantity');

            $data['manufacturing_company'] = $this->input->post('manufacturing_company');

            $data['status']                = $this->input->post('status');

            $data['date']                 = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $this->db->where('medicine_id', $param2);
            $this->db->update('medicine', $data);
            $this->session->set_flashdata('flash_message', get_phrase('medicine_updated'));
            redirect(base_url() . 'admin/view_medicine', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('medicine', array(
                'medicine_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('medicine_id', $param2);
            $this->db->delete('medicine');
            $this->session->set_flashdata('flash_message', get_phrase('medicine_deleted'));
            redirect(base_url() . 'admin/view_medicine', 'refresh');
        }

        $page_data['page_name']   = 'medicine';
        $page_data['page_title']  = get_phrase('add_new_medicine');
        $page_data['medicines'] = $this->db->get('medicine')->result_array();
        $this->load->view('index', $page_data);
    }



    /*******VIEW MEDICINE********/

    function view_medicine($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']  = 'view_medicine';

        $page_data['page_title'] = get_phrase('view_medicine');

        $page_data['medicines']  = $this->db->get('medicine')->result_array();

        $this->load->view('index', $page_data);
    }


    /***CREATE REPORT BIRTH,DEATH,OPERATION**/

    function manage_report($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

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

            redirect(base_url() . 'admin/manage_report', 'refresh');
        }

        if ($param1 == 'delete') {

            $this->db->where('report_id', $param2);

            $this->db->delete('report');

            $this->session->set_flashdata('flash_message', get_phrase('report_deleted'));

            redirect(base_url() . 'admin/manage_report', 'refresh');
        }

        $page_data['page_name']  = 'manage_report';

        $page_data['page_title'] = get_phrase('manage_report');

        $page_data['reports']    = $this->db->get('report')->result_array();

        $this->load->view('index', $page_data);
    }




    /*******VIEW REPORT********/

    function view_report($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']   = 'view_report';

        $page_data['page_title']  = get_phrase('view_' . $param1 . '_report');

        $page_data['report_type'] = $param1;

        $page_data['reports']     = $this->db->get_where('report', array(

            'type' => $param1

        ))->result_array();

        $this->load->view('index', $page_data);
    }



    /***MANAGE EMAIL TEMPLATE**/

    function manage_email_template($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param2 == 'do_update') {

            $this->db->where('task', $param1);

            $this->db->update('email_template', array(

                'body' => $this->input->post('body'),

                'subject' => $this->input->post('subject')

            ));

            $this->session->set_flashdata('flash_message', get_phrase('template_updated'));

            redirect(base_url() . 'admin/manage_email_template/' . $param1, 'refresh');
        }

        $page_data['page_name']     = 'manage_email_template';

        $page_data['page_title']    = get_phrase('manage_email_template');

        $page_data['template']      = $this->db->get_where('email_template', array(

            'task' => $param1

        ))->result_array();

        $page_data['template_task'] = $param1;

        $this->load->view('index', $page_data);
    }



    //new code
    function doctor_print_id($doctor_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');


        $data['doctor_id'] = $doctor_id;
        $this->load->view('admin/doctor_print_id', $data);
    }


    function create_barcode($doctor_id)
    {

        return $this->Barcode_model->create_barcode($doctor_id);
    }





    /* * *MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD* */

    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $data['notice_title'] = $this->input->post('notice_title');
            $data['notice'] = $this->input->post('notice');
            $data['location'] = $this->input->post('location');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $doctors = $this->db->get('doctor')->result_array();
                $nurses = $this->db->get('nurse')->result_array();
                $pharmacists = $this->db->get('pharmacist')->result_array();
                $laboratorists = $this->db->get('laboratorist')->result_array();
                $accountants = $this->db->get('accountant')->result_array();
                $receptionists = $this->db->get('receptionist')->result_array();
                $date = $this->input->post('create_timestamp');
                $message = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach ($doctors as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($nurses as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($pharmacists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($laboratorists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($accountants as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($receptionists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/list_noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $doctors = $this->db->get('doctor')->result_array();
            $nurses = $this->db->get('nurse')->result_array();
            $pharmacists = $this->db->get('pharmacist')->result_array();
            $laboratorists = $this->db->get('laboratorist')->result_array();
            $accountants = $this->db->get('accountant')->result_array();
            $receptionists = $this->db->get('receptionist')->result_array();
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $doctors = $this->db->get('doctor')->result_array();
                $nurses = $this->db->get('nurse')->result_array();
                $pharmacists = $this->db->get('pharmacist')->result_array();
                $laboratorists = $this->db->get('laboratorist')->result_array();
                $accountants = $this->db->get('accountant')->result_array();
                $receptionists = $this->db->get('receptionist')->result_array();
                $date = $this->input->post('create_timestamp');
                $message = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach ($doctors as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($nurses as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($pharmacists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($laboratorists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($accountants as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
                foreach ($receptionists as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message, $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/list_noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'admin/list_noticeboard/', 'refresh');
        }
        $page_data['page_name'] = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices'] = $this->db->get('noticeboard')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL laboratorist PAGES*******	*/

    function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_noticeboard';
        $page_data['page_title']   = get_phrase('list_noticeboard');
        $page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
        $this->load->view('index', $page_data);
    }



    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'admin/message/message_read/' . $param2, 'refresh');
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




    /*****SITE/SYSTEM SETTINGS*********/

    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type', 'system_name');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type', 'system_title');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type', 'address');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type', 'phone');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type', 'paypal_email');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type', 'currency');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type', 'system_email');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type', 'system_name');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type', 'language');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type', 'text_align');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('running_session');
            $this->db->where('type', 'session');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('tawkto');
            $this->db->where('type', 'tawkto');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('system_footer');
            $this->db->where('type', 'footer');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('vogue');
            $this->db->where('type', 'vogue');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/system_settings', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/system_settings', 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type', 'skin_colour');
            $this->db->update('settings', $data);
            $this->session->set_flashdata('flash_message', get_phrase('theme_selected'));
            redirect(base_url() . 'admin/system_settings', 'refresh');
        }

        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('index', $page_data);
    }



    /* * ***SMS SETTINGS******** */

    function sms_settings($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'clickatell') {

            $data['description'] = $this->input->post('clickatell_user');
            $this->db->where('type', 'clickatell_user');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('clickatell_password');
            $this->db->where('type', 'clickatell_password');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('clickatell_api_id');
            $this->db->where('type', 'clickatell_api_id');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'twilio') {

            $data['description'] = $this->input->post('twilio_account_sid');
            $this->db->where('type', 'twilio_account_sid');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('twilio_auth_token');
            $this->db->where('type', 'twilio_auth_token');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('twilio_sender_phone_number');
            $this->db->where('type', 'twilio_sender_phone_number');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'smsteams') {

            $data['description'] = $this->input->post('smsteams_username');
            $this->db->where('type', 'smsteams_username');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('smsteams_password');
            $this->db->where('type', 'smsteams_password');
            $this->db->update('settings', $data);

            $data['description'] = $this->input->post('smsteams_api_id');
            $this->db->where('type', 'smsteams_api_id');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'active_service') {

            $data['description'] = $this->input->post('active_sms_service');
            $this->db->where('type', 'active_sms_service');
            $this->db->update('settings', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        $page_data['page_name'] = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_gateway_information');
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('index', $page_data);
    }


    /*****LANGUAGE SETTINGS*********/

    function manage_language($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param1 == 'edit_phrase') {

            $page_data['edit_profile']     = $param2;
        }

        if ($param1 == 'update_phrase') {

            $language    =    $param2;

            $total_phrase    =    $this->input->post('total_phrase');

            for ($i = 1; $i < $total_phrase; $i++) {

                //$data[$language]	=	$this->input->post('phrase').$i;

                $this->db->where('phrase_id', $i);

                $this->db->update('language', array($language => $this->input->post('phrase' . $i)));
            }

            redirect(base_url() . 'admin/manage_language/edit_phrase/' . $language, 'refresh');
        }

        if ($param1 == 'do_update') {

            $language        = $this->input->post('language');

            $data[$language] = $this->input->post('phrase');

            $this->db->where('phrase_id', $param2);

            $this->db->update('language', $data);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }

        if ($param1 == 'add_phrase') {

            $data['phrase'] = $this->input->post('phrase');

            $this->db->insert('language', $data);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }

        if ($param1 == 'add_language') {

            $language = $this->input->post('language');

            $this->load->dbforge();

            $fields = array(

                $language => array(

                    'type' => 'LONGTEXT'

                )

            );

            $this->dbforge->add_column('language', $fields);



            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }

        if ($param1 == 'delete_language') {

            $language = $param2;

            $this->load->dbforge();

            $this->dbforge->drop_column('language', $language);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));



            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }

        $page_data['page_name']        = 'manage_language';

        $page_data['page_title']       = get_phrase('manage_language');

        //$page_data['language_phrases'] = $this->db->get('language')->result_array();

        $this->load->view('index', $page_data);
    }





    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/

    function backup_restore($operation = '', $type = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect('login', 'refresh');



        if ($operation == 'create') {

            $this->crud_model->create_backup($type);
        }

        if ($operation == 'restore') {

            $this->crud_model->restore_backup();

            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }

        if ($operation == 'delete') {

            $this->crud_model->truncate($type);

            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }



        $page_data['page_name']  = 'backup_restore';

        $page_data['page_title'] = get_phrase('backup_restore');

        $this->load->view('index', $page_data);
    }



    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

    function manage_profile($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('admin_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param1 == 'update_profile_info') {

            $data['name']    = $this->input->post('name');
            $data['email']   = $this->input->post('email');
            $data['address'] = $this->input->post('address');
            $data['phone']   = $this->input->post('phone');
            $data['country_id']   = $this->input->post('country_id');


            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));



            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }

        if ($param1 == 'change_password') {

            $data['new_password']         = sha1($this->input->post('new_password'));

            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));


            if ($data['new_password'] == $data['confirm_new_password']) {

                $this->db->where('admin_id', $this->session->userdata('admin_id'));

                $this->db->update('admin', array(

                    'password' => $data['new_password']

                ));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {

                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }



            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }

        $page_data['page_name']    = 'manage_profile';

        $page_data['page_title']   = get_phrase('manage_profile');

        $page_data['edit_profile'] = $this->db->get_where('admin', array(

            'admin_id' => $this->session->userdata('admin_id')

        ))->result_array();

        $this->load->view('index', $page_data);
    }


    function send_email($param1 = '', $param2 = '', $param3 = '')
    {

        if ($param1 == 'send') {

            $page_data['email_subject'] =   html_escape($this->input->post('email_subject'));
            $page_data['message']       =   html_escape($this->input->post('message'));
            $receiverEmail              =   html_escape($this->input->post('receiverEmail'));
            $send_date                  =    date('d M, Y');

            $message    = $page_data['email_subject'] . ' ';
            $message    .= $page_data['message'] . ' ';
            $message    .= get_phrase('on') . ' ' . $send_date;

            $this->email_model->send_email($message, $receiverEmail);

            $this->session->set_flashdata('flash_message', get_phrase('Email sent successfully'));
            redirect(base_url() . 'admin/dashboard', 'refresh');
        }
    }
}
