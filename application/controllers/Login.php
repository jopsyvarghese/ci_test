<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->input->post('email') && $this->input->post('pswd')) {
            $email = $this->input->post('email');
            $password = $this->input->post('pswd');

            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

            $userIp = $this->input->ip_address();

            $secret = $this->config->item('google_secret');

            $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            $status = json_decode($output, true);

            if (!$status['success']) {
                die("Invalid Captcha");
            }
            $result = $this->db->from("auth")->where(["email" => $email, "password" => md5($password)])->get();
            $row = $result->num_rows();
            if ($row) {
                $data = $result->result_array();
                $verified = $data[0]['verified_user'];
                $role = $data[0]['role'];
                $id = $data[0]['id'];
                $subscription_for = $data[0]['subscription_for'];
                $sessionData = array(
                    'user_email' => $email,
                    'verified' => $verified,
                    'role' => $role,
                    'id' => $id,
                    'subscription_for' => $subscription_for
                );
                $this->session->set_userdata($sessionData);
                redirect("user/dashboard");
            } else {
                echo "<h3 style='color:red'>Invalid login details</h3>";
            }
        }

    }
}
