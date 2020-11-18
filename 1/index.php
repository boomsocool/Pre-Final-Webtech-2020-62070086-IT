<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    .asd{
        border:1px ridge #DDD;
    }
</style>
<body>
    <div class="container mt-5">
        <div class="row mt-5">
        <?php
            $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
            $res = file_get_contents($url);
            $data = json_decode($res);

            for ($i = 0; $i < sizeOf($data->tracks->items); $i++){
                $artist = $data->tracks->items[$i]->album;
                $song = $data->tracks->items[$i]->album;
                echo "<div class='col-4 asd'>";
                    echo "<div class='card text-center mt-5'>";
                        echo "<img class='card-img-top' src='".$artist->images[0]->url."' alt='Card image cap' width='100%'>";
                        echo "<div class='card-body'>";
                            echo "<h3>".$artist->name."</h3>";
                            echo "<p>";
                            for ($j = 1; $j < sizeof($song->artists); $j++){
                                echo ", ".$song->artists[$j]->name."<br>";
                            }
                            echo "Release date: ".$song->release_date."<br>";
                            echo "Avaliable: ".sizeof($song->available_markets)." countries";
                            echo "</p>";
                        echo"</div>";
                    echo"</div>";
                echo"</div>";
            }

        ?>
        </div>
    </div>
</body>
</html>