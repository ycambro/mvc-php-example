<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "ic6821", "ic6821", "ic6821_ejemplo2");
    }

    public function findUser($username) {
        $query = sprintf("SELECT password FROM users WHERE username = '%s'",
            $this->db->real_escape_string($username));
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function findUserInfo($username) {
        $query = sprintf("SELECT * FROM users WHERE username = '%s'",
            $this->db->real_escape_string($username));
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function validateUser($username, $password) {
        $user = $this->findUser($username);
        if ($user) {
            return md5($password) == $user['password'];
        }
        return false;
    }

    public function generateSessionToken($username) {
        return $username . ',' . md5($username . "soy la llave de encripcion");
    }

    public function saveUser($username, $password) {
        $query = sprintf("INSERT INTO users (username, password) VALUES ('%s', '%s')",
            $this->db->real_escape_string($username),
            md5($password));
        $this->db->query($query) or die ("Error insertando nuevo usuario en bd");
        $this->db->insert_id;
    }

    public function updateUser ($id, $first_name, $last_name, $email) {
        $query = sprintf("UPDATE users SET first_name = '%s', last_name = '%s', email = '%s' WHERE id = %d",
            $this->db->real_escape_string($first_name),
            $this->db->real_escape_string($last_name),
            $this->db->real_escape_string($email),
            $id);
        $this->db->query($query) or die ("Error actualizando usuario en bd");
    }

    public function closeConnection() {
        $this->db->close();
    }
}
?>