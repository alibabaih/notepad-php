<?php
class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }


    function ajax() {
        $sth = $this->db->prepare('SELECT date, account_cashier  FROM reports WHERE date >= (NOW() - INTERVAL 22 DAY);');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
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
        $sth = $this->db->prepare('SELECT SUM(sold_in_debt) AS loan, SUM(returned_to_duty) AS deposit FROM reports');
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

    function revenue() {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE date >= (NOW() - INTERVAL 22 DAY) ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function expenditures() {
        $sth = $this->db->prepare('SELECT * FROM reports ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function bought($now, $previousWeek) {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "'.$previousWeek.'" AND bought.date <= "'.$now.'"
                GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function sold($now, $previousWeek) {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE bought.date >= "'.$previousWeek.'" AND bought.date <= "'.$now.'"
                GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function related($date) {
        $sth = $this->db->prepare('SELECT SUM(related.related) AS reserve FROM related WHERE related.date <= "'. $date .'"');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC); //return into controller
    }

    function relatedSold($date) {
        $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS sold_reserve FROM reports WHERE related.date <= "'. $date .'"');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC); //return into controller
    }

    function items($date) {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.date >= "2015-08-01" AND sold.date <= "'.$date.'" GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function items2($date) {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "2015-08-01" AND bought.date <= "'.$date.'" GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}