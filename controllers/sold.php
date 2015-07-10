<?php
class Sold extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false) {
            Session::destroy();
            header('location: ../index');
            exit;
        }
    }

    function index() {
        if(Session::get('office') == TOP_OFFICE) {
            $office = TOP_OFFICE;
            $this->view->soldList = $this->model->soldList($office);
        } elseif (Session::get('office') == BOTTOM_OFFICE) {
            $office = BOTTOM_OFFICE;
            $this->view->soldList = $this->model->soldList($office);
        } elseif (Session::get('role') == ADMIN) {
            $this->view->soldList = $this->model->soldListAll();
        }
        //Вывод выпадающего списка с товарами
        $this->view->goodList = $this->model->goodList();

        //запрашиваем лист с good'ами
        $this->view->getGood = $this->model->getGoodsList();

        $this->view->render('sold/index');
    }

    function period() {
        $get_start = $_POST['start']; //04.02.15
        $start_pieces = explode(".", $get_start);
        $start_mysql_date = '20' . $start_pieces[2] . '-' . $start_pieces[1] . '-' . $start_pieces[0];
        $start = $start_mysql_date;

        $get_end = $_POST['end']; //04.02.15
        $end_pieces = explode(".", $get_end);
        $end_mysql_date = '20' . $end_pieces[2] . '-' . $end_pieces[1] . '-' . $end_pieces[0];
        $end = $end_mysql_date;

        if(Session::get('role') == ADMIN) {
            $this->view->period = $this->model->periodAll($start, $end);
        } elseif (Session::get('office') == TOP_OFFICE) {
            $office = TOP_OFFICE;
            $this->view->period = $this->model->period($start, $end, $office);
        } elseif (Session::get('office') == BOTTOM_OFFICE) {
            $office = BOTTOM_OFFICE;
            $this->view->period = $this->model->period($start, $end, $office);
        }

        $this->view->render('sold/period');
    }

    function create() {

        //работа с датой, чтобы красиво выглядела
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $time = date('h:i:s');
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0] . " " . $time;

        //if($_POST['quantity'] == null) { $_POST['quantity'] = 0; }

        //$name_good = $_POST['name_good'];
        //$quantity = ;

        $data = array();
        $data['date'] = $mysqldate;
        //$data['name_good'] = $name_good;
        $data['quantity'] = $_POST['quantity'];
        $data['shop'] = $_POST['shop'];
        $data['good_id'] = $_POST['good_id'];

        //@TODO: Do your error checking!

        $this->model->create($data);
        $this->view->getGood = $this->model->getGoodsList();

        //header('location: ' .URL . 'goods');
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'sold");
                </script>
                ';
    }

    function delete($id) {
        $this->model->delete($id);
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'sold");
                </script>
                ';
    }

    function edit($id) {
        //fetch the individual good
        $this->view->sold = $this->model->soldSingleList($id);
        $this->view->getGood = $this->model->getGoodsList();
        $this->view->render('sold/edit');
    }


    function editSave($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id_sold'] = $id;
        $data['date'] = $mysqldate;
        $data['good_id'] = $_POST['good_id'];
        $data['quantity'] = $_POST['quantity'];
        $data['shop'] = $_POST['shop'];

        $this->model->editSave($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'sold");
                </script>
                ';
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}