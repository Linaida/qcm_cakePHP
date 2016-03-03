<div class="row">
    <h3 style="text-align: center"><?php echo $msg ?></h3>
    <div class="form_add_qcm  col-md-10 col-md-offset-2">

        <?php echo $this->Form->create('Etudiant', array('type' => 'post')); ?>
        <input type="hidden" id="EtudiantPersonneId" name="data[Etudiant][personne_id]" value="<?php echo $user_id;?>"  />
        <input type="hidden" id="EtudiantQcmId" name="data[Etudiant][qcm_id]" value="<?php echo $qcm_id;?>"  />


        <?php
        $i=0;
        foreach($qcm['Question_reponse'] as $question){

        //    echo "<span>". $question['question']."</span><br/>";
            ?>
           <?php

            echo $this->Form->radio("Etudiant.Reponse.$i",array(
                array('name'=>$question['reponse1'],'value' =>$question['reponse1']),
                array('name'=>$question['reponse2'],'value' =>$question['reponse2']),
                array('name'=>$question['reponse3'],'value' =>$question['reponse3']),
                array('name'=>$question['reponse4'],'value' =>$question['reponse4'])
            ),
            array(        'legend'=>$question['question']
            )
                );
            echo $this->Form->hidden("Etudiant.Solution.$i",array(
                "value" => $question['solution']
            ));
            $i++;

        }

        ?>

        <?php

        echo $this->Form->button('Soumettre', array(
            'class' => 'btn btn-success',
            'type' => 'submit' )); ?>
        <?php  echo $this->Form->end(); ?>

    </div>
</div>
