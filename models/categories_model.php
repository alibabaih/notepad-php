<?php
class Categories_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function categoriesList() {
        $sth = $this->db->prepare('SELECT * FROM categories');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function create($data) {
        $sth = $this->db->prepare('INSERT INTO categories (category) VALUES (:category)');
        $sth->execute(array(
            ':category' => $data['category'],
        ));
    }

    function categorySingleList($id) {
        $sth = $this->db->prepare('SELECT * FROM categories WHERE id_cat = :id_cat');
        $sth->execute(array(':id_cat' => $id));
        return $sth->fetch();
    }

    public function editSave($data) {
        $sth = $this->db->prepare('UPDATE categories SET category = :category WHERE id_cat = :id_cat');
        $sth->execute(array(
            ':id_cat' => $data['id_cat'],
            ':category' => $data['category']
        ));
    }

    public function delete($id) {
        $sth = $this->db->prepare('DELETE from categories WHERE id_cat = :id_cat');
        $sth->execute(array(':id_cat' => $id));
    }

}