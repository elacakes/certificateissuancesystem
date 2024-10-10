<?php
include "../conn.php";

if (isset($_GET['id'])) {
    $request_id = $_GET['id'];

    $sql = "SELECT 
                cr.id AS request_id,
                cr.name AS requester_name,
                cr.certificate,
                cr.purpose,
                cr.pickup_datetime,
                cr.status AS request_status,
                r.age,
                r.bday,
                r.bplace,
                r.status AS resident_status,
                r.gender,
                r.stay,
                r.postal,
                r.zone,
                r.brgy,
                r.city,
                r.province,
                r.mother_name,
                r.father_name,
                r.pendingcase,
                r.caseDetails
            FROM 
                certificate_requests cr
            JOIN 
                residents_tbl r ON cr.name = r.name
            WHERE 
                cr.id = '$request_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $resident_info = $result->fetch_assoc();
        ?>
        <div class="container mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($resident_info['requester_name']); ?></p>
                            <p class="card-text"><strong>Certificate Type:</strong> <?php echo htmlspecialchars($resident_info['certificate']); ?></p>
                            <p class="card-text"><strong>Purpose:</strong> <?php echo htmlspecialchars($resident_info['purpose']); ?></p>
                            <p class="card-text"><strong>Pickup Date and Time:</strong> <?php echo htmlspecialchars($resident_info['pickup_datetime']); ?></p>
                            <p class="card-text"><strong>Status of Request:</strong> <?php echo htmlspecialchars($resident_info['request_status']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Age:</strong> <?php echo htmlspecialchars($resident_info['age']); ?></p>
                            <p class="card-text"><strong>Birthday:</strong> <?php echo htmlspecialchars($resident_info['bday']); ?></p>
                            <p class="card-text"><strong>Place of Birth:</strong> <?php echo htmlspecialchars($resident_info['bplace']); ?></p>
                            <p class="card-text"><strong>Gender:</strong> <?php echo htmlspecialchars($resident_info['gender']); ?></p>
                            <p class="card-text"><strong>Stay:</strong> <?php echo htmlspecialchars($resident_info['stay']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Postal:</strong> <?php echo htmlspecialchars($resident_info['postal']); ?></p>
                            <p class="card-text"><strong>Zone:</strong> <?php echo htmlspecialchars($resident_info['zone']); ?></p>
                            <p class="card-text"><strong>Barangay:</strong> <?php echo htmlspecialchars($resident_info['brgy']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>City:</strong> <?php echo htmlspecialchars($resident_info['city']); ?></p>
                            <p class="card-text"><strong>Province:</strong> <?php echo htmlspecialchars($resident_info['province']); ?></p>
                            <p class="card-text"><strong>Mother's Name:</strong> <?php echo htmlspecialchars($resident_info['mother_name']); ?></p>
                            <p class="card-text"><strong>Father's Name:</strong> <?php echo htmlspecialchars($resident_info['father_name']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Pending Case:</strong> <?php echo htmlspecialchars($resident_info['pendingcase']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Case Details:</strong> <?php echo htmlspecialchars($resident_info['caseDetails']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-warning'>No record found!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>No ID provided!</div>";
}
?>
