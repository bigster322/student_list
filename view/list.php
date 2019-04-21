<?php
require_once __DIR__ . '/../models/helpers/UrlHelper.php';
require_once __DIR__ . '/../models/helpers/HtmlHelper.php';
?>
<section id="students">
    <div class="container">
        <h2>Списко студентов</h2>
        <form method="get">
            <div class="form-group">
                <input name="search" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Поиск">
            </div>
        </form>
        <a class="btn btn-primary" href="<?= UrlHelper::to($app->rootUrl, 'index/list') ?>" role="button">Очистить фильтры</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">
                    <?= HtmlHelper::tableTopLabel('name', $app->currentUrl, 'Имя', ['sort' => $data['sort'], 'search' => $data['search']]) ?>
                </th>
                <th scope="col">
                    <?= HtmlHelper::tableTopLabel('surname', $app->currentUrl, 'Фамилия', ['sort' => $data['sort'], 'search' => $data['search']]) ?>
                </th>
                <th scope="col">
                    <?= HtmlHelper::tableTopLabel('score', $app->currentUrl, 'Баллы', ['sort' => $data['sort'], 'search' => $data['search']]) ?>
                </th>
                <th scope="col">
                    <?= HtmlHelper::tableTopLabel('group_id', $app->currentUrl, 'Группа', ['sort' => $data['sort'], 'search' => $data['search']]) ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['students'] as $student) : ?>
                <tr>
                    <td><?= $student->name ?></td>
                    <td><?= $student->surname ?></td>
                    <td><?= $student->score ?></td>
                    <td><?= $student->group_id ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $data['pager']->getTotalPages(); $i++) : ?>
                    <li class="page-item <?= ($data['page'] == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= UrlHelper::toCurrentWithArgs($app->currentUrl, ['sort' => "{$data['sort'][0]}-{$data['sort'][1]}", 'page' => $i, 'search' => $data['search']]) ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</section>
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>Об этой странице</h2>
        <p class="lead">Страница со списком всех зарегестрированных студентов</p>
        <ul>
          <li>Вы можете отсортировать таблицу по любому столбцу (от большего к меньшему или наоборот)</li>
          <li>Найти студентов по совпадению в Имени, Фамилии и Группе</li>
          <li>Выводится по 4 студента на страницу</li>
        </ul>
      </div>
    </div>
  </div>
</section>