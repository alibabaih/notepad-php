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
        if(Session::get('office') == TOP_OFFICE) {
            $office = TOP_OFFICE;
            $this->view->reportsShop = $this->model->reportsShop($office);
        } elseif (Session::get('office') == BOTTOM_OFFICE) {
            $office = BOTTOM_OFFICE;
            $this->view->reportsShop = $this->model->reportsShop($office);
        } elseif (Session::get('role') == ADMIN) {
            $this->view->reportsShop = $this->model->reportsShopAll();
        }
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
        $data['modified'] = $_POST['modified'];
        $data['created_by'] = $_POST['created_by'];
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

        $this->view->render('reports/period');
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

    function showMonthReports($id) {
        //fetch the individual good
        $this->view->reportsMonth = $this->model->reportsMonthList($id);
        $this->view->render('reports/month');
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
        $data['modified_by'] = $_POST['modified_by'];
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