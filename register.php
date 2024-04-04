<?php
session_start();
if (isset($_SESSION['login'])) {
    $active = ['', '', '', $_SESSION['login']];
    echo "<script>location.href = '/lk.php';</script>"; // перенаправление на страницу личного кабинета
} else {
    $active = ['', 'active', '', ''];
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
            <form action="/register.php" class="p-3" method="post">
                <h3 class="text-center">Регистрация</h3>
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="exampleInputLastName1" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" name="lastname" id="exampleInputLastName1">
                    </div>
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="exampleInputFirstName1" class="form-label">Имя</label>
                        <input type="text" class="form-control" name="firstname" id="exampleInputFirstName1">
                    </div>
                    <div class="mb-3 col col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="exampleInputPatrynomic1" class="form-label">Отчество</label>
                        <input type="text" class="form-control" name="patrynomic" id="exampleInputPatrynomic1">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="exampleInputLogin1" class="form-label">Логин</label>
                        <input type="text" class="form-control" name="login" id="exampleInputLogin1">
                    </div>
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="exampleInputretryPassword1" class="form-label">Повтор пароля</label>
                        <input type="password" class="form-control" name="retryPassword" id="exampleInputretryPassword1">
                    </div>
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" name="checkPersonalData" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Согласие на обработку персональных данных</label>
                    <div class="mt-3 mb-3 text-danger" id="message"></div>
                </div>
                <button type="submit" class="btn w-100 btn-outline-success" name='submit' id="registerBtn">Зарегистрироваться</button>
            </form>
        </div>
        <div class="footer">
            <?php
            include "footer.php";
            footer();
            ?>
        </div>
        <?php
        if (isset($_POST['submit'])) {

            $message = '';

            if (
                !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['patrynomic']) &&
                !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) &&
                !empty($_POST['retryPassword'] &&  !empty($_POST['checkPersonalData']))
            ) {
                if ($_POST['retryPassword'] == $_POST['password']) {
                    include "database.php";
                    $lastname = $_POST['lastname'];
                    $firstname = $_POST['firstname'];
                    $patrynomic = $_POST['patrynomic'];
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if (register($lastname, $firstname, $patrynomic, $login, $email, $password) === true) {
                        $_SESSION['login'] = $login;
                        echo "<script>location.href = '/lk.php';</script>"; // перенаправление на страницу личного кабинета
                        exit();
                    }
                } else {
                    $message = 'Пароли не совпадают!';
                }
            } else if (empty($_POST['lastname'])) {
                $message = 'Заполните фамилию!';
            } else if (empty($_POST['firstname'])) {
                $message = 'Заполните имя!';
            } else if (empty($_POST['patrynomic'])) {
                $message = 'Заполните отчесвто!';
            } else if (empty($_POST['login'])) {
                $message = 'Заполните отчесвто!';
            } else if (empty($_POST['email'])) {
                $message = 'Введите почту!';
            } else if (empty($_POST['password'])) {
                $message = 'Введите пароль!';
            } else if (empty($_POST['retryPassword'])) {
                $message = 'Повторите пароль!';
            } else if (empty($_POST['checkPersonalData'])) {
                $message = 'Необходимо соглашение!';
            }
        }
        echo '<script>document.getElementById("message").innerText="' . $message . '"</script>';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>