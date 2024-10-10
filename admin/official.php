<?php
include "../conn.php";
include "includes/header.php";
include "includes/sidebar.php";

$update_query = "UPDATE officials_tbl SET status = 'END TERM' WHERE termEnd <= CURDATE()";
mysqli_query($conn, $update_query);
?>

<div class="col-md-10">
    <nav class="navbar">
        <h4>Barangay Officials</h4>
    </nav>
    <button type="button" class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#insertdata"><i class="bi bi-person-plus-fill"></i> Add Official</button>
    <div class="container content-wrapper">
        <!--INSERT DATA-->
        <div class="modal fade" id="insertdata" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="insertdataLabel">Manage Officials</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter name">
                            </div>

                            <div class="form-group mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select">
                                    <option hidden>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="bdate" class="form-label">Birthday</label>
                                <input type="date" name="bdate" id="bdate" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" id="position" class="form-select">
                                    <option hidden>-- Select Positions --</option>
                                    <option value="Barangay Captain">Barangay Captain</option>
                                    <option value="Barangay Councilor">Barangay Councilor</option>
                                    <option value="Barangay Secretary">Barangay Secretary</option>
                                    <option value="Barangay Treasurer">Barangay Treasurer</option>
                                    <option value="Barangay Tanod">Barangay Tanod</option>
                                    <option value="SK Chairman">SK Chairman</option>
                                    <option value="SK Councilor">SK Councilor</option>
                                    <option value="SK Secretary">SK Secretary</option>
                                    <option value="SK Treasurer">SK Treasurer</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="termStart" class="form-label">Start Term</label>
                                <input type="date" id="termStart" name="termStart" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="termEnd" class="form-label">End Term</label>
                                <input type="date" id="termEnd" name="termEnd" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="save" class="btn btn-primary">Save Info</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- INSERT MODAL -->

        <!-- view modal-->
        <div class="modal fade" id="viewusermodal" tabindex="-1" aria-labelledby="viewusermodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewusermodalLabel">View Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="view_user_data">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- view modal-->

        <!-- edit modal -->
        <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editdataLabel">Edit Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="action.php" method="POST">
                        <div class="modal-body">

                            <div class="form-group mb-3">
                                <input type="hidden" id="user_id" name="id" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" name="fullname" class="form-control fullname">
                            </div>

                            <div class="form-group mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select gender">
                                    <option hidden>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="bdate" class="form-label">Birthday</label>
                                <input type="date" name="bdate" class="form-control bdate">
                            </div>

                            <div class="form-group mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" class="form-select position">
                                    <option hidden value="">-- Select Position --</option>
                                    <option value="Barangay Captain">Barangay Captain</option>
                                    <option value="Barangay Councilor">Barangay Councilor</option>
                                    <option value="Barangay Secretary">Barangay Secretary</option>
                                    <option value="Barangay Treasurer">Barangay Treasurer</option>
                                    <option value="Barangay Zone Leader">Barangay Zone Leader</option>
                                    <option value="SK Chairman">SK Chairman</option>
                                    <option value="SK Councilor">SK Councilor</option>
                                    <option value="SK Secretary">SK Secretary</option>
                                    <option value="SK Treasurer">SK Treasurer</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="termStart" class="form-label">Term Started</label>
                                <input type="date" name="termStart" class="form-control termStart">
                            </div>

                            <div class="form-group mb-3">
                                <label for="termEnd" class="form-label">Term Ended</label>
                                <input type="date" name="termEnd" class="form-control termEnd">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                <br>
                                <img class="image" id="image" src="" style="max-width: 100px; height: 100px;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update_data" class="btn btn-primary">Save Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- edit modal -->

        <!-- Display data -->
        <div class="card-body">
            <table class="table table-bordered table-striped table-primary table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Position</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $image = $row['image'];
                    $imageUrl = "uploads/" . $image;
                ?>
                    <tbody id="showData">
                        <tr>
                            <td class="user_id"> <?php echo $row['id']; ?> </td>
                            <td> <?php echo "<img src= '$imageUrl' style='width: 50px; height: 50px;'>" ?> </td>
                            <td> <?php echo $row['position']; ?> </td>
                            <td> <?php echo $row['fullname']; ?> </td>
                            <td> <?php echo $row['status'] == 'END TERM' ? 'End Term' : 'Active'; ?> </td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm fs-10 edit_data "><i class="fas fa-edit"></i> Edit Details</a>
                                <a href="#" class="btn btn-danger btn-sm fs-10 view_data"><i class="fas fa-eye"></i> View Details</a>
                            </td>

                        </tr>
                    </tbody>
                <?php
                }


                ?>
            </table>
        </div>
        <!-- Display data -->
    </div>
</div>


<?php include "includes/footer.php"; ?>

<script>
    // view details
    $(document).ready(function() {

        $('.view_data').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.user_id').text();
            /*console.log(user_id);*/

            $.ajax({
                method: "POST",
                url: "action.php",
                data: {
                    'click_view_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {


                    $('.view_user_data').html(response);
                    $('#viewusermodal').modal('show');
                }
            });

        });
    });
    // view details

    // edit data
    $(document).ready(function() {

        $('.edit_data').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.user_id').text();
            console.log(user_id);

            $.ajax({
                method: "POST",
                url: "action.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(Key, value) {

                        // console.log(value['fullname']);
                        $('#user_id').val(value['id']);
                        $('.fullname').val(value['fullname']);
                        $('.gender').val(value['gender']);
                        $('.bdate').val(value['bdate']);
                        $('.position').val(value['position']);
                        $('.termStart').val(value['termStart']);
                        $('.termEnd').val(value['termEnd']);

                        if (value['image']) {
                            $('.image').attr('src', 'uploads/' + value['image']);
                        } else {
                            $('.image').attr('src', '');
                        }

                    });

                    $('#editdata').modal('show');
                }
            });

        });
    });
    // edit data
</script>