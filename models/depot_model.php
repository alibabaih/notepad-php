<?php
class Depot_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function items() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_first_Mochalova, goods.quantity_first_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold WHERE sold.shop = "Павла Мочалова" GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function items2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_first_Mochalova, goods.quantity_first_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought WHERE bought.shop = "Павла Мочалова" GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova1() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_first_Mochalova, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold
                WHERE sold.shop = '. BOTTOM_OFFICE .' GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function mochalova2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_first_Mochalova, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought
                WHERE bought.shop = '. BOTTOM_OFFICE .' GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya1() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.quantity_first_Oktabrskaya, goods.name, total_sold
                FROM (
                SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold
                WHERE sold.shop = '. TOP_OFFICE .' GROUP BY sold.good_id
                ) sold_alias
                RIGHT JOIN goods ON goods.id = sold_alias.good_id
                ORDER BY id;
        ');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function oktabrskaya2() {
        $sth = $this->db->prepare('
                SELECT goods.id, goods.isc_cost, goods.quantity_first_Oktabrskaya, goods.name, total_bought
                FROM (
                SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought
                WHERE bought.shop = '. TOP_OFFICE .' GROUP BY bought.good_id
                ) bought_alias
                RIGHT JOIN goods ON goods.id = bought_alias.good_id
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