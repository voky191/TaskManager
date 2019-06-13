<?php include ROOT.'/layouts/header.php'; ?>
<?php if($result): ?>
    <p>Task updated!</p>
<?php else: ?>
<form action="#" method="POST">

    <a class="form-group">

        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" id="email" value="<?php echo $newsItem[name]; ?>"/>
        </div>
        <div class="form-group">
            <label>Mail</label>
            <input name="mail" type="email" class="form-control" id="email" value="<?php echo $newsItem[mail]; ?>"/>
        </div>
        <div class="form-group">
            <label>Text</label>
            <input name="text" type="text" class="form-control" id="email" value="<?php echo $newsItem[text]; ?>"/>
        </div>
        <div class="form-group">
            <label>Image</label>
            <select id="stat" name="image" class="form-control">
                <option value="img1.jpg">Image 1</option>
                <option value="img2.jpg">Image 2</option>
                <option value="img3.jpg">Image 3</option>
                <option value="img4.jpg">Image 4</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input name="status" type="text" class="form-control" id="email" value="<?php echo $newsItem[status]; ?>"/>
        </div>

        <p>
            <input name="submit" type="submit" class="btn btn-success" value="Save"/>
        </p>
</form>
<?php endif; ?>
<?php include ROOT.'/layouts/footer.php'; ?>

