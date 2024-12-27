<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "recensement";

$conn = new mysqli($host, $user, $pass, $db);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcı ekleme işlemi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prenom = $_POST['prenom'];
    $nom= $_POST['nom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $filiere = $_POST['filiere'];
    $numero_tel = $_POST['numero_tel'];
    $numero_pas = $_POST['numero_pas'];
    $numero_kim = $_POST['numero_kim'];
    $adresse = $_POST['adresse'];
    $etat_f = $_POST['etat_f'];
    
            $sql = "INSERT INTO recensement (prenom, nom, email,numero, filiere, numero_tel, numero_pas, numero_kim,adresse,etat_f  )
            VALUES ('$prenom', '$nom', '$email','$numero', '$filiere', '$numero_tel', '$numero_pas','$numero_kim','$adresse ','$etat_f')";
    if ($conn->query($sql) === TRUE) {
        echo "votre connexion a la base est reussie!!!";
    } else {
        echo "Hata: " . $conn->error;
    }
}

?>

<body>
    <h1>Formulaire de recensement des étudiants sénégalais de Tokat</h1>
    <h5>Veillez ajoutez vos informations s'il vous plait </h5><br>
    <form action="uest.php" method="POST">
    <label for="prenom">PRENOM:</label>
        <input type="text" id="prenom" name="prenom"><br><br>
        <label for="nom">NOM:</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label for="email">E-MAIL:</label>
        <input type="email"  name="email"><br><br>
        <label>NUMERO D'ETUDIANT:</label>
        <input type="number" name="numero" value="Erkek"><br><br>
        <label>FILIERE D'ETUDE:</label>
        <input type="text" name="filiere"><br><br>
        <label>NUMERO DE TELEPHONE:</label>
        <input type="number" name="numero_tel" ><br><br>
        <label>NUMERO DE PASSEPORT:</label>
        <input type="number" name="numero_pas" ><br><br>
        <label>NUMERO DE KIMLIK:</label>
        <input type="number" name="numero_kim" ><br><br>
        <label>ADRESSE:</label>
        <input type="text" name="adresse" ><br><br>
        <label>ETAT FINANCIER</label><br><br>
        <label for="boursier">BOURSIER</label>
        <input type="radio" id="boursier" name="etat_f" value="boursier">
        <label for="non boursier">NON BOURSIER</label>
        <input type="radio" id="non boursier" name="etat_f" value="non boursier"><br><br>
        <button type="submit" name="kaydet">Kaydet</button>
    </form>
</body>