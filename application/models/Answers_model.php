<?php
class Answers_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function create_answer($question_id) {
		$data = array(

			'question_id' => $question_id,
			'name' => $this->input->post('name'),
			'body' => $this->input->post('body'),
			'created_at' => date("Y.m.d h:i:sa"),
			
		);

		return $this->db->insert('answers', $data);
	}

	public function get_answers($question_id) {
		$query = $this->db->get_where('answers', array('question_id' => $question_id));
		return $query->result_array();
	}
}
