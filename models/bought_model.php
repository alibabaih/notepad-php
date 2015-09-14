<?php
class Bought_Model extends Model {

    function __construct() {
        parent::__construct();
    }

        function goodList() {
        $sth = $this->db->prepare('SELECT name FROM goods');
        $sth->execute();

        return $sth->fetchAll(); //return into controller
    }

    function boughtList($office) {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_bought FROM bought INNER JOIN goods
          WHERE date >= (NOW() - INTERVAL 22 DAY)
          AND bought.good_id = goods.id
          AND shop = "'.$office.'"
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function boughtListAll() {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_bought, shop FROM bought INNER JOIN goods
          WHERE date >= (NOW() - INTERVAL 22 DAY)
          AND bought.good_id = goods.id
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }


    function getGoodsList() {
        $sth = $this->db->prepare('SELECT * FROM goods');
        $sth->execute();
        return $sth->fetchAll();
    }

    function boughtSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM bought INNER JOIN goods WHERE id_bought = :id_bought AND bought.good_id = goods.id');
        $sth->execute(array(':id_bought' => $id));
        return $sth->fetch();
    }

    function period($start, $end, $office) {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_bought
          FROM bought INNER JOIN goods
          WHERE goods.id = bought.good_id
          AND shop = "'.$office.'"
          AND DATE >= "'.$start.'" AND DATE <= "'.$end.'"
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    function periodAll($start, $end) {
        $sth = $this->db->prepare('SELECT name, quantity, date, id_bought, shop
          FROM bought INNER JOIN goods
          WHERE goods.id = bought.good_id
          AND DATE >= "'.$start.'" AND DATE <= "'.$end.'"
          ORDER BY date DESC');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {
        $sth = $this->db->prepare('INSERT INTO bought (date, quantity, shop, good_id) VALUES (:date, :quantity, :shop, :good_id)');
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
        $sth = $this->db->prepare('UPDATE bought
            SET date = :date,
                good_id = :good_id,
                quantity = :quantity,
                shop = :shop
            WHERE id_bought = :id_bought
        ');
        $sth->execute(array(
            ':id_bought' => $data['id_bought'],
            ':date' => $data['date'],
            ':good_id' => $data['good_id'],
            ':quantity' => $data['quantity'],
            ':shop' => $data['shop'],
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from bought WHERE id_bought = :id_bought');
        $sth->execute(array(':id_bought' => $id));
    }




    function relatedShopOktabrskaya() {
        $sth = $this->db->prepare('SELECT * FROM related WHERE shop = "Октябрьская"');
        $sth->execute();
        return $sth->fetchAll();
    }

    function relatedShopPavlaMochalova() {
        $sth = $this->db->prepare('SELECT * FROM related WHERE shop = "Павла Мочалова"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function createRelated($data) {

        $sth = $this->db->prepare('INSERT INTO related (date, related, points, shop) VALUES (:date, :related, :points, :shop)');
        $sth->execute(array(
            ':date' => $data['date'],
            ':related' => $data['related'],
            ':points' => $data['points'],
            ':shop' => $data['shop'],
        ));
    }

    public function deleteRelated($id) {
        $sth = $this->db->prepare('DELETE from related WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

    function boughtRelatedSingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM related WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function editSaveRelated($data) {
        $sth = $this->db->prepare('UPDATE related
            SET date = :date,
                related = :related,
                points = :points,
                shop = :shop
            WHERE id = :id
        ');
        $sth->execute(array(
            ':id' => $data['id'],
            ':date' => $data['date'],
            ':related' => $data['related'],
            ':points' => $data['points'],
            ':shop' => $data['shop'],
        ));
    }

}