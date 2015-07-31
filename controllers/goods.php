<?php
class Goods extends Controller {

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

        $this->view->goodsList = $this->model->goodsList();
        $this->view->goodsListWithoutCategory = $this->model->goodsListWithoutCategory();

        $this->view->getCategoryList = $this->model->getCategoryList();
        $this->view->render('goods/index');
    }



    function create() {
        $data = array();
        $data['name'] = $_POST['name'];
        $data['category_id'] = $_POST['category_id'];
        $data['point'] = $_POST['point'];
        $data['purches_cost'] = $_POST['purches_cost'];
        $data['isc_cost'] = $_POST['isc_cost'];
        $data['distributor_ye_cost'] = $_POST['distributor_ye_cost'];
        $data['distributor_rub_cost'] = $_POST['distributor_rub_cost'];
        $data['customer_ye_cost'] = $_POST['customer_ye_cost'];
        $data['customer_rub_cost'] = $_POST['customer_rub_cost'];
        //@TODO: Do your error checking!

        $this->model->create($data);
        header('location: ' .URL . 'goods');
    }


    function delete($id) {
        $this->model->delete($id);
        header('location: ' .URL . 'goods');
    }

    function edit($id) {
        //fetch the individual good
        $this->view->good = $this->model->goodSingleList($id);
        $this->view->getCategoryList = $this->model->getCategoryList();
        $this->view->render('goods/edit');
    }

    function editSave($id) {
        $data = array();
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['quantity_august_Mochalova'] = $_POST['quantity_august_Mochalova'];
        $data['quantity_august_Oktabrskaya'] = $_POST['quantity_august_Oktabrskaya'];
        $data['category_id'] = $_POST['category_id'];
        $data['point'] = $_POST['point'];
        $data['purches_cost'] = $_POST['purches_cost'];
        $data['isc_cost'] = $_POST['isc_cost'];
        $data['distributor_ye_cost'] = $_POST['distributor_ye_cost'];
        $data['distributor_rub_cost'] = $_POST['distributor_rub_cost'];
        $data['customer_ye_cost'] = $_POST['customer_ye_cost'];
        $data['customer_rub_cost'] = $_POST['customer_rub_cost'];
        $this->model->editSave($data);
        header('location: ' .URL . 'goods');
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}