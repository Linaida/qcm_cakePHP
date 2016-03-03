<div class="row">
    <div class="col-md-11 col-md-offset-1">

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td></td>
                    <td>Titre</td>
                    <td>Auteur</td>
                    <td>Questions</td>
                    <td>Date limite</td>
                    <td>Visibilité </td>
                    <td>Opérations</td>
                </tr>
                </thead>
                <tbody>

                <?php foreach($qcms as $qcm){ ;
                    ?>

                    <tr>
                        <td><?php  $qcm['Qcm']['id']; ?></td>
                        <td><?php echo $qcm['Qcm']['titre']; ?></td>
                        <td><?php echo $qcm['Personne']['login']; ?></td>
                        <td><?php
                            foreach($qcm['Question_reponse'] as $question){
                                echo $question['question']."<br/>";
                            }
                            ?></td>
                        <td><?php echo $qcm['Qcm']['date_limite']; ?></td>
                        <td><?php if( $qcm['Qcm']['visible']){echo 'publié';}else{echo 'non publié';}; ?></td>
                        <td>
                            <?php

                            if($qcm['Qcm']['personne_id'] == $user_id){
                                ?>
                                <a class="modifier_question" href="/professeurs/modifier_qcm/<?php echo $qcm['Qcm']['id']?>">Modifier</a>/
                                <a class="supprimer_question" href="/professeurs/supprimer_qcm/<?php echo $qcm['Qcm']['id']?> ">Supprimer</a>/
                                <a class="consulter_resultat" href="/professeurs/consulter_resultat/<?php echo $qcm['Qcm']['id']?> ">Resultats Etudiants</a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php

                }
                ?>
                <tfoot>
                <tr>
                    <td></td>
                    <td> <a href="/professeurs/add_qcm" class="btn btn-success">Ajouter un QCM</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>