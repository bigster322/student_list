<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student List</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="/../study/php/2ch_tasks/mvc/view/web/css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/study/php/2ch_tasks/mvc/index/list">Главная</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if (!$app->logined) : ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/study/php/2ch_tasks/mvc/index/index">Вход</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/study/php/2ch_tasks/mvc/index/registration">Регистрация</a>
          </li>
          <?php else : ?>
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="/study/php/2ch_tasks/mvc/account/edit"><?= $app->logined['email'] ?></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="/study/php/2ch_tasks/mvc/sign/logout">Выход</a>
              </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Список студентов</h1>
      <p class="lead">Здесь можно зарегестрироваться, посмотреть список всех зарегестированных студентов на главной странице и изменить информацию о себе.</p>
    </div>
  </header>
<body id="page-top">
  <?php require __DIR__ ."/../{$fileName}.php"; ?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Student List 2019</p>
  </div>
  <!-- /.container -->
</footer>
</html>
