<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RacegroupController extends BaseController {

    public static function index() {
        $racegroups = Roturyhma::all();
        View::make('racegroup/index.html', array('racegroups' => $racegroups));
    }

    public static function store() {
        $params = $_POST;

        $racegroup = new Roturyhma(array(
            'name' => $params['name'],
            'description' => $params['description'],
        ));

        $racegroup->save();
        Redirect::to('/racegroup/index.html' . $racegroup->id, array('message' => 'Roturyhm� on lisätty kirjastoosi!'));

        $racegroup = new Roturyhma($attributes);
        $errors = $racegroup->errors();

        if (count($errors) == 0) {
            $racegroup->save();

            Redirect::to('/racegroup/index.html' . $racegroup->id, array('message' => 'Roturyhm� on lisätty kirjastoon!'));
        } else {
            View::make('racegroup/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function show($id) {
        $racegroup = Roturyhma::find($id);
        View::make('racegroup/show.html', array('racegroup' => $racegroup));
    }

    public static function edit($id) {
        $racegroup = Roturyhma::find($id);
        View::make('racegroup/edit.html', array('attributes' => $racegroup));
    }

    public static function create() {
        View::make('racegroup/new.html');
    }
    
    public static function update($id) {
        $params = $_POST;

        $attributes = array(
            'id' => $id,
            'name' => $params['name'],
            'description' => $params['description'],
        );

        $racegroup = new Roturyhma($attributes);
        $errors = $racegroup->errors();

        if (count($errors) > 0) {
            View::make('racegroup/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $racegroup->update();

            Redirect::to('/racegroup/index.html' . $racegroup->id, array('message' => 'Roturyhm�n tietoja on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        $racegroup = new Roturyhma(array('id' => $id));

        $racegroup->destroy();

        Redirect::to('/racegroup.html', array('message' => 'Roturyhm� on poistettu onnistuneesti!'));
    }

}
