<?php

//var_dump($_POST);
//var_dump($_FILES);

// 
$uploadDir = 'Assets/';
// rendre le fichier final unique
$uploadFile = $uploadDir . $_FILES['photo']['name'];
//echo $uploadFile . PHP_EOL;
//import fichier tempo
$tempoFile = $_FILES['photo']['tmp_name'];

//faire les tests, si test ok load file (poids maxi,type de fichier (jpg,png), 
//nb de caractere sur nom prenom, rue, ville, cp, ....)
//Si ok load du fichier et redirection vers upload.php juste
// pour msg de OK, si pas OK redirection vers le formulaire en  
// mettant les datas pré-remplis et en affichant le message d'erreur

move_uploaded_file($tempoFile, $uploadFile);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br>
    Voici le fichier
    <br>
    <?php echo $uploadFile ?>
    <br>
    <img src="<?php echo $uploadFile   ?>" alt="">
</body>

</html>