<?php
include "../conn.php";
include "includes/header.php";
include "includes/sidebar.php";
?>

<div class="col-md-10">
    <nav class="navbar">
        <h4>Certificates</h4>
    </nav>

    <div class="container content-wrapper">
        <div class="input-group mb-3">
            <select id="certificateFilter" class="form-select" onchange="filterCertificates()" style="background-color: #007bff; color: white; border: none;">
                <option value="" style="color: #333;">-- Select Certificate Type --</option>
                <option value="Barangay Clearance">Barangay Clearance</option>
                <option value="Barangay Indigency">Barangay Indigency</option>
                <option value="Barangay Residency">Barangay Residency</option>
                <option value="Birth Certificate">Birth Certificate</option>
            </select>
        </div>

        <ul class="nav nav-tabs mb-3" id="certificateTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="denied-tab" data-bs-toggle="tab" data-bs-target="#denied" type="button" role="tab" aria-controls="denied" aria-selected="false">Denied</button>
            </li>
        </ul>

        <div class="tab-content" id="certificateTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <ul class="list-group" id="allCertificates">
                    <?php
                    $sql_all = "SELECT * FROM certificate_requests";
                    $result_all = $conn->query($sql_all);
                    while ($row = $result_all->fetch_assoc()) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                        echo "<span>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['certificate']) . "</span>";
                        echo "<div class='d-flex gap-1'>";
                        echo "<button class='btn btn-link p-0' title='View' data-bs-toggle='modal' data-bs-target='#viewModal' onclick='loadResidentInfo(" . $row['id'] . ")'><i class='bi bi-eye' style='font-size: 1.5rem; color: blue; transition: color 0.3s;'></i></button>";
                        echo "<form action='action.php' method='POST' class='d-inline'>";
                        echo "<input type='hidden' name='request_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' name='action' value='approve' class='btn btn-link p-0' title='Approve'><i class='bi bi-check-circle' style='font-size: 1.5rem; color: green; transition: color 0.3s;'></i></button>";
                        echo "<button type='submit' name='action' value='disapprove' class='btn btn-link p-0' title='Disapprove'><i class='bi bi-x-circle' style='font-size: 1.5rem; color: red; transition: color 0.3s;'></i></button>";
                        echo "</form>";

                        // Print button logic based on the existing certificate name
                        echo "<a href='print_clearance.php?id=" . $row['id'] . "' class='btn btn-link p-0' title='Print'><i class='bi bi-printer' style='font-size: 1.5rem; color: blue; transition: color 0.3s;'></i></a>";
                        
                        echo "</div>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <ul class="list-group" id="pendingCertificates">
                    <?php
                    $sql_pending = "SELECT * FROM certificate_requests WHERE status = 'pending'";
                    $result_pending = $conn->query($sql_pending);
                    while ($row = $result_pending->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['certificate']) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                <ul class="list-group" id="approvedCertificates">
                    <?php
                    $sql_approved = "SELECT * FROM certificate_requests WHERE status = 'approved'";
                    $result_approved = $conn->query($sql_approved);
                    while ($row = $result_approved->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['certificate']) . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="tab-pane fade" id="denied" role="tabpanel" aria-labelledby="denied-tab">
                <ul class="list-group" id="deniedCertificates">
                    <?php
                    $sql_denied = "SELECT * FROM certificate_requests WHERE status = 'denied'";
                    $result_denied = $conn->query($sql_denied);
                    while ($row = $result_denied->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['certificate']) . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Resident Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="residentInfoContent">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>

<script>
function loadResidentInfo(requestId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_resident_info.php?id=' + requestId, true);
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('residentInfoContent').innerHTML = this.responseText;
        } else {
            document.getElementById('residentInfoContent').innerHTML = 'No information found!';
        }
    };
    xhr.send();
}
</script>
