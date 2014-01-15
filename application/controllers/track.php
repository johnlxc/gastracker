<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Track extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Track_model');
        if(!$this->tank_auth->is_logged_in())
		{
			redirect('auth/login');
			pushNotif('You must be logged in to view this page!');
		}
    }
	/*
	 * Index Page for this controller.
	 */
	public function index()
	{

		$user_id=  $this->tank_auth->get_user_id();
		$count = $this->Track_model->get_count($user_id);
		$report = $this->Track_model->user_report($user_id);
		$prices = $this->Track_model->get_prices($user_id);

		$this->load->view('template/header');
		$this->load->view('track/index', array(
			'count' => $count,
			'report' => $report,
			'prices' => $prices
			));
		$this->load->view('template/footer');
	}
	public function add()
	{
		$user_id=  $this->tank_auth->get_user_id();

		if ($_POST)
		{
			$this->Track_model->add_record($user_id, $_POST);
			pushSuccess('New Record created!');
			redirect('track/index');
		}

		$this->load->view('template/header');
		$this->load->view('track/add');
		$this->load->view('template/footer');	
	}

	public function all()
	{

		$this->load->helper('date');
		$user_id= $this->tank_auth->get_user_id();
		
		
		$tracks = $this->Track_model->get_all($user_id);
		$this->load->view('template/header');
		$this->load->view('track/all', array(
			'tracks' => $tracks
			));
		$this->load->view('template/footer');
	}

	public function update($id)
	{

		$record = $this->Track_model->get($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('gas_price', 'Gas Price', 'required');
		$this->form_validation->set_rules('mileage', 'Mileage', 'required');
		$this->form_validation->set_rules('num_gallons', 'Number of Gallons', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('template/header');
			$this->load->view('track/update', array(
			'record' => $record
			));			
			$this->load->view('template/footer');		
		}
		else
		{
			$this->Track_model->update_record($id, $_POST);
			pushSuccess('Record update!');
			redirect('track/detail/'.$id);
		}
	}
	public function detail($id)
	{
		$record = $this->Track_model->get($id);

		$this->load->view('template/header');
		$this->load->view('track/detail',array(
			'record' => $record
			));
		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$this->Track_model->delete_record($id);
		pushSuccess('Record Deleted!');
		redirect('track/all');
	}
}

/* End of file track.php */
/* Location: ./application/controllers/track.php */