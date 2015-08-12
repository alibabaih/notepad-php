<?php
class Reports_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function reportsShop($office) {
        date('Y-m-d');
        $sth = $this->db->prepare('SELECT *
          FROM reports
          WHERE shop = "'.$office.'"
          AND date_format(date, \'%Y%m\') = date_format(now(), \'%Y%m\')
          ORDER BY date DESC
        ');
        $sth->execute();
        return $sth->fetchAll();
    }

    function reportsShopAll() {
        date('Y-m-d');
        $sth = $this->db->prepare('SELECT *
            FROM reports
            WHERE date_format(date, \'%Y%m\') = date_format(now(), \'%Y%m\')
            ORDER BY date DESC
        ');
        $sth->execute();
        return $sth->fetchAll();
    }

    function period($start, $end, $office) {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE DATE >= "'.$start.'" AND DATE <= "'.$end.'" AND shop = "'.$office.'"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function periodAll($start, $end) {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE DATE >= "'.$start.'" AND DATE <= "'.$end.'"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function reportsMonthList($id) {
        date('Y-m-d');
        $id = 'WHERE date_format(date, \'%Y%m\') = date_format(now(), \'%Y%m\');';
        $sth = $this->db->prepare('SELECT * FROM reports' . $id);

        $sth->execute();
        return $sth->fetchAll();
    }

    function reportSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM reports WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function create($data) {
        $sth = $this->db->prepare('
          INSERT INTO reports (shop, date, non_cash_payment, cash_payment, cash_bonus, services, salary, purchases, bonus,
          expenses, account_balance,
          account_cashier, infusion, dividends,
          comment,
          modified,
          created_by,
          sold_in_debt,
          returned_to_duty,
          related_products,
          unpaid_goods,
          liwest_balance)
          VALUES (:shop,
          :date,
          :non_cash_payment,
          :cash_payment,
          :cash_bonus,
          :services, :salary,
          :purchases, :bonus, :expenses, :account_balance,
          :account_cashier, :infusion, :dividends,
          :comment,
          :modified,
          :created_by,
          :sold_in_debt,
          :returned_to_duty,
          :related_products,
          :unpaid_goods,
          :liwest_balance)
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
            ':modified' => $data['modified'],
            ':created_by' => $data['created_by'],
            ':sold_in_debt' => $data['sold_in_debt'],
            ':returned_to_duty' => $data['returned_to_duty'],
            ':related_products' => $data['related_products'],
            ':unpaid_goods' => $data['unpaid_goods'],
            ':liwest_balance' => $data['liwest_balance'],
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
              modified_by = :modified_by,
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
            ':modified_by' => $data['modified_by'],
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