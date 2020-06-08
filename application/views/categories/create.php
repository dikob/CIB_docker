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

<?php echo form_open('categories/create'); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name" />
    </div>
    <button type="submit" class="btn btn-secondary">Submit</button>
</form>