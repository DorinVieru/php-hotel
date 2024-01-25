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
    <!-- RICHIAMO L'HEADER -->
    <?php include_once __DIR__ . "/partials/header.php"; ?>

    <!-- INIZIO MAIN -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-12 pb-3">
                <h1 class="text-center">Lista Hotel</h1>
            </div>
            <div class="col-9 pb-5">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Nome Hotel</th>
                            <th>Descrizione</th>
                            <th class="text-center">Parcheggio presente?</th>
                            <th class="text-center">Voto</th>
                            <th class="text-center">Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hotels as $hotel) { ?>
                            <tr>
                                <td>
                                    <?php echo $hotel['name']; ?>
                                </td>
                                <td>
                                    <?php echo $hotel['description']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $hotel['parking'] == true ? 'Si, comodo' : 'No, cammini'; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $hotel['vote']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $hotel['distance_to_center'] . 'km'; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- RICHIAMO IL FOOTER -->
    <?php include_once __DIR__ . "/partials/footer.php"; ?>
</body>

</html>