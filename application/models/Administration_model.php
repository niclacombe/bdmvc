<?php
class Administration_model extends CI_Model{

	public function __construct(){
		$this->load->database('db_perso');
	}

	public function addCreditOrDebt($idIndividu, $raison, $montant){
		$this->db->db_select('db_indiv');

		$insertData = array(
			'IdIndividu' => $idIndividu,
			'Montant' => $montant,
			'DateInscription' => date('Y-m-d H:i:s', time()),
			'Raison' => $raison,
		);

		$this->db->insert('sommes_dues',$insertData);
	}

	public function getCreditsAndDebts($idIndiv){
		$this->db->db_select('db_indiv');

		$this->db->where('IdIndividu',$idIndiv);
		$sommes = $this->db->get('sommes_dues');
		$returned['sommes'] = $sommes->result_array();


		$this->db->where('Id',$idIndiv);
		$infosJoueurs = $this->db->get('individus');
		$returned['infosJoueurs'] = $infosJoueurs->result_array();

		return $returned;
	}

	public function removeCreditOrDebt($idSomme){
		$this->db->db_select('db_indiv');

		$this->db->where('Id',$idSomme);
		$this->db->delete('sommes_dues');
	}

	public function getavertissements($idIndiv){
		$this->db->db_select('db_indiv');

		$query = "SELECT avert.*, indiv.Prenom, indiv.Nom
		FROM db_indiv.avertissements avert 
		LEFT JOIN db_indiv.individus indiv ON avert.IdInscripteur = indiv.Id 
		WHERE IdCible = " .$idIndiv .";";

		$indivAvertissements = $this->db->query($query);
		$returned['avertissements'] = $indivAvertissements->result_array();

		$this->db->where('NiveauAcces >=', 4);
		$inscripteurs = $this->db->get('individus');
		$returned['inscripteurs'] = $inscripteurs->result_array();

		$this->db->where('Id', $idIndiv);
		$infosJoueur = $this->db->get('individus');
		$returned['infosJoueur'] = $infosJoueur->result_array();

		return $returned;

	}

	public function updateNiveauAcces($idIndividu, $newNiveauAcces){
		$this->db->db_select('db_indiv');

		$data = array('NiveauAcces'=>$newNiveauAcces);

		$this->db->where('id',$idIndividu);
		$this->db->update('individus',$data);

	}
	
}