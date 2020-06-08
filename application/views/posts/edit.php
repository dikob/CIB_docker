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

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>" />
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="editor1" name="body" placeholder="Enter Body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="body">Category</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category) : ?>
      <option value="<?php echo $category['id']; ?>"<?php echo ($category['id']==$post['category_id'])?' selected':''; ?>><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>