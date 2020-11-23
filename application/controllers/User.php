<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    private $url;
    private $headers;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library('session');
        $this->url = "https://hn.algolia.com/api/v1/";

    }

    public function dashboard()
    {
        if (!isset($this->session)) die("Please Login Again.");
        $userEmail = $this->session->userdata('user_email');
        $verified = $this->session->userdata('verified');
        $role = $this->session->userdata('role');
        $hash = md5(rand(0, 100000));
        if ($userEmail && !$role) {
            if (!$verified) {
                echo "Kindly Verify Your Email";
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'Your GMail ID Here',
                    'smtp_pass' => 'Your Password',
                    'mailtype' => 'html',
                    'charset' => 'utf-8'
                );
                // Make sure that 2 step verification is turned Off & allow less secure app is On in your google accounts security section
                // If you did it now, please wait for sometime for google to activate the services properly before sending email with this
                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");
                $htmlContent = '<h1>Verify Your Email to View Your Subscribed Contents</h1>';
                $htmlContent .= '<p><a href="http://localhost/ci_test/user/verify/' . $userEmail . '/' . $hash . '">Click on this Link To Verify Your Email.</a></p>';

                $this->email->to($userEmail);
                $this->email->from('youremail@demo.com', 'CI Test');
                $this->email->subject('Verify Your Email');
                $this->email->message($htmlContent);

                if ($this->email->send()) {
                    $result = ($this->db->set("hash", $hash)->where("email", $userEmail)->from("auth")->update());
                }
            } else {
                redirect('user/home');
            }
        } elseif ($role) {
            redirect('admin/home');
        } else {
            echo "Something Went Wrong";
        }
    }

    public function verify($email, $hash)
    {
        $whereArray = [
            "email" => $email,
            "hash" => $hash
        ];
        $result = $this->db->select("id")->where($whereArray)->from("auth")->get();
        $row = $result->num_rows();
        if ($row) {
            if ($this->db->set("verified_user", 1)->where($whereArray)->from("auth")->update()) {
                echo "<script>alert('Email Verified'); ?>";
                $this->session->set_userdata("verified", 1);
                redirect("user/home");
            } else {
                echo "Verification Failed";
            }
        } else {
            echo "Invalid Details Supplied";
        }
    }

    public function home()
    {
        if (!isset($this->session)) die("Please Login Again.");
        $id = $this->session->userdata('id');
        $subscription_for = $this->session->userdata('subscription_for');
        if (!$id) die("Something Went Wrong.");
        $jsonArray = null;
        $result = $this->db->select("count(id) as count")->from("hits")->where("user_id", $id)->get();
        $row = $result->result();
        $count = 0;
        $count = $row[0]->count;
        if (!$count) {
            $curl = curl_init();
            $timeout = 0;
            curl_setopt($curl, CURLOPT_URL, $this->url . "search?tags=" . $subscription_for . "&hitsPerPage=10");
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($curl);
            if (curl_errno($curl)) {
                echo curl_error($curl);
                curl_close($curl);
                exit ();
            }
            curl_close($curl);
            $jsonArray = json_decode($file_contents, true);
            $jsonArray = $jsonArray['hits'];
            foreach ($jsonArray as $item) {
                $data = [
                    "user_id" => $id,
                    "title" => $item['title'],
                    "author" => $item['author'],
                    "story_text" => $item['story_text'],
                    "url" => $item['url'],
                    "comment" => $item['comment_text'],
                    "story_title" => $item['story_title']
                ];
                $this->db->insert("hits", $data);
            }
        }
        $selectItems = ["user_id", "title", "author", "story_text", "url", "comment", "story_title"];
        $result = $this->db->select($selectItems)->where("user_id", $id)->from("hits")->get();
        $jsonArray = $result->result();
        $data = [
            "hits" => $jsonArray,
            "subscription_for" =>$subscription_for
        ];
        $this->load->view('user_dashboard', $data);
    }

    public function logout()
    {
        if (isset($this->session)) {
            $array_items = ['user_email', 'verified', 'role', 'id'];
            $this->session->unset_userdata($array_items);
            $this->load->view('welcome_message');
        }
    }
}
