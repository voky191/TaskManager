<html>
<head>
    <title>Task Manager</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Task Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/news/">Home</a></li>
            <li><a href="/news/new/">Create new task</a></li>
            <?php if(user::isGuest()): ?>
                <li><a href="/login">Login In</a></li>
                <li><a href="/register">Register</a></li>
            <?php else: ?>
                <li><a href="#"><?php echo "Hello, ".$_SESSION['user_name']; ?></a></li>
                <li><a href="/logout">Log out</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<form action="/news/<?php echo $newsItem['id'] ?>/edit" method="POST">

    <a class="form-group">

        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control" id="email" value="<?php echo $newsItem[name]; ?>">
        </div>
        <div class="form-group">
            <label>Mail</label>
            <input name="mail" type="text" class="form-control" id="email" value="<?php echo $newsItem[mail]; ?>">
        </div>
        <div class="form-group">
            <label>Text</label>
            <input name="text" type="text" class="form-control" id="email" value="<?php echo $newsItem[text]; ?>">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input name="image" type="text" class="form-control" id="email" value="<?php echo $newsItem[image]; ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input name="status" type="text" class="form-control" id="email" value="<?php echo $newsItem[status]; ?>">
        </div>

        <p>
            <button name="submit" type="submit" class="btn btn-success">Save</button></a>
        </p>
</form>

</body>
</html>
