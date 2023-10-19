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
    <?php include "./adminnavbar.php" ?>
    <div class="container-flui4 p-3" >
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-5">Treks to explore</h1>
            <a href="./addtrek.php" class="btn btn-primary">Add Trek</a>
        </div>


        <?php
        include "../utils/trekDB.php";

        $treks = fetchAllTreks();
        $count=0;


        $count = 0;
        foreach ($treks as $trek) {
            if ($count % 4 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-3">
                    <div class="card mb-4 p-3">
                        <img src="../uploads/' . $trek['photo'] . '" class="trek-image" alt="Trek Image"/>
                        <div class="card-body">
                            <h2 class="card-title">' . $trek['title'] . '</h2>
                            <p class="card-text">' . $trek['description'] . '</p>
                            <p class="card-text">' . $trek['location'] . '</p>
                            <h4 class="card-text">₹' . $trek['price'] . '</h4>
                            <h5 class="card-text">Date: ' . $trek['date'] . '</h5>
                            <p class="card-text">Occupied: ' . $trek['occupied']."/". $trek['capacity'] . '</p>
                            <button class="btn btn-primary" onclick="window.location.href=\'edittrek.php?id=' . $trek['tId'] . '\'">Edit</button>
                        </div>
                    </div>
                </div>';
            if ($count % 4 == 3 || $count == count($treks) - 1) {
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