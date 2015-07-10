<?php
class Analytics extends Controller {

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
        $this->view->analyticsList = $this->model->analyticsList();
        //$months = array(1,2,3,4,5,6,7,8,9,10,11,12);
        $start = "2015-04-01";
        $end = "2015-04-30";
        $this->view->analyticsListApril = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-05-01";
        $end = "2015-05-31";
        $this->view->analyticsListMay = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-06-01";
        $end = "2015-06-30";
        $this->view->analyticsListJune = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-07-01";
        $end = "2015-07-31";
        $this->view->analyticsListJuly = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-08-01";
        $end = "2015-08-31";
        $this->view->analyticsListAugust = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-09-01";
        $end = "2015-09-30";
        $this->view->analyticsListSeptember = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-10-01";
        $end = "2015-10-31";
        $this->view->analyticsListOctober = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-11-01";
        $end = "2015-11-30";
        $this->view->analyticsListNovember = $this->model->analyticsListByMonth($start, $end);
        $start = "2015-12-01";
        $end = "2015-12-31";
        $this->view->analyticsListDecember = $this->model->analyticsListByMonth($start, $end);


        $this->view->depotSold = $this->model->depotSold();
        $this->view->depotBought = $this->model->depotBought();
        $this->view->relatesProducts = $this->model->relatesProducts();
        $this->view->goods = $this->model->goods();

        //how much cost store
        $this->view->howMuchCostStore = $this->model->howMuchCostStore();
        //sold total goods
        $this->view->soldTotalGoods = $this->model->soldTotalGoods();
        $this->view->render('analytics/index');
    }


    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}