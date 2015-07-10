<?php
class Reports extends Controller {

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
        $this->view->reportsShopPavlaMochalova = $this->model->reportsShopPavlaMochalova();
        $this->view->reportsShopOktabrskaya = $this->model->reportsShopOktabrskaya();
        $this->view->render('reports/index');
    }


    function create() {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        if($_POST['non_cash_payment'] == null) { $_POST['non_cash_payment'] = 0; }
        if($_POST['cash_payment'] == null) { $_POST['cash_payment'] = 0; }
        if($_POST['cash_bonus'] == null) { $_POST['cash_bonus'] = 0; }
        if($_POST['services'] == null) { $_POST['services'] = 0; }
        if($_POST['salary'] == null) { $_POST['salary'] = 0; }
        if($_POST['purchases'] == null) { $_POST['purchases'] = 0; }
        if($_POST['bonus'] == null) { $_POST['bonus'] = 0; }
        if($_POST['expenses'] == null) { $_POST['expenses'] = 0; }
        if($_POST['account_balance'] == null) { $_POST['account_balance'] = 0; }
        if($_POST['account_cashier'] == null) { $_POST['account_cashier'] = 0; }
        if($_POST['infusion'] == null) { $_POST['infusion'] = 0; }
        if($_POST['dividends'] == null) { $_POST['dividends'] = 0; }
        if($_POST['comment'] == null) { $_POST['comment'] = 0; }
        if($_POST['sold_in_debt'] == null) { $_POST['sold_in_debt'] = 0; }
        if($_POST['returned_to_duty'] == null) { $_POST['returned_to_duty'] = 0; }
        if($_POST['related_products'] == null) { $_POST['related_products'] = 0; }
        if($_POST['unpaid_goods'] == null) { $_POST['unpaid_goods'] = 0; }

        $data = array();
        $data['shop'] = $_POST['shop'];
        $data['date'] = $mysqldate;
        $data['non_cash_payment'] = $_POST['non_cash_payment'];
        $data['cash_payment'] = $_POST['cash_payment'];
        $data['cash_bonus'] = $_POST['cash_bonus'];
        $data['services'] = $_POST['services'];
        $data['salary'] = $_POST['salary'];
        $data['purchases'] = $_POST['purchases'];
        $data['bonus'] = $_POST['bonus'];
        $data['expenses'] = $_POST['expenses'];
        $data['account_balance'] = $_POST['account_balance'];
        $data['account_cashier'] = $_POST['account_cashier'];
        $data['infusion'] = $_POST['infusion'];
        $data['dividends'] = $_POST['dividends'];
        $data['comment'] = $_POST['comment'];
        $data['sold_in_debt'] = $_POST['sold_in_debt'];
        $data['returned_to_duty'] = $_POST['returned_to_duty'];
        $data['related_products'] = $_POST['related_products'];
        $data['unpaid_goods'] = $_POST['unpaid_goods'];


        //@TODO: Do your error checking!

        $this->model->create($data);
        //header('location: ' .URL . 'goods');
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'reports");
                </script>
                ';
    }

    function delete($id) {
        $this->model->delete($id);
        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'reports");
                </script>
                ';
    }

    function edit($id) {
        //fetch the individual good
        $this->view->report = $this->model->reportSingleList($id);
        $this->view->render('reports/edit');
    }



    function editSave($id) {
        $dateGet = $_POST['date']; //04.02.15
        $pieces = explode(".", $dateGet);
        $mysqldate = '20' . $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $data = array();
        $data['id'] = $id;
        $data['shop'] = $_POST['shop'];
        $data['date'] = $mysqldate;
        $data['non_cash_payment'] = $_POST['non_cash_payment'];
        $data['cash_payment'] = $_POST['cash_payment'];
        $data['cash_bonus'] = $_POST['cash_bonus'];
        $data['services'] = $_POST['services'];
        $data['salary'] = $_POST['salary'];
        $data['purchases'] = $_POST['purchases'];
        $data['bonus'] = $_POST['bonus'];
        $data['expenses'] = $_POST['expenses'];
        $data['account_balance'] = $_POST['account_balance'];
        $data['account_cashier'] = $_POST['account_cashier'];
        $data['infusion'] = $_POST['infusion'];
        $data['dividends'] = $_POST['dividends'];
        $data['comment'] = $_POST['comment'];
        $data['sold_in_debt'] = $_POST['sold_in_debt'];
        $data['returned_to_duty'] = $_POST['returned_to_duty'];
        $data['related_products'] = $_POST['related_products'];
        $data['unpaid_goods'] = $_POST['unpaid_goods'];

        $this->model->editSave($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'reports");
                </script>
                ';
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}