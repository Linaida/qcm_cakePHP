
<h1>CONNEXION</h1><br>
<?php
echo $this->set('title','Accueil');
if(isset($msg)) $errorMSg= $msg;
if(!empty($errorMSg)){ ?>
    <div id="msg_alert" class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <strong>Attention !</strong>
        <span id="error_msg"><?php echo $errorMSg."\n\r";   ?></span>
        <span id="empty_msg"></span>
    </div>
<?php } ?>
<div id="div_connexion">


<!-- DEBUT FORMULAIRE -->
<?php echo $this->Form->create('Personne', array('type' => 'post')); ?>
<?php echo $this->Form->input('login', array(
    'label'=> "Nom d'utilisateur : ",
    'class'=>"form-control form_personne"));
?>
<?php echo $this->Form->input('password', array(
    'label'=> 'Mot de passe : ',
    'class'=>"form-control form_personne"
));
$options = array(
    'label' => 'Connexion',
    'class' => array(
        'class' => 'btn btn-warning',
    )
);
echo $this->Form->end($options); ?>
</div>