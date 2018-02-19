<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noblesse_model extends CI_Model {
	public function __construct()	{
		parent::__construct();
		$this->db->db_select('db_perso');
	}

	public function searchPerso(){
		$this->db->db_select('db_indiv');

		$this->db->select('indiv.Nom as nomIndiv, indiv.Id as idIndiv, indiv.Prenom as prenomIndiv');
		$this->db->from('individus indiv');
		
		$this->db->join('db_perso.personnages perso', 'perso.IdIndividu = indiv.Id', 'left');

		/* WHEREs INDIV */
		if($this->input->post('prenomIndiv')){
			$this->db->like('indiv.Prenom', $this->input->post('prenomIndiv') );
		}
		if($this->input->post('nomIndiv')){
			$this->db->like('indiv.Nom', $this->input->post('nomIndiv') );
		}
		/* WHEREs PERSO */
		if($this->input->post('prenomPerso')){
			$this->db->like('perso.Prenom', $this->input->post('prenomPerso') );
		}
		if($this->input->post('nomPerso')){
			$this->db->like('perso.Nom', $this->input->post('nomPerso') );
		}		

		$this->db->group_by('idIndiv');

		$this->db->order_by('prenomIndiv, nomIndiv', 'asc');

		$query = $this->db->get();
		$vJoueurs = $query->result_array();

		$joueurs = [];

		foreach ($vJoueurs as $key => $joueur) {

			$this->db->db_select('db_perso');
			$this->db->select('perso.*, titres.Titre');
			$this->db->from('db_perso.personnages perso');
			$this->db->join('db_perso.titres titres', 'titres.IdPersonnage = perso.Id', 'left');
			$this->db->where('IdIndividu', $joueur['idIndiv'] );
			$query = $this->db->get();

			$joueurs[$key]['nomIndiv'] = $joueur['nomIndiv'];
			$joueurs[$key]['idIndiv'] = $joueur['idIndiv'];
			$joueurs[$key]['prenomIndiv'] = $joueur['prenomIndiv'];

			$joueurs[$key]['Personnages'] = $query->result();

		}

		return $joueurs;
	}
	

}

/* End of file Noblesse_model.php */
/* Location: ./application/models/Noblesse_model.php */ ?>