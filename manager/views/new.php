<?php include ROOT.'/layouts/header.php'; ?>

<?php

if(isset($errors) && is_array($errors))
{
    echo '<ul>';
    foreach($errors as $error)
    {
        echo "<li>$error";
    }
    echo '<ul>';
}

?>

<?php if($result): ?>
<p>Task added!</p>
<?php else: ?>
<form action="#" method="POST" enctype="multipart/form-data">

<div class="form-group">

    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" id="email" required>
    </div>
    <div class="form-group">
        <label>Mail</label>
        <input name="mail" type="text" class="form-control" id="email"required>
    </div>
    <div class="form-group">
        <label>Text</label>
        <input name="text" type="text" class="form-control" id="email"required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input name="image" type="file" class="form-control" id="email">
    <div class="form-group">
        <label>Status</label>
        <input name="status" type="text" class="form-control" id="email"required>
    </div>

    <p>
        <input type="submit" name="submit" class="btn btn-success" value="Create">
    </p>
</form>
<?php endif; ?>
<?php include ROOT.'/layouts/footer.php'; ?>