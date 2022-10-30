<?php
$errors = [];

//var_dump($_POST);
//var_dump($_FILES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputs = array_map('trim', $_POST);
    //var_dump($inputs);
    if (empty($inputs['addressName']) || strlen($inputs['addressName']) > 50) {
        $errors[] = 'Le champ nom / prenom doit etre inferieur à 50';
    }
    if (empty($inputs['addressStreet']) || strlen($inputs['addressStreet']) > 50) {
        $errors[] = 'Le champ adresse doit etre inferieur à 50';
    }
    if (empty($inputs['addressCityPostCode']) || strlen($inputs['addressCityPostCode']) > 50) {
        $errors[] = 'Le champ Ville / CP doit etre inferieur à 50';
    }
    if (empty($inputs['signature']) || strlen($inputs['signature']) > 20) {
        $errors[] = 'Le champ signature doit etre inferieur à 20';
    }
    if ($_FILES['photo']['size'] > 200000) {
        $errors[] = 'La photo doit etre de maximum 200KO';
    }
    $fileExtension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, ['png', 'jpg', 'gif', 'webp'])) {
        $errors[] = 'La photo doit etre de format png gif webp jpg';
    }
    var_dump($errors);

    if (count($errors) === 0) {
        // mettre à jour photo
        $uploadDir = 'Assets/images/';
        //        $uploadFile = $uploadDir . 'homer' . '.' . $fileExtension;
        $uploadFile = $uploadDir . uniqid() . '.' . $fileExtension;
        $tempoFile = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tempoFile, $uploadFile);
        // preparer les variables get
        $getter = '?addressName=' . $inputs['addressName'] .
            '&photo=' . $uploadFile .
            '&addressStreet=' . $inputs['addressStreet'] .
            '&addressCityPostCode=' . $inputs['addressCityPostCode'] .
            '&signature=' . $inputs['signature'] .
            '&sex=' . $inputs['sex'] .
            '&birthDate=' . $inputs['birthDate'] .
            '&height=' . $inputs['height'] .
            '&weight=' . $inputs['weight'] .
            '&hair=' . $inputs['hair'];
        //header('Location: index.php?addressName=Cedric');
        header('Location: index.php' . $getter);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="Assets/update.css">
</head>

<ul>
    <?php foreach ($errors as $error) { ?>
        <li><?php echo $error; ?></li>
    <?php } ?>
</ul>


<h1>Update Your Id Data</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="addressName">Nom Prenom</label>
    <input type="text" id="addressName" name="addressName">
    <label for="addressStreet">Rue</label>
    <input type="text" id="addressStreet" name="addressStreet">
    <label for="addressCityPostCode">Ville / CP</label>
    <input type="text" id="addressCityPostCode" name="addressCityPostCode">
    <div class="blockFieldSet">
        <fieldset class="fieldSetSex">
            <legend>Sexe</legend>
            <div>
                <input type="radio" name="sex" id="male" value="homme">
                <label for="male">Homme</label>
            </div>
            <div>
                <input type="radio" name="sex" id="female" value="femme">
                <label for="male">Femme</label>
            </div>
        </fieldset>
        <fieldset class="fieldSetBirthDate">
            <legend>Date de Naissance</legend>
            <div>
                <input type="date" name="birthDate" id="birthDate">
            </div>
        </fieldset>
        <fieldset class="fieldSetHeight">
            <legend>Physique</legend>
            <div>
                <label for="height">Taille</label>
                <input type="number" name="height" id="height" min="50" max="220">
            </div>
            <div>
                <label for="weight">Poids</label>
                <input type="number" name="weight" id="weight" min="50" max="220">
            </div>
            <div>
                <label for="blond">Blond</label>
                <input type="radio" name="hair" id="blond" value="blond">
                <label for="dark">Brun</label>
                <input type="radio" name="hair" id="dark" value="brun">
            </div>
        </fieldset>
    </div>
    <label for="signature">Signature</label>
    <input type="text" id="signature" name="signature">
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
    <label for="photo">Choisissez une photo</label>
    <input type="file" id="photo" name="photo">
    <button type="submit">Update</button>
</form>

<body>

</body>

</html>