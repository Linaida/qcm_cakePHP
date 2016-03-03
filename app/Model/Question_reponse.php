<?php

class Question_reponse extends AppModel {
    public $name ='question_reponse';
    public $displayField = 'question';
    public $useTable = 'question_reponse';
    public $belongsTo = array(
        'theme' => array(
            'className' => 'Theme',
            'foreignKey' => 'theme_id'
        ),
        'personne' => array(
            'className' => 'Personne',
            'foreignKey' => 'personne_id'
        )
    );

}