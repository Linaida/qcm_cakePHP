<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 21/11/2015
 * Time: 16:40
 */
class PersonnesController extends AppController
{
//    public $name = "Personnes";
    public $uses =array('Personne','Question_reponse');
    public $component= array('Security','Flash');

    public function connexion(){
        $this->set('title_for_layout', 'Connexion');
        $result = "";
        $msg="Connectez - vous";
        // On regarde si un utilisateur essaie de se connecter
        if($this->request->method() == 'POST'){
            $data = $this->request->data;
            // On récupère les informations du formulaire de connexion
            $form = $data['Personne'];
            // On regarde si l'utilisateur existe dans la BDD
            $result_login = $this->Personne->findAllByLoginAndPassword($form['login'],$form['password']);
            $result_email =$this->Personne->findAllByEmailAndPassword($form['login'],$form['password']);
            if($result_login || $result_email) {
                // Si il existe, on le dirige sur son acceuil
                //"L'utilisateur existe";
                if ($result_login) {
                    $this->Session->write('currentUser', $result_login[0]['Personne']['id']);
                    $role = $result_login[0]['Personne']['role'];
                }
                if ($result_email) {
                    $this->Session->write('currentUser', $result_email[0]['Personne']['id']);
                    $role = $result_email[0]['Personne']['role'];
                }
                $this->Session->write('accueil','/accueil');
                if ($role == 'etudiant') {
                    $this->Session->write('etudiant', $role);
                    $this->Session->write('home', '/etudiants/accueil');
                   // $this->render('accueil','etudiant');
                    $this->redirect('/etudiants/accueil');
                }

                if($role == 'professeur') {
                    $this->Session->write('professeur', $role);
                 //   $this->render('accueil','professeur');
                    $this->Session->write('home', '/professeurs/accueil');
                    $this->redirect('/professeurs/accueil');
                }


            }else{

                // Si il n'existe pas, on affiche un message d'erreur
                $msg = "Erreur dans l'authentification";
            }
        }
        $this->set('msg',$msg);
        $this->set('title',"Connexion");
    }
    public function profil(){
        $this->set('title_for_layout', 'Accueil');
        $msg = " Informations de ";
        $this->set('id_currentUser',$this->Session->read('currentUser'));
        //Formulaire qui update cet utilisateur
        $old_data = $this->Personne->findById($this->Session->read('currentUser'));
        if($this->request->method() == 'PUT'){
            $data = $this->request->data;
           $this->Personne->save($data) ;
            $this->set('personne',$data);
        }else{
            $this->request->data = $old_data;
            $this->set('personne',$this->request->data);
        }
       // debug($this->Personne->validationErrors);
        $msg.=$old_data['Personne']['login'];
        $this->set('msg',$msg);
    }
    public function  accueil(){
        $this->set('title_for_layout', 'Accueil');
        $user =  $this->Personne->findById($this->Session->read('currentUser'));
        $this->set('user',$user);
        $this->set('login',$user['Personne']['login']);
        if(!$user){
            $this->redirect('/connexion');
        }
    }

    public function logout(){
        $this->set('title_for_layout', 'Deconnexion');
        $this->Session->write('home','/');
        $this->Session->delete('currentUser');
        $this->Session->delete('professeur');
        $this->Session->delete('etudiant');
        $this->redirect('/connexion');
    }
}