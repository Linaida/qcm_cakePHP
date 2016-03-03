<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26/11/2015
 * Time: 22:32
 */
class EtudiantsController extends AppController
{
    public $uses =array('Personne','Etudiant','Question_reponse','Qcm','Theme');
    public $components = array('Security','Flash');
    public function logout(){
        $this->set('title_for_layout', 'Deconnexion');
        $this->Session->write('home','/');
        $this->Session->delete('currentUser');
        $this->Session->delete('etudiant');
        $this->redirect('/connexion');
    }
    public function index() {

    }
    public function accueil() {
        $this->set('title_for_layout', 'Accueil');
        $user =  $this->Personne->findById($this->Session->read('currentUser'));
        $this->set('user',$user);
        $this->set('login',$user['Personne']['login']);

    }


    public function beforeFilter(){

        if(!$this->Session->read('etudiant')){

            $this->redirect('/');

    }}

    public function qcms(){
       $user_id =$this->Session->read('currentUser');
        $this->set('title_for_layout', 'QCM');
        $msg = "Affichage des qcms";
        $this->set('msg',$msg);

       // $qcms_remplir =$this->Qcm->query("SELECT * FROM qcm WHERE qcm.id NOT IN (SELECT etudiant.qcm_id FROM etudiant WHERE etudiant.personne_id = $user_id)");
        $qcms_remplir =$this->Qcm->find("all",array(
            'conditions' => array("qcm.id NOT IN (SELECT etudiant.qcm_id FROM etudiant WHERE etudiant.personne_id = $user_id) AND qcm.visible = '1'")
        ));

        $qcms_consulter= $this->Etudiant->findAllByPersonneId($user_id,array()
        );

        $this->set('qcms_remplir',$qcms_remplir);
        $this->set('qcms_consulter',$qcms_consulter);
        $this->set('user_id',$user_id);
        $this->set('etudiant_qcms', $this->Etudiant->find('all',array(
            'conditions' => array("Etudiant.personne_id =$user_id"),
            'fields' => 'qcm_id'
        )));


    }


    public function remplir_qcm($id) {
        $this->set('title_for_layout', 'Remplir QCM');
        $msg = "Remplir le QCM";
        $this->set('msg',$msg);
        $this->set('user_id',$this->Session->read('currentUser'));
        $this->set('qcm_id',$id);
        $data = $this->Qcm->findById($id);
        if($this->request->method() == 'POST'){
            $data = $this->request->data;
            $resultat = 0;
            for($i=0;$i< sizeof($data['Etudiant']['Reponse']) ;$i++ )
            {
                $reponse = $data['Etudiant']['Reponse'][$i];
                $solution = $data['Etudiant']['Solution'][$i];
                if($reponse == $solution){
                    $resultat++;
                }
            }
            $data['Etudiant']['resultat'] = $resultat;

            $this->Etudiant->save($data) ;
            $this->redirect("/etudiants/qcms");
        }else{

        }
        $this->set('qcm',$data);
    }
    public function consulter_resultat($id){
        $this->set('title_for_layout', 'Resultat QCM');
        $user_id =$this->Session->read('currentUser');
        $this->set('user_id',$user_id);
        $this->set('etudiant_qcm',$this->Etudiant->findAllByQcmIdAndPersonneId($id,$user_id));

        $this->set('qcm',$this->Qcm->findById($id));
    }
}