<?php
class Comment_model extends CI_Model {

	protected $post_id;
	protected $author_name;
	protected $author_email;
	protected $comment;

	public function __construct() {
		$this->load->database();
		$this->lang->load('comments', 'dutch');
	}

	/**
	 * Sets the comment.
	 * @return     boolean  Database updated / not
	 */
	public function set_comment() {

		$data = array(
			'post_id'      => $this->input->post('postid'),
			'author_name'  => $this->input->post('author'),
			'author_email' => $this->input->post('email'),
			'comment'      => $this->input->post('comment'),
			'created'      => $this->get_current_time(),
		);

		// inser data into db
		$succes = $this->db->insert('comments', $data);
		return $succes;

		// @todo: return error message on fail
	}

	/**
	 * Gets the comments by post id.
	 * @param      integer  $post_id  The post identifier
	 * @return     string/array  The comments.
	 */
	public function get_comments( $post_id = NULL ) {
		// clean post id
		$post_id = intval($post_id);

		$no_results = $this->lang->line('comments_noresults');

		// early exit on no post id
		if( $post_id == NULL || $post_id === 0 ) { return $no_results; }

		// grab comments from db
		$sql   = 'SELECT * FROM comments WHERE post_id = ? ORDER BY created DESC';
		$query = $this->db->query($sql, array($post_id));

		// return string if no results
		if( $query->result_id->num_rows < 1 ) { return $no_results; }

		return $query->result_array();
	}

	/**
	 * Gets the current time.
	 * @return     string  The current time.
	 */
	private function get_current_time() {
		$current_time = new DateTime('now');
		return $current_time->format('Y-m-d H:i:s');
	}

}
