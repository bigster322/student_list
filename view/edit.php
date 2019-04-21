<?php
require_once __DIR__ . '/../models/helpers/UrlHelper.php';
require_once __DIR__ . '/../models/helpers/HtmlHelper.php';
?>
<section id="about">
  <div class="container">
      <h2>Редактирование информации о себе</h2>
      <form method="post">
          <?= HtmlHelper::regInputText('name', 'Имя', 'text', 'Введите ваше имя', $data['student']->name, $data['error']) ?>
          <?= HtmlHelper::regInputText('surname', 'Фамилия', 'text', 'Введите вашу фамилию', $data['student']->surname, $data['error']) ?>
          <?= HtmlHelper::regInputText('email', 'Email', 'email', 'Введите ваш Email', $data['student']->email, $data['error']) ?>
          <?= HtmlHelper::regInputText('password', 'Пароль', 'password', 'Введите ваш пароль', $data['student']->password, $data['error']) ?>
          <div class="form-group">
              <label for="exampleInputPassword1">Местный или приезжий</label>
              <select name="regional" class="form-control" id="exampleFormControlSelect1">
                  <option value="1">Местный</option>
                  <option value="0">Приезжий</option>
              </select>
          </div>
          <?= HtmlHelper::regInputText('score', 'Сумма ваших баллов по ЕГЭ', 'text', 'Введите сумму баллов', $data['student']->score, $data['error']) ?>
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
          <?= HtmlHelper::regInputText('group_id', 'Группа', 'text', 'Введите вашу группу', $data['student']->group_id, $data['error']) ?>
          <button type="submit" class="btn btn-primary">Обновить данные</button>
      </form>
  </div>
</section>
