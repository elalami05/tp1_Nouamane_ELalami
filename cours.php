
<?php
class CRUD {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   
}

class Cours extends CRUD {
    public function __construct($pdo) {
        parent::__construct($pdo);
    }

    // Fonction pour créer un cours
    public function createCours($nom, $description, $duree, $niveau) {
        $data = array(
            'nom' => $nom,
            'description' => $description,
            'duree' => $duree,
            'niveau' => $niveau
        );

        $this->create($data);
    }

    // Fonction pour récupérer un cours par son ID
    public function getCours($id) {
        return $this->read($id);
    }

    // Fonction pour mettre à jour un cours
    public function updateCours($id, $nom, $description, $duree, $niveau) {
        $data = array(
            'id' => $id,
            'nom' => $nom,
            'description' => $description,
            'duree' => $duree,
            'niveau' => $niveau
        );

        $this->update($id, $data);
    }

    // Fonction pour supprimer un cours par son ID
    public function deleteCours($id) {
        $this->delete($id);
    }
}

// Exemple d'utilisation de la classe Cours
$host = "localhost";
$database = "tp_Cours";
$username = "Nouamane";
$password = "12345";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instanciation de la classe Cours avec la connexion PDO
    $cours = new Cours($pdo);

    // Exemple d'utilisation des méthodes CRUD pour la table Cours
    $cours->createCours('Cours de PHP', 'Introduction à PHP', 12, 'Débutant');
    
    $coursInfo = $cours->getCours(1);
    
    // Mettre à jour les informations du cours
    $cours->updateCours(1, 'Cours de PHP avancé', 'PHP avancé et bases de données', 16, 'Avancé');
    
    // Supprimer un cours
    $cours->deleteCours(1);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>