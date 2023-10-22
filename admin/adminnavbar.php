<nav
	class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark"
	data-bs-theme="dark"
>
	<div class="container-fluid">
		<a class="navbar-brand" href="../">Wanderor</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="./treks.php">Treks</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./products.php">Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./users.php">Users</a>
				</li>
				
			</ul>
		</div>
		<span class="navbar-text">
			<form method="POST">

				<?php 
					include "../utils/logout.php";
					if(isset($_POST['logout'])){
						logout();
					}
				?>
				<input hidden="true" name="logout" value="true"/>
				<button type="submit" class="btn btn-primary">Logout</button>
			</form>
		</span>
	</div>
</nav>
