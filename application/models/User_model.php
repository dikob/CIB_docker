<?php

class User_model extends CI_Model
{
    public function register($enc_password) {
        // User data array
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'zipcode' => $this->input->post('zipcode')
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    // Log user in
    public function login($username, $password) {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    // Check username exists
    public function check_username_exists($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        if (empty($query->row_array())) {
            // set true means don't print the error because it could not find the username
            // so go ahead and use this username and don't display the error
            return true;
        } else {
            return false;
        }
    }
}