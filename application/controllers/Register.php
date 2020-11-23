<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('register_form');
    }

    public function insert() {
        $first_name=$this->input->post('first_name');
        $last_name =$this->input->post('last_name');
        $phone_number =$this->input->post('phone_number');
        $date_of_birth =$this->input->post('date_of_birth');
        $email =$this->input->post('email');
        $pwd =$this->input->post('pwd');
        $country =$this->input->post('country');
        $subscription_for =$this->input->post('subscription_for');
        $hash = md5(rand(0, 100000));
        $pwd = md5($pwd);

        $data = array(
            "first_name" =>$first_name,
            "last_name" => $last_name,
            "phone_number" => $phone_number,
            "date_of_birth" => $date_of_birth,
            "email" => $email,
            "password" => $pwd,
            "country" =>$country,
            "subscription_for" =>$subscription_for,
            "role" => 0,
            "verified_user" => 0,
            "hash" => $hash
        );

        if($this->db->insert('auth',$data)) {
            echo "<script>alert('Registered Successfully')</script>";
            redirect(base_url()."welcome/index/success");
        }
    }
}
