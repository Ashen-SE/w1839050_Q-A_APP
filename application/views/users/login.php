<?php echo form_open('users/login'); ?>
	<style>
		.container {
		width: 50%; /* Adjust the width as needed */
		margin: 0 auto; /* Center the container horizontally */
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 8px;
		background-color: #f9f9f9;
		}

		h1 {
		font-size: 24px;
		margin-bottom: 20px;
		}

		.form-group {
		margin-bottom: 20px;
		}

		.form-control {
		width: 100%;
		padding: 10px;
		font-size: 16px;
		border: 1px solid #ccc;
		border-radius: 4px;
		}

		.btn-primary {
		display: inline-block;
		background-color: #007bff;
		color: #fff;
		padding: 10px 20px;
		font-size: 16px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		}

		.btn-primary:hover {
		background-color: #0056b3;
		}
	</style>
<div class="container">
	<h1 class="text-center"><?php echo $title; ?></h1><br>
	<div class="form-group">
		<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
	</div>
	<br>
	<div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
	</div>
	<br>
	<div class="text-center">
		<button type="submit" class="btn btn-primary">Login</button>
	</div>
</div>
<?php echo form_close(); ?>