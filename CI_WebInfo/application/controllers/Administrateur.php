<?php

class Administrateur extends CI_Controller
{

    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';
        $data['type'] = 'administrateur';

        $this->load->view('body/header_connected', $data);
        $this->load->view('body/body_connected');
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

                if ($this->auth->login($email, $password, "administrateur")) {
                    $this->session->connected = true;
                    $this->session->user_type = 'administrateur';
                    redirect(site_url("Administrateur/index"));
                } else {
                    echo 'Connection refusée , l\'adresse ou le mot de passe est incorrect';
                }
            }
        }
        $this->load->view('connection/administrateur', $data);
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
        $data['type'] = 'administrateur';
        $data['user'] = $this->session->user;

        $this->load->view('body/header_connected', $data);


        if ($this->input->post()) {
            $post = $this->input->post();
            if (isset($post['update'])) {
                unset($post['update']);

                $this->load->model('Administrateur_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $post['id'] = $this->session->user['id'];

                $this->Administrateur_model->update($post);
                $this->session->user = $post;
                $data['user'] = $this->session->user;

                $this->load->view('compte/administrateur', $data);
            } else if (isset($post['delete'])) {
                unset($post['delete']);
                $this->load->model('Administrateur_model');

                $this->Administrateur_model->delete($this->session->user['id']);
                redirect(site_url('Administrateur/deconnection'));
            }
        } else {

            $this->load->view('compte/administrateur', $data);
        }

        $this->load->view('body/footer');
    }


    public function edit_formateur()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Formateur_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Formateur_model->select_all();
        $this->load->view('admin/formateur', $data);
        $this->load->view('body/footer');
    }

    public function edit_intervenant()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Intervenant_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Intervenant_model->select_all();
        $this->load->view('admin/intervenant', $data);
        $this->load->view('body/footer');
    }

    public function edit_stagiaire()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Stagiaire_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Stagiaire_model->select_all();
        $this->load->view('admin/stagiaire', $data);
        $this->load->view('body/footer');
    }

    public function edit_formation()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Formation_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Formation_model->select_all();
        $this->load->view('admin/formation', $data);
        $this->load->view('body/footer');
    }

    public function edit_projet()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Projet_model');


        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Projet_model->select_all();
        $this->load->view('admin/projet', $data);
        $this->load->view('body/footer');
    }

    public function edit_competence()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Competence_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Competence_model->select_all();
        $this->load->view('admin/competence', $data);
        $this->load->view('body/footer');
    }


    public function edit_specialisation()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Specialisation_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Specialisation_model->select_all();
        $this->load->view('admin/specialisation', $data);
        $this->load->view('body/footer');
    }

    public function edit_admission()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';
        $data['type'] = 'administrateur';
        $this->load->model('Validation_stagiaire_formation_model');
        $this->load->model('Validation_stagiaire_projet_model');
        $this->load->model('Stagiaire_model');
        $this->load->model('Formation_model');
        $this->load->model('Projet_model');


        $this->load->view('body/header_connected', $data);
        $list_validation_formation = $this->Validation_stagiaire_formation_model->select_all();
        $list_validation_projet = $this->Validation_stagiaire_projet_model->select_all();

        $list_stagiaire_formation = [];
        $list_stagiaire_projet = [];
        $list_formation = [];
        $list_projet = [];

        for ($i = 0; $i < count($list_validation_formation); $i++) {
            array_push($list_stagiaire_formation, $this->Stagiaire_model->select_by_id($list_validation_formation[$i]->ref_id_stagiaire));
            array_push($list_formation, $this->Formation_model->select_by_id($list_validation_formation[$i]->ref_id_formation));
        }

        for ($i = 0; $i < count($list_validation_projet); $i++) {
            array_push($list_stagiaire_projet, $this->Stagiaire_model->select_by_id($list_validation_projet[$i]->ref_id_stagiaire));
            array_push($list_projet, $this->Projet_model->select_by_id($list_validation_projet[$i]->ref_id_projet));
        }

        $data['list_stagiaire_formation'] = $list_stagiaire_formation;
        $data['list_stagiaire_projet'] = $list_stagiaire_projet;
        $data['list_formation'] = $list_formation;
        $data['list_projet'] = $list_projet;
        $this->load->view('admin/admission-demandes', $data);
        $this->load->view('body/footer');
    }

    public function search_formateur()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'administrateur';
        $this->load->model('Formateur_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Formateur_model->select_all();
        $this->load->view('search/formateur', $data);
        $this->load->view('body/footer');
    }

    public function search_intervenant()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'administrateur';
        $this->load->model('Intervenant_model');

        $this->load->view('body/header_connected', $data);
        $data['list'] = $this->Intervenant_model->select_all();
        $this->load->view('search/intervenant', $data);
        $this->load->view('body/footer');
    }
}
