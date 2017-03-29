<?php

class user_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function user_RegisterUser($nom, $prenom, $email, $telephone, $adresse,  $ville, $codepostal, $password) {
        $query = $this->db->query("INSERT INTO client (nom, prenom, email, telephone, adresse, ville, codepostal, password)"
                . "VALUES ('$nom', '$prenom', '$email', '$telephone', '$adresse', '$ville', '$codepostal', '$password')");
    }

    public function user_CheckLogin($login = false) {
        $query = $this->db->query("SELECT email FROM client WHERE email = '$login' LIMIT 1");
        $result = $query->row_array();
        return $result['email'];
    }
    
    public function user_CheckPassword($password = false) {
        $query = $this->db->query("SELECT password FROM client WHERE password = '$password' LIMIT 1");
        $result = $query->row_array();
        return $result['password'];
    }
    
    public function get_UserInfos($email) {
        $query = $this->db->query("SELECT * FROM client WHERE email = '$email' LIMIT 1");
        return $query->row_array();
    }
    
    public function user_ChangePassword($email, $password) {
        $query = $this->db->query("UPDATE client SET password = '$password' WHERE email = '$email'");
    }
    
    public function have_reservation($idclient) {
        $query = $this->db->query("SELECT * FROM reservation WHERE idclient = $idclient");
        return $query->num_rows();
    }
    
    public function get_reservation($idclient) {
        $query = $this->db->query("SELECT * FROM reservation WHERE idclient = $idclient");
        return $query->result_array();
    }

}