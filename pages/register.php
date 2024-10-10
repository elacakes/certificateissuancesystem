<?php
session_start();
include "../conn.php";
include "includes/header.php";
include "../assets/function.php";
?>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="p-4 shadow">
                <form action="action.php" method="POST">
                    <?php
                    if (isset($_SESSION['registerStatus'])) {
                    ?>
                        <div class="alert alert-success">
                            <h6><?= $_SESSION['registerStatus']; ?></h6>
                        </div>
                    <?php
                        unset($_SESSION['registerStatus']);
                    }
                    ?>
                    <h3 class="text-center fw-bold">Registration Form</h3>
                    <div>
                        <p class="mb-2"><b>Personal Information</b></p>
                    </div>
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
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary fw-bold">
                            <a href="login.php" class="text-white text-decoration-none">Cancel</a>
                        </button>
                        <button type="submit" name="submit_resident" class="btn btn-primary fw-bold float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('pendingcase').addEventListener('change', function() {
        var detailsSection = document.getElementById('detailsSection');
        detailsSection.style.display = this.value === 'yes' ? 'block' : 'none';
    });
</script>

<?php include "includes/footer.php"; ?>