<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login() {
        if (!isset($this->session->userdata['logged_in'])) {
            $data['title'] = 'Connexion';
            $this->load->view('pages/login', $data);
        }
    }

    public function register() {
        if (!isset($this->session->userdata['logged_in'])) {
            $data['title'] = 'Inscription';
            $this->load->view('pages/register', $data);
        }
    }

    public function register_form() {
        $nom = $this->input->post('register-nom');
        $prenom = $this->input->post('register-prenom');
        $email = $this->input->post('register-email');
        $telephone = $this->input->post('register-telephone');
        $adresse = $this->input->post('register-adresse');
        $ville = $this->input->post('register-ville');
        $codepostal = $this->input->post('register-codepostal');
        $password1 = $this->input->post('register-password1');
        $password2 = $this->input->post('register-password2');

        $this->form_validation->set_rules('register-email', 'email', 'callback_register_check');
        $this->form_validation->set_rules('register-password1', 'mot de passe', 'required');
        $this->form_validation->set_rules('register-password2', 'confirmation mot de passe', 'required|matches[register-password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Inscription';
            $this->load->view('pages/register', $data);
        } else {
            $this->user_model->user_RegisterUser($nom, $prenom, $email, $telephone, $adresse, $ville, $codepostal, md5($password1));
            redirect('user/login_form');
        }
    }

    public function login_form() {
        $email = $this->input->post('login-email');
        $password = $this->input->post('login-password');

        $this->form_validation->set_rules('login-email', 'email', 'callback_login_check');
        $this->form_validation->set_rules('login-password', 'mot de passe', 'callback_password_check');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Connexion';
            $this->session->set_flashdata('noconnect', 'Aucun compte ne correspond à vos identifiants ');
            $this->load->view('pages/login', $data);
        } else {
            $this->session->set_userdata('logged_in', $email);
            redirect('home');
        }
    }
    
    public function profil_form() {
        $email = $this->input->post('profil-password1');
        $password = $this->input->post('profil-password2');
        
        $this->form_validation->set_rules('profil-password1', 'mot de passe', 'required');
        $this->form_validation->set_rules('profil-password2', 'confirmation mot de passe', 'required|matches[profil-password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil';
            $data['session'] =  $this->session->userdata['logged_in'];
            $data['user_infos'] = $this->user_model->get_UserInfos($data['session']);        
            $this->template->load('layout', 'pages/profil', $data);
        } else {        
            $this->user_model->user_ChangePassword($this->session->userdata['logged_in'], md5($password));
            redirect('home/profil');
        }
    }

    ///////////////////////////////////////////////////////

    public function registerPassword_check($password1, $password2) {
        echo $password1;
        if (!strcmp($password1, $password2) == 0) {
            $this->form_validation->set_message('register_check', 'Les mots de passe ne correspondent pas.');
            return false;
        } else
            return true;
    }

    public function register_check($login) {
        if (strcmp($login, $this->user_model->user_CheckLogin($login)) == 0) {
            $this->form_validation->set_message('register_check', 'L\'{field} éxiste déjà.');
            return false;
        } else
            return true;
    }

    public function login_check($login) {
        if (!strcmp($login, $this->user_model->user_CheckLogin($login)) == 0) {
            $this->form_validation->set_message('login_check', 'L\'{field} est incorrect.');
            return false;
        } else
            return true;
    }

    public function password_check($password) {
        $password = md5($password);
        if (!strcmp($password, $this->user_model->user_CheckPassword($password)) == 0) {
            $this->form_validation->set_message('password_check', 'Le {field} est incorrect.');
            return false;
        } else
            return true;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/login');
    }

}
