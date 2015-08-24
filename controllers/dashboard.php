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


        $this->view->revenue = $this->model->revenue();
        $this->view->expenditures = $this->model->expenditures();

        $this->view->earnedToday = $this->model->earnedToday();
        $this->view->earnedYesterday = $this->model->earnedYesterday();
        $this->view->debt = $this->model->debt();
        $this->view->debtOfficeOktabrskaya = $this->model->debtOfficeOktabrskaya();
        $this->view->debtOfficePavlaMochalova = $this->model->debtOfficePavlaMochalova();

        $bought = array();

        $this->view->bought = $this->model->bought($now, $previousWeek);
        $this->view->sold = $this->model->sold($now, $previousWeek);
        $this->view->render('dashboard/index');
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

    function revenue() {
        $revenueBottom = array();
        $revenueBottomAll = array();
        $revenue = $this->model->revenue();
        foreach ($revenue as $key=>$value):
            if($value['shop'] == BOTTOM_OFFICE):
                $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty'];
                $date = $value['date'];
//                $revenueBottomDate[$value['date']] = array($date, $revenue);

                //$revenueBottomDate['date'] = $value['date'];
                //$revenueBottomValue['revenue'] = $revenue;
                $revenueBottom = array("date" => $date, "revenue" => $revenue);
                array_push($revenueBottomAll, $revenueBottom);

                //echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($revenue, 2, ',', ' ').'руб. <br />';
            endif;
        endforeach;
        echo json_encode($revenueBottomAll);
    }

    function countDepot() {
        $this->model->indexPeriod();

        $this->model->related();

    }

    function logout() {
        Session::destroy();
        header('location: ../index');
        exit;
    }


}