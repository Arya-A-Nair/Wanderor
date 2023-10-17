<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/treks.css" rel="stylesheet" type="text/css">
    <title>Treks</title>
</head>
<body>

    <h1>Treks to explore</h1>

    <div class="container">

        <?php
        include "../utils/trekDB.php";
        
        $treks = fetchAllTreks();
        foreach($treks as $trek) {


        echo    "<a href='trek?id=".$trek['tId']."'>
                    <div class='trek'>
                    <div class='trek-image'>
                        <img src='../uploads/".$trek['photo']."'/>
                    </div>
                    <div class='trek-container'>
                        <h2>".$trek['title']."</h2>
                        <p>".$trek['description']."</p>
                        <p>".$trek['location']."</p>
                        <h4>₹".$trek['price']."</h4>
                    </div>
                </div>
                </a>";
        }
        ?>
        </div>
</body>
</html>