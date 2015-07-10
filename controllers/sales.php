<?php
class Sales extends Controller {

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
        $this->view->items = $this->model->items();
        $this->view->items2 = $this->model->items2();
        //$array1 = $this->model->items();
        //$array2 = $this->model->items();
        //$this->view->items = array_merge_recursive($array1, $array2);



        //-------------------------------------------------//
        //$this->view->salesList = $this->model->salesList();

        $this->view->depotSold = $this->model->depotSold();

        $this->view->depotBought = $this->model->depotBought();
        $this->view->relatesProducts = $this->model->relatesProducts();
        $this->view->goods = $this->model->goods();

        //how much cost store
        $this->view->howMuchCostStore = $this->model->howMuchCostStore();
        //sold total goods
        $this->view->soldTotalGoods = $this->model->soldTotalGoods();
        $this->view->render('sales/index');
    }


    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}