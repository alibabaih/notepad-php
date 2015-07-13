<?php
class Depot extends Controller {

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
        $this->view->depotSold = $this->model->depotSold();
        $this->view->depotBought = $this->model->depotBought();
        $this->view->relatesProducts = $this->model->relatesProducts();
        $this->view->goods = $this->model->goods();
        $this->view->howMuchCostStore = $this->model->howMuchCostStore();//how much cost store
        $this->view->soldTotalGoods = $this->model->soldTotalGoods();//sold total goods
        $this->view->render('depot/index');
    }

    function mochalova() {
        $this->view->items = $this->model->mochalova1();
        $this->view->items2 = $this->model->mochalova2();
        $this->view->render('depot/mochalova');
    }

    function oktabrskaya() {
        $this->view->items = $this->model->oktabrskaya1();
        $this->view->items2 = $this->model->oktabrskaya2();
        $this->view->render('depot/oktabrskaya');
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}