<?php require 'header.php'; ?>

<main>
    <?php
    if (isset($_SESSION['role'])) {
        echo "<p> Your Role is  " . $_SESSION['role'] . " </p>";
    } else {
        echo "<p> Your Role is  " . $_SESSION['role'] . " </p>";
    }
    ?>
</main>

<?php require 'footer.php'; ?>