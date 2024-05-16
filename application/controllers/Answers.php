<?php
class Answers extends CI_Controller {

	public function create($question_id) {
		$slug = $this->input->post('slug');
		$data['question'] = $this->question_model->get_questions($slug);
		$question_id = $data['question']['id'];
        $data['answers'] = $this->answers_model->get_answers($question_id);
		

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('questions/view', $data);
			$this->load->view('templates/footer');
		} else {
			$this->answers_model->create_answer($question_id);
			redirect('questions/' . $slug);
		}
	}
}
