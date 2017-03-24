<?
include __DIR__ . '/View.php';

$config = $_GET['config'];
$page = $_GET['page'];

$data = json_decode($config['path_data']); //массив путей
$obj_data = json_decode($config['obj_params']);

$view_params = $config['view_params']; //что отображать

$view = new View($data, $view_params);
$view->display_data(
    array(
        'obj' => $obj_data->obj,
        'method' => $obj_data->method,
        'page' => $page,
        'par_page' => $config['par_page']
    ));


foreach ($view->data as $row) { ?>
    <div class="test"><? echo $row[$view->view_params[0]]; ?></div>
<? } ?>

