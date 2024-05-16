<?php
class Users extends CI_Controller {

	//User login
	public function login() {
		$data['title'] = 'Sign in';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {
			//getting the username
			$username = $this->input->post('username');
			//getting the password and encrypt it
			// $password = sha1($this->input->post('password'));
			$password = $this->input->post('password');
			$user_id = $this->users_model->login($username, $password);

			if ($user_id) {
				//creating a session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You have successfully logged in!');
				redirect('questions');
			} else {
				$this->session->set_flashdata('login_failed', 'Invalid Login');
				redirect('users/login');
			}
		}
	}

	//User logout
	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('user_loggedout', 'You have just logged out');
		redirect('users/login');
	}

    //Registration of the user
	public function register() {
		$data['title'] = 'Sign Up';

		$this->form_validation->set_rules('firstname', 'FirstName', 'required');
		$this->form_validation->set_rules('lastname', 'LastName', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			//encrypting the password
			// $encrypted_password = sha1($this->input->post('password'));
			$encrypted_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->users_model->register($encrypted_password);
			$this->session->set_flashdata('registered_user', 'You are successfully registered..You can log in now!');
			redirect('questions');
		}
	}

	//Checking if the username exists
	public function check_username_exists($username) {
		$this->form_validation->set_message('check_username_exists', 'This username is already exists. Please pick a different Username');
		if ($this->users_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	//Checking if the email exists
	public function check_email_exists($email) {
		$this->form_validation->set_message('check_email_exists', 'This email is already exists. Please pick a different Email');
		if ($this->users_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
