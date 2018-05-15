<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quetes_model extends CI_Model {

	public function __construct()	{
		parent::__construct();
		$this->db->db_select('db_perso');

	}

	public function viewQuests(){
		$quetes = array();

		$this->db->where('CodeEtat', 'DEM');
		$query = $this->db->get('quetes');

		$quetes['dem'] = $query->result();

		$this->db->where('CodeEtat', 'ACTIF');
		$query = $this->db->get('quetes');

		$quetes['actif'] = $query->result();

		return $quetes;
	}

	

}

/* End of file Quetes_model.php */
/* Location: ./application/models/Quetes_model.php */ ?>