<h2><?php echo $title; ?></h2>

<?php

// added bootstrap alert box for error
if (!empty(validation_errors())) {
    $pattern = "/<p.*?>([^<]+)<\/p>/";
    preg_match_all($pattern, validation_errors(), $matches);

    foreach ($matches[0] as $error) { ?>
    
    <div class="alert alert-dismissible alert-danger py-3" role="alert">
    <?php echo strip_tags($error); ?>
    </div>

    <?php 
    }
}
?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" rows="6" id="editor1" name="body" placeholder="Enter Body"></textarea>
  </div>
  <div class="form-group">
    <label for="body">Category</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category) : ?>
      <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
      <label for="postimage">Upload Image</label>
      <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>