<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 24/11/2015
 * Time: 10:26
 */

 class Qcm extends AppModel {
    public $name ='qcm';
    public $useTable = 'qcm';
    public $primaryKey = 'id';
    public $belongsTo ='Personne';
     public $hasOne= 'Etudiant';
public $displayField = 'titre';
     public $hasAndBelongsToMany = array(
         'Question_reponse' =>
             array(
                 'className' => 'Question_reponse',
                 'joinTable' => 'qcms_question_reponses',
                 'foreignKey' => 'qcm_id',
                 'associationForeignKey' => 'question_id'
             )
     );
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