<?php
class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function ajax() {
        $sth = $this->db->prepare('SELECT date, account_cashier  FROM reports WHERE date >= (NOW() - INTERVAL 22 DAY);');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function notes() {
        $data = array();
        for($i = 1; $i <= 12; $i++) {
            $sth = $this->db->prepare('SELECT * FROM notes where MONTH (date) = '.$i.' ORDER BY date');
            $sth->execute();
            array_push($data, $sth->fetchAll(PDO::FETCH_ASSOC));
        }
        return $data;
    }

    function note($id) {
        $sth = $this->db->prepare('SELECT * FROM notes WHERE id ='.$id);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    function create($data) {
        $sth = $this->db->prepare('INSERT
          INTO notes (time, place, name, phone, record)
          VALUES (:time, :place, :name, :phone, :record)'
        );
        $sth->execute(array(
            ':time' => $data['time'],
            ':place' => $data['place'],
            ':name' => $data['name'],
            ':phone' => $data['phone'],
            ':record' => $data['record'],
        ));
    }

    function save($data) {
        $sth = $this->db->prepare('UPDATE notes SET time = :time, place = :place, name = :name, phone = :phone, record = :record WHERE id = :id');
        $sth->execute(array(
            ':id' => $data['id'],
            ':time' => $data['time'],
            ':place' => $data['place'],
            ':name' => $data['name'],
            ':phone' => $data['phone'],
            ':record' => $data['record'],
        ));
    }

    function delete($id) {
        $sth = $this->db->prepare('DELETE from notes WHERE id = :id');
        $sth->execute(array(':id' => $id));
    }

}