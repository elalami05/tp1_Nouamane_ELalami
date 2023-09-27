<?php
class CRUD {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fonction pour créer un enregistrement dans la table
    public function create($data) {
        // La méthode de création dépendra de la structure de votre table
      
    }

    // Fonction pour lire un enregistrement en fonction de l'ID
    public function read($id) {
        // La méthode de lecture dépendra de la structure de votre table
      
    }

    // Fonction pour mettre à jour un enregistrement en fonction de l'ID
    public function update($id, $data) {
        // La méthode de mise à jour dépendra de la structure de votre table
      
    }

    // Fonction pour supprimer un enregistrement en fonction de l'ID
    public function delete($id) {
        // La méthode de suppression dépendra de la structure de votre table
       
    }
}

// Exemple d'utilisation de la classe CRUD
$host = "localhost";
$database = "tp_Cours";
$username = "Nouamane";
$password = "12345";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instanciation de la classe CRUD avec la connexion PDO
    $crud = new CRUD($pdo);

    // Exemple d'utilisation des méthodes CRUD
    $data = array(
        'nom' => 'John Doe',
        'age' => 30,
        'email' => 'john.doe@example.com',
        'adresse' => '123 Rue de la Ville'
    );

    // Création d'un nouvel enregistrement
    $crud->create($data);

    // Lecture d'un enregistrement
    $record = $crud->read(1);

    // Mise à jour de l'enregistrement
    $updatedData = array('nom' => 'Jane Doe');
    $crud->update(1, $updatedData);

    // Suppression de l'enregistrement
    $crud->delete(1);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>