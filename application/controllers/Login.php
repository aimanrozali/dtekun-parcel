<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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

        if ($username == 'admin' && $password == 'admin') {

            //declaring session
            $this->session->set_userdata(array('username' => $username));
            $this->template->content->view('dashboard');

            // Publish the template
            $this->template->publish();
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
