<?php require 'header.php'; ?>

<main class="p-4">
    <div class="container">
        <section>

            <form class="row d-flex" action="includes/inc-login.php" method="POST">
                <div class="card p-4 ">
                    <div class="col-md-6 m-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-md-6 m-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinput') {
                    echo '<p class="text-danger">Please fill in all fields!</p>';
                } elseif ($_GET['error'] == 'wronglogin') {
                    echo '<p class="text-danger">Invalid Login!</p>';
                } elseif ($_GET['error'] == 'wrongpassword') {
                    echo '<p class="text-danger">Invalid Password!</p>';
                }
            }
            ?>
        </section>
    </div>
</main>

<?php require 'footer.php'; ?>