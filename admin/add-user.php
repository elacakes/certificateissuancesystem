<?php
include "../conn.php";
include "../assets/function.php";
include "includes/header.php";
include "includes/sidebar.php";
?>
<div class="col-md-10">
    <nav class="navbar">
        <h4>Add New Administrator</h4>
    </nav>
    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-person-plus-fill"></i> Admin</button>
    <div class="container content-wrapper">
        <!-- ADDING ADMINISTRATORS -->
        <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addUserLabel">Add new admin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <p class="text-muted mb-0">&nbsp;&nbsp;&nbsp;Enter new details below.</p>
                    </div>
                    <div class="modal-body">
                        <form action="action.php" method="POST">
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email Address <sup class="text-danger">*</sup></label>
                                <input type="text" name="email" id="email" class="form-control" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="password" class="form-label">Password <sup class="text-danger">*</sup></label>
                                <input type="text" name="password" id="password" class="form-control" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="cpassword" class="form-label">Re-type Password <sup class="text-danger">*</sup></label>
                                <input type="text" name="cpassword" id="cpassword" class="form-control" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label>Role</label>
                                <select name="type" class="form-select">
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="text-center d-grid gap-2 mt-3 mb-3">
                                <button type="submit" name="user" class="btn btn-primary">Add User</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDITING ADMINISTRATORS -->
        <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editUserLabel">Update Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div>
                        <p class="text-muted mb-0">&nbsp;&nbsp;&nbsp;Enter details below.</p>
                    </div>
                    <div class="modal-body">
                        <form action="action.php" method="POST">
                            <div class="form-group mb-2">
                                <input type="hidden" name="id" id="user_id" class="form-control" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                                <input type="text" name="name" id="name" class="form-control name" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email Address <sup class="text-danger">*</sup></label>
                                <input type="text" name="email" id="email" class="form-control email" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label for="password" class="form-label">Password <sup class="text-danger">*</sup></label>
                                <input type="text" name="password" id="password" class="form-control password" required placeholder="Type here">
                            </div>
                            <div class="form-group mb-2">
                                <label>Role</label>
                                <select name="type" class="form-select type">
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="text-center d-grid gap-2 mt-3 mb-3">
                                <button type="submit" name="info_save" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- DISPLAY ADMINISTRATORS -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = getAll('users');
                    if (mysqli_num_rows($users) > 0) {
                        foreach ($users as $user) {
                    ?>
                            <tr>
                                <td class="users_id"><?= $user['user_id']; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td>
                                    <a type="button" class="btn btn-success btn-sm editUserInfo">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm mx-2">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="?"> No Record Found.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php include "includes/footer.php"; ?>
<script>
    $(document).ready(function() {
        $('.editUserInfo').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.users_id').text();
            //    console.log(user_id);

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    'click_change_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(Key, value) {

                        // console.log(value['name']);
                        $('.user_id').val(value['user_id']);
                        $('.name').val(value['name']);
                        $('.email').val(value['email']);
                        $('.password').val(value['password']);
                        $('.type').val(value['type']);


                    });

                    // $('.view_data').html(response)
                    $('#editUser').modal('show');

                }
            });

        });
    });
</script>