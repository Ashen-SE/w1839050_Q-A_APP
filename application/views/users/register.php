<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>


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
<div class="container px-5"><br>
	<h1 class="text-center"><?= $title; ?></h1><br>
	<div class="form-group">
		<label>First Name</label>
		<input type="text" class="form-control" name="firstname" placeholder="First Name">
	</div><br>
	<div class="form-group">
		<label>Last Name</label>
		<input type="text" class="form-control" name="lastname" placeholder="Last Name">
	</div><br>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="Email">
	</div><br>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username" placeholder="Username">
	</div><br>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" placeholder="Password">
	</div><br>
	<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
	</div>
	<br>
	<div class="text-center">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>