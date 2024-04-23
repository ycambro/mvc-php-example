<?php
require_once('model/User.php');

class HomeController {
    public function index() {
        session_start();
        $username = '';
        $userId = -1;
        if ($_SESSION['auth_token']) {
            list($username, $cookie_hash) = explode(',', $_SESSION['auth_token']);  
            if (md5($username."soy la llave de encripcion") != $cookie_hash) {
                header('HTTP/1.1 403 Forbidden');
                die();
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            die();
        }
         
        
        $user = null;
        if (!empty($username)) {
            $user_instance = new User();
            $user = $user_instance->findUserInfo($username);
        }
        if (!$user) {
            echo "Error: Usuario no encontrado.";
            exit();
        }

        
        $user_thumbnail_location = "img/" . $user['id'];
        $thumbnail_location = file_exists($user_thumbnail_location) ? $user_thumbnail_location : "img/thumbnail_placeholder.png";
        require_once('view/home.php');
    }

    public function updateProfile() {
        session_start();
        $username = '';
        $userId = -1;
        if ($_SESSION['auth_token']) {
            list($username, $cookie_hash) = explode(',', $_SESSION['auth_token']);  
            if (md5($username."soy la llave de encripcion") != $cookie_hash) {
                header('HTTP/1.1 403 Forbidden');
                die();
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            die();
        }
         
        
        $user = null;
        if (!empty($username)) {
            $user_instance = new User();
            $user = $user_instance->findUserInfo($username);
        }
        if (!$user) {
            echo "Error: Usuario no encontrado.";
            exit();
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $user_instance = new User();
            $user_instance->updateUser($user['id'], $first_name, $last_name, $email);
            header("Location: /home");
            exit();
        }
    }
    public function uploadThumbnail() {
        session_start();
        $username = '';
        if ($_SESSION['auth_token']) {
            list($username, $cookie_hash) = explode(',', $_SESSION['auth_token']);  
            if (md5($username."soy la llave de encripcion") != $cookie_hash) {
                header('HTTP/1.1 403 Forbidden');
                die();
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            die();
        }  
        
        $user = null;
        if (!empty($username)) {
            $user_instance = new User();
            $user = $user_instance->findUserInfo($username);
        }
        if (!$user) {
            echo "Error: Usuario no encontrado.";
            exit();
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'img/'.$user['id']);
            header("Location: /home");
            exit();
        }
    }

}
?>
