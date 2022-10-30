<?php
//var_dump($_SERVER);
//var_dump($_GET);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="Assets/style.css">
</head>

<body>
    <h1>Id Card</h1>
    <a class="createBtn" href="update.php">Create your own ID</a>
    <div class="card">
        <div class="card-header">Springfield, IL</div>
        <div class="admin-info">
            <div>LICENSE#
                <br>64209
            </div>
            <div>BIRTH DATE
                <br>4-24-56
            </div>
            <div>EXPIRES
                <br>4-24-201
            </div>
            <div>CLASS
                <br>NONE
            </div>
        </div>
        <div class="photoAndData">
            <div class="pic-side">
                <img class="photo" src="<?= $_GET['photo'] ?? '/Assets/images/homer.png'  ?>" alt="photo homer" srcset="">
            </div>
            <div class="data-side">
                <div class="title-card">DRIVER LICENSE</div>
                <div class="address">
                    <div class="addressName"><?= $_GET['addressName'] ?? 'HOMER SIMPSON'  ?></div>
                    <div class="addressStreet"><?= $_GET['addressStreet'] ?? '69 OLD PLUMTREE BLVD'  ?></div>
                    <div class="addressCityPostCode"><?= $_GET['addressCityPostCode'] ?? 'SPRINGFIELD, IL 62701'  ?></div>
                </div>
                <div class="physical-info">
                    <div class="pyInfo">
                        <div class="pyInfoTitle">SEX</div>
                        <div class="pyInfoData"><?= $_GET['sex'] ?? 'Male'  ?></div>
                        <div></div>
                    </div>
                    <div class="pyInfo">
                        <div class="pyInfoTitle">HEIGHT</div>
                        <div class="pyInfoData"><?= $_GET['height'] ?? '170'  ?></div>
                        <div></div>
                    </div>
                    <div class="pyInfo">
                        <div class="pyInfoTitle">WEIGHT</div>
                        <div class="pyInfoData"><?= $_GET['weight'] ?? '56'  ?></div>
                        <div></div>
                    </div>
                    <div class="pyInfo">
                        <div class="pyInfoTitle">HAIR</div>
                        <div class="pyInfoData"><?= $_GET['hair'] ?? 'Brun'  ?></div>
                        <div></div>
                    </div>
                </div>
                <div class="signature">
                    <div class="homerSignature"><?= $_GET['signature'] ?? 'Homer Simpson'  ?></div>
                    <div class="signatureTitle">SIGNATURE</div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>