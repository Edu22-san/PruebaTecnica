<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/types/create.css'); ?>">
    <title>Edit machine</title>
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
            <div class="card-header bg-dark text-white ">
                <h1>EDIT MACHINE</h1>
            </div>
            <div class="card-body">
                <form method="post" id="updateMachine" name="updateMachine" action="<?= site_url('/updateMachine') ?>">
                    <input type="hidden" name="machine_id" id="id" value="<?php echo $machine_obj->machine_id; ?>">

                    <div class="form-group">
                        <label>Machine code</label>
                        <input type="text" name="machine_code" class="form-control" disabled value="<?php echo $machine_obj->machine_code; ?>">
                    </div>

                    <div class="form-group">
                        <label>Machine name</label>
                        <input type="text" name="machine_name" class="form-control" value="<?php echo $machine_obj->machine_name; ?>">
                    </div>

                    <div class="form-group">
                        <label>Machine type</label>
                        <select name="machine_type_id" class="form-control input" placeholder="type">
                            <option selected disabled value="<?= $machine_obj->type_id ?>"><?= $machine_obj->type_name ?></option>
                            <?php if ($types) : ?>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type->type_id ?>"><?= $type->type_name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Machine description</label>
                        <input type="text" name="machine_name" class="form-control" disabled value="<?php echo $machine_obj->machine_description; ?>">
                    </div>
                    <div class="group-buttons">
                        <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
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
    <script>
        if ($("#update").length > 0) {
            $("#update").validate({
                rules: {
                    machine_code: {
                        required: true,
                    },
                    machine_name: {
                        required: true,
                    },
                    machine_type_id: {
                        require: true,
                    },
                },
                messages: {
                    machine_code: {
                        required: "machine code is required.",
                    },
                    machine_name: {
                        required: "mahcine name is required.",
                    },
                    machine_type_id: {
                        required: "machine type is required.",
                    },
                },
            })
        }
    </script>
</body>

</html>