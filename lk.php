<?php
session_start();
if (isset($_SESSION['login'])) {
    $active = ['', '', '', $_SESSION['login'], 'active'];
} else {
    echo "<script>location.href = '/main.php';</script>"; // перенаправление на страницу личного кабинета
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
        $message = '';
        ?>
        <div class="content d-flex flex-column">
            <div class="d-flex w-100 justify-content-center mt-3 mb-4">
                <form action="/lk.php" method="post">
                    <h3 class="text-center">Создание заявки</h3>
                    <div class="mb-3">
                        <label for="exampleInputTitle1" class="form-label">Название</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSelect1" class="form-label">Категория</label>
                        <select class="form-select" name="category" id="exampleInputSelect1" aria-label="Default select example">
                            <option selected value="Улицы">Улицы</option>
                            <option value="Дома">Дома</option>
                            <option value="Дороги">Дороги</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputDescription1" class="form-label">Описание</label>
                        <textarea type="text" name="desc" class="form-control" id="exampleInputDescription1"></textarea>
                    </div>
                    <div class="mt-3 mb-3 text-danger" id="message"></div>
                    <button type="submit" name='create' class="btn w-100 btn-outline-success">Создать</button>
                </form>
            </div>
            <h3 class="text-center">Ваши заявки:</h3>
            <div class="container">
                <div class="row mt-4" id='tasks'></div>
            </div>
        </div>
        <?php
        include "database.php";
        function displayTasks($userId)
        {
            // получаем массив задач пользователя
            $tasks = getTask($userId);

            // проверяем, есть ли задачи у пользователя
            if (count($tasks) > 0) {
                // выводим заголовок контейнера
                echo '<script> document.getElementById(`tasks`).innerHTML=``;</script>';
                echo '<script> document.getElementById(`tasks`).innerHTML+=`';

                // цикл foreach для вывода каждой задачи
                foreach ($tasks as $task) {
                    echo '<div class="col-md-4" id="' . $task['id'] . '">';
                    echo '<div class="card mb-4">';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">Навзвание: ' . $task['title'] . '</h4>';
                    echo '<h6 class="card-subtitle mb-2">Категория: ' . $task['category'] . '</h6>';
                    echo '<h6 class="card-text">Описание: ' . $task['description'] . '</h6>';
                    echo '<h6 class="card-text">Статус: в обработке</sapn>';
                    echo '<h6 class="card-text">Дата: ' . $task['created_at'] . '</h6>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '`</script>';
            } else {
                // выводим сообщение, что задачи отсутствуют
                echo '<script> document.getElementById(`tasks`).innerHTML=``;</script>';
                echo '<script> document.getElementById(`tasks`).innerHTML+=`<span class="text-center">Задачи отсуствуют!</span>`;</script>';
            }
        }
        if (isset($_POST['create'])) {
            $message = '';
            if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
                $title = $_POST['title'];
                $category = $_POST['category'];
                $desc = $_POST['desc'];
                createTask($title, $category, $desc, $_SESSION['id']);
                displayTasks($_SESSION['id']);
            } else if (empty($_POST['title'])) {
                $message = 'Введите название!';
            } else if (empty($_POST['category'])) {
                $message = 'Введите категорию!';
            } else if (empty($_POST['desc'])) {
                $message = 'Введите описание!';
            }
        }
        echo '<script>document.getElementById("message").innerText="' . $message . '"</script>';
        displayTasks($_SESSION['id']);
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