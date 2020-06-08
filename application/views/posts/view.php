<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br/>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>"/>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>

<?php if ($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
<a class="btn btn-primary float-left mr-3" href="<?php echo base_url() . 'posts/edit/' . $post['slug']; ?>">Edit</a>
<?php echo form_open('posts/delete/' . $post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>

<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
  <?php foreach($comments as $comment) : ?>
    <div class="card card-body bg-light mb-1">
      <h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name'] ;?></strong>]</h5>
    </div>
  <?php endforeach; ?>
<?php else : ?>
    <p>No comments To Display</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>

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

<?php echo form_open('comments/create/' . $post['id']); ?>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" />
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" />
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" rows="6" id="editor1" name="body"></textarea>
  </div>
  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>