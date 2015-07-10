<?php
class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function earnedToday() {
        //$sth = $this->db->prepare('SELECT * FROM  sold INNER JOIN goods  WHERE sold.good_id = goods.id AND DATE = CURDATE()');
        $sth = $this->db->prepare('SELECT non_cash_payment, cash_payment, infusion FROM  reports WHERE DATE = CURDATE()');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function earnedYesterday() {
        $sth = $this->db->prepare('SELECT non_cash_payment, cash_payment, infusion FROM  reports WHERE DATE = (CURDATE() - 1)');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function debt() {
        $sth = $this->db->prepare('SELECT sold_in_debt, returned_to_duty FROM reports');
        $sth->execute();
        return $sth->fetchAll();
    }

    function debtOfficeOktabrskaya() {
        $sth = $this->db->prepare('SELECT sold_in_debt, returned_to_duty FROM reports WHERE shop = "Октябрьская"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function debtOfficePavlaMochalova() {
        $sth = $this->db->prepare('SELECT sold_in_debt, returned_to_duty FROM reports WHERE shop = "Павла Мочалова"');
        $sth->execute();
        return $sth->fetchAll();
    }

}