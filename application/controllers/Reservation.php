<?php

class Reservation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reservations_modele');
        $this->load->model('user_model');
    }

    public function form_reservation() {
        $logement = $this->input->post('reservation-logement');
        $pension = $this->input->post('reservation-pension');
        $menage = $this->input->post('reservation-menage');
        $personnes = $this->input->post('reservation-personnes');
        $debut = $this->input->post('reservation-debut');
        $fin = $this->input->post('reservation-fin');
        
        

        $this->form_validation->set_rules('reservation-debut', 'reservation-debut', 'callback_check_day');
        $this->form_validation->set_rules('reservation-fin', 'reservation-fin', 'callback_check_day');
        $this->form_validation->set_rules('reservation-debut', 'reservation-debut', 'callback_check_week[' . $this->input->post('reservation-fin') . ']');
        $this->form_validation->set_rules('reservation-logement', 'reservation-logement', 'callback_check_capacity[' . $this->input->post('reservation-personnes') . ']|callback_check_logementdispo');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Réserver';
            $data['session'] = $this->session->userdata['logged_in'];
            $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);
            $data['lesLogements'] = array(
                1 => 'Ecureuil -  logements : entrée, douche et wc, 2 chambres à 2 lits avec coin toilette et balcon.',
                2 => 'Chameau - chambres doubles : entrée, douche et wc, 1 lit double',
                3 => 'Grizzli - chambres de 3 lits séparés par une cloison mobile avec coin toilette, wc, douche.',
                4 => 'Suricate - chambres de 4 lits séparés par une cloison mobile avec douche, wc et balcon.',
                5 => 'Panda - logement adapté pour les personnes à mobilité réduite.'
            );


            $data['lesPensions'] = array(0 => 'pension complète', 1 => 'demi-pension');
            $data['lesMenages'] = array(0 => 'oui', 1 => 'non');
            $this->template->load('layout', 'pages/reserver', $data);
        } else {
            $idclient = $this->user_model->get_UserInfos($this->session->userdata['logged_in']);
            $this->reservations_modele->ajouterReservation($logement, $pension, $menage, $personnes, $debut, $fin, $idclient['idclient']);
            redirect('home/confirmation');
        }
    }

    public function check_day($date) {
        $laDate = date_create($date);
        if (date_format($laDate, 'l') == 'Saturday') {
            return true;
        } else {
            $this->form_validation->set_message('check_day', "La date de {field} ce fait du samedi au samedi.");
            return false;
        }
    }

    public function check_week($date1, $date2) {
        $laDate1 = date_create($date1);
        $laDate2 = date_create($date2);
        $diff = $laDate1->diff($laDate2);
        $nb_jours = $diff->days;
        if ($laDate1 > $laDate2) {
            $this->form_validation->set_message('check_week', "Les deux dates ne sont pas valides.");
            return false;
        } else {
            if ($nb_jours >= 8 || $nb_jours < 7) {
                $this->form_validation->set_message('check_week', "Votre réservation doit être de 7 jours au maximum ($nb_jours jours).");
                return false;
            } else
                return true;
        }
    }
    
    public function check_capacity($logement, $personnes) {
        if($this->reservations_modele->checkCapacity($logement, $personnes) != 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_capacity', "Aucun logement ne correspond à votre capacité.");
            return false;
        }
    }
    
    public function check_logementdispo($logement) {
        if($this->reservations_modele->checkLogementDispo($logement) != 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_logementdispo', "Aucun logements ne sont disponibles");
            return false;
        }
    }

}