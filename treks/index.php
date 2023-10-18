<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
	/>
    <link href="../styles/treks.css" rel="stylesheet" type="text/css">
    <title>Treks</title>
</head>
<body>
    <?php include "../navbar.html" ?>
    <h1>Treks to explore</h1>

    <div class="container p-3" >

        <?php
        include "../utils/trekDB.php";
        
        $treks = fetchAllTreks();
        $count=0;
        foreach($treks as $trek) {
            $count++;
            if($count%3==0){
                echo "<div class='row-fluid' style='width:100vw'>";
            }
            echo    "<a href='trek.php?id=".$trek['tId']."'>
            <div class='col card p-3'>
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
            if($count%3==0){
                echo "</div>";
            }
            
        ?>
        </div>
        <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
			integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
			crossorigin="anonymous"
		></script>
</body>
</html>