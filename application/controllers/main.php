<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/*
	 * Main controller.  Landing page, About and a FAQ
	 
	 */
	function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('main/index');
		$this->load->view('template/footer');
	}

	public function about()
	{
		$this->load->view('template/header');
		$this->load->view('main/about');
		$this->load->view('template/footer');
	}
	public function faq()
	{
		$this->load->view('template/header');
		$this->load->view('main/faq');
		$this->load->view('template/footer');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */