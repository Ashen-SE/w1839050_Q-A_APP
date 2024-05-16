<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('questions/create'); ?><br>
<style>
h2 {
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

textarea.form-control {
  min-height: 150px; /* Adjust as needed */
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
<div class="form-group">
  <label>Title</label>
  <input type="text" class="form-control" name="title" placeholder="Add Title">
</div><br>
<div class="form-group">
  <label>Body</label>
  <textarea type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
</div>
<br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>