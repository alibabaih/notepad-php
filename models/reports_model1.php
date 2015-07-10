<?php
class Reports_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function reportsShopOktabrskaya() {
        date('Y-m-d');
        $sth = $this->db->prepare('SELECT *
          FROM reports
          WHERE shop = "Октябрьская"
          AND date_format(date, \'%Y%m\') = date_format(now(), \'%Y%m\');
        ');
        $sth->execute();
        return $sth->fetchAll();
    }

    function reportsShopPavlaMochalova() {
        date('Y-m-d');
        $sth = $this->db->prepare('SELECT *
            FROM reports
            WHERE shop = "Павла Мочалова"
            AND date_format(date, \'%Y%m\') = date_format(now(), \'%Y%m\');
        ');
        $sth->execute();
        return $sth->fetchAll();
    }


    function reportSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetchAll();
    }

    public function create($data) {
        $sth = $this->db->prepare('
          INSERT INTO reports (shop, date, non_cash_payment, cash_payment, cash_bonus, services, salary, purchases, bonus,
          expenses, account_balance,
          account_cashier, infusion, dividends,
          comment,
          sold_in_debt,
          returned_to_duty,
          related_products,
          unpaid_goods)
          VALUES (:shop,
          :date,
          :non_cash_payment,
          :cash_payment,
          :cash_bonus,
          :services, :salary,
          :purchases, :bonus, :expenses, :account_balance,
          :account_cashier, :infusion, :dividends,
          :comment,
          :sold_in_debt,
          :returned_to_duty,
          :related_products,
          :unpaid_goods)
        ');

        $sth->execute(array(
            ':shop' => $data['shop'],
            ':date' => $data['date'],
            ':non_cash_payment' => $data['non_cash_payment'],
            ':cash_payment' => $data['cash_payment'],
            ':cash_bonus' => $data['cash_bonus'],
            ':services' => $data['services'],
            ':salary' => $data['salary'],
            ':purchases' => $data['purchases'],
            ':bonus' => $data['bonus'],
            ':expenses' => $data['expenses'],
            ':account_balance' => $data['account_balance'],
            ':account_cashier' => $data['account_cashier'],
            ':infusion' => $data['infusion'],
            ':dividends' => $data['dividends'],
            ':comment' => $data['comment'],
            ':sold_in_debt' => $data['sold_in_debt'],
            ':returned_to_duty' => $data['returned_to_duty'],
            ':related_products' => $data['related_products'],
            ':unpaid_goods' => $data['unpaid_goods'],
        ));


    }

    public function editSave($data) {
        $sth = $this->db->prepare('UPDATE reports
          SET shop = :shop,
              date = :date,
              non_cash_payment = :non_cash_payment,
              cash_payment = :cash_payment,
              cash_bonus = :cash_bonus,
              services = :services,
              salary = :salary,
              purchases = :purchases,
              bonus = :bonus,
              expenses = :expenses,
              account_balance = :account_balance,
              account_cashier = :account_cashier,
              infusion = :infusion,
              dividends = :dividends,
              comment = :comment,
              sold_in_debt = :sold_in_debt,
              returned_to_duty = :returned_to_duty,
              related_products = :related_products,
              unpaid_goods = :unpaid_goods
          WHERE id = :id
        ');
        $sth->execute(array(
            ':id' => $data['id'],
            ':shop' => $data['shop'],
            ':date' => $data['date'],
            ':non_cash_payment' => $data['non_cash_payment'],
            ':cash_payment' => $data['cash_payment'],
            ':cash_bonus' => $data['cash_bonus'],
            ':services' => $data['services'],
            ':salary' => $data['salary'],
            ':purchases' => $data['purchases'],
            ':bonus' => $data['bonus'],
            ':expenses' => $data['expenses'],
            ':account_balance' => $data['account_balance'],
            ':account_cashier' => $data['account_cashier'],
            ':infusion' => $data['infusion'],
            ':dividends' => $data['dividends'],
            ':comment' => $data['comment'],
            ':sold_in_debt' => $data['sold_in_debt'],
            ':returned_to_duty' => $data['returned_to_duty'],
            ':related_products' => $data['related_products'],
            ':unpaid_goods' => $data['unpaid_goods'],
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from reports WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

}