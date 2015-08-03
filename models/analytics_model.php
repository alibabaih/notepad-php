<?php
class Analytics_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function goods() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function cashier() {
        $sth = $this->db->prepare('SELECT account_cashier FROM reports WHERE DATE = CURDATE()');
        $sth->execute();
        return $sth->fetchAll();
    }

    function analyticsList() {
        $sth = $this->db->prepare('SELECT * FROM reports');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function analyticsListByMonth($start, $end) {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE DATE >= "'.$start.'" AND DATE <= "'.$end.'"');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function relatesProducts() {
        $sth = $this->db->prepare('SELECT * FROM related');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function depotSold() {
        $sth = $this->db->prepare('SELECT *  FROM  sold
                                    INNER JOIN goods
                                    WHERE sold.good_id = goods.id'
        );
        $sth->execute();
        return $sth->fetchAll();
    }

    function depotBought() {
        $sth = $this->db->prepare('SELECT *  FROM  bought
                                    INNER JOIN goods
                                    WHERE bought.good_id = goods.id'
        );
        $sth->execute();
        return $sth->fetchAll();
    }

    function howMuchCostStore() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll();
    }

    function soldTotalGoods() {
        $sth = $this->db->prepare('SELECT * FROM goods, sold WHERE goods.id = sold.good_id;');
        $sth->execute();
        return $sth->fetchAll();
    }

    function goodSingleList($id) {
        $sth = $this->db->prepare('SELECT id, name FROM goods WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

}