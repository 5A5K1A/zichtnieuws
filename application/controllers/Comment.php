<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/comment
	 *	- or -
	 * 		http://example.com/index.php/comment/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/comment/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/Amsterdam');
		$this->load->helper('url_helper');
		$this->lang->load('comments', 'dutch');
		$this->load->model('comment_model');
	}

	/**
	 * Renders the default view
	 * @param   integer   $post_id   The post identifier
	 */
	public function view( $post_id = NULL ) {
		// prepare data
		$data['post_id']  = $post_id;
		$data['comments'] = $this->comment_model->get_comments($post_id);

		// render templates
		$this->load->view('comment/header', $data);
		$this->load->view('comment/form', $data);
		$this->load->view('comment/overview', $data);
		$this->load->view('comment/footer');
	}

	/**
	 * Renders the form page
	 * @param   integer   $post_id   The post identifier
	 */
	public function form( $post_id = NULL ) {
		// prepare data
		$data['post_id']  = $post_id;
		$data['comments'] = $this->comment_model->get_comments($post_id);

		// add helpers
		$this->load->helper('form');
		$this->load->library('form_validation');

		// add extra validation on form fields
		$this->form_validation->set_rules('author', 'Naam', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('comment', 'Reactie', 'required');

		if ($this->form_validation->run() === FALSE) {
			// render views
			$this->load->view('comment/header', $data);
			$this->load->view('comment/form', $data);
			$this->load->view('comment/overview', $data);

		} else {
			// update db with new comment
			if( $this->comment_model->set_comment() ) {
				$data['post_id']  = $this->input->post('postid');
				// prepare data array with new comment
				$data['new_comment'] = array(
					'post_id'      => $this->input->post('postid'),
					'author_name'  => $this->input->post('author'),
					'author_email' => $this->input->post('email'),
					'comment'      => $this->input->post('comment')
				);
				// render views
				$this->load->view('comment/header', $data);
				$this->load->view('comment/success', $data);
				// collect comments from db
				$data['comments'] = $this->comment_model->get_comments($this->input->post('postid'));
				// remove the first one, 'cause that one is rendered already in success
				array_shift($data['comments']);
				if( empty($data['comments']) ) {
					$data['comments'] = $this->lang->line('comments_noearlierresults');
				}

			} else {
				// render error & new form
				$this->load->view('comment/header', $data);
				$this->load->view('comment/error');
				$this->load->view('comment/form', $data);
			}
			// render previous comments
			$this->load->view('comment/overview', $data);
		}
		// render html foot
		$this->load->view('comment/footer');
	}
}
