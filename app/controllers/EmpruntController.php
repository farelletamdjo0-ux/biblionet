<?php
class EmpruntController extends Controller
{
    public function __construct()
    {
        $this->requireAuth();
    }

    public function index(): void
    {
        $this->view('emprunts/index', ['emprunts' => Emprunt::enCours()]);
    }

    public function create(): void
    {
        $this->view('emprunts/form', [
            'livres'    => Livre::all(),
            'adherents' => Adherent::all(),
        ]);
    }

    public function store(): void
    {
        $ok = Emprunt::create((int) ($_POST['livre_id'] ?? 0), (int) ($_POST['adherent_id'] ?? 0));
        $this->flash($ok ? 'Emprunt enregistré.' : 'Emprunt refusé : aucun exemplaire disponible.');
        $this->redirect('emprunts');
    }

    public function retour(int $id): void
    {
        Emprunt::retour($id);
        $this->flash('Retour enregistré.');
        $this->redirect('emprunts');
    }
}
