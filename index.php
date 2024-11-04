<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Page d'accueil - Filmoteca</title>
</head>


<body>
    <header>
        <h1>Filmoteca</h1>
        <nav>
            <ul>
                <li><a href="#film">Liste des films</a></li>
                <li><a href="#crud">CRUD des films</a></li>
                <li><a href="#notations">Notations des films</a></li>
            </ul>
        </nav>
    </header>
   
    <section id="film">
        <h2>Liste des films</h2>
        <ul>
        <?php
$host='localhost';
$dbname='filmoteca';
$username='sarah.lakrouz';
$password='Ls062004****';

$idconn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT * FROM movie"; 
$result = $idconn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li class="film-item">';
        echo '<span class="film-title">' . htmlspecialchars($row['title']) . '</span>';
        echo '<span class="film-year"> (' . htmlspecialchars($row['year']) . ')</span>';
        echo '<span class="film-synopsis">' . htmlspecialchars($row['synopsis']) . '</span>';
        echo '</li>';
    }
} else {
    echo '<li>Aucun film trouvé.</li>';
}


$idconn->close();
?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2024 Filmoteca. Tous droits réservés.</p>
    </footer>
</body>

    


</html>