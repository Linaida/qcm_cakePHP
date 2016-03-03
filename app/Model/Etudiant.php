<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24/11/2015
 * Time: 10:26
 */

class Etudiant extends AppModel {
    public $name ='etudiant';
    public $useTable = 'etudiant';
    public $primaryKey = 'id';
    public $belongsTo =array('Personne','Qcm');
    public $displayField = 'resultat';
  //  public $hasMany = array(       'Qcm'    );
    public function beforeSave($options = array()){
        foreach (array_keys($this->hasAndBelongsToMany) as $model){
            if(isset($this->data[$this->name][$model])){
                $this->data[$model][$model] = $this->data[$this->name][$model];
                unset($this->data[$this->name][$model]);
            }
        }
        return true;
    }
}