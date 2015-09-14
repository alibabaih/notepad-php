<?php
class Transaction_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function goodList() {
        $sth = $this->db->prepare('SELECT name FROM goods');
        $sth->execute();
        return $sth->fetchAll();
    }

    function transactionList() {
        $sth = $this->db->prepare('SELECT transactions.id, name, quantity, date, items_were_send_to, items_were_send_from
          FROM transactions INNER JOIN goods
          WHERE date >= (NOW() - INTERVAL 22 DAY)
          AND transactions.good_id = goods.id ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function transactionRelatedList() {
        $sth = $this->db->prepare('SELECT *
          FROM transactions_related_items
          WHERE date >= (NOW() - INTERVAL 22 DAY)
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function getGoodsList() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll();
    }

    function transactionSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM transactions INNER JOIN goods WHERE transactions.id = :id AND transactions.good_id = goods.id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function transactionSingleRelatedList($id) {
        $sth = $this->db->prepare('SELECT * FROM transactions_related_items WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function period($start, $end, $office) {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_sold
          FROM sold INNER JOIN goods
          WHERE goods.id = sold.good_id
          AND shop = "'.$office.'"
          AND DATE >= "'.$start.'" AND DATE <= "'.$end.'"
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function periodAll($start, $end) {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_sold, shop
          FROM sold INNER JOIN goods
          WHERE goods.id = sold.good_id
          AND DATE >= "'.$start.'" AND DATE <= "'.$end.'"
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {

        $sth = $this->db->prepare('
          INSERT INTO transactions (date, quantity, items_were_send_to, items_were_send_from, good_id)
          VALUES (:date, :quantity, :items_were_send_to, :items_were_send_from, :good_id)
        ');
        $sth->execute(array(
            ':date' => $data['date'],
            ':quantity' => $data['quantity'],
            ':items_were_send_to' => $data['items_were_send_to'],
            ':items_were_send_from' => $data['items_were_send_from'],
            ':good_id' => $data['good_id'],
        ));
    }

    public function createRelated($data) {

        $sth = $this->db->prepare('
          INSERT INTO transactions_related_items (date, sum, items_were_send_to, items_were_send_from)
          VALUES (:date, :sum, :items_were_send_to, :items_were_send_from)
        ');
        $sth->execute(array(
            ':date' => $data['date'],
            ':sum' => $data['sum'],
            ':items_were_send_to' => $data['items_were_send_to'],
            ':items_were_send_from' => $data['items_were_send_from'],
        ));
    }

    public function getGoodId($goodName) {
        $sth = $this->db->prepare('SELECT id, name from goods WHERE name = :name');
        $sth->execute(array(':name' => $goodName));
    }

    public function editSave($data) {
        $sth = $this->db->prepare('UPDATE transactions
            SET date = :date,
                good_id = :good_id,
                quantity = :quantity,
                items_were_send_to = :items_were_send_to,
                items_were_send_from = :items_were_send_from
            WHERE id = :id
        ');
        $sth->execute(array(
            ':id' => $data['id'],
            ':date' => $data['date'],
            ':good_id' => $data['good_id'],
            ':quantity' => $data['quantity'],
            ':items_were_send_to' => $data['items_were_send_to'],
            ':items_were_send_from' => $data['items_were_send_from'],
        ));
    }

    public function editSaveRelated($data) {
        $sth = $this->db->prepare('UPDATE transactions_related_items
            SET date = :date,
                sum = :sum,
                items_were_send_to = :items_were_send_to,
                items_were_send_from = :items_were_send_from
            WHERE id = :id
        ');
        $sth->execute(array(
            ':id' => $data['id'],
            ':date' => $data['date'],
            ':sum' => $data['sum'],
            ':items_were_send_to' => $data['items_were_send_to'],
            ':items_were_send_from' => $data['items_were_send_from'],
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from transactions WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

    public function deleteRelated($id) {
        $sth = $this->db->prepare('DELETE from transactions_related_items WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

}