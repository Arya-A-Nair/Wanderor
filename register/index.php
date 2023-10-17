<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="../styles/login.css" />
	</head>
	<body>
        <?php
			include "../utils/userDB.php";	
			$status="";
			if($_SERVER["REQUEST_METHOD"]=="POST" ){
				if(login($_POST['username'],$_POST['password'])){
					$status="Login Successful";
				}
				else{
					$status="Login Failed";
				}
				// login();
			}
		?>

		<div class="container">
			<div class="row mb-3">
				<div class="col-12">
					<h1 class="text-center">Login</h1>
				</div>
			</div>
			<form class="card p-5" method="post" enctype="multipart/form-data">
            <div class="form-group">
					<label for="email">email</label>
					<input
						name="email"
						type="email"
						class="form-control"
						id="email"
						aria-describedby="emailHelp"
						placeholder="Enter username"
					/>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input
						name="username"
						type="text"
						class="form-control"
						id="username"
						aria-describedby="emailHelp"
						placeholder="Enter username"
					/>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input
						name="password"
						type="password"
						class="form-control"
						id="password"
						placeholder="Password"
					/>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary mb-3">Submit</button>
					<?php 
						if($status=="Login Successful"){
							echo "<div class='alert alert-success' role='alert'>
							Login Successful
							</div>";
						}
						else if($status=="Login Failed"){
							echo "<div class='alert alert-danger' role='alert'>
							Login Failed
							</div>";
						}
						
					?>
				</div>

			</form>
		</div>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
			integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	</body>
</html>
