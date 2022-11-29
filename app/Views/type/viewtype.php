<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/types/view.css'); ?>">
    <title>View Type</title>
</head>

<body>
    <ul>
        <h1 id="title"></h1>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="<?= base_url('viewmachine') ?>">Machines</a></li>
        <li><a href="<?= base_url('viewtype') ?>">Types</a></li>
    </ul>
    <div class="container">
        <div class="card-content">
            <div class="card-container">
                <h4 class="title-content"><b>VIEW TYPES MACHINES</b></h4>
                <a href="<?php echo site_url('/createType') ?>" class="btn-new">New Register</a>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                }
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($type) : ?>
                            <?php foreach ($type as $type) : ?>
                                <tr>
                                    <td><?php echo $type->type_id; ?></td>
                                    <td><?php echo $type->type_name ?></td>

                                    <td>
                                        <a href="<?php echo base_url('edittype/' . $type->type_id); ?>" class="btn btn-success btn-small">Edit</a>
                                        <a href="<?php echo base_url('deletetype/' . $type->type_id); ?>" class="btn btn-danger btn-small">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php if ($pager) : ?>
                        <?php $pagi_path = 'viewtype'; ?>
                        <?php $pager->setPath($pagi_path); ?>
                        <?= $pager->links() ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const title = document.querySelector('#title');

            axios.get('https://api.trello.com/1/boards/615e121e55742a5a6ba346bc/cards?key=8b326737f43e5a629e80b9c95b0a6016&token=fcd44ca66295583ff083eb88f93ef882c4836355b6edce681b2b9fc631c15517')
                .then(function(response) {
                     title.innerHTML = response.data[0].name
                })
                .catch(function(error) {
                    console.log(error);
                });
    </script>
</body>

</html>