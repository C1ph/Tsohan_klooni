<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RaceController extends BaseController {

    public static function index() {
        $races = Rotu::all();
        View::make('race/index.html', array('races' => $races));
    }

    public static function search() {
        self::check_login();
        $user_logged_in = self::get_user_logged_in();
        $params = $_GET;
        $options = array('user_id' => $user_logged_in->id);

        if (isset($params['search'])) {
            $options['search'] = $params['search'];
        }

        $races = Rotu::all($options);

        View::make('race/index.html', array('races' => $races));
    }

    public static function store() {
        $params = $_POST;

        $race = new Rotu(array(
            'name' => $params['name'],
            'description' => $params['description'],
            'registered' => $params['registered'],
            'published' => $params['published'],
            'country' => $params['country'],
        ));

        $errors = $race->errors();

        if (count($errors) == 0) {
            $race->save();

            Redirect::to('/race/' . $race->id, array('message' => 'Rotu on lisätty kirjastoon!'));
        } else {
            View::make('race/new.html', array('errors' => $errors, 'race' => $race));
        }
    }

    public static function create() {
        View::make('race/new.html');
  }
    
    public static function show($id) {
        $race = Rotu::find($id);
        View::make('race/show.html', array('race' => $race));
    }

    public static function edit($id) {
        $race = Rotu::find($id);
        Kint::dump($race);
        View::make('race/edit.html', array('race' => $race));
    }

    public static function update() {
        $params = $_POST;

        $race = new Rotu(array(
            'id' => $params['id'],
            'name' => $params['name'],
            'description' => $params['description'],
            'registered' => $params['registered'],
            'published' => $params['published'],
            'country' => $params['country'],
        ));

        $errors = $race->errors();

        if (count($errors) > 0) {
            View::make('race/edit.html', array('errors' => $errors, 'race' => $race));
        } else {
            $race->update();
            Redirect::to('/race/' . $race->id, array('message' => 'Rodun tietoja on muokattu onnistuneesti!'));
        }
    }

    public static function destroy($id) {
        Rotu::destroy($id);
        Redirect::to('/race', array('message' => 'Rotu on poistettu onnistuneesti!'));
    }

}
