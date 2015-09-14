<?php
class Sold_Model extends Model {

    function __construct() {
        parent::__construct();
    }

        function goodList() {
        $sth = $this->db->prepare('SELECT name FROM goods');
        $sth->execute();

        return $sth->fetchAll(); //return into controller
    }


    function soldList($office) {
        $sth = $this->db->prepare('SELECT *
          FROM sold INNER JOIN goods
          WHERE date >= (NOW() - INTERVAL 30 DAY)
          AND goods.id = sold.good_id
          AND shop = "'.$office.'" ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function soldListAll() {
        $sth = $this->db->prepare('SELECT *
          FROM sold INNER JOIN goods
          WHERE date >= (NOW() - INTERVAL 30 DAY)
          AND sold.good_id = goods.id ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function getGoodsList() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll();
    }

    function soldSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM sold INNER JOIN goods WHERE id_sold = :id_sold AND sold.good_id = goods.id');
        $sth->execute(array(':id_sold' => $id));
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
          INSERT INTO sold (date, quantity, shop, good_id)
          VALUES (:date, :quantity, :shop, :good_id)
        ');
        $sth->execute(array(
            ':date' => $data['date'],
            ':quantity' => $data['quantity'],
            ':shop' => $data['shop'],
            ':good_id' => $data['good_id'],
        ));
    }

    public function getGoodId($goodName) {
        $sth = $this->db->prepare('SELECT id, name from goods WHERE name = :name');
        $sth->execute(array(':name' => $goodName));
    }

    public function editSave($data) {
        $sth = $this->db->prepare('UPDATE sold
            SET date = :date,
                good_id = :good_id,
                quantity = :quantity,
                shop = :shop
            WHERE id_sold = :id_sold
        ');
        $sth->execute(array(
            ':id_sold' => $data['id_sold'],
            ':date' => $data['date'],
            ':good_id' => $data['good_id'],
            ':quantity' => $data['quantity'],
            ':shop' => $data['shop'],
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from sold WHERE id_sold = :id_sold');
        $sth->execute(array(':id_sold' => $id));
    }

}