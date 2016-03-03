<div class="row">
    <h3 style="text-align: center"><?php echo $msg ?></h3>
    <div class="form_update  col-md-10 col-md-offset-2">
        <?php echo $this->Form->create('Question_reponse', array('type' => 'put')); ?>
        <input type="hidden" id="Question_reponseIdQuestion_reponse" name="data[Question_reponse][id]" value="<?php echo $id_question ?>"  />
        <?php //Affiche le login
        echo $this->Form->input('theme.nom', array(
            'type' => 'text',
            'class' => 'form-control form_question',
            'label' => 'Theme'
            //,'value' => $Question_reponse['']
        ));
        //Affiche le password
        echo $this->Form->input('Question_reponse.question', array(
            'type' => 'text',
            'class' => 'form-control form_question',
            'label' => 'Question'
            //,'value' =>$Personne['password']
        ));
        //Affiche l'email
        echo $this->Form->input('Question_reponse.reponse1', array(
            'class' => 'form-control form_question',
            'type' => 'text',
            'label' => 'Reponse 1'
            //, 'value' =>$Personne['email']
        ));
        echo $this->Form->input('Question_reponse.reponse2', array(
            'class' => 'form-control form_question',
            'type' => 'text',
            'label' => 'Reponse 2'
            //, 'value' =>$Personne['email']
        ));
        echo $this->Form->input('Question_reponse.reponse3', array(
            'class' => 'form-control form_question',
            'type' => 'text',
            'label' => 'Reponse 3'
            //, 'value' =>$Personne['email']
        ));
        echo $this->Form->input('Question_reponse.reponse4', array(
            'class' => 'form-control form_question',
            'type' => 'text',
            'label' => 'Reponse 4'
            //, 'value' =>$Personne['email']
        ));
        echo $this->Form->input('Question_reponse.solution', array(
            'options' => array('Reponse 1', 'Reponse 2','Reponse 3','Reponse 4'),
            'empty' => '(choose one)',
            'class' => 'form-control form_question'
        ));
        echo $this->Form->button('Modifier', array(
            'class' => 'btn btn-success',
            'type' => 'submit' )); ?>
        <?php  echo $this->Form->end(); ?>

    </div>
</div>