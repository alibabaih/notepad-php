<?php
class Depot_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function boughtRelatedItems() {
        $sth = $this->db->prepare('
            SELECT SUM(related.related) AS bought FROM related;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function soldRelatedItems() {
        $sth = $this->db->prepare('
            SELECT SUM(reports.related_products) AS sold FROM reports;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function items() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.date >= "2015-08-01" GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function items2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_august_Mochalova, goods.quantity_august_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "2015-08-01" GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova1() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.date >= "2015-08-01"
                AND sold.shop = "'. BOTTOM_OFFICE .'" GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_august_Mochalova, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "2015-08-01"
                AND bought.shop = "'. BOTTOM_OFFICE .'" GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova3itemsWereMovedToOktabrskaya() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.name, total_moved
                FROM (
                SELECT SUM(transactions.quantity) AS total_moved, transactions.good_id FROM transactions WHERE transactions.date >= "2015-08-01"
                AND transactions.items_were_send_from = "'. BOTTOM_OFFICE .'" GROUP BY transactions.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova3itemsWereTakenFromOktabrskaya() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Mochalova, goods.name, total_taken
                FROM (
                SELECT SUM(transactions.quantity) AS total_taken, transactions.good_id FROM transactions WHERE transactions.date >= "2015-08-01"
                AND transactions.items_were_send_to = "'. BOTTOM_OFFICE .'" GROUP BY transactions.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya1() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.date >= "2015-08-01"
                AND sold.shop = "'. TOP_OFFICE .'" GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_august_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.date >= "2015-08-01"
                AND bought.shop = "'. TOP_OFFICE .'" GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya3itemsWereMovedToMochalova() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Oktabrskaya, goods.name, total_moved
                FROM (
                SELECT SUM(transactions.quantity) AS total_moved, transactions.good_id FROM transactions WHERE transactions.date >= "2015-08-01"
                AND transactions.items_were_send_from = "'. TOP_OFFICE .'" GROUP BY transactions.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya3itemsWereTakenFromMochalova() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_august_Oktabrskaya, goods.name, total_taken
                FROM (
                SELECT SUM(transactions.quantity) AS total_taken, transactions.good_id FROM transactions WHERE transactions.date >= "2015-08-01"
                AND transactions.items_were_send_to = "'. TOP_OFFICE .'" GROUP BY transactions.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }




    function goods() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function salesList() {
        $sth = $this->db->prepare('SELECT id, name FROM goods');
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

}