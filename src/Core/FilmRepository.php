<?php

class FilmRepository {
    private PDO $pdo;

    public function __construct() {
        $host = '127.0.0.1';
        $dbname = 'filmoteca';
        $username = 'root'; 
        $password = '';     

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
    }

    public function getAllFilms(): array {
        $query = "SELECT * FROM Film";
        $stmt = $this->pdo->query($query);

        $films = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $films[] = new FilmEntity(
                $row['id'],
                $row['titre'],
                $row['description'],
                $row['annee_sortie'],
                $row['genre'],
                $row['realisateur']
            );
        }
        return $films;
    }
}
