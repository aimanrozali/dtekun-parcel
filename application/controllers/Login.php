<?php

class Login extends CI_Controller
{
    //constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
        $this->load->helper('url');
    }

    //display login page
    public function login()
    {
        // load data to view
        $this->template->content->view('login-page');

        // Publish the template
        $this->template->publish();
    }

    //admin login
    public function login_process()
    {

        $this->load->library('session');
        //get input
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data['revenue'] = $this->DashboardModel->fetchRevenue();

        $data['parcel'] = $this->DashboardModel->fetchParcelCount();

        //if input same as declared username and password
        if ($username == 'admin' && $password == 'admin') {

            //declaring session
            $this->session->set_userdata(array('username' => $username));
             //display admin dashboard
            $this->template->content->view('dashboard');
            redirect('Dashboard/index');
            // $this->template->content->view('dashboard', $data);

            // Publish the template
            $this->template->publish();
        } else{
            //display error message
            $this->session->set_flashdata('error','Wrong username or password. Please try again.');
            //display login page
            $this->template->content->view('login-page');

            // Publish the template
            $this->template->publish();
            // // Publish the template
            // $this->template->publish();
        } else {
        }
    }

    //admin logout
    public function logout()
    {
        //removing session
        $this->session->unset_userdata('username');
        redirect('Parcel/index');
    }
}