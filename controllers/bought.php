<?php
class Bought extends Controller {

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
            $this->view->boughtList = $this->model->boughtList($office);
        } elseif (Session::get('office') == BOTTOM_OFFICE) {
            $office = BOTTOM_OFFICE;
            $this->view->boughtList = $this->model->boughtList($office);
        } elseif (Session::get('role') == ADMIN) {
            $this->view->boughtList = $this->model->boughtListAll();
        }
        //запрашиваем лист с good'ами
        $this->view->getGood = $this->model->getGoodsList();
        $this->view->render('bought/index');
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

        $this->view->render('bought/period');
    }

    function create() {

        //работа с датой, чтобы красиво выглядела
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $time = date('h:i:s');
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0] . " " . $time;


        $data = array();
        $data['date'] = $mysqldate;
        $data['quantity'] = $_POST['quantity'];
        $data['shop'] = $_POST['shop'];
        $data['good_id'] = $_POST['good_id'];

        //@TODO: Do your error checking!

        $this->model->create($data);
        //$this->view->getGood = $this->model->getGoodsList();
        //header('location: ' .URL . 'goods');
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought");
                </script>
                ';
    }

    function delete($id) {
        $this->model->delete($id);
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought");
                </script>
                ';
    }

    function edit($id) {
        //fetch the individual good
        $this->view->bought = $this->model->boughtSingleList($id);
        $this->view->getGood = $this->model->getGoodsList();
        $this->view->render('bought/edit');
    }


    function editSave($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id_bought'] = $id;
        $data['date'] = $mysqldate;
        $data['good_id'] = $_POST['good_id'];
        $data['quantity'] = $_POST['quantity'];
        $data['shop'] = $_POST['shop'];

        $this->model->editSave($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought");
                </script>
                ';
    }

    function related() {
        $this->view->relatedShopOktabrskaya = $this->model->relatedShopOktabrskaya();
        $this->view->relatedShopPavlaMochalova = $this->model->relatedShopPavlaMochalova();
        $this->view->render('bought/related');
    }

    function createRelated() {

        //работа с датой, чтобы красиво выглядела
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        if($_POST['related'] == null) { $_POST['related'] = 0; }
        if($_POST['points'] == null) { $_POST['points'] = 0; }

        $data = array();
        $data['date'] = $mysqldate;
        $data['related'] = $_POST['related'];
        $data['points'] = $_POST['points'];
        $data['shop'] = $_POST['shop'];


        $this->model->createRelated($data);
        //$this->view->getGood = $this->model->getGoodsList();
        //header('location: ' .URL . 'goods');
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought/related");
                </script>
                ';
    }

    function deleteRelated($id) {
        $this->model->deleteRelated($id);
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought/related");
                </script>
                ';
    }

    function editRelated($id) {
        //fetch the individual good
        $this->view->boughtRelated = $this->model->boughtRelatedSingleList($id);
        $this->view->render('bought/editRelated');
    }


    function editSaveRelated($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id'] = $id;
        $data['date'] = $mysqldate;
        $data['related'] = $_POST['related'];
        $data['points'] = $_POST['points'];
        $data['shop'] = $_POST['shop'];

        $this->model->editSaveRelated($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'bought/related");
                </script>
                ';
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}