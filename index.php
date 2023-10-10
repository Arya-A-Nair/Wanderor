<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="index.css">
		<title>Document</title>
	</head>
	<body>
	<div class="container">
        <img class="image" src="images/backgroundimg.png" alt="Your Image">
        <div class="text">Discover.<br>Trek.<br>Inspire.<br></div>
    </div>



		
	<?php
		if(isset($_FILES['fileToUpload'])){
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_POST['title'].".jpg");
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			echo print_r($_POST);
		}
	?>
		<form method="POST" enctype="multipart/form-data">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" required />
			<label for="description">Description</label>
			<input
				type="text"
				name="description"
				id="description"
				placeholder="Description"
				required
			/>
			<label for="date">Date</label>
			<input type="date" name="date" id="date" placeholder="Date" required />
			<label for="location">Location</label>
			<input
				type="text"
				name="location"
				id="location"
				placeholder="Location"
				required
			/>
			<label for="capacity">Capacity</label>
			<input
				type="number"
				name="capacity"
				id="capacity"
				placeholder="Capacity"
				required
			/>
			<label for="occupied">Occupied</label>
			<input
				type="number"
				name="occupied"
				id="occupied"
				placeholder="Occupied"
				required
			/>
			<label for="photo">Photo</label>
			<input type="file" name="fileToUpload" id="photo" placeholder="Photo" required />
			<label for="price">Price</label>
			<input
				type="number"
				name="price"
				id="price"
				placeholder="Price"
				required
			/>
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>
