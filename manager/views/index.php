<html>
<head>
    <title>Task Manager</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "lengthMenu": [[1, 2, 3, -1], [1, 2, 3, "All"]]
            } );
        } );
    </script>
</head>
<body>

<table id="example" class="display" cellspacing="0" width="100%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Mail</th>
        <th scope="col">Text</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($newsList as $newsItem): ?>
    <tr>

        <th scope="row"><?php echo "$newsItem[id]" ?></th>
        <td><?php echo "$newsItem[name]" ?></td>
        <td><?php echo "$newsItem[mail]" ?></td>
        <td><?php echo "$newsItem[text]" ?></td>
        <td><?php echo "$newsItem[image]" ?></td>
        <td><?php echo "$newsItem[status]" ?></td>


    </tr>
    <?php endforeach; ?>
    </tbody>
</table>




</body>
</html>