<?php
class Dashboard extends Controller {

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
        $this->view->earnedToday = $this->model->earnedToday();
        $this->view->earnedYesterday = $this->model->earnedYesterday();
        $this->view->debt = $this->model->debt();
        $this->view->debtOfficeOktabrskaya = $this->model->debtOfficeOktabrskaya();
        $this->view->debtOfficePavlaMochalova = $this->model->debtOfficePavlaMochalova();
        $this->view->render('dashboard/index');
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}