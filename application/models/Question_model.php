<?php
	class Question_model extends CI_Model {
		
		public function __construct() {
			$this->load->database();
		}

		public function create_question() {
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'user_id' => $this->session->userdata('user_id'),	
			);
			return $this->db->insert('questions', $data);
		}

		public function get_questions($slug = FALSE) {
			if($slug === FALSE) {

			$this->db->order_by('q.id', 'DESC');
			$query = $this->db->select('q.id,q.user_id,q.title,q.slug,q.body,q.created_at,u.username')
			->from('questions as q')
			->join('users as u', 'q.user_id = u.id')
			->get();
			return $query->result_array();
			}

			$query = $this->db->select('q.id,q.user_id,q.title,q.slug,q.body,q.created_at,u.username')
            ->from('questions as q')
            ->where('q.slug', $slug)
            ->join('users as u', 'q.user_id = u.id')
            ->get();
			return $query->row_array();
		}

		public function delete_question($id) {
			$this->db->where('id', $id);
			$this->db->delete('questions');
			return true;
		}

		public function update_question() {
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('questions', $data);
		}
	}