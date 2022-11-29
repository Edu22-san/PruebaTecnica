<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/types/create.css'); ?>">
    <title>Create machines</title>
</head>

<body>
    <ul>
        <h1 id="title"></h1>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="<?= base_url('viewmachine') ?>">Machines</a></li>
        <li><a href="<?= base_url('viewtype') ?>">Types</a></li>
    </ul>

    <div class="container-sm mt-5">
        <div class="card">
            <h1 class="card-header bg-dark text-white d-flex justify-content-between align-items-center">REGISTER MACHINES
                <form action="viewmachine/">
                    <input type="submit" class="btn btn-danger btn-sm ml-auto" value="Atras" />
                </form>
            </h1>

            <div class="card-body bg-light">
                <form method="post" id="createmachine" name="createmachine" action="<?= site_url('/create-machine-action') ?>">
                    
                   <div class="form-group">
                        <label>Machine code</label>
                        <input type="text" name="machine_code" class="form-control" placeholder="name code">
                    </div>
                    <div class="form-group">
                        <label>Machine name</label>
                        <input type="text" name="machine_name" class="form-control" placeholder="name machine">
                    </div>
                    <div class="form-group">
                        <label>Machine type</label>
                        <select name="machine_type_id" class="form-control input" placeholder="type">
                            <option selected disabled>Select a type</option>
                            <?php if ($types) : ?>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type->type_id ?>"><?= $type->type_name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Machine description</label>
                        <input type="text" name="machine_description" class="form-control" placeholder="description machine">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

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