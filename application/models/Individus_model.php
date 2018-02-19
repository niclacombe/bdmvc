<?php
class Individus_model extends CI_Model{

	public function __construct(){
		$this->load->database('db_indiv', TRUE);
	}

	public function getIndividus(){
		$this->db->select('Id,Compte');
		$query = $this->db->get('individus');

		return $query->result_array();
	}

	public function getSingleIndividu($id){

		$this->db->db_select('db_indiv');


		$this->db->select('*');
		$this->db->from('individus');
		$this->db->where('Id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function getFullIndividu($id){
		$this->db->db_select('db_indiv');

		$returnedIndividu = array();

		/*Dettes*/
		$this->db->where('IdIndividu',$id);
		$indivDettes = $this->db->get('sommes_dues');
		$returnedIndividu['indivDettes'] = $indivDettes->result_array();

		return $returnedIndividu;

	}

	public function quickInscription($compte, $prenomJoueur, $nomJoueur) {
		$this->db->db_select('db_indiv');

		$this->db->select('*');

		if ( !empty($compte) ){
			$this->db->like('Compte',$compte);
		}

		if ( !empty($prenomJoueur) ){
			$this->db->like('Prenom',$prenomJoueur);
		}

		if ( !empty($nomJoueur) ){
			$this->db->like('Nom',$nomJoueur);
		}

		$results = $this->db->get('individus');

		return $results->result_object();
	}

	public function insertDette($idIndiv, $montantDette, $commentaireDette){
		$this->db->db_select('db_indiv');

		$insertData = array(
			'IdIndividu' => $idIndiv,
			'Montant' => $montantDette,
			'Raison' => 'Ajout manuel',
			'DateInscription' => date('Y-m-d H:i:s', time()),
			'Commentaires' => $commentaireDette
		);

		$this->db->insert('sommes_dues',$insertData);

		return true;

	}

	
}