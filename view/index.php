<?php
require_once __DIR__ . '/../models/helpers/UrlHelper.php';
?>
<section id="about">
  <div class="container">
      <form method="post" action="<?= UrlHelper::to($app->rootUrl, 'sign/signup') ?>">
          <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input value="isis@boom.terror" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Пароль</label>
              <input value="iloveislam" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
          </div>
          <button type="submit" class="btn btn-primary">Вход</button>
      </form>
  </div>
</section>

<section id="services" class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Services we offer</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
      </div>
    </div>
  </div>
</section>
