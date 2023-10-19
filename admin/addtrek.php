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
			if(isset($_FILES['image'])){
				$randomNumber=rand(0,100000);
				$target_dir = "../uploads/";
				$target_file = $target_dir . basename($randomNumber.".jpg");
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
				echo print_r($_POST);
				insertTrek($_POST['title'],$_POST['description'],$_POST['date'],$_POST['location'],$_POST['capacity'],0,$randomNumber.".jpg",$_POST['price']);
			}
		?>


		<div class="container-fluid p-5 d-flex flex-column">
			<form action="addtrek.php" method="post" enctype="multipart/form-data">
				<h1>Add Trek</h1>
				<div class="card p-4 my-4">
					<label for="image">Image</label>
					<input
						type="file"
						name="image"
						id="image"
						.
						class="btn btn-primary my-2"
						accept=".jpg,.png"
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<label for="title">Title</label>
					<input
						type="text"
						name="title"
						id="title"
						class="form-control my-2"
						placeholder="Title"
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
						required
					/>
				</div>
				<div class="card p-4 my-4 input">
					<button type="submit" class="btn btn-primary">Add Trek</button>
				</div>
			</form>
		</div>
	</body>
</html>
