<?php

class Personne extends AppModel {
    public $name ='personne';
    public $useTable = 'personne';
    public $primaryKey = 'id';
    public $hasOne = array('question_reponse','etudiant');

    public $validate = array(
        'login' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom d\'utilisateur est requis'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un mot de passe est requis'
            )
        )
    );
}