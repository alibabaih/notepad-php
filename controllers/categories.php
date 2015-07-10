<?php
class Categories extends Controller {

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
        $this->view->categoriesList = $this->model->categoriesList();
        $this->view->render('categories/index');
    }

    function create() {
        $data = array();
        $data['category'] = $_POST['category'];
        $this->model->create($data);
        header('location: ' .URL . 'categories');
    }


    function delete($id) {
        $this->model->delete($id);
        header('location: ' .URL . 'categories');
    }

    function edit($id) {
        $this->view->category = $this->model->categorySingleList($id); //fetch the individual category
        //$this->view->getCategoryList = $this->model->getCategoryList();
        $this->view->render('categories/edit');
    }

    function editSave($id) {
        $data = array();
        $data['id_cat'] = $id;
        $data['category'] = $_POST['category'];

        $this->model->editSave($data);

        echo '
                <script type="text/javascript">
                    location.replace("' . URL . 'categories");
                </script>
                ';
    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}