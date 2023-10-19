<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<?php include "./adminnavbar.php"; ?>
		<?php
			include "../utils/trekDB.php";
            if(isset($_GET['id'])){
                $trek=fetchTrekByID($_GET['id']);
            }
            
            if(isset($_POST['title'])){
                $photo=$_POST['photo'];
                if(isset($_POST['changeImage'])){
                    $randomNumber=rand(0,100000);
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($randomNumber.".jpg");
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $photo=$randomNumber.".jpg";
                }
                editTrek($_POST['id'],$_POST['title'],$_POST['description'],$_POST['date'],$_POST['location'],$_POST['capacity'],$_POST['Occupied'],$photo,$_POST['price']);
                exit(header("Location: treks.php"));
            }
		?>


		<div class="container-fluid p-5 d-flex flex-column">
			<form method="post" enctype="multipart/form-data">
				<h1>Edit Trek</h1>
                <input hidden name="id" value="<?php echo $trek['tId']?>">
                <input hidden name="photo" value="<?php echo $trek['photo']?>">
				<div class="card p-4 my-4">
					<label for="image">Image</label>
					<input
						type="file"
						name="image"
						id="image"
						class="btn btn-primary my-2"
						accept=".jpg,.png"
                        value="<?php echo $trek['photo']?>"
						
					/>
                    <div>
                        <label for="changeImage">Change Image</label>
                        <input type="checkbox" name="changeImage" id="changeImage" value="true">
                    </div>
				</div>
				<div class="card p-4 my-4 input">
					<label for="title">Title</label>
					<input
						type="text"
						name="title"
						id="title"
						class="form-control my-2"
						placeholder="Title"
                        value="<?php echo $trek['title']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="description">Description</label>
					<input
						type="textarea"
						name="description"
						id="description"
						class="form-control my-2"
						placeholder="Description"
                        value="<?php echo $trek['description']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="location">Location</label>
					<input
						type="text"
						name="location"
						id="location"
						class="form-control my-2"
						placeholder="Location"
                        value="<?php echo $trek['location']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="date">Date</label>
					<input
						type="date"
						name="date"
						id="date"
						class="form-control my-2"
						placeholder="Date"
                        value="<?php echo $trek['date']?>"
						required
					/>
				</div>
                <div class="card p-4 my-4 input">
					<label for="Occupied">Occupied</label>
					<input
						type="number"
						name="Occupied"
						id="Occupied"
						class="form-control my-2"
						placeholder="Occupied"
                        value="<?php echo $trek['occupied']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="capacity">Capacity</label>
					<input
						type="number"
						name="capacity"
						id="capacity"
						class="form-control my-2"
						placeholder="Capacity"
                        value="<?php echo $trek['capacity']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="price">Price</label>
					<input
						type="number"
						name="price"
						id="price"
						class="form-control my-2"
						placeholder="Price"
                        value="<?php echo $trek['price']?>"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<button type="submit" class="btn btn-primary">Edit Trek</button>
				</div>
			</form>
		</div>
	</body>
</html>
