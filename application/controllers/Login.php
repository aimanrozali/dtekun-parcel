<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
        $this->load->helper('url');
    }

    public function login()
    {
        // load data to view
        $this->template->content->view('login-page');

        // Publish the template
        $this->template->publish();
    }

    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data['revenue'] = $this->DashboardModel->fetchRevenue();

        $data['parcel'] = $this->DashboardModel->fetchParcelCount();

        if ($username == 'admin' && $password == 'admin') {

            //declaring session
            $this->session->set_userdata(array('username' => $username));
            redirect('Dashboard/index');
            // $this->template->content->view('dashboard', $data);

            // // Publish the template
            // $this->template->publish();
        } else {
        }
    }

    public function logout()
    {

        //removing session
        $this->session->unset_userdata('username');
        redirect('Parcel/index');
    }
}