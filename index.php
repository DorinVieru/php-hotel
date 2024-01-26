<!-- SEZIONE PHP LOGICA -->
<?php
// RICHIAMO ARRAY
include __DIR__ . "/partials/array.php";

$filtered_hotels = $hotels; //MOSTRO TUTTI GLI HOTEL AL CARICAMENTE DELLA PAGINA

// CONDIZIONE PER CICLARE IL PARCHEGGIO
if (isset($_GET['parking']) && $_GET['parking'] != '') {
    $temphotels = []; //ARRAY TEMPORANEO CHE CONTERRA' GLI HOTEL FILTRATI CHE POI VENGONO MOSTRATI
    $parking = $_GET['parking'];

    // CICLO L'ARRAY DI HOTEL PER IL PARCHEGGIO
    foreach ($filtered_hotels as $hotel) {
        if ($hotel['parking'] == $parking) {
            $temphotels[] = $hotel;
        }
    }

    $filtered_hotels = $temphotels;
}

// CONDIZIONE PER CICLARE IL VOTO
if (isset($_GET['vote']) && $_GET['vote'] != '') {
    $temphotels = []; //ARRAY TEMPORANEO CHE CONTERRA' GLI HOTEL FILTRATI CHE POI VENGONO MOSTRATI
    $vote = $_GET['vote'];

    // CICLO L'ARRAY DI HOTEL PER IL VOTO
    foreach ($filtered_hotels as $hotel) {
        if ($hotel['vote'] >= $vote) {
            $temphotels[] = $hotel;
        }
    }

    $filtered_hotels = $temphotels;
}

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
            <!-- TITLE -->
            <div class="col-12">
                <h1 class="text-center">Lista Hotel</h1>
            </div>
            <!-- FORM SEARCH -->
            <div class="col-10 mt-5 mb-3 ps-5 ms-5">
                <form action="./index.php" method="GET">
                    <div class="row ps-5 ms-5">
                        <!-- SELECT PARCHEGGIO -->
                        <div class="col-5">
                            <select name="parking" id="parking" class="form-control">
                                <option value="">Seleziona se desideri o no il parcheggio</option>
                                <option value="1" <?php echo (isset($_GET['parking']) && $_GET['parking'] == "1") ? 'selected' : ''; ?>>Si</option>
                                <option value="0" <?php echo (isset($_GET['parking']) && $_GET['parking'] == "0") ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                        <!-- SELECT VOTO -->
                        <div class="col-3">
                            <select name="vote" id="vote" class="form-control">
                                <option value="">Seleziona il voto</option>
                                <option value="1" <?php echo (isset($_GET['vote']) && $_GET['vote'] == "1") ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (isset($_GET['vote']) && $_GET['vote'] == "2") ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo (isset($_GET['vote']) && $_GET['vote'] == "3") ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo (isset($_GET['vote']) && $_GET['vote'] == "4") ? 'selected' : ''; ?>>4</option>
                                <option value="5" <?php echo (isset($_GET['vote']) && $_GET['vote'] == "5") ? 'selected' : ''; ?>>5</option>
                            </select>
                        </div>
                        <!-- BOTTONE INVIA -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-success">Filtra ora</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- TABLE -->
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
                        <?php foreach ($filtered_hotels as $hotel) { ?>
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