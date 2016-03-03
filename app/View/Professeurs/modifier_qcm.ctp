<div class="row">
    <h3 style="text-align: center"><?php echo $msg ?></h3>
    <div class="form_add_qcm  col-md-10 col-md-offset-2">

        <?php echo $this->Form->create('Qcm', array('type' => 'put')); ?>
        <input type="hidden" id="QcmIdQcm" name="data[Qcm][id]" value="<?php echo $qcm_id;?>"  />
        <input type="hidden" id="QcmPersonneId" name="data[Qcm][personne_id]" value="<?php echo $user_id;?>"  />
        <?php

        //Affiche le password
        echo $this->Form->input('Qcm.titre', array(
            'type' => 'text',
            'class' => 'form-control form_question',
            'label' => 'Titre de votre Qcm',
            'value' =>$qcm['Qcm']['titre']
        ));
        //Affiche l'email
        echo $this->Form->input('Qcm.date_limite', array(
            'class' => 'form-control form_question',
            'type' => 'text',
            'label' => 'Date limite',
            'value' =>$qcm['Qcm']['date_limite']
        ));
        echo $this->Form->input('Qcm.visible', array(
            'options' => array('Public','Privé'),
            'class' => 'form-control form_question',
            'type' => 'select',
            'label' => 'Visible'
            , 'value' =>$qcm['Qcm']['visible']
        ));
        echo $this->Form->input('questions',array(
            'type' => 'select',
            'name' =>'data[Qcm][Question_reponse]',
            "multiple"=>true,
            'class' => 'form-control form_question'
        ));
        ?>

        <?php

        echo $this->Form->button('Modifier', array(
            'class' => 'btn btn-success',
            'type' => 'submit' )); ?>
        <?php  echo $this->Form->end(); ?>

    </div>
</div>

<?php /*
  <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td></td>
                    <td>Question</td>
                </tr>
                </thead>
                <?php
                $i=0;
                foreach($questions as $question){?>
                <tbody>
                    <tr>
                        <td>
                            <input type="radio" name="data[Question_reponse][<?php echo $i; ?>][id]" value="<?php echo $question['Question_reponse']['id'] ?>">
                        </td>
                        <td>
                            <?php echo $question['Question_reponse']['question'];?>
                        </td>

                    </tr>
                </tbody>
                <?php $i++;} ?>
            </table>
        </div>
 */ ?>