<?php
class Goods_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function goodsList() {
        $sth = $this->db->prepare('SELECT * FROM goods INNER JOIN categories WHERE goods.category_id = categories.id_cat');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }

    function goodsListWithoutCategory() {
        $sth = $this->db->prepare('SELECT * FROM goods WHERE goods.category_id IS NULL ');
        $sth->execute();
        return $sth->fetchAll(); //return into controller
    }



    function goodSingleList($idd) {
        $sth = $this->db->prepare('SELECT * FROM goods INNER JOIN categories WHERE id = :id AND goods.category_id = categories.id_cat');
        $sth->execute(array(':id' => $idd));
        return $sth->fetch();
    }

    public function create($data) {
        $sth = $this->db->prepare('INSERT
          INTO goods (name, category_id, point, purches_cost, isc_cost, distributor_ye_cost, distributor_rub_cost, customer_ye_cost, customer_rub_cost)
          VALUES (:name, :category_id, :point, :purches_cost, :isc_cost, :distributor_ye_cost, :distributor_rub_cost, :customer_ye_cost, :customer_rub_cost)'
        );
        $sth->execute(array(
            ':name' => $data['name'],
            ':category_id' => $data['category_id'],
            ':point' => $data['point'],
            ':purches_cost' => $data['purches_cost'],
            ':isc_cost' => $data['isc_cost'],
            ':distributor_ye_cost' => $data['distributor_ye_cost'],
            ':distributor_rub_cost' => $data['distributor_rub_cost'],
            ':customer_ye_cost' => $data['customer_ye_cost'],
            ':customer_rub_cost' => $data['customer_rub_cost'],
        ));
    }

    function getCategoryList() {
        $sth = $this->db->prepare('SELECT * FROM categories');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function editSave($data) {
        $sth = $this->db->prepare('UPDATE goods
            SET
                name = :name,
                category_id = :category_id,
                point = :point,
                purches_cost = :purches_cost,
                isc_cost = :isc_cost,
                distributor_ye_cost = :distributor_ye_cost,
                distributor_rub_cost = :distributor_rub_cost,
                customer_ye_cost = :customer_ye_cost,
                customer_rub_cost = :customer_rub_cost
            WHERE id = :id'
        );
        $sth->execute(array(
            ':id' => $data['id'],
            ':name' => $data['name'],
            ':category_id' => $data['category_id'],
            ':point' => $data['point'],
            ':purches_cost' => $data['purches_cost'],
            ':isc_cost' => $data['isc_cost'],
            ':distributor_ye_cost' => $data['distributor_ye_cost'],
            ':distributor_rub_cost' => $data['distributor_rub_cost'],
            ':customer_ye_cost' => $data['customer_ye_cost'],
            ':customer_rub_cost' => $data['customer_rub_cost'],
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from goods WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

}