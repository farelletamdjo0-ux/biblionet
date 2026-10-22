<?php
class LivreController extends Controller
{
    public function __construct()
    {
        $this->requireAuth();
    }

    public function index(): void
    {
        $this->view('livres/index', ['livres' => Livre::all()]);
    }

    public function create(): void
    {
        $this->view('livres/form', ['livre' => null, 'action' => 'livres/store']);
    }

    public function store(): void
    {
        $data = $this->validated();
        if ($data === null) {
            $this->redirect('livres/create');
        }
        Livre::save(null, $data);
        $this->flash('Livre ajouté.');
        $this->redirect('livres');
    }

    public function edit(int $id): void
    {
        $livre = Livre::find($id);
        if ($livre === null) {
            $this->redirect('livres');
        }
        $this->view('livres/form', ['livre' => $livre, 'action' => "livres/update/$id"]);
    }

    public function update(int $id): void
    {
        $data = $this->validated();
        if ($data === null) {
            $this->redirect("livres/edit/$id");
        }
        Livre::save($id, $data);
        $this->flash('Livre modifié.');
        $this->redirect('livres');
    }

    public function delete(int $id): void
    {
        try {
            Livre::delete($id);
            $this->flash('Livre supprimé.');
        } catch (PDOException $e) {
            $this->flash('Suppression impossible : ce livre a encore des emprunts.');
        }
        $this->redirect('livres');
    }

    private function validated(): ?array
    {
        $data = [
            'titre'          => trim($_POST['titre'] ?? ''),
            'auteur'         => trim($_POST['auteur'] ?? ''),
            'categorie'      => trim($_POST['categorie'] ?? ''),
            'annee'          => (int) ($_POST['annee'] ?? 0) ?: null,
            'nb_exemplaires' => max(1, (int) ($_POST['nb_exemplaires'] ?? 1)),
        ];
        if ($data['titre'] === '' || $data['auteur'] === '') {
            $this->flash('Le titre et l\'auteur sont obligatoires.');
            return null;
        }
        return $data;
    }
}
