<?php require 'header.php'; ?>

<main class="p-4">
    <div class="container">
        <section>
            <form class="row d-flex" action="includes/inc-signup.php" method="POST">
                <div class="card p-4 ">
                    <div class="col-md-6 m-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <label for="password2" class="form-label">Repeat Password</label>
                        <input type="password" name="password2" id="password2" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <label for="role" class="form-label">Role</label>
                        <input type="role" name="role" id="role" class="form-control">
                    </div>
                    <div class="col-md-6 m-1">
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinput') {
                    echo '<p class="text-danger">Please fill in all fields!</p>';
                } elseif ($_GET['error'] == 'invalidusername') {
                    echo '<p class="text-danger">Invalid username!</p>';
                } elseif ($_GET['error'] == 'invalidemail') {
                    echo '<p class="text-danger">Please enter a valid email!</p>';
                } elseif ($_GET['error'] == 'passwordcheck') {
                    echo '<p class="text-danger">Passwords do not match!</p>';
                } elseif ($_GET['error'] == 'usernametaken') {
                    echo '<p class="text-danger">Username is already taken!</p>';
                } elseif ($_GET['error'] == 'none') {
                    echo '<p class="text-success">Sign up successful!</p>';
                }
            }
            ?>
        </section>
    </div>
</main>

<?php require 'footer.php'; ?>