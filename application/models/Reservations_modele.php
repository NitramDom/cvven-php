<?php

class reservations_modele extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_reservation($id = FALSE) {
        $query = $this->db->get_where('reservation', array('idClient' => $id));
        return $query->result_array();
    }

    public function set_reservation() {
        $data = array(
            'idClient' => 1,
            'dateArrivee' => $this->input->post('datearrivee'),
            'dateDepart' => $this->input->post('datedepart'),
            'nbPersonnage' => $this->input->post('nbpersonnage'),
            'menage' => $this->input->post('menage'),
            'etatReservation' => "En attente"
        );

        return $this->db->insert('reservation', $data);
    }

    /*public function check_DisponibiliteDebut($date) {
        $query = $this->db->query("SELECT ");
    }*/

    public function ajouterReservation($logement, $pension, $menage, $personnes, $debut, $fin, $idclient) {
        $query = $this->db->query("SELECT idlogement "
                . "FROM logement "
                . "WHERE type = $logement "
                . "AND idlogement NOT IN (SELECT idlogement FROM reservation WHERE idlogement IS NOT null)");
        $resultat = $query->row_array(0);
        
        $query = $this->db->query("INSERT INTO reservation (datearrivee, datedepart, nbpersonnes, pension, menage, etat, idclient, datereservation, idlogement) "
                . "VALUES ('$debut', '$fin', $personnes, " . (boolval($pension) ? 'true' : 'false') . ", " . (boolval($menage) ? 'true' : 'false') . ", 'en attente', $idclient, current_date, " . $resultat['idlogement'] . ")");
    }
    
    public function checkCapacity($logement, $personne) {
        $query = $this->db->query("SELECT idlogement "
                . "FROM logement "
                . "WHERE type = $logement "
                . "AND NOT capacite < $personne");
        return $query->num_rows();
    }
    
    public function checkLogementDispo($logement) {
        $query = $this->db->query("SELECT idlogement "
                . "FROM logement "
                . "WHERE type = $logement " 
                . "AND idlogement NOT IN (SELECT idlogement FROM reservation WHERE idlogement IS NOT null)");
        return $query->num_rows();
    }

}
