<?php

class Stagiaire extends CI_Controller
{


    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';
        $data['type'] = 'stagiaire';

        $this->load->view('body/header_connected', $data);
        $this->load->view('body/body_connected');
        $this->load->view('body/footer');
    }

    public function inscription()
    {
        $data['pageName'] = 'inscription';
        $this->load->view('body/header_default', $data);

        if ($this->input->post()) {
            $post = $this->input->post();

            $this->form_validation->set_rules('prenom', 'firstname', 'required|alpha');
            $this->form_validation->set_rules('nom', 'lastname', 'required|alpha');
            $this->form_validation->set_rules('telephone', 'telephone', 'required|numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('mdp', 'password', 'required|alpha_numeric');
            $this->form_validation->set_rules('adresse', 'adresse', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('Stagiaire_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $this->Stagiaire_model->add($post);

                redirect(site_url("Stagiaire/connection"));
            }
        }

        $this->load->view('inscription/stagiaire', $data);
        $this->load->view('body/footer');
    }

    public function connection()
    {
        $data['pageName'] = 'connection';
        $this->load->view('body/header_default', $data);

        if ($this->input->post()) {
            $post = $this->input->post();

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $email = $this->input->post("email");
                $password = $this->input->post("password");

                if ($this->auth->login($email, $password, "stagiaire")) {
                    $this->session->connected = true;
                    $this->session->user_type = 'stagiaire';
                    redirect(site_url("Stagiaire/index"));
                } else {
                    echo 'Connection refusée , l\'adresse ou le mot de passe est incorrect';
                }
            }
        }
        $this->load->view('connection/stagiaire', $data);
        $this->load->view('body/footer');
    }

    public function deconnection()
    {
        $this->auth->logout(true);
        redirect(site_url("Acceuil/index"));
    }

    public function compte()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';
        $data['type'] = 'stagiaire';
        $data['user'] = $this->session->user;

        $this->load->view('body/header_connected', $data);

        if ($this->input->post()) {
            $post = $this->input->post();
            if (isset($post['update'])) {
                unset($post['update']);
 
                $this->load->model('Stagiaire_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $post['id'] = $this->session->user['id'];

                $this->Stagiaire_model->update($post);
                $this->session->user = $post;
                $data['user'] = $this->session->user;

                $this->load->view('compte/stagiaire', $data);
            } else if (isset($post['delete'])) {
                unset($post['delete']);
                $this->load->model('Stagiaire_model');

                $this->Stagiaire_model->delete($this->session->user['id']);
                redirect(site_url('Stagiaire/deconnection'));
            }
        } else {
            
            $this->load->view('compte/stagiaire', $data);
        }

        $this->load->view('body/footer');
    }

    public function compte_projet()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';
        $data['type'] = 'stagiaire';


        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/projet');
        $this->load->view('body/footer');
    }

    public function compte_formation()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';
        $data['type'] = 'stagiaire';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/formation');
        $this->load->view('body/footer');
    }

    public function search_formation()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'stagiaire';
        $this->load->model('Formation_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Formation_model->select_all();
        $this->load->view('search/formation', $data);
        $this->load->view('body/footer');
    }

    public function search_projet()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'stagiaire';
        $this->load->model('Projet_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Projet_model->select_all();
        $this->load->view('search/projet', $data);
        $this->load->view('body/footer');
    }

    public function search_formateur()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'stagiaire';
        $this->load->model('Formateur_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Formateur_model->select_all();
        $this->load->view('search/formateur', $data);
        $this->load->view('body/footer');
    }
    
    public function search_intervenant()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'stagiaire';
        $this->load->model('Intervenant_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Intervenant_model->select_all();
        $this->load->view('search/intervenant', $data);
        $this->load->view('body/footer');
    }
}
