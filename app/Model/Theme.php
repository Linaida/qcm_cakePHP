<?php

class Theme extends AppModel {
    public $name ='theme';
    public $useTable = 'theme';
    public $primaryKey = 'id';
    public $hasOne = array('question_reponse');
}