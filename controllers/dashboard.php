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
        $month = 9;
        $this->view->notesSeptember = $this->model->notesByMonth($month);

        $this->view->notes = $this->model->notes();
        $data = $this->model->notes();

        $dates8 = array();
        $dates9 = array();
        $dates10 = array();
        $dates11 = array();
        $dates12 = array();
        for($i = 0; $i < sizeof($data); $i++) {
            if(!empty($data[$i])) {
                $month = DateTime::createFromFormat('Y-m-d', $data[$i][date]);
                $format_month = $month->format('n');
                $format_day = $month->format('j');
                switch ($format_month) {
                    case 8:
                        array_push($dates8, $data[$i]);
                        $this->view->month8 = $dates8;
                        break;
                    case 9:
                        array_push($dates9, $data[$i]);
                        $this->view->month9 = $dates9;
                        break;
                    case 10:
                        array_push($dates10, $data[$i]);
                        $this->view->month10 = $dates10;
                        break;
                    case 11:
                        array_push($dates11, $data[$i]);
                        $this->view->month11 = $dates11;
                        break;
                    case 12:
                        array_push($dates12, $data[$i]);
                        $this->view->month12 = $dates12;
                        break;
                }
            }
        }
        $this->view->render('dashboard/index');
    }

    function test() {
        $this->view->render('dashboard/test');
    }

    function index2() {
        $this->view->notes = $this->model->notes();
        $data = $this->model->notes();

        $dates8 = array();
        $dates9 = array();
        $dates10 = array();
        $dates11 = array();
        $dates12 = array();
        for($i = 0; $i < sizeof($data); $i++) {
            if(!empty($data[$i])) {
                $month = DateTime::createFromFormat('Y-m-d', $data[$i][date]);
                $format_month = $month->format('n');
                $format_day = $month->format('j');
                switch ($format_month) {
                    case 8:
                        array_push($dates8, $data[$i]);
                        $this->view->month8 = $dates8;
                        break;
                    case 9:
                        array_push($dates9, $data[$i]);
                        $this->view->month9 = $dates9;
                        break;
                    case 10:
                        array_push($dates10, $data[$i]);
                        $this->view->month10 = $dates10;
                        break;
                    case 11:
                        array_push($dates11, $data[$i]);
                        $this->view->month11 = $dates11;
                        break;
                    case 12:
                        array_push($dates12, $data[$i]);
                        $this->view->month12 = $dates12;
                        break;
                }
            }
        }
        $this->view->render('dashboard/index2');
    }

    function add() {
        $this->view->render('dashboard/add');
    }

    function create() {
        //2015-09-16
        //12:39:18
        $time = $_POST['time'] . ':'.'00';
        $data = array();
        $data['date'] = $_POST['date'];
        $data['time'] = $time;
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
        $time = $_POST['time'] . ':'.'00';
        $data = array();
        $data['id'] = $id;
        $data['date'] = $_POST['date'];
        $data['time'] = $time;
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