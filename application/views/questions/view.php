<h1 class="text-capitalize"><?php echo $question['title']; ?></h1>
<small style=" margin:3px 0; padding:4px; display:Block; background: #3371FF;"><b>Posted on:</b> <?php echo $question['created_at']; ?></small>
<small style=" margin:3px 0; padding:4px; display:Block; background: #33D4FF;"><b>Posted by:</b> <?php echo $question['username']; ?></small><br>

<div class="post-body">
	<?php echo $question['body']; ?>
</div>

<?php if ($this->session->userdata('user_id') == $question['user_id']) : ?>
	<hr>
	<div class="container">
		<div class="row align-items-start">
			<div class="col-2 col-sm-1">
				<a class="btn btn-info" href="<?php echo base_url(); ?>questions/edit/<?php echo $question['slug']; ?>">Edit</a>
			</div>
			<div class="col-2 col-sm-1">
				<?php echo form_open('/questions/delete/' . $question['id']); ?>
				<input type="submit" value="Delete" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ($this->session->userdata('logged_in')) : ?>
	<hr><br>
	<h3>Answers</h3>
	<?php if ($answers) : ?>
		<?php foreach ($answers as $answer) : ?>
			<div class="well">
				<h5><?php echo $answer['body']; ?> [by <strong><?php echo $answer['name']; ?></strong>]</h5>
				<small style=" margin:3px 0; padding:4px; display:Block; background: #ccccff;"><b>Posted on:</b> <?php echo $answer['created_at']; ?></small><br>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No Answers To Display</p>
	<?php endif; ?>
	<hr>

	<br><br>
	<h3>Add an answer</h3>
	<br>
	<?php echo validation_errors(); ?>
	<?php echo form_open('answers/create/' . $question['id']); ?>
	<div class="form-group">
		<label>Your Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<br>
	<div class="form-group">
		<label>Answer</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<br>
	<input type="hidden" name="slug" value="<?php echo $question['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
	</form>
<?php else : ?>
	<br>
	<center><b>Please login to see the answers...</b></center>
<?php endif; ?>