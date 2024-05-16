<h1 class="text-uppercase display-4"><b><?= $title ?></b></h1><br>
<div class="container ustify-content-center">
<?php foreach ($questions as $question) : ?>
	<br><h2 class="text-capitalize"><?php echo $question['title']; ?></h2>
	<div class="row">
		<div class="col-md-9">
			<small style=" margin:3px 0; padding:4px; display:Block; background: #3371FF;"><b>Posted on:</b> <?php echo $question['created_at']; ?></small>
			<small style=" margin:3px 0; padding:4px; display:Block; background: #33D4FF;"><b>Posted by:</b> <?php echo $question['username']; ?></small><br>
			<?php echo word_limiter($question['body'], 100); ?>
			<br><br>
			<p><a class="btn btn-outline-primary" href="<?php echo site_url('/questions/' . $question['slug']); ?>">Read More</a></p>
			<br>
		</div>
	</div>
<?php endforeach; ?>
</div>
