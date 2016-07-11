<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kayttaja extends BaseModel {

    // Attribuutit
    public $id, $name, $password, $admin;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_password', 'validate_admin');
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');

        $query->execute();

        $rows = $query->fetchAll();
        $users = array();


        foreach ($rows as $row) {

            $users[] = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'password' => $row['password'],
                'admin' => $row['admin']
            ));
        }

        Kint::dump($users);
        return $users;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (name, password, admin) VALUES (:name, :password, :admin) RETURNING id');
        $query->execute(array('name' => $this->name, 'password' => $this->password, 'admin' => $this->admin));
        $row = $query->fetch();
        $this->id = $row['id'];
    }


    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $user = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'admin' => $row['admin']
            ));

            return $user;
        }

        return null;
    }
    
    public function update() {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET name = :name, password = :password, '
                . 'admin = :admin '
                . 'WHERE id = :id');
        
        $query->execute(array(
            'id' => $this->id,
            'name' => $this->name,
            'password' => $this->password,
            'admin' => $this->admin
        ));
    }

    public static function authenticate($name, $password) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE name = :name AND password = :password LIMIT 1');
        $query->execute(array('name' => $name, 'password' => $password));
        $row = $query->fetch();
        if ($row) {
            // Käyttäjä löytyi, palautetaan löytynyt käyttäjä oliona
            $user = new Kayttaja(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'admin' => $row['admin']
            ));

            return $user;
        } else {
            // Käyttäjää ei löytynyt, palautetaan null
            return null;
        }
    }
    
    public static function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Kayttaja WHERE id = :id');
        $query->execute(array('id' => $id));
    }

}
