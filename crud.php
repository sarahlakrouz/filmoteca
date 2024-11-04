<section id="crud">
    <h2>Ajouter un nouveau film</h2>
    <form action="ajout_film.php" method="POST">
        <label for="title">Titre du film:</label>
        <input type="text" id="title" name="title" required>

        <label for="year">Année de sortie:</label>
        <input type="number" id="year" name="year" required>

        <label for="synopsis">Synopsis:</label>
        <textarea id="synopsis" name="synopsis" required></textarea>

        <label for="director">Réalisateur:</label>
        <input type="text" id="director" name="director" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>

        <button type="submit">Ajouter le film</button>
    </form>
</section>

<?php

$host = 'localhost';
$dbname = 'filmoteca';
$username = 'sarah.lakrouz';
$password = 'Ls062004****';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $conn->real_escape_string($_POST['title']);
    $year = intval($_POST['year']);
    $synopsis = $conn->real_escape_string($_POST['synopsis']);
    $director = $conn->real_escape_string($_POST['director']);
    $genre = $conn->real_escape_string($_POST['genre']);

    $sql = "INSERT INTO movie (title, year, synopsis, director, genre) 
            VALUES ('$title', '$year', '$synopsis', '$director', '$genre')";


    if ($conn->query($sql) === TRUE) {
        echo "Nouveau film ajouté avec succès !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>