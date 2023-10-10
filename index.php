<?php
/*  Descrizione
        Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G

        Stampare tutti i nostri hotel con tutti i dati disponibili.

        Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
        
        Bonus:
        Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

        Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

        NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. 
*/

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

//var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5 text-center">

        <form>
            <input type="checkbox" name="parking" value="true"><label for="">Parcheggio</label>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>



        <h1 class="pb-3">Hotels Table</h1>
        <table class="m-auto">
            <tr>
                <?php foreach ($hotels[0] as $key => $value) : ?>
                    <th class="border border-dark p-2"><?= ucfirst($key) ?></th>
                <?php endforeach; ?>
            </tr>

            <?php

            $filteredHotels = array_filter($hotels, function ($var) {
                if ($_GET['parking']) {
                    return $var['parking'];
                } else {
                    return $var;
                }
            }, ARRAY_FILTER_USE_BOTH);

            //var_dump($filteredHotels);

            ?>

            <?php foreach ($filteredHotels as $hotel) : ?>

                <tr>
                    <?php foreach ($hotel as $key => $value) : ?>

                        <td class="border border-dark p-2">
                            <?php

                            if ($key === 'parking') {
                                if ($value) {
                                    echo 'Yes';
                                } else {
                                    echo 'No';
                                }
                            } else {
                                echo $value;
                            }

                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>