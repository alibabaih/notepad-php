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

    function relatesProductsd($date) {
        $sth = $this->db->prepare('SELECT * FROM related WHERE date = "'.$date.'"');
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

    //    the price of the related on start of the August
    function augustRelatedBought () {
        $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related WHERE date <="2015-07-31"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function augustRelatedSold () {
        $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS related FROM reports WHERE date <="2015-07-31"');
        $sth->execute();
        return $sth->fetchAll();
    }

    //    the price of the related on start of the online
    function sumRelatedBought () {
        $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related');
        $sth->execute();
        return $sth->fetchAll();
    }

    function sumRelatedSold () {
        $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS related FROM reports');
        $sth->execute();
        return $sth->fetchAll();
    }

    //    the price of the related on start of the online
    function sumLiwestBought () {
        $sth = $this->db->prepare('
            SELECT   goods.isc_cost,  total_bought
            FROM (
            SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "2015-08-01" GROUP BY bought.good_id
            ) bought_alias
            RIGHT JOIN goods ON goods.id = bought_alias.good_id
            ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll();
    }

    function sumLiwestSold () {
        $sth = $this->db->prepare('SELECT   goods.isc_cost,  total_sold
            FROM (
            SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.date >= "2015-08-01" GROUP BY sold.good_id
            ) sold_alias
            RIGHT JOIN goods ON goods.id = sold_alias.good_id
            ORDER BY id'
        );
        $sth->execute();
        return $sth->fetchAll();
    }
}