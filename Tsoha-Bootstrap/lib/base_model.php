<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
          
         $validation = $this->{$validator}();
         
         if (count ($validation) > 0) {
//             $errors = $validation;
             foreach ($validation as $error) {
                 $errors[] = $error;
             }
         }
         
         
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      }

      return $errors;
    }
    
    public function validate_id() {
        $errors = array();
        if ($this->id == '' || $this->id == null) {
            $errors[] = 'Indeksi ei saa olla tyhjä!';
        }

        return $errors;
    }

    
    public function validate_name() {
        $errors = array();
        if ($this->name == '' || $this->name == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        
        if (strlen($this->name) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }
    
    public function validate_password() {
        $errors = array();
        if ($this->password == '' || $this->password == null) {
            $errors[] = 'Salasana ei saa olla tyhjä!';
        }
        if (strlen($this->password) < 3) {
            $errors[] = 'Salasanan pituuden tulee olla vähintään kolme merkkiä!';
        }

        return $errors;
    }
    
    public function validate_admin() {
        $errors = array();
        if ($this->admin == '' || $this->admin == null) {
            $errors[] = 'Käyttäjällä on oltava admin-oikeudet';
        }

        return $errors;
    }
    
    public function validate_registered() {
        $errors = array();
        if ($this->registered == '' || $this->registered == null) {
            $errors[] = 'Rodulla täytyy olla rekisteröintistatus!';
        }

        return $errors;
    }
    
    public function validate_description() {
        $errors = array();
        if ($this->description == '' || $this->description == null) {
            $errors[] = 'Rodulla täytyy olla kuvaus!';
        }

        return $errors;
    }
    
    public function validate_published() {
        $errors = array();
        if ($this->published == '' || $this->published == null) {
            $errors[] = 'Rodulla täytyy olla julkaisupäivä!';
        }

        return $errors;
    }
    
    public function validate_country() {
        $errors = array();
        if ($this->country == '' || $this->country == null) {
            $errors[] = 'Rodulla täytyy olla alkuperämaa!';
        }

        return $errors;
    }
    
    public function validate_count() {
        $errors = array();
        if ($this->count == '' || $this->count == null) {
            $errors[] = 'Määrä ei voi olla tyhjä!';
        }

        return $errors;
    }
    
    public function validate_class() {
        $errors = array();
        if ($this->class == '' || $this->class == null) {
            $errors[] = 'Luokka ei voi olla tyhjä!';
        }

        return $errors;
    }
    
  }
