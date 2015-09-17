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
        $now = date('Y-m-d',strtotime("now"));
        $previousWeek = date('Y-m-d',strtotime("-1 week"));
//        $data = $this->model->notes();
//        for($i = 1; $i <= 12; $i++) {
//
//        }

        $this->view->notes = $this->model->notes();
        $this->view->render('dashboard/index');
    }

    function add() {
        $this->view->render('dashboard/add');
    }

    function create() {
        $data = array();
        $data['time'] = $_POST['time'];
        $data['place'] = $_POST['place'];
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['record'] = $_POST['record'];
        $this->model->create($data);
        header('location: '.URL.'dashboard');
    }

    function delete($id) {
        $this->model->delete($id);
        header('location: ' .URL . 'dashboard');
    }

    function edit($id) {
        $this->view->note = $this->model->note($id); //id, notes, note
        $this->view->render('dashboard/edit');
    }

    function update($id) {
        $data = array();
        $data['id'] = $id;
        $data['time'] = $_POST['time'];
        $data['place'] = $_POST['place'];
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['record'] = $_POST['record'];
        $this->model->save($data);
        header('location: ' .URL . 'dashboard');
    }

    function ajax() {
        $example = $this->model->ajax();
        echo json_encode($example);
//        foreach ($example as $key=>$value) {
//            echo $value['name'] . '' . $value['point'] . '<br />';
//        }
        //$example = 'example etye';
        //print_r($example);
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}