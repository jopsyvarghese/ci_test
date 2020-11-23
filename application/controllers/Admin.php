<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library('session');
    }

    public function home()
    {
        $result = $this->db->select("id, first_name, last_name, email, phone_number, date_of_birth, subscription_for")->from("auth")->where("role", 0)->get();
        $users = $result->result();
        $data = [
            "users" => $users
        ];
        $this->load->view('admin_dashboard', $data);
    }

    public function logout()
    {
        if (isset($this->session)) {
            $array_items = ['user_email', 'verified', 'role', 'id'];
            $this->session->unset_userdata($array_items);
            $this->load->view('welcome_message');
        }
    }

    public function edit($id, $subscription_for, $status = '')
    {
        $result = $this->db->from("hits")->where("user_id", $id)->get();
        $data = ["first_name", "last_name"];
        $userResult = $this->db->select($data)->from("auth")->where("id", $id)->get();
        $data = [
            "hits" => $result->result(),
            "user_id" => $id,
            "user_name" => $userResult->result(),
            "status" => $status,
            "subscription_for" => $subscription_for
        ];
        $this->load->view("user_hits_edit", $data);
    }

    public function edit_item($id, $itemId, $subscription_for)
    {
        $result = $this->db->from("hits")->where("id", $itemId)->get();
        $data = [
            "items" => $result->result(),
            "id" => $id,
            "item_id" => $itemId,
            "subscription_for" => $subscription_for
        ];
        $this->load->view('user_item_edit', $data);
    }

    public function delete_item($id, $itemId, $subscription_for)
    {
        if ($this->db->delete('hits', array('id' => $itemId))) {
            redirect("admin/edit/$id/$subscription_for");
        } else {
            echo "Unable to Delete";
        }
    }

    public function edit_item_final()
    {
        $id = $this->input->post('id');
        $item_id = $this->input->post('item_id');
        $subscription_for= $this->input->post('subscription_for');
        $title = $this->input->post('title') != null ? $this->input->post('title') : "";
        $author = $this->input->post('author') != null ? $this->input->post('author') : "";
        $story_title = $this->input->post('story_title') != null ? $this->input->post('story_title') : "";
        $comment = $this->input->post('comment') != null ? $this->input->post('comment') : "";
        $story_text = $this->input->post('story_text') != null ? $this->input->post('story_text') : "";
        $url = $this->input->post('url') != null ? $this->input->post('url') : "";
        $data = [
            "title" => $title,
            "author" => $author,
            "story_text" => $story_text,
            "url" => $url,
            "story_title" => $story_title,
            "comment" => $comment
        ];
        $result = $this->db->set($data)->where("id", $item_id)->from('hits')->update();
        if ($result) redirect("admin/edit/$id/$subscription_for");
        else echo "Unable to Update";
    }
}
