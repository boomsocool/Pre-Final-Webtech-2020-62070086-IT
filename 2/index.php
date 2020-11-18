<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row mt-5">
            <form action="index.php">
                <h3>ระบุคำค้นหา</h3>
                <input id="songName" name="songName" type="text" width="90%">
                <button type="submit">ค้นหา</button>
            </form>


    <?php
    $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
    $res = file_get_contents($url);
    $data = json_decode($res);

    for ($i = 0; $i < sizeof($data->tracks->items); $i++) {
        echo "<div class='col-4 asd'>";
            echo "<div class='card text-center mt-5'>";
            $song = $data->tracks->items[$i]->album;
            $search = strtolower($_GET["songName"]);

            if (strpos(strtolower($song->artists[0]->name), $search) !== false || strpos(strtolower($song->name), $search) !== false) {
                echo "<img src='" . $song->images[0]->url . "' width='100%'>";
                echo "<br>";
                echo "<h3>" . $song->name . "</h3><br>";
                echo "Artist: " . $song->artists[0]->name;
                for ($j = 1; $j < sizeof($song->artists); $j++) {
                    echo ", " . $song->artists[$j]->name;
                }
                echo "<br>Release date: " . $song->release_date . "<br>";
                echo "Avaliable: " . sizeof($song->available_markets) . " countries";
            }
            echo"</div>";
        echo"</div>";
    }

    ?>

        </div>
    </div>
</body>

</html>