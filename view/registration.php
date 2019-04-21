<?php
require_once __DIR__ . '/../models/helpers/UrlHelper.php';
require_once __DIR__ . '/../models/helpers/HtmlHelper.php';
?>
<section id="about">
  <div class="container">
      <h2>Регистрация</h2>
      <form method="post" action="<?= UrlHelper::to($app->rootUrl, 'sign/reg') ?>">
          <?= HtmlHelper::regInputText('name', 'Имя', 'text', 'Введите ваше имя', '', $data['error']) ?>
          <?= HtmlHelper::regInputText('surname', 'Фамилия', 'text', 'Введите вашу фамилию', '', $data['error']) ?>
          <?= HtmlHelper::regInputText('email', 'Email', 'email', 'Введите ваш Email', '', $data['error']) ?>
          <?= HtmlHelper::regInputText('password', 'Пароль', 'password', 'Введите ваш пароль', '', $data['error']) ?>
          <div class="form-group">
              <label for="exampleInputPassword1">Местный или приезжий</label>
              <select name="regional" class="form-control" id="exampleFormControlSelect1">
                  <option value="1">Местный</option>
                  <option value="0">Приезжий</option>
              </select>
          </div>
          <?= HtmlHelper::regInputText('score', 'Сумма ваших баллов по ЕГЭ', 'text', 'Введите сумму баллов', '', $data['error']) ?>
          <div class="form-group">
              <label for="exampleInputPassword1">Дата рождения</label>
              <input name="day" type="text" class="form-control" id="" placeholder="День">
              <input name="month" type="text" class="form-control" id="" placeholder="Месяц">
              <input name="year" type="text" class="form-control" id="" placeholder="Год">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Пол</label>
              <select name="gender" class="form-control" id="exampleFormControlSelect2">
                  <option value="1">Мужской</option>
                  <option value="0">Женский</option>
              </select>
          </div>
          <?= HtmlHelper::regInputText('group_id', 'Группа', 'text', 'Введите вашу группу', '', $data['error']) ?>
          <div class="form-check">
              <input name="remember_me" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
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
