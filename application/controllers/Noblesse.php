<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noblesse extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->load->model('noblesse_model');
	}

	public function index()	{
		
	}

	public function manageNobles(){
		$data = array();

		$this->load->view('template/header', $data);
        $this->load->view('noblesse/manage_nobles', $data);
        $this->load->view('template/footer',$data);
	}

	public function searchPerso(){
		$data['results'] = $this->noblesse_model->searchPerso();

		$this->load->view('template/header', $data);
        $this->load->view('noblesse/manage_nobles', $data);
        $this->load->view('template/footer',$data);
	}

}

/* End of file Noblesse.php */
/* Location: ./application/controllers/Noblesse.php */ ?>