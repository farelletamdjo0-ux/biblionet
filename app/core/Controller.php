<?php
abstract class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        ob_start();
        require ROOT_PATH . "/app/views/$view.php";
        $content = ob_get_clean();
        require ROOT_PATH . '/app/views/layouts/main.php';
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . BASE_URL . '/' . ltrim($path, '/'));
        exit;
    }

    protected function flash(string $message): void
    {
        $_SESSION['flash'] = $message;
    }

    protected function requireAuth(): void
    {
        if (empty($_SESSION['user_id'])) {
            $this->redirect('auth/login');
        }
    }
}
