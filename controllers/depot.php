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
        $this->view->render('depot/index');
    }

    function mochalova() {
        $this->view->mochalova1 = $this->model->mochalova1();
        $this->view->mochalova2 = $this->model->mochalova2();
        $this->view->mochalova3itemsWereMovedToOktabrskaya = $this->model->mochalova3itemsWereMovedToOktabrskaya();
        $this->view->mochalova3itemsWereTakenFromOktabrskaya = $this->model->mochalova3itemsWereTakenFromOktabrskaya();
        $this->view->render('depot/mochalova');
    }

    function oktabrskaya() {
        $this->view->oktabrskaya1 = $this->model->oktabrskaya1();
        $this->view->oktabrskaya2 = $this->model->oktabrskaya2();
        $this->view->oktabrskaya3itemsWereMovedToMochalova = $this->model->oktabrskaya3itemsWereMovedToMochalova();
        $this->view->oktabrskaya3itemsWereTakenFromMochalova = $this->model->oktabrskaya3itemsWereTakenFromMochalova();
        $this->view->render('depot/oktabrskaya');
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }

}