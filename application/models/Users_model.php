<?php
	class Users_model extends CI_Model{

		public function login($username, $password) {
		$res = $this->db->get_where('users', array('username' => $username));
		
		$row = $res->row();
		   if (password_verify($password, $row->password)) {
			   return $row->id;
		   } else {
			   return false;
		   }
	    }

		public function register($encrypted_password) {
			$data = array(
				'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $encrypted_password
			);
			//Inserting the users
			return $this->db->insert('users', $data);
		}

		//Checking if the username exists
		public function check_username_exists($username) {
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		//Checking if the email exists
		public function check_email_exists($email) {
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}