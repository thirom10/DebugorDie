<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Mostrar formulario de login
    public function showLogin() {
        if(isset($_SESSION['user_id'])) {
            header('Location: index.php?action=dashboard');
            exit();
        }
        include __DIR__ . '/../views/login.php';
    }

    // Procesar login
    public function processLogin() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'] ?? '';
            $this->user->password = $_POST['password'] ?? '';

            if(empty($this->user->username) || empty($this->user->password)) {
                $_SESSION['error'] = 'Por favor completa todos los campos';
                header('Location: index.php?action=login');
                exit();
            }

            if($this->user->login()) {
                $_SESSION['user_id'] = $this->user->id;
                $_SESSION['username'] = $this->user->username;
                $_SESSION['success'] = 'Bienvenido al PIT, ' . $this->user->username;
                header('Location: index.php?action=dashboard');
                exit();
            } else {
                $_SESSION['error'] = 'Usuario o contraseña incorrectos';
                header('Location: index.php?action=login');
                exit();
            }
        }
    }

    // Mostrar formulario de registro
    public function showRegister() {
        if(isset($_SESSION['user_id'])) {
            header('Location: index.php?action=dashboard');
            exit();
        }
        include __DIR__ . '/../views/register.php';
    }

    // Procesar registro
    public function processRegister() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->username = $_POST['username'] ?? '';
            $this->user->email = $_POST['email'] ?? '';
            $this->user->password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Validaciones
            if(empty($this->user->username) || empty($this->user->email) || 
               empty($this->user->password) || empty($confirm_password)) {
                $_SESSION['error'] = 'Por favor completa todos los campos';
                header('Location: index.php?action=register');
                exit();
            }

            if($this->user->password !== $confirm_password) {
                $_SESSION['error'] = 'Las contraseñas no coinciden';
                header('Location: index.php?action=register');
                exit();
            }

            if(strlen($this->user->password) < 6) {
                $_SESSION['error'] = 'La contraseña debe tener al menos 6 caracteres';
                header('Location: index.php?action=register');
                exit();
            }

            if(!filter_var($this->user->email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Email no válido';
                header('Location: index.php?action=register');
                exit();
            }

            // Verificar si el usuario ya existe
            if($this->user->userExists()) {
                $_SESSION['error'] = 'El usuario o email ya existe';
                header('Location: index.php?action=register');
                exit();
            }

            // Registrar usuario
            if($this->user->register()) {
                $_SESSION['success'] = 'Cuenta creada exitosamente. Ahora puedes iniciar sesión';
                header('Location: index.php?action=login');
                exit();
            } else {
                $_SESSION['error'] = 'Error al crear la cuenta. Intenta nuevamente';
                header('Location: index.php?action=register');
                exit();
            }
        }
    }

    // Mostrar dashboard
    public function showDashboard() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        include __DIR__ . '/../views/dashboard.php';
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}

?>