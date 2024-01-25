<!-- SEZIONE PHP LOGICA -->
<?php
include __DIR__ . "/partials/array.php";
?>

<!-- SEZIONE HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>

<body>
    <!-- INIZIO MAIN -->
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Lista Hotel</h1>
                <?php foreach ($hotels as $hotel) { ?>
                    <?php echo $hotel['name'].'<br>'; ?>
                    <?php echo $hotel['description'].'<br>'; ?>
                    <?php echo $hotel['parking'].'<br>'; ?>
                    <?php echo $hotel['vote'].'<br>'; ?>
                    <?php echo $hotel['distance_to_center'].'<br>'; ?>
                <?php } ?>
            </div>
        </div>
    </main>
</body>

</html>