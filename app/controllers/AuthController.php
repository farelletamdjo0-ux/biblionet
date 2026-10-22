<?php
class AuthController extends Controller
{
    public function login(): void
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = User::findByEmail(trim($_POST['email'] ?? ''));
            if ($user && password_verify($_POST['password'] ?? '', $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $this->redirect('livres');
            }
            $error = 'Email ou mot de passe incorrect.';
        }
        $this->view('auth/login', ['error' => $error]);
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('catalogue');
    }
}
