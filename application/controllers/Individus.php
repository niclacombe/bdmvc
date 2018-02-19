<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individus extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$data= array();

		$this->load->model('old_inscriptions_model');
		$data['activites'] = $this->old_inscriptions_model->getActivites();

		$this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer',$data);
	}

	public function addDebt() {
		$data= array();

		$idPerso = $_POST['idPerso'];
		$commentaireDette = $_POST['commentaireDette'];
		$montantDette = $_POST['montantDette'];
		$idIndiv = $_POST['idIndiv']; 

		$this->load->model('individus_model');
		$data['activites'] = $this->individus_model->insertDette($idIndiv, $montantDette, $commentaireDette);

		if($returned){
			redirect('personnages/getSinglePersonnage/' .$idPerso .'/' .$idIndiv);
		}
	}

}
