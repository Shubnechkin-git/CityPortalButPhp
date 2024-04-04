<?php
function counter()
{
  print "<h2>Всего решенных задач: 4</h2>";
}

function completedTask($img)
{
  print '
  <div class="col d-flex justify-content-center col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4 mb-4 col-xxl-4">
  <div class="card w-100" style="width: 18rem;">
  <h5 class="card-title text-center mt-4">Название</h5>
  <hr/>
    <img src="' . $img . '" class="card-img-top" alt="...">
    <div class="card-body">
    <hr/>
    <ul>
    <li class="card-text">Дата: 12.12.2020.</li>
    <li class="card-text">Категория: название</li>
    </ul>
    </div>
    </div>
  </div>';
};
