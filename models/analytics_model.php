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

    function cashier($office) {
        $sth = $this->db->prepare('SELECT date, shop, account_cashier
          FROM reports WHERE shop = "'.$office.'" AND date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function analyticsList() {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE date >= "2015-08-01" ORDER BY date DESC ');
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
                                    WHERE sold.good_id = goods.id
                                    AND date >= "2015-08-01"'
        );
        $sth->execute();
        return $sth->fetchAll();
    }

    function depotBought() {
        $sth = $this->db->prepare('SELECT *  FROM  bought
                                    INNER JOIN goods
                                    WHERE bought.good_id = goods.id
                                    AND date >= "2015-08-01"'
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

//    the price of the depot on start of the August
    function augustRelatedBought () {
        $sth = $this->db->prepare('SELECT SUM(related.related) FROM related WHERE date <="2015-08-01"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function augustRelatedSold () {
        $sth = $this->db->prepare('SELECT SUM(reports.related_products) FROM reports WHERE date <="2015-08-01"');
        $sth->execute();
        return $sth->fetchAll();
    }

}