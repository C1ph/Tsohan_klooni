<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Roturyhma extends BaseModel {

    // Attribuutit
    public $id, $rotu_id, $name, $description;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_rotu_id', 'validate_name', 'validate_description');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Roturyhma');
        $query->execute();
        $rows = $query->fetchAll();
        $racegroup = array();
        Kint::dump($rows);
        foreach ($rows as $row) {
            $racegroup[] = new Roturyhma(array(
                'id' => $row['id'],
                'rotu_id' => $row['rotu_id'],
                'name' => $row['name'],
                'description' => $row['description'],
            ));
        }
        Kint::dump($racegroup);
        return $racegroup;
    }

    public function save() {

        $query = DB::connection()->prepare('INSERT INTO Roturyhma (name, description) VALUES (:name, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'description' => $this->description));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Roturyhma WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $racegroup = new Roturyhma(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
            ));

            return $racegroup;
        }

        return null;
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Roturyhma SET name = :name, '
                . 'description = :description,  '
                . 'WHERE id = :id');

        $query->execute(array(
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ));
    }

    public static function destroy($id) {
        $query = DB::connection()->prepare('DELETE FROM Roturyhma WHERE id = :id');
        $query->execute(array('id' => $id));
    }

}
