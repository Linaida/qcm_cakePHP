
<div class="row">
    <h3 style="text-align: center"><?php echo $msg ?></h3>
    <div class="form_update  col-md-10 col-md-offset-2">
        <?php echo $this->Form->create('Personne', array('type' => 'put')); ?>
        <input type="hidden" id="PersonneIdPersonne" name="data[Personne][id]" value="<?php echo $id_currentUser ?>"  />
        <?php //Affiche le login
        echo $this->Form->input('Personne.login', array(

            'class' => 'form-control form_personne',
            'label' => 'Login'
            //,'value' => $Personne['login']
        ));
        //Affiche le password
        echo $this->Form->input('Personne.password', array(
            'class' => 'form-control form_personne',
            'label' => 'Password'
            //,'value' =>$Personne['password']
        ));
        //Affiche l'email
        echo $this->Form->input('Personne.email', array(
            'class' => 'form-control form_personne',
            'label' => 'Email'
            //, 'value' =>$Personne['email']
        ));
        echo $this->Form->button('Modifier', array(
            'class' => 'btn btn-success',
            'type' => 'submit' )); ?>
        <?php  echo $this->Form->end(); ?>

    </div>
</div>
