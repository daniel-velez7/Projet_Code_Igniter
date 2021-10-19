<?php 

class Stagiaire extends CI_Controller {
    
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header_connected', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function inscription()
    {
        $data['pageName'] = 'inscription';
        $this->load->view('header_default', $data);

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['btn_inscription']);

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $this->load->model('user_model');
                $post['password'] = $this->auth->crypt_password($post['password']);
                $post['type'] = 'user';
                $this->user_model->add($post);

                redirect(site_url("Display/connection"));
            }
        }

        $this->load->view('inscription', $data);
        $this->load->view('footer');
    }

    public function connection()
    {
        $data['pageName'] = 'connection';
        $this->load->view('header_default', $data);

        if ($this->input->post()) {
            $post = $this->input->post();
            unset($post['btn_connection']);

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

            if ($this->form_validation->run()) {
                $email = $this->input->post("email");
                $password = $this->input->post("password");

                if ($this->auth->login($email, $password, "user")) {
                    $this->session->connected = true;
                    $this->session->user_type = $this->session->user['type'];
                    redirect(site_url("Display/index"));
                }
                else {
                    echo 'Connection refusée , l\'adresse ou le mot de passe est incorrect';
                }
            }
        }
        $this->load->view('connection', $data);
        $this->load->view('footer');
    }
}
