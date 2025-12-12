<?php
class User_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function get_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    // ========== RESET PASSWORD ==========
    public function insert_token($email, $token)
    {
        $data = [
            'email' => $email,
            'token' => $token,
            'expires_at' => date("Y-m-d H:i:s", strtotime("+1 hour"))
        ];

        return $this->db->insert('password_resets', $data);
    }

    public function get_valid_token($token)
    {
        $now = date("Y-m-d H:i:s");
        return $this->db->get_where('password_resets', [
            'token' => $token,
            'expires_at >=' => $now
        ])->row();
    }

    public function update_password($email, $password)
    {
        return $this->db->update('users',
            ['password' => $password],
            ['email' => $email]
        );
    }

    public function delete_token($token)
    {
        return $this->db->delete('password_resets', ['token' => $token]);
    }

}
