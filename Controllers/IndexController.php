<?php
require_once 'controller.php';
require_once __DIR__ . '/../models/TestModel.php';
require_once __DIR__ . '/../models/DB/DB.php';
require_once __DIR__ . '/../models/mappers/StudentMapper.php';
require_once __DIR__ . '/../models/Pager.php';
require_once __DIR__ . '/../models/helpers/SortGetterHelper.php';

class IndexController extends Controller {

  public function actionIndex() {
      $this->render('index');
  }

  public function actionList() {
      $db = new DB();
      $mapper = new StudentMapper($db);
      $pager = new Pager();

      $sort = $_GET['sort'] ?? false;
      $sort = SortGetterHelper::getSortArr($sort);

      $search = $_GET['search'] ?? false;
      $pager->totalRecords($mapper->like($search)->getTotalRecords());

      $page = $_GET['page'] ?? 1;

      $students = $mapper->like($search)->orderBy($sort[0], $sort[1])->getForPage($page, $pager->perPage);

      $this->render('list', [
          'students' => $students,
          'pager' => $pager,
          'sort' => $sort,
          'search' => $search,
          'page' => $page,
      ]);
  }

    public function actionRegistration() {
      $this->app->sessionStart();
      $error = false;

      if (isset($_SESSION['reg'])) {
          if ($_SESSION['reg']['error']) {
              $error = $_SESSION['reg'];
          }
      }

      $this->render('registration', ['error' => $error]);
    }
}
