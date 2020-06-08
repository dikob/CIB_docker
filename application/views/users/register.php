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

<?php echo form_open('users/register'); ?>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h3 class="text-center"><?php echo $title; ?></h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" />
            </div>
            <div class="form-group">
                <label for="name">Zipcode</label>
                <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" />
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" />
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
<?php echo form_close(); ?>