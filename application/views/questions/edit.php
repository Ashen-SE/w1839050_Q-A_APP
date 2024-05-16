<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('questions/update'); ?>
<input type="hidden" name="id" value="<?php echo $question['id']; ?>">
<div class="form-group">
  <label>Title</label>
  <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $question['title']; ?>">
</div>
<div class="form-group">
  <label>Body</label>
  <textarea class="form-control" name="body" placeholder="Add Body"><?php echo $question['body']; ?></textarea>
</div>
<br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>