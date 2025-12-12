<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function login()
    {
        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_by_email($email);

            if ($user && password_verify($password, $user->password)) {

                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'logged_in' => TRUE
                ]);

                redirect('library/books');

            } else {
                $data['error'] = "Email atau password salah!";
            }
        }
        $this->load->view('auth/login', isset($data) ? $data : NULL);
    }


    public function register()
    {
        if ($this->input->post()) {

            $data = [
                'name'     => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->User_model->insert($data);

            redirect('auth/login');
        }

        $this->load->view('auth/register');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    // =======================================================================
    // ========================== RESET PASSWORD =============================
    // =======================================================================

    public function forgot_password()
    {
        if ($this->input->post()) {

            $email = $this->input->post('email');
            $user = $this->User_model->get_by_email($email);

            if (!$user) {
                $data['error'] = "Email tidak ditemukan!";
                return $this->load->view('auth/forgot_password', $data);
            }

            // generate token
            $token = bin2hex(random_bytes(32));
            $this->User_model->insert_token($email, $token);

            // link reset (tanpa email, tampilkan di layar)
            $data['reset_link'] = base_url('auth/reset_password/' . $token);

            return $this->load->view('auth/reset_link_sent', $data);
        }

        $this->load->view('auth/forgot_password');
    }

    public function reset_password($token)
    {
        $tokenData = $this->User_model->get_valid_token($token);

        if (!$tokenData) {
            echo "Token tidak valid atau sudah kadaluarsa.";
            return;
        }

        if ($this->input->post()) {

            $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $this->User_model->update_password($tokenData->email, $new_password);

            // hapus token setelah digunakan
            $this->User_model->delete_token($token);

            echo "Password berhasil direset. Silakan login kembali.";
            echo "<br><a href='" . base_url('auth/login') . "'>Login</a>";
            return;
        }

        $this->load->view('auth/reset_password', ['token' => $token]);
    }
}
