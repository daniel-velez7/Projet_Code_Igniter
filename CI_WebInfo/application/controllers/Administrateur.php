<?php 

class Administrateur extends CI_Controller {
    
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('body/header_connected', $data);
        $this->load->view('body_connected');
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
                    $this->session->user_type = 'admin';
                    redirect(site_url("Administrateur/index"));
                }
                else {
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

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/administrateur');
        $this->load->view('body/footer');
    }

    public function edit_formateur()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/formateur');
        $this->load->view('body/footer');
    }

    public function edit_intervenant()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/intervenant');
        $this->load->view('body/footer');
    }

    public function edit_stagiaire()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/stagiaire');
        $this->load->view('body/footer');
    }

    public function edit_formation()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/formation');
        $this->load->view('body/footer');
    }

    public function edit_projet()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/projet');
        $this->load->view('body/footer');
    }

    public function edit_competence()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/competence');
        $this->load->view('body/footer');
    }


        public function edit_specialisation()
        {
            if ($this->session->connected == false) {
                redirect(site_url('Acceuil/connection'));
            }
    
            $data['pageName'] = 'admin';
    
            $this->load->view('body/header_connected', $data);
            $this->load->view('admin/specialisation');
            $this->load->view('body/footer');
        }

        public function edit_admission()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/admission-demandes');
        $this->load->view('body/footer');
    }
}