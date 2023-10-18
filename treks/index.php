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
    <?php include "../navbar.php" ?>
    <h1>Treks to explore</h1>

    <div class="container p-3" >

        <?php
        include "../utils/trekDB.php";
        
        $treks = fetchAllTreks();
        $count=0;


        $count = 0;
        foreach ($treks as $trek) {
            if ($count % 3 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-4">
                    <a href="trek.php?id=' . $trek['tId'] . '" class="card mb-4">
                        <img src="../uploads/' . $trek['photo'] . '" class="card-img-top" alt="Trek Image">
                        <div class="card-body">
                            <h2 class="card-title">' . $trek['title'] . '</h2>
                            <p class="card-text">' . $trek['description'] . '</p>
                            <p class="card-text">' . $trek['location'] . '</p>
                            <h4 class="card-text">₹' . $trek['price'] . '</h4>
                        </div>
                    </a>
                </div>';
            if ($count % 3 == 2 || $count == count($treks) - 1) {
                echo '</div>';
            }
            $count++;
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