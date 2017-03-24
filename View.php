<?

class View
{
    private $error = '';
    public $data;
    public $view_params = array();

    public function GetError()
    {
        return $this->error;
    }

    function __construct($data,$_view_params)
    {
        $this->init_files($data);
        $this->view_params=$_view_params;
    }

    function init_files($data)
    {
        foreach ($data as $class_name => $path) {
            if (!file_exists($path . '/' . $class_name . '.php'))
                $this->error = 'не подключены файлы';
            else {
                include $path . '/' . $class_name . '.php';
            }
        }
    }

    function display_data($params = array())
    {
        if ($this->error == '') {
            //$params = array("page" => $_GET['page'], 'par_page' => 5);
            $carsModel = new $params['obj']();
            $this->data = $carsModel->$params['method']($params);
        }
    }
}

?>