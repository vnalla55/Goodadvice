<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Response extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
             if(!in_array($_SERVER['REMOTE_ADDR'],
      array('54.72.6.126', '54.72.6.27', '54.72.6.17', '54.72.6.23', '79.125.125.1', '79.125.5.95','79.125.5.205'))) {
    header("HTTP/1.0 403 Forbidden");
    die("Error: Unknown IP");
  }
   $service_id=$_GET['service_id'];
   
		$this->load->view('response');
	}
}
