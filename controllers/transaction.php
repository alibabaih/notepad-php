<?php
class Transaction extends Controller {

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
        $this->view->transactionList = $this->model->transactionList();

        $this->view->transactionRelatedList = $this->model->transactionRelatedList();

        //Вывод выпадающего списка с товарами
        $this->view->goodList = $this->model->goodList();

        //запрашиваем лист с good'ами
        $this->view->getGood = $this->model->getGoodsList();

        $this->view->render('transaction/index');
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
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $time = date('h:i:s');
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0] . " " . $time;

        $data = array();
        $data['date'] = $mysqldate;
        $data['quantity'] = $_POST['quantity'];
        $data['items_were_send_to'] = $_POST['items_were_send_to'];
        $data['items_were_send_from'] = $_POST['items_were_send_from'];
        $data['good_id'] = $_POST['good_id'];
        $this->model->create($data);
        $this->view->getGood = $this->model->getGoodsList();
        header('location: ' .URL . 'transaction');
    }

    function createRelated() {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $time = date('h:i:s');
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0] . " " . $time;

        $data = array();
        $data['date'] = $mysqldate;
        $data['sum'] = $_POST['sum'];
        $data['items_were_send_to'] = $_POST['items_were_send_to'];
        $data['items_were_send_from'] = $_POST['items_were_send_from'];
        $this->model->createRelated($data);
        header('location: ' .URL . 'transaction');
    }

    function delete($id) {
        $this->model->delete($id);
        header('location: ' .URL . 'transaction');
    }

    function deleteRelated($id) {
        $this->model->deleteRelated($id);
        header('location: ' .URL . 'transaction');
    }

    function edit($id) {
        //fetch the individual good
        $this->view->transaction = $this->model->transactionSingleList($id);
        $this->view->getGood = $this->model->getGoodsList();
        $this->view->render('transaction/edit');
    }

    function editRelated($id) {
        $this->view->transaction = $this->model->transactionSingleRelatedList($id);
        $this->view->render('transaction/editRelated');
    }


    function editSave($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id'] = $id;
        $data['date'] = $mysqldate;
        $data['good_id'] = $_POST['good_id'];
        $data['quantity'] = $_POST['quantity'];
        $data['items_were_send_to'] = $_POST['items_were_send_to'];
        $data['items_were_send_from'] = $_POST['items_were_send_from'];

        $this->model->editSave($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'transaction");
                </script>
                ';
    }

    function editSaveRelated($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id'] = $id;
        $data['date'] = $mysqldate;
        $data['sum'] = $_POST['sum'];
        $data['items_were_send_to'] = $_POST['items_were_send_to'];
        $data['items_were_send_from'] = $_POST['items_were_send_from'];

        $this->model->editSaveRelated($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'transaction");
                </script>
                ';
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}