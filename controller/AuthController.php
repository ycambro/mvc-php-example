<?php
require_once('model/User.php');

class AuthController {
    public function login() {
        session_start();
        // Verificar si el formulario de inicio de sesión ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validar credenciales
            if ($this->validateLogin($username, $password)) {
                // Iniciar sesión y redirigir al usuario a la página de inicio
                session_start();
                $_SESSION['auth_token'] = $username . ',' . md5($username . "soy la llave de encripcion");
                header("Location: /home");
                exit();
            } else {
                // Credenciales inválidas, mostrar mensaje de error
                $error_message = "Nombre de usuario o contraseña incorrectos.";
            }
        }

        // Cargar la vista del formulario de inicio de sesión
        require_once('view/login.php');
    }

    public function register() {
        session_start();
        // Verificar si el formulario de registro ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            // Validar y crear usuario
            if ($this->validateRegistration($username, $password, $password_confirm)) {
                $user_instance = new User();
                $user_instance->saveUser($username, md5($password)); // Crear usuario en la base de datos

                // Iniciar sesión para el nuevo usuario y redirigir a la página de inicio
                session_start();
                $_SESSION['auth_token'] = $username . ',' . md5($username . "soy la llave de encripcion");
                header("Location: /home");
                exit();
            } else {
                // Mostrar mensaje de error de registro
                $error_message = "Error al registrar. Verifique sus datos.";
            }
        }

        // Cargar la vista del formulario de registro
        require_once('view/register.php');
    }

    public function logout() {
        // Cerrar sesión y redirigir al usuario al inicio
        session_start();
        session_unset();
        session_destroy();
        header("Location: /login");
        exit();
    }

    private function validateLogin($username, $password) {
        // Validar las credenciales del usuario
        $user_instance = new User();
        $user = $user_instance->findUser($username);

        if ($user && $user['password'] === md5($password)) {
            
            return true;
        }

        return false;
    }

    private function validateRegistration($username, $password, $password_confirm) {
        // Validar el formulario de registro
        if (empty($username) || empty($password) || empty($password_confirm)) {
            return false;
        }

        if ($password !== $password_confirm) {
            return false;
        }

        // Verificar si el nombre de usuario ya está en uso
        $user_instance = new User();
        $existing_user = $user_instance->findUser($username);
        if ($existing_user) {
            return false;
        }

        return true;
    }
}
?>