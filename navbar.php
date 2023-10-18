<nav
	class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark"
	data-bs-theme="dark"
>
	<div class="container-fluid">
		<a class="navbar-brand" href="../">Wanderor</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../treks">Treks</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../products">Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../cart">Cart</a>
				</li>
			</ul>
		</div>
		<span class="navbar-text">
			<form method="POST">

				<?php 
					include "utils/logout.php";
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
