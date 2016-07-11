<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rotu extends BaseModel {

    // Attribuutit
    public $id, $name, $registered, $description, $published, $country, $added;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_registered', 'validate_description', 'validate_published', 'validate_country');
    }

    public static function all() {

        $query = DB::connection()->prepare('SELECT * FROM Rotu');

        $query->execute();

        $rows = $query->fetchAll();
        $races = array();
        Kint::dump($rows);
        foreach ($rows as $row) {

            $races[] = new Rotu(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'registered' => $row['registered'],
                'description' => $row['description'],
                'published' => $row['published'],
                'country' => $row['country'],
            ));
        }
        Kint::dump($races);
        return $races;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Rotu (name, registered, '
                . 'description, published, country) VALUES (:name, '
                . ':registered, :description, :published, :country) '
                . 'RETURNING id');
        
        $query->execute(array(
            'name' => $this->name,
            'registered' => $this->registered,
            'description' => $this->description,
            'published' => $this->published,
            'country' => $this->country
        ));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

        public function update() {
        $query = DB::connection()->prepare('UPDATE Rotu SET name = :name, registered = :registered, '
                . 'description = :description, published = :published, country = :country  '
                . 'WHERE id = :id');
        
        $query->execute(array(
            'id' => $this->id,
            'name' => $this->name,
            'registered' => $this->registered,
            'description' => $this->description,
            'published' => $this->published,
            'country' => $this->country
        ));
    }
    
    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Rotu WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $race = new Rotu(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'registered' => $row['registered'],
                'description' => $row['description'],
                'published' => $row['published'],
                'country' => $row['country']
            ));

            return $race;
        }

        return null;
    }
    

    public static function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Rotu WHERE id = :id');
        $query->execute(array('id' => $id));
        
    }
}
