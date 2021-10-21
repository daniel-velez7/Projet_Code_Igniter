<?php

class Intervenant extends CI_Controller
{

    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';
        $data['type'] = 'intervenant';

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

            $this->form_validation->set_rules('nom', 'nom', 'required|alpha');
            $this->form_validation->set_rules('prenom', 'prenom', 'required|alpha');
            $this->form_validation->set_rules('cv', 'cv', 'required|alpha_numeric');
            $this->form_validation->set_rules('photo', 'photo', 'required|alpha_numeric');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('mdp', 'mdp', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('intervenant_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $this->intervenant_model->add($post);

                redirect(site_url("Intervenant/connection"));
            }
        }

        $this->load->view('inscription/intervenant', $data);
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

                if ($this->auth->login($email, $password, "intervenant")) {
                    $this->session->connected = true;
                    $this->session->user_type = 'intervenant';
                    redirect(site_url("Intervenant/index"));
                } else {
                    echo 'Connection refusée , l\'adresse ou le mot de passe est incorrect';
                }
            }
        }
        $this->load->view('connection/intervenant', $data);
        $this->load->view('body/footer');
    }

    public function search_formateur()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('search/formateur');
        $this->load->view('body/footer');
    }

    public function search_intervenant()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('search/intervenant');
        $this->load->view('body/footer');
    }

    public function search_formation()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('search/formation');
        $this->load->view('body/footer');
    }

    public function search_projet()
    {
        $data['pageName'] = 'index';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('search/projet');
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
        $data['type'] = 'intervenant';
        $data['user'] = $this->session->user;

        $this->load->view('body/header_connected', $data);

        if ($this->input->post()) {
            $post = $this->input->post();
            if (isset($post['update'])) {
                unset($post['update']);

                $this->load->model('Intervenant_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $post['id'] = $this->session->user['id'];

                $this->Intervenant_model->update($post);
                $this->session->user = $post;
                $data['user'] = $this->session->user;

                $this->load->view('compte/Intervenant', $data);
            } else if (isset($post['delete'])) {
                unset($post['delete']);
                $this->load->model('Intervenant_model');

                $this->Intervenant_model->delete($this->session->user['id']);
                redirect(site_url('Intervenant/deconnection'));
            }
        } else {

            $this->load->view('compte/intervenant', $data);
        }
        $this->load->view('body/footer');
    }


    public function compte_projet()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/projet');
        $this->load->view('body/footer');
    }



    public function profil()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'profil';
        $data['type'] = 'intervenant';

        $this->load->view('body/header_connected', $data);
        $this->load->view('profils/intervenant');
        $this->load->view('body/footer');
    }
}
