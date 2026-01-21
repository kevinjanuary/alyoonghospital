<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Doctor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }


    public function index()
    {
        if ($this->session->userdata('doctor_login') != 1) redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('doctor_login') == 1) redirect(base_url() . 'doctor/dashboard', 'refresh');
    }

    function dashboard()
    {

        if ($this->session->userdata('doctor_login') != 1) redirect(base_url() . 'login', 'refresh');

        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] =  get_phrase('Doctor Dashboard');
        $this->load->view('index', $page_data);
    }

    /***Manage patients**/

    function manage_patient($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param1 == 'create') {

            $data['name']                      = $this->input->post('name');

            $data['email']                     = $this->input->post('email');

            $data['password']                  = $this->input->post('password');

            $data['address']                   = $this->input->post('address');

            $data['phone']                     = $this->input->post('phone');

            $data['sex']                       = $this->input->post('sex');

            $data['birth_date']                = $this->input->post('birth_date');

            $data['age']                       = $this->input->post('age');

            $data['blood_group']               = $this->input->post('blood_group');

            $data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $this->db->insert('patient', $data);

            $this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

            $this->session->set_flashdata('flash_message', get_phrase('account_opened'));



            redirect(base_url() . 'doctor/manage_patient', 'refresh');
        }

        if ($param1 == 'edit' && $param2 == 'do_update') {

            $data['name']        = $this->input->post('name');

            $data['email']       = $this->input->post('email');

            $data['password']    = $this->input->post('password');

            $data['address']     = $this->input->post('address');

            $data['phone']       = $this->input->post('phone');

            $data['sex']         = $this->input->post('sex');

            $data['birth_date']  = $this->input->post('birth_date');

            $data['age']         = $this->input->post('age');

            $data['blood_group'] = $this->input->post('blood_group');



            $this->db->where('patient_id', $param3);

            $this->db->update('patient', $data);

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));

            redirect(base_url() . 'doctor/manage_patient', 'refresh');
        } else if ($param1 == 'edit') {

            $page_data['edit_profile'] = $this->db->get_where('patient', array(

                'patient_id' => $param2

            ))->result_array();
        }

        if ($param1 == 'delete') {

            $this->db->where('patient_id', $param2);

            $this->db->delete('patient');



            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));

            redirect(base_url() . 'doctor/manage_patient', 'refresh');
        }

        $page_data['page_name']  = 'manage_patient';

        $page_data['page_title'] = get_phrase('manage_patient');

        $page_data['patients']   = $this->db->get('patient')->result_array();

        $this->load->view('index', $page_data);
    }



    /***MANAGE APPOINTMENTS******/

    function manage_appointment($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param1 == 'create') {

            $data['doctor_id']             = $this->input->post('doctor_id');

            $data['patient_id']            = $this->input->post('patient_id');

            $data['appointment_timestamp'] = strtotime($this->input->post('appointment_timestamp'));

            $this->db->insert('appointment', $data);

            $this->session->set_flashdata('flash_message', get_phrase('appointment_created'));

            redirect(base_url() . 'doctor/manage_appointment', 'refresh');
        }

        if ($param1 == 'edit' && $param2 == 'do_update') {

            $data['doctor_id']             = $this->input->post('doctor_id');

            $data['patient_id']            = $this->input->post('patient_id');

            $data['appointment_timestamp'] = strtotime($this->input->post('appointment_timestamp'));

            $this->db->where('appointment_id', $param3);

            $this->db->update('appointment', $data);

            $this->session->set_flashdata('flash_message', get_phrase('appointment_updated'));

            redirect(base_url() . 'doctor/manage_appointment', 'refresh');
        } else if ($param1 == 'edit') {

            $page_data['edit_profile'] = $this->db->get_where('appointment', array(

                'appointment_id' => $param2

            ))->result_array();
        }

        if ($param1 == 'delete') {

            $this->db->where('appointment_id', $param2);

            $this->db->delete('appointment');

            $this->session->set_flashdata('flash_message', get_phrase('appointment_deleted'));

            redirect(base_url() . 'doctor/manage_appointment', 'refresh');
        }

        $page_data['page_name']    = 'manage_appointment';

        $page_data['page_title']   = get_phrase('manage_appointment');

        $page_data['appointments'] = $this->db->get_where('appointment', array(

            'doctor_id' => $this->session->userdata('doctor_id')

        ))->result_array();

        $this->load->view('index', $page_data);
    }



    /***MANAGE PRESCRIPTIONS******/

    function manage_prescription($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');





        if ($param1 == 'create') {

            $data['doctor_id']                  = $this->input->post('doctor_id');

            $data['patient_id']                 = $this->input->post('patient_id');

            $data['creation_timestamp']         = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $data['case_history']               = $this->input->post('case_history');

            $data['medication']                 = $this->input->post('medication');

            $data['medication_from_pharmacist'] = $this->input->post('medication_from_pharmacist');

            $data['description']                = $this->input->post('description');



            $this->db->insert('prescription', $data);

            $this->session->set_flashdata('flash_message', get_phrase('prescription_created'));



            redirect(base_url() . 'doctor/manage_prescription', 'refresh');
        }

        if ($param1 == 'edit' && $param2 == 'do_update') {

            $data['doctor_id']                  = $this->input->post('doctor_id');

            $data['patient_id']                 = $this->input->post('patient_id');

            $data['case_history']               = $this->input->post('case_history');

            $data['medication']                 = $this->input->post('medication');

            $data['medication_from_pharmacist'] = $this->input->post('medication_from_pharmacist');

            $data['description']                = $this->input->post('description');



            $this->db->where('prescription_id', $param3);

            $this->db->update('prescription', $data);

            $this->session->set_flashdata('flash_message', get_phrase('prescription_updated'));

            redirect(base_url() . 'doctor/manage_prescription', 'refresh');
        } else if ($param1 == 'edit') {

            $page_data['edit_profile'] = $this->db->get_where('prescription', array(

                'prescription_id' => $param2

            ))->result_array();
        }

        if ($param1 == 'delete') {

            $this->db->where('prescription_id', $param2);

            $this->db->delete('prescription');

            $this->session->set_flashdata('flash_message', get_phrase('prescription_deleted'));



            redirect(base_url() . 'doctor/manage_prescription', 'refresh');
        }

        $page_data['page_name']     = 'manage_prescription';

        $page_data['page_title']    = get_phrase('manage_prescription');

        $page_data['prescriptions'] = $this->db->get('prescription')->result_array();

        $this->load->view('index', $page_data);
    }





    /*******VIEW BLOOD BANK	********/

    function view_blood_bank($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'view_blood_bank';

        $page_data['page_title']   = get_phrase('view_blood_bank');

        $page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();

        $page_data['blood_bank']   = $this->db->get('blood_bank')->result_array();

        $this->load->view('index', $page_data);
    }





    /******ALLOT / DISCHARGE BED TO PATIENTS*****/

    function manage_bed_allotment($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        //create a new allotment only in available / unalloted beds. beds can be ward,cabin,icu,other types

        if ($param1 == 'create') {

            $data['bed_id']              = $this->input->post('bed_id');

            $data['patient_id']          = $this->input->post('patient_id');

            $data['allotment_timestamp'] = $this->input->post('allotment_timestamp');

            $data['discharge_timestamp'] = $this->input->post('discharge_timestamp');

            $this->db->insert('bed_allotment', $data);

            $this->session->set_flashdata('flash_message', get_phrase('bed_alloted'));

            redirect(base_url() . 'doctor/manage_bed_allotment', 'refresh');
        }

        if ($param1 == 'edit' && $param2 == 'do_update') {

            $data['bed_id']              = $this->input->post('bed_id');

            $data['patient_id']          = $this->input->post('patient_id');

            $data['allotment_timestamp'] = $this->input->post('allotment_timestamp');

            $data['discharge_timestamp'] = $this->input->post('discharge_timestamp');

            $this->db->where('bed_id', $param3);

            $this->db->update('bed_allotment', $data);

            $this->session->set_flashdata('flash_message', get_phrase('bed_allotment_updated'));

            redirect(base_url() . 'doctor/manage_bed_allotment', 'refresh');
        } else if ($param1 == 'edit') {

            $page_data['edit_profile'] = $this->db->get_where('bed_allotment', array(

                'bed_allotment_id' => $param2

            ))->result_array();
        }

        if ($param1 == 'delete') {

            $this->db->where('bed_allotment_id', $param2);

            $this->db->delete('bed_allotment');

            $this->session->set_flashdata('flash_message', get_phrase('bed_allotment_deleted'));

            redirect(base_url() . 'doctor/manage_bed_allotment', 'refresh');
        }

        $page_data['page_name']     = 'manage_bed_allotment';

        $page_data['page_title']    = get_phrase('manage_bed_allotment');

        $page_data['bed_allotment'] = $this->db->get('bed_allotment')->result_array();

        $this->load->view('index', $page_data);
    }





    /***CREATE REPORT BIRTH,DEATH,OPERATION**/

    function manage_report($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        //create a new report baby birth,patient death, operation , other types

        if ($param1 == 'create') {

            $data['type']        = $this->input->post('type');

            $data['description'] = $this->input->post('description');

            $data['timestamp']   = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));

            $data['doctor_id']   = $this->input->post('age');

            $data['patient_id']  = $this->input->post('phone');

            $this->db->insert('report', $data);

            $this->session->set_flashdata('flash_message', get_phrase('report_created'));

            redirect(base_url() . 'doctor/manage_report', 'refresh');
        }

        if ($param1 == 'delete') {

            $this->db->where('report_id', $param2);

            $this->db->delete('report');

            $this->session->set_flashdata('flash_message', get_phrase('report_deleted'));

            redirect(base_url() . 'doctor/manage_report', 'refresh');
        }

        $page_data['page_name']  = 'manage_report';

        $page_data['page_title'] = get_phrase('manage_report');

        $page_data['reports']    = $this->db->get('report')->result_array();

        $this->load->view('index', $page_data);
    }

    /******* LIST ALL laboratorist PAGES*******	*/

    function list_noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_noticeboard';
        $page_data['page_title']   = get_phrase('list_noticeboard');
        $page_data['list_noticeboards'] = $this->db->get('noticeboard')->result_array();
        $this->load->view('index', $page_data);
    }


    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'doctor/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'doctor/message/message_read/' . $param2, 'refresh');
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


    /*  PRESCRIPTION CODE HERE */
    function add_prescription($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($param1 == 'create') {
            $this->crud_model->create_prescription();

            $this->session->set_flashdata('flash_message', get_phrase('add_prescriptioned'));
            redirect(base_url() . 'doctor/list_prescription', 'refresh');
        }

        $data['page_name'] = 'add_prescription';
        $data['page_title'] = get_phrase('add_prescription');
        $this->load->view('index', $data);
    }

    function list_prescription($task = "", $prescription_id = "")
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh'); {
        }

        if ($task == "update") {
            $this->crud_model->update_prescription($prescription_id);
            $this->session->set_flashdata('message', get_phrase('prescription_updated_successfuly'));
            redirect(base_url() . 'doctor/list_prescription', 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_prescription($prescription_id);
            redirect(base_url() . 'doctor/list_prescription', 'refresh');
        }

        $data['prescription_info'] = $this->crud_model->select_prescription_info();
        $data['page_name'] = 'list_prescription';
        $data['page_title'] = get_phrase('list_prescription');
        $this->load->view('index', $data);
    }


    /***ADD appointment FOR DOCTOR********/

    function add_appointment($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
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
            redirect(base_url() . 'doctor/list_appointment/' . $this->session->userdata('login_user_id') . '', 'refresh');
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
            redirect(base_url() . 'doctor/list_appointment/' . $this->session->userdata('login_user_id') . '', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('appointment', array(
                'appointment_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('appointment_id', $param2);
            $this->db->delete('appointment');
            $this->session->set_flashdata('flash_message', get_phrase('appointment_deleted'));
            redirect(base_url() . 'doctor/list_appointment/' . $this->session->userdata('login_user_id') . '', 'refresh');
        }

        $page_data['page_name']   = 'add_appointment';
        $page_data['page_title']  = get_phrase('add_appointment');
        $page_data['appointments'] = $this->db->get('appointment')->result_array();
        $this->load->view('index', $page_data);
    }



    /******* EDIT APPOINTMENT DETAILS********/

    function edit_appointment_details($appointment_id)

    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_appointment_details';
        $page_data['page_title']       = get_phrase('edit_appointment_details');
        $page_data['edit_appointments'] =    $this->db->get_where('appointment', array('appointment_id' => $appointment_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* EDIT APPOINTMENT DETAILS********/

    function view_appointment_details($appointment_id, $doctor_id, $patient_id)

    {
        if ($this->session->userdata('doctor_login') != 1)
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

    function list_appointment($doctor_id)
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_appointment';
        $page_data['page_title']   = get_phrase('list_appointments');
        $page_data['list_appointments'] = $this->db->get_where('appointment', array('doctor_id' => $doctor_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /***ADD SHEDULE FOR DOCTOR********/

    function add_shedule($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
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
            redirect(base_url() . 'doctor/list_shedule/' . $this->session->userdata('login_user_id') . '', 'refresh');
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
            redirect(base_url() . 'doctor/list_shedule/' . $this->session->userdata('login_user_id') . '', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_profile'] = $this->db->get_where('shedule', array(
                'shedule_id' => $param2
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('shedule_id', $param2);
            $this->db->delete('shedule');
            $this->session->set_flashdata('flash_message', get_phrase('shedule_deleted'));
            redirect(base_url() . 'doctor/list_shedule/' . $this->session->userdata('login_user_id') . '', 'refresh');
        }

        $page_data['page_name']   = 'add_shedule';
        $page_data['page_title']  = get_phrase('add_shedule');
        $page_data['shedules'] = $this->db->get('shedule')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL DOCTORS SHEDULE PAGES********/

    function list_shedule($doctor_id)
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_shedule';
        $page_data['page_title']   = get_phrase('list_shedules');
        $page_data['list_shedules'] = $this->db->get_where('shedule', array('doctor_id' => $doctor_id))->result_array();
        $this->load->view('index', $page_data);
    }


    /******* VIEW SCHEDULE DETAILS********/

    function edit_shedule_details($shedule_id)

    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']        = 'edit_shedule_details';
        $page_data['page_title']       = get_phrase('edit_shedule_details');
        $page_data['edit']             =    $this->db->get_where('shedule', array('shedule_id' => $shedule_id))->result_array();
        $this->load->view('index', $page_data);
    }


    /******* ADD PATIENTS DOCUMENT********/

    function add_document($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
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
            redirect(base_url() . 'doctor/list_document/' . $this->session->userdata('login_user_id') . '', 'refresh');
        }



        if ($param1 == 'delete') {
            $this->db->where('add_document_id', $param2);
            $this->db->delete('add_document');
            $this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
            redirect(base_url() . 'doctor/list_document/' . $this->session->userdata('login_user_id') . '', 'refresh');
        }
        $page_data['page_name']  = 'add_document';
        $page_data['page_title'] = get_phrase('add_document');
        $page_data['add_documents']   = $this->db->get('add_document')->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST PATIENT DOCUMENT********/
    function list_document($doctor_id)
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'list_document';
        $page_data['page_title']   = get_phrase('list_document');
        $page_data['list_documents'] = $this->db->get_where('add_document', array('doctor_id' => $doctor_id))->result_array();
        $this->load->view('index', $page_data);
    }

    /******* PATIENT DOCUMENT********/


    /******* VIEW ALL PATIENT DOCUMENT********/
    function view_patient_document($patient_id)
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');


        $page_data['page_name']    = 'view_patient_document';
        $page_data['page_title']   = get_phrase('view_patient_document');
        $page_data['view_patient_documents'] =    $this->db->get_where('add_document', array('patient_id' => $patient_id))->result_array();
        $this->load->view('index', $page_data);
    }


    /******* LIST ALL DOCTORS PAGES********/

    function list_doctor($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_doctor';
        $page_data['page_title']   = get_phrase('list_doctor');
        $page_data['doctors'] = $this->db->get('doctor')->result_array();
        $this->load->view('index', $page_data);
    }

    /******* LIST ALL DOCTORS PAGES********/

    function list_nurse($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_nurse';
        $page_data['page_title']   = get_phrase('list_nurse');
        $page_data['nurse'] = $this->db->get('nurse')->result_array();
        $this->load->view('index', $page_data);
    }

    function list_receptionist($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');



        $page_data['page_name']    = 'list_receptionist';
        $page_data['page_title']   = get_phrase('list_receptionist');
        $page_data['receptionist'] = $this->db->get('receptionist')->result_array();
        $this->load->view('index', $page_data);
    }


    /* * ****MANAGE SEARCH doctor PAGE** */
    function search_doctor($department_id = '', $param2 = '', $sparam3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($this->input->post('operation') == 'selection') {
            $page_data['department_id'] = $this->input->post('department_id');

            if ($page_data['department_id'] > 0) {
                redirect(base_url() . 'doctor/search_doctor/' . $page_data['department_id'], 'refresh');
            } else {
                $this->session->set_flashdata('info', 'please_select_class');
                redirect(base_url() . 'doctor/search_doctor/', 'refresh');
            }
        }

        $page_data['department_id'] = $department_id;
        $page_data['page_info'] = 'search_doctor';

        $page_data['page_name'] = 'search_doctor';
        $page_data['page_title'] = get_phrase('doctor_by_department');
        $this->load->view('index', $page_data);
    }


    /* * ****MANAGE SEARCH nurse PAGE** */
    function search_nurse($department_id = '', $param2 = '', $sparam3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($this->input->post('operation') == 'selection') {
            $page_data['department_id'] = $this->input->post('department_id');

            if ($page_data['department_id'] > 0) {
                redirect(base_url() . 'doctor/search_nurse/' . $page_data['department_id'], 'refresh');
            } else {
                $this->session->set_flashdata('info', 'please_select_class');
                redirect(base_url() . 'doctor/search_nurse/', 'refresh');
            }
        }

        $page_data['department_id'] = $department_id;
        $page_data['page_info'] = 'search_nurse';

        $page_data['page_name'] = 'search_nurse';
        $page_data['page_title'] = get_phrase('nurse_by_department');
        $this->load->view('index', $page_data);
    }


    /* * ****MANAGE SEARCH receptionist PAGE** */
    function search_receptionist($department_id = '', $param2 = '', $sparam3 = '')
    {
        if ($this->session->userdata('doctor_login') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($this->input->post('operation') == 'selection') {
            $page_data['department_id'] = $this->input->post('department_id');

            if ($page_data['department_id'] > 0) {
                redirect(base_url() . 'doctor/search_receptionist/' . $page_data['department_id'], 'refresh');
            } else {
                $this->session->set_flashdata('info', 'please_select_class');
                redirect(base_url() . 'doctor/search_receptionist/', 'refresh');
            }
        }

        $page_data['department_id'] = $department_id;
        $page_data['page_info'] = 'search_receptionist';

        $page_data['page_name'] = 'search_receptionist';
        $page_data['page_title'] = get_phrase('search_receptionist');
        $this->load->view('index', $page_data);
    }




    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

    function manage_profile($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('doctor_login') != 1)

            redirect(base_url() . 'login', 'refresh');



        if ($param1 == 'update_profile_info') {

            $data['name']    = $this->input->post('name');
            $data['email']   = $this->input->post('email');
            $data['address'] = $this->input->post('address');
            $data['phone']   = $this->input->post('phone');


            $this->db->where('doctor_id', $this->session->userdata('doctor_id'));
            $this->db->update('doctor', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/doctor_image/' . $this->session->userdata('doctor_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));



            redirect(base_url() . 'doctor/manage_profile/', 'refresh');
        }

        if ($param1 == 'change_password') {

            $data['new_password']         = sha1($this->input->post('new_password'));

            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            if ($data['new_password'] == $data['confirm_new_password']) {

                $this->db->where('doctor_id', $this->session->userdata('doctor_id'));

                $this->db->update('doctor', array(

                    'password' => $data['new_password']

                ));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {

                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }



            redirect(base_url() . 'doctor/manage_profile/', 'refresh');
        }

        $page_data['page_name']    = 'manage_profile';

        $page_data['page_title']   = get_phrase('manage_profile');

        $page_data['edit_profile'] = $this->db->get_where('doctor', array(

            'doctor_id' => $this->session->userdata('doctor_id')

        ))->result_array();

        $this->load->view('index', $page_data);
    }
}
