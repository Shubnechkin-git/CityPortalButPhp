<?php
session_start();
if (isset($_SESSION['login'])) {
    $active = ['active', '', '', $_SESSION['login'], ''];
} else {
    $active = ['active', '', '', ''];
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Городской портал</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <?php
        include "navbar.php";
        navbar($active);
        ?>
        <div class="content d-flex justify-content-around">
            <div class="mt-3 d-flex align-items-center flex-column">
                <?php
                include "completed.php";
                counter(); ?>
                <div class="row w-100">
                    <?php
                    completedTask('./assets/1.jpg');
                    completedTask('./assets/2.jpg');
                    completedTask('./assets/3.jpg');
                    completedTask('./assets/4.jpg');
                    ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php
            include "footer.php";
            footer();
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>