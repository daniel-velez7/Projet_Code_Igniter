<?php 

class Formateur extends CI_Controller {
    
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
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
                $this->load->model('formateur_model');
                $post['mdp'] = $this->auth->crypt_password($post['mdp']);
                $this->formateur_model->add($post);

                redirect(site_url("Formateur/connection"));
            }
        }

        $this->load->view('inscription/formateur', $data);
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

                if ($this->auth->login($email, $password, "user")) {
                    $this->session->connected = true;
                    $this->session->user_type = 'formateur';
                    redirect(site_url("Formateur/index"));
                }
                else {
                    echo 'Connection refusée , l\'adresse ou le mot de passe est incorrect';
                }
            }
        }
        $this->load->view('connection/formateur', $data);
        $this->load->view('body/footer');
    }

    public function deconnection()
    {
        $this->auth->logout(true);
        redirect(site_url("Acceuil/index"));
    }

    public function search()
    {
        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('search/formateur');
        $this->load->view('footer');
    }

    public function account()
    {
        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('compte/formateur');
        $this->load->view('footer');
    }

    public function compte()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/formateur');
        $this->load->view('body/footer');
    }

   
   public function compte_formation()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/formation');
        $this->load->view('body/footer');
    }
}