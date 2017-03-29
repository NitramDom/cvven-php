<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        if(!isset($this->session->userdata['logged_in'])){
            redirect('user/login');
        } else {
            redirect('home/accueil');
        }
    }
    
    public function accueil() {
        $data['session'] =  $this->session->userdata['logged_in'];
        $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);        
        $data['title'] = 'Accueil';
        $this->template->load('layout', 'pages/accueil', $data);
    }
    
    public function profil() {
        $data['session'] =  $this->session->userdata['logged_in'];
        $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);        
        $data['title'] = 'Profil';
        $this->template->load('layout', 'pages/profil', $data);
    }  
    
    public function reserver() {
        $data['session'] =  $this->session->userdata['logged_in'];
        $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);        
        $data['title'] = 'Réserver';
        $data['lesLogements'] = array(
            1 => 'Ecureuil -  logements : entrée, douche et wc, 2 chambres à 2 lits avec coin toilette et balcon.',
            2 => 'Chameau - chambres doubles : entrée, douche et wc, 1 lit double',
            3 => 'Grizzli - chambres de 3 lits séparés par une cloison mobile avec coin toilette, wc, douche.',
            4 => 'Suricate - chambres de 4 lits séparés par une cloison mobile avec douche, wc et balcon.',
            5 =>'Panda - logement adapté pour les personnes à mobilité réduite.'
        );

        $data['lesPensions'] = array(0 => 'pension complète', 1 => 'demi-pension');
        $data['lesMenages'] = array(0 => 'oui', 1 => 'non');

        $this->template->load('layout', 'pages/reserver', $data);
    }
    
    public function confirmation() {
        $data['session'] =  $this->session->userdata['logged_in'];
        $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);        
        $data['title'] = 'Confirmation';
        $this->template->load('layout', 'pages/confirmation', $data);        
    }

    /*public function afficher($numclient = 1) {
        if ($numclient == 0) {
            show_404();
        }

        $data['titre'] = "Mes réservations";
        $data['num'] = $numclient;
        $data['reservation'] = $this->reservations_modele->get_reservation($numclient);
        
        $this->table->set_heading('ID Réservation', 'Arrivée', 'Départ', 'Personnes', 'Ménage', 'Etat', 'ID client');
        $data['reservations'] = $this->table->generate($data['reservation']);

        $this->load->view('templates/header', $data);
        $this->load->view('reservations/afficher', $data);
        $this->load->view('templates/footer', $data); 
    }

    public function ajouter() {
        $data['titre'] = "Ajouter une réservation";

        $this->load->view('templates/header', $data);
        $this->load->view('reservations/ajouter', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ajouter_formulaire() {
        $data['titre'] = "Ajouter une réservation";

        //$this->form_validation->set_rules('idclient', 'idclient', 'required');
        //$this->form_validation->set_rules('number', 'number', 'required');
        $this->form_validation->set_rules('datearrivee', 'datearrivee', 'required');
        $this->form_validation->set_rules('datedepart', 'datedepart', 'required');
        $this->form_validation->set_rules('nbpersonnage', 'nbpersonnage', 'required');
        $this->form_validation->set_rules('menage', 'menage', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('reservations/ajouter');
            $this->load->view('templates/footer');
        } else {
            $this->reservations_modele->set_reservation();
            redirect('reservations/afficher');
        }
    }*/

}
