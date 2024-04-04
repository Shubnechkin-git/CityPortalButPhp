<?php
session_start();
if (isset($_SESSION['login'])) {
    $active = ['', '', '', $_SESSION['login']];
    echo "<script>location.href = '/lk.php';</script>"; // перенаправление на страницу личного кабинета
} else {
    $active = ['', '', 'active', ''];
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
    <?php
    include "navbar.php";
    navbar($active);
    $message = '';
    ?>
    <div class="wrapper login">
        <div class="content d-flex justify-content-around align-items-center h-100">
            <form action="/login.php" method="post">
                <h3 class="text-center">Авторизация</h3>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mt-3 mb-3 text-danger" id="message"></div>
                <button type="submit" name='submit' class="btn w-100 btn-outline-success">Авторизоваться</button>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {

            $message = '';

            if (!empty($_POST['login'])  && !empty($_POST['password'])) {
                include "database.php";
                $login = $_POST['login'];
                $password = $_POST['password'];
                login($login, $password);
            } else if (empty($_POST['login'])) {
                $message = 'Введите логин!';
            } else if (empty($_POST['password'])) {
                $message = 'Введите пароль!';
            }
        }
        echo '<script>document.getElementById("message").innerText="' . $message . '"</script>';
        ?>
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