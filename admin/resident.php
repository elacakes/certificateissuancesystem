<?php
include "../conn.php";
include "includes/header.php";
include "includes/sidebar.php";
?>
<div class="col-md-10">
    <nav class="navbar">
        <h4>Residents</h4>
    </nav>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createdata"><i class="bi bi-person-plus-fill"></i> Add Resident</button>

    <div class="container content-wrapper">
        <!-- Insert Details -->
        <div class="modal fade" id="createdata" tabindex="-1" aria-labelledby="createdataLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createdataLabel">Enter your Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="action.php" method="POST">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
                                <label for="name">Full Name</label>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
                                    <label for="age">Age</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="date" name="bday" id="bday" class="form-control" placeholder="Birthday" required>
                                    <label for="bday">Birthday</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="bplace" id="bplace" class="form-control" placeholder="Birth Place" required>
                                    <label for="bplace">Birth Place</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="status">Civil Status</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option hidden>--Please Select--</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option hidden>--Please Select--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="stay">Years of Residency <small>(since when)</small></label>
                                    <input type="text" name="stay" id="stay" class="form-control" placeholder="e.g., 2013">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="postal" id="postal" class="form-control" placeholder="Postal Code">
                                    <label for="postal">Postal Code</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="zone" id="zone" class="form-control" placeholder="Zone">
                                    <label for="zone">Zone</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="brgy" id="brgy" class="form-control" placeholder="Barangay">
                                    <label for="brgy">Barangay</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Municipality">
                                    <label for="city">Municipality</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="province" id="province" class="form-control" placeholder="Province">
                                    <label for="province">Province</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother's Name">
                                    <small>(<i>Write deceased if dead</i>)</small>
                                    <label for="mother_name">Mother's Name</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father's Name">
                                    <small>(<i>Write deceased if dead</i>)</small>
                                    <label for="father_name">Father's Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 mb-3">
                                    <label for="pendingcase">Do you have any pending cases?</label>
                                    <select name="pendingcase" id="pendingcase" class="form-select">
                                        <option hidden value="">Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div id="detailsSection" style="display: none;">
                                        <label for="caseDetails">If yes, please provide details:</label>
                                        <textarea id="caseDetails" name="caseDetails" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Insert Details -->

        <!-- View Details  -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewModalLabel">Resident's Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="view_data">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--View Details -->

        <!-- Edit Details -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Enter your Information</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="action.php" method="POST">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                <label for="name">Full Name</label>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="number" name="age" class="form-control" placeholder="Age" required>
                                    <label for="age">Age</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="date" name="bday" class="form-control" placeholder="Birthday" required>
                                    <label for="bday">Birthday</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="place" class="form-control" placeholder="Birth Place" required>
                                    <label for="bplace">Birth Place</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mb-3">
                                    <label for="status">Civil Status</label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option hidden>--Please Select--</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option hidden>--Please Select--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="stay">Years of Residency <small>(since when)</small></label>
                                    <input type="text" name="stay" class="form-control" placeholder="e.g., 2013">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="postal" class="form-control" placeholder="Postal Code">
                                    <label for="postal">Postal Code</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="zone" class="form-control" placeholder="Zone">
                                    <label for="zone">Zone</label>
                                </div>
                                <div class="form-floating col-md-4 mb-3">
                                    <input type="text" name="brgy" class="form-control" placeholder="Barangay">
                                    <label for="brgy">Barangay</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="Municipality">
                                    <label for="city">Municipality</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="province" class="form-control" placeholder="Province">
                                    <label for="province">Province</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name">
                                    <small>(<i>Write deceased if dead</i>)</small>
                                    <label for="mother_name">Mother's Name</label>
                                </div>
                                <div class="form-floating col-md-6 mb-3">
                                    <input type="text" name="father_name" class="form-control" placeholder="Father's Name">
                                    <small>(<i>Write deceased if dead</i>)</small>
                                    <label for="father_name">Father's Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 mb-3">
                                    <label for="pendingcase">Do you have any pending cases?</label>
                                    <select name="pendingcase" id="pendingcase" class="form-select">
                                        <option hidden value="">Select an option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div id="detailsSection" style="display: none;">
                                        <label for="caseDetails">If yes, please provide details:</label>
                                        <textarea id="caseDetails" name="caseDetails" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit_info" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Display Details -->
        <div class="card-body">
            <table class="table table-striped table-bordered table-success table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Pending Case</th>
                        <th scope="col">Case Details</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="showDetails">
                    <?php
                    $query = "SELECT * FROM residents_tbl";
                    $result = mysqli_query($conn, $query);
                    $i = 1; 
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td class="user_id"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['zone']; ?></td>
                                <td><?php echo $row['pendingcase']; ?></td>
                                <td><?php echo $row['caseDetails']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm updateInfo">Edit Data</a>
                                    <a href="#" class="btn btn-danger btn-sm view_details">View Data</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No records found!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include "includes/footer.php"; ?>
<script>
    // cases
    document.getElementById('pendingcase')
        .addEventListener('change', function() {
            var detailsSection = document.getElementById('detailsSection');
            detailsSection.style.display = this.value === 'yes' ? 'block' : 'none';
        });

    // view details
    $(document).ready(function() {
        $('.view_details').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.user_id').text();
            //    console.log(user_id);

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    'click_show_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    // console.log(response);

                    $('.view_data').html(response)
                    $('#viewModal').modal('show');

                }
            });

        });
    });

    // edit details
    $(document).ready(function() {
        $('.updateInfo').click(function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.user_id').text();
            //    console.log(user_id);

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    'click_update_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(Key, value) {

                        // console.log(value['name']);
                        $('#user_id').val(value['id']);
                        $('#name').val(value['name']);
                        $('#age').val(value['age']);
                        $('#gender').val(value['bday']);
                        $('#bday').val(value['bplace']);
                        $('#civilstatus').val(value['status']);
                        $('#contact_no').val(value['gender']);
                        $('#bplace').val(value['stay']);
                        $('#zone').val(value['postal']);
                        $('#brgy').val(value['zone']);
                        $('#city').val(value['brgy']);
                        $('#province').val(value['city']);
                        $('#postal').val(value['province']);
                        $('#yrsOfResidency').val(value['mother_name']);
                        $('#education').val(value['father_name']);
                        $('#pendingcase').val(value['pendingcase']);
                        $('#caseDetails').val(value['caseDetails']);

                    });

                    // $('.view_data').html(response)
                    $('#updateModal').modal('show');

                }
            });

        });
    });
</script>