<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parentpage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/parentpage
	 *	- or -
	 * 		http://example.com/index.php/parentpage/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/parentpage/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/Amsterdam');
	}

	public function index() {
		$data['post_id']  = getValue('id');
		// just a simple toggle so not all comments have the same post parent
		// @todo: remove this for actual case in production
		if( empty($data['post_id']) ) {
			$id_array         = array(123, 456, 789);
			$data['post_id']  = $id_array[array_rand($id_array)];
		}

		// store some other data in the array
		$data['frame_url'] = base_url().'index.php/comment/form/'.$data['post_id'];
		$data['copyright'] = '&copy; '.date('Y').' Saskia Bouten';

		$this->load->view('parent_page', $data);
	}
}
