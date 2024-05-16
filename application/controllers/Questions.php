<?php
class Questions extends CI_Controller {

    public function index() {
        $data['title'] = 'Latest Questions';
        $data['questions'] = $this->question_model->get_questions();

        $this->load->view('templates/header');
        $this->load->view('questions/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL) {
        $data['question'] = $this->question_model->get_questions($slug);
        $question_id = $data['question']['id'];
        $data['answers'] = $this->answers_model->get_answers($question_id);

        if (empty($data['question'])) {
            show_404();
        }

        $data['title'] = $data['question']['title'];

        $this->load->view('templates/header');
        $this->load->view('questions/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        //Checking the login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Create Question';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('questions/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->question_model->create_question();
            //Set the alert message
            $this->session->set_flashdata('question_created', 'You question has been created');
            redirect('questions');
        }
    }

    public function edit($slug) {
        //Checking the login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['question'] = $this->question_model->get_questions($slug);

        //Checking up the user
        if ($this->session->userdata('user_id') != $this->question_model->get_questions($slug)['user_id']) {
            redirect('questions');
        }

        if (empty($data['question'])) {
            show_404();
        }

        $data['title'] = 'Edit Question';

        $this->load->view('templates/header');
        $this->load->view('questions/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id) {
        //Checking the login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        
        $this->question_model->delete_question($id);
        //Set the alert message
        $this->session->set_flashdata('question_deleted', 'Your question has been deleted');
        redirect('questions');
    }

    public function update() {
        //Checking the login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $this->question_model->update_question();
        //Set the alert message
        $this->session->set_flashdata('question_updated', 'You question has been updated');
        redirect('questions');
    }
}
