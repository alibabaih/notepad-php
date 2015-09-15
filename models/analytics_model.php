<?php
class Analytics_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function goods($office = null) {
        if($office == null) {
            $sth = $this->db->prepare('SELECT * FROM goods');
            $sth->execute();
            return $sth->fetchAll();
        } else {
            if($office == TOP_OFFICE) {
                $sth = $this->db->prepare('SELECT SUM(quantity_august_Oktabrskaya*(isc_cost*'.EURO.')) AS sum FROM goods');
                $sth->execute();
                return $sth->fetchAll();
            } elseif($office == BOTTOM_OFFICE) {
                $sth = $this->db->prepare('SELECT SUM(quantity_august_Mochalova*(isc_cost*'.EURO.')) AS sum FROM goods');
                $sth->execute();
                return $sth->fetchAll();
            }
        }
    }

    function cashier_bank($end) {
        $data = array();
        $sth = $this->db->prepare('SELECT date, shop, account_cashier, account_balance, liwest_balance, id FROM reports WHERE shop = "'.TOP_OFFICE.'" AND date <= "'.$end.'" ORDER BY id DESC LIMIT 1;');
        $sth->execute();
        array_push($data,$sth->fetchAll(PDO::FETCH_ASSOC));
        $sth = $this->db->prepare('SELECT date, shop, account_cashier, account_balance, liwest_balance, id FROM reports WHERE shop = "'.BOTTOM_OFFICE.'" AND date <= "'.$end.'" ORDER BY id DESC LIMIT 1;');
        $sth->execute();
        array_push($data, $sth->fetchAll(PDO::FETCH_ASSOC));
        return $data;
    }

    function cashier($office = null, $end = null) {
        if($end == null && $office == null) {
            return '<p>Function has got zero parameters.</p>';
        } else {
            if($office == null) {
                //TODO: check one last record 2 offices: TOP_OFFICE and BOTTOM_OFFICE and multiple them. (ATTENTION: view uses all selected data!)
                $sth = $this->db->prepare('SELECT date, shop, account_cashier, account_balance, liwest_balance, id FROM reports WHERE shop = "'.$office.'" AND date <= "'.$end.'" ORDER BY id DESC LIMIT 1;');
                $sth->execute();
                return $sth->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sth = $this->db->prepare('SELECT date, shop, account_cashier, account_balance, liwest_balance, id FROM reports WHERE shop = "'.$office.'" AND date <= "'.$end.'" ORDER BY id DESC LIMIT 1;');
                $sth->execute();
                return $sth->fetchAll(PDO::FETCH_ASSOC);
            }
        }

    }

    function sumRelatedBoughtByMonth ($end = null, $office = null) {
        if($end == null && $office == null) {
            return '<p>Function has got zero parameters.</p>';
        } else {
            if($office == null) {
                $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related WHERE  date <= "'.$end.'"');
                $sth->execute();
                return $sth->fetchAll();
            } else {
                $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related WHERE  date <= "'.$end.'" AND shop = "'.$office.'"');
                $sth->execute();
                return $sth->fetchAll();
            }
        }
    }

    function sumRelatedSoldByMonth ($end = null, $office = null) {
        if($end == null && $office == null) {
            return '<p>Function has got zero parameters.<p>';
        } else {
            if ($office == null) {
                $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS related FROM reports WHERE date <= "'.$end.'"');
                $sth->execute();
                return $sth->fetchAll();
            } else {
                $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS related FROM reports WHERE date <= "'.$end.'" AND shop = "'.$office.'"');
                $sth->execute();
                return $sth->fetchAll();
            }
        }

    }

    function depotListByMonthBought($end = null, $office = null) {
        if($end == null && $office == null) {
            return '<p>Function has got zero parameters.<p>';
        } else {
            if ($office == null) {
                $sth = $this->db->prepare('SELECT SUM((goods.isc_cost*'.EURO.')* total_bought) AS bought
                    FROM (
                    SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought
                    WHERE bought.date >= "2015-08-01" AND bought.date <= "'.$end.'" GROUP BY bought.good_id
                    ) bought_alias
                    RIGHT JOIN goods ON goods.id = bought_alias.good_id
                    ORDER BY id;
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            } else {
                $sth = $this->db->prepare('SELECT SUM((goods.isc_cost*'.EURO.')* total_bought) AS bought
                    FROM (
                    SELECT SUM(bought.quantity) AS total_bought, bought.good_id FROM bought
                    WHERE bought.date >= "2015-08-01" AND bought.date <= "'.$end.'" AND bought.shop ="'.$office.'" GROUP BY bought.good_id
                    ) bought_alias
                    RIGHT JOIN goods ON goods.id = bought_alias.good_id
                    ORDER BY id;
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            }
        }
    }

    function depotListByMonthSold($end = null, $office = null) {
        if($end == null && $office == null) {
            return '<p>Function has got zero parameters.<p>';
        } else {
            if($office == null) {
                $sth = $this->db->prepare('SELECT SUM((goods.isc_cost*'.EURO.')* total_sold) AS sold
                    FROM (
                    SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold
                    WHERE sold.date >= "2015-08-01" AND sold.date <= "'.$end.'" GROUP BY sold.good_id
                    ) sold_alias
                    RIGHT JOIN goods ON goods.id = sold_alias.good_id
                    ORDER BY id;
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            } else {
                $sth = $this->db->prepare('SELECT SUM((goods.isc_cost*'.EURO.')* total_sold) AS sold
                    FROM (
                    SELECT SUM(sold.quantity) AS total_sold, sold.good_id FROM sold
                    WHERE sold.date >= "2015-08-01" AND sold.date <= "'.$end.'" AND sold.shop ="'.$office.'" GROUP BY sold.good_id
                    ) sold_alias
                    RIGHT JOIN goods ON goods.id = sold_alias.good_id
                    ORDER BY id;
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            }
        }
    }

    function analyticsList() {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE date >= "2015-08-01" ORDER BY date DESC ');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function analyticsListByMonth($start = null, $end = null, $office = null) {
        if($start == null && $end == null && $office == null){
            return '<p>Function has got zero parameters.<p>';
        } else {
            if( $office == null ) {
                $sth = $this->db->prepare('SELECT SUM(non_cash_payment) AS non_cash_payment,
                    SUM(cash_payment) AS cash_payment,
                    SUM(cash_bonus) AS cash_bonus,
                    SUM(services) AS services,
                    SUM(salary) AS salary,
                    SUM(purchases) AS purchases,
                    SUM(bonus) AS bonus,
                    SUM(expenses) AS expenses,
                    SUM(account_balance) AS account_balance,
                    SUM(account_cashier) AS account_cashier,
                    SUM(infusion) AS infusion,
                    SUM(dividends) AS dividends,
                    SUM(sold_in_debt) AS sold_in_debt,
                    SUM(returned_to_duty) AS returned_to_duty,
                    SUM(related_products) AS related_products,
                    SUM(unpaid_goods) AS unpaid_goods
                    FROM reports WHERE DATE >= "'.$start.'" AND DATE <= "'.$end.'"
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            } else {
                $sth = $this->db->prepare('SELECT SUM(non_cash_payment) AS non_cash_payment,
                    SUM(cash_payment) AS cash_payment,
                    SUM(cash_bonus) AS cash_bonus,
                    SUM(services) AS services,
                    SUM(salary) AS salary,
                    SUM(purchases) AS purchases,
                    SUM(bonus) AS bonus,
                    SUM(expenses) AS expenses,
                    SUM(account_balance) AS account_balance,
                    SUM(account_cashier) AS account_cashier,
                    SUM(infusion) AS infusion,
                    SUM(dividends) AS dividends,
                    SUM(sold_in_debt) AS sold_in_debt,
                    SUM(returned_to_duty) AS returned_to_duty,
                    SUM(related_products) AS related_products,
                    SUM(unpaid_goods) AS unpaid_goods
                  FROM reports WHERE DATE >= "'.$start.'" AND DATE <= "'.$end.'" AND shop = "'.$office.'"
                ');
                $sth->execute();
                return $sth->fetchAll(); //return into controller
            }
        }
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

    function analyticsListAugust () {
        $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related WHERE date <="2015-07-31"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function augustRelatedSold () {
        $sth = $this->db->prepare('SELECT SUM(reports.related_products) AS related FROM reports WHERE date <="2015-07-31"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function augustRelatedBought () {
        $sth = $this->db->prepare('SELECT SUM(related.related) AS related FROM related WHERE date <="2015-07-31"');
        $sth->execute();
        return $sth->fetchAll();
    }

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