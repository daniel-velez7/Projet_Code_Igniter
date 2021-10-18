<?php

class Display extends CI_Controller
{

    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header', $data);
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

    public function deconnection()
    {
        $this->auth->logout(true);
        redirect(site_url("Display/connection"));
    }


    public function images()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'images';

        $this->load->view('header', $data);
        $this->load->view('images');
        $this->load->view('footer');
    }

    public function video()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'video';

        $this->load->view('header', $data);
        $this->load->view('video');
        $this->load->view('footer');
    }

    public function contact()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'contact';
        $this->load->view('header', $data);

        $data = $this->input->post();
        if ($data) {
            $this->form_validation->set_rules('firstname', 'firstname', 'required|alpha');
            $this->form_validation->set_rules('lastname', 'lastname', 'required|alpha');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');

            if ($this->form_validation->run()) {
                $this->load->view('contact');
            } else {
                $this->load->view('contact');
            }
        } else {
            $this->load->view('contact');
        }
        $this->load->view('footer');
    }

    public function add()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'Database Liste';
        $this->load->view('header', $data);

        $data = $this->input->post();
        $this->load->model('produit_model');

        if ($this->input->post()) {
            if (isset($data['btn_add'])) {
                unset($data['btn_add']);
                $this->form_validation->set_rules('nom', 'firstname', 'required|alpha');
                $this->form_validation->set_rules('description', 'description', 'required|alpha|max_length[50]');
                $this->form_validation->set_rules('prix', 'price', 'required|numeric');
                if ($this->form_validation->run()) {
                    $this->produit_model->add($data);
                    $this->load->view('one_add_db');
                } else {
                    $this->load->view('one_add_db');
                }
            }
        } else {
            $this->load->view('one_add_db', $data);
        }
        $this->load->view('footer');
    }

    public function liste()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'Database Liste';
        $this->load->view('header', $data);

        $this->load->model('produit_model');
        $liste = $this->produit_model->liste();
        $data["produits"] = $liste;
        $this->load->view('liste_db', $data);

        $this->load->view('footer');
    }

    public function liste_one($id)
    {
        if ($this->session->connected == false) {
            redirect(site_url('Display/connection'));
        }

        $data['pageName'] = 'Database Liste';
        $this->load->view('header', $data);

        if ($this->input->post()) {
            $data["produit"] = $this->input->post();
            $this->load->model('produit_model');

            if (isset($data["produit"]['btn_update'])) {
                unset($data['produit']['btn_update']);
                $this->form_validation->set_rules('nom', 'firstname', 'required|alpha');
                $this->form_validation->set_rules('description', 'description', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('prix', 'price', 'required|numeric');

                if ($this->form_validation->run()) {
                    $this->produit_model->update($id, $data['produit']);
                    $data['produit'] = (object)$data['produit'];
                    $this->load->view('one_edit_db', $data);
                } else {
                    $data['produit'] = (object)$data['produit'];
                    $this->load->view('one_edit_db', $data);
                }
            } else if (isset($data["produit"]['btn_delete'])) {
                unset($data["produit"]['btn_delete']);
                $this->produit_model->remove($id);
                redirect(site_url('Display/liste/'));
            }
        } else {

            $this->load->model('produit_model');
            $liste = $this->produit_model->select($id);
            $data["produit"] = $liste[0];
            $this->load->view('one_edit_db', $data);
        }
        $this->load->view('footer');
    }
}
