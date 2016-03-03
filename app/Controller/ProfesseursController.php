<?php
class ProfesseursController extends AppController {
    public $uses =array('Personne','Etudiant','Question_reponse','Qcm','Theme','Qcm_Question_reponses');
    public $components = array('Security','Flash');

public function beforeFilter(){
    if(!$this->Session->read('professeur')){

            $this->redirect('/');

    }
}
    public function index() {

    }
    public function logout(){
        $this->set('title_for_layout', 'Deconnexion');
        $this->Session->write('home','/');
        $this->Session->delete('currentUser');
        $this->Session->delete('professeur');
        $this->redirect('/connexion');
    }
    public function accueil() {
        $this->set('title_for_layout', 'Accueil');
        $user =  $this->Personne->findById($this->Session->read('currentUser'));
        $this->set('user',$user);
        $this->set('login',$user['Personne']['login']);

    }
    public function questions(){
        $this->set('title_for_layout', 'Questions');
        $msg = "Affichage des questions";
        $this->set('msg',$msg);
        $questions = $this->Question_reponse->find('all');

        $this->set('questions',$questions);
        $this->set('user_id',$this->Session->read('currentUser'));
    }

    public function add_question(){
        $this->set('title_for_layout', 'Question - Ajout');
        $msg = " Ajouter une Question ";
        $this->set('msg',$msg);
        $this->set('user_id',$this->Session->read('currentUser'));
        if($this->request->method() == 'POST'){
            $data = $this->request->data;
            switch ($data['Question_reponse']['solution']){
                case 0:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse1'] ;break;
                case 1:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse2'] ;break;
                case 2:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse3'] ;break;
                case 3:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse4'] ;break;
            }
            $this->Question_reponse->save($data) ;
            $this->set('question',$data);
            $this->Flash->set("Votre question a été ajouté avec succés");
            $this->redirect("/professeurs/questions");
        }else{
            $this->set('themes', $this->Theme->find('all',array(
                //'conditions' => array('Model.field' => $thisValue), //array of conditions
                //'recursive' => 1, //int
                //array of field names
                'fields' => array('Theme.id','Theme.nom'),
                'group' => array('Theme.nom'), //fields to GROUP BY
            )));
        }
    }
    public function modifier_question($id){
        $this->set('title_for_layout', 'Question-Modification');
        $msg = " Modification de la Question ";
        $this->set('id_question',$id);
        //Formulaire qui update cette question
        $data = $this->Question_reponse->findById($id);

        if($this->request->method() == 'PUT'){
            $data = $this->request->data;
            switch ($data['Question_reponse']['solution']){
                case 0:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse1'] ;break;
                case 1:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse2'] ;break;
                case 2:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse3'] ;break;
                case 3:$data['Question_reponse']['solution']=$data['Question_reponse']['reponse4'] ;break;
            }
            $this->Question_reponse->save($data) ;
            $this->set('question',$data);
            $this->set('msgSuccess',"La Question a bien été modifiée");
            $this->redirect("/professeurs/questions");
        }else{
            switch ($data['Question_reponse']['solution']){
                case $data['Question_reponse']['reponse1']:$data['Question_reponse']['solution']=0 ;break;
                case $data['Question_reponse']['reponse2']:$data['Question_reponse']['solution']=1 ;break;
                case $data['Question_reponse']['reponse3']:$data['Question_reponse']['solution']=2 ;break;
                case $data['Question_reponse']['reponse4']:$data['Question_reponse']['solution']=3 ;break;
            }
            $this->request->data = $data;
            $this->set('question',$this->request->data);
        }
        $msg.=$data['Personne']['login'];
        $this->set('msg',$msg);
    }
    public function supprimer_question($id){
        $this->set('title_for_layout', 'Question-Suppression');
        $this->Question_reponse->delete($id);
        $this->Flash->set("La Question a bien été supprimée");
       $this->redirect('/professeurs/questions');
    }

    public function qcms(){

        $this->set('title_for_layout', 'QCM');
        $msg = "Affichage des qcms";
        $this->set('msg',$msg);
        $qcms = $this->Qcm->find('all',array(
            'fields'=>array(
            'Personne.id','Personne.login','Qcm.titre','Qcm.id','Qcm.date_limite','Qcm.visible','Qcm.personne_id'
            ),
            'group'=>array('Qcm.id')
        ));

        $this->set('qcms',$qcms);
        $this->set('user_id',$this->Session->read('currentUser'));


    }
    public function add_qcm(){
        $this->set('title_for_layout', 'Créer  QCM');
        $msg = "Ajouter un QCM";
        $this->set('msg',$msg);
        $this->set('user_id',$this->Session->read('currentUser'));
        $this->set('user_id',$this->Session->read('currentUser'));
        $questions = $this->Qcm->Question_reponse->find('list');
        $this->set('questions',$questions) ;
        $this->Qcm->create();
        if($this->request->method() == 'POST'){
            $data = $this->request->data;
            $this->Qcm->saveAll($data,array('deep'=>true)) ;
            $this->redirect('/professeurs/qcms');
            $this->set('qcm',$data);
        }

    }

    public function modifier_qcm($id) {
        $this->set('title_for_layout', 'Modifier QCM');
        $msg = "Modifier un QCM";
        $this->set('msg',$msg);
        $this->set('qcm_id',$id);
        $this->set('user_id',$this->Session->read('currentUser'));
        $questions = $this->Qcm->Question_reponse->find('list');
        $this->set('questions',$questions) ;

        //Formulaire qui update cette question
        $data = $this->Qcm->findById($id);

        if($this->request->method() == 'PUT'){
            $this->Qcm->saveAll($data,array('deep'=>true)) ;
            $this->redirect('/professeurs/qcms');
            $this->set('qcm',$data);
        }else{
            $this->set('qcm',$data);
        }
    }
    public function supprimer_qcm($id){
        $this->set('title_for_layout', 'Qcm-Suppression');
        $this->Qcm->delete($id);
        $this->Flash->set("Le Qcm a bien été supprimée");
        $this->redirect('/professeurs/qcms');
    }
    public function consulter_resultat($id){
        $resultats=$this->Etudiant->findAllByQcmId($id);
        $this->set('resultats',$resultats);
        $this->set('qcm',$this->Qcm->findById($id));
    }
}