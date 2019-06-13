<?php include ROOT.'/layouts/header.php'; ?>
<div class="page-header">
    Task #<?php echo $newsItem[id]; ?>
</div>
<div class="task-body">
<p>
    <b>
        Name:
    </b>
    <?php echo $newsItem[name]; ?>
</p>
<p>
    <b>
        Mail:
    </b>
    <?php echo $newsItem[mail]; ?>
</p>
<p>
    <b>
        Task text:
    </b>
    <?php echo $newsItem[text]; ?>
</p>
<p>
    <b>
        Task Status:
    </b>
    <?php echo $newsItem[status]; ?>
</p>
    <a href="/news/"><button type="button" class="btn btn-default">Return</button></a>
    <?php if($_SESSION['user_name']=='admin'): ?>
    <?php echo "<a href='/news/$newsItem[id]/edit'>";
    ?><button type="button" class="btn btn-warning">Edit task</button></a>
    <?php endif; ?>

</div>
<?php include ROOT.'/layouts/footer.php'; ?>