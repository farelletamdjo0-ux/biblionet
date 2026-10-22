<?php
class AdherentController extends Controller
{
    public function __construct()
    {
        $this->requireAuth();
    }

    public function index(): void
    {
        $this->view('adherents/index', ['adherents' => Adherent::all()]);
    }

    public function create(): void
    {
        $this->view('adherents/form', ['adherent' => null, 'action' => 'adherents/store']);
    }

    public function store(): void
    {
        $data = $this->validated();
        if ($data === null) {
            $this->redirect('adherents/create');
        }
        Adherent::save(null, $data);
        $this->flash('Adhérent ajouté.');
        $this->redirect('adherents');
    }

    public function edit(int $id): void
    {
        $adherent = Adherent::find($id);
        if ($adherent === null) {
            $this->redirect('adherents');
        }
        $this->view('adherents/form', ['adherent' => $adherent, 'action' => "adherents/update/$id"]);
    }

    public function update(int $id): void
    {
        $data = $this->validated();
        if ($data === null) {
            $this->redirect("adherents/edit/$id");
        }
        Adherent::save($id, $data);
        $this->flash('Adhérent modifié.');
        $this->redirect('adherents');
    }

    public function delete(int $id): void
    {
        try {
            Adherent::delete($id);
            $this->flash('Adhérent supprimé.');
        } catch (PDOException $e) {
            $this->flash('Suppression impossible : cet adhérent a encore des emprunts.');
        }
        $this->redirect('adherents');
    }

    private function validated(): ?array
    {
        $data = [
            'nom'       => trim($_POST['nom'] ?? ''),
            'prenom'    => trim($_POST['prenom'] ?? ''),
            'classe'    => trim($_POST['classe'] ?? ''),
            'telephone' => trim($_POST['telephone'] ?? ''),
        ];
        if ($data['nom'] === '' || $data['prenom'] === '') {
            $this->flash('Le nom et le prénom sont obligatoires.');
            return null;
        }
        return $data;
    }
}
