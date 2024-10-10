<?php
session_start();
include "../conn.php";
include "includes/header.php";
include "../assets/function.php";
?>

<div class="container" id="formContainer" style="margin-bottom:5rem;">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
        <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-success">
                            <h6><?= $_SESSION['status']; ?></h6>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
            <div class="p-4 shadow position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 mt-2 me-2" aria-label="Close" id="closeFormBtn" onclick="window.location.href='index.php';"></button>
                <form action="action.php" method="POST">
                    <h3 class="text-center fw-bold">Sign In</h3>
                    <div>
                        <p class="text-muted mb-0">&nbsp;&nbsp;Enter your credentials to access your account.</p>
                    </div>
                    <div class="form-floating mb-3 mt-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <label for="email">Email <sup>*</sup></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <label for="password">Password <sup>*</sup></label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="login" class="btn btn-primary w-100 fw-bold">Sign In</button>
                    </div>
                </form>
                <div class="text-center">
                    <a href="forgot_pass.php" class="text-decoration-none fw-bold">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <p class="text-muted">Don't have an account? <a href="signup.php" class="text-decoration-none fw-bold">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
