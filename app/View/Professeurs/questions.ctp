<div class="row " >
    <div class="col-md-11 col-md-offset-1 page">
<h2><?php echo $msg ?></h2>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td></td>
                    <td>Theme</td>
                    <td>Auteur</td>
                    <td>Question</td>
                    <td>Reponse 1</td>
                    <td>Reponse 2</td>
                    <td>Reponse 3</td>
                    <td>Reponse 4</td>
                    <td>Solution</td>
                    <td>Opérations</td>
                </tr>
                </thead>
                <tbody>

                <?php foreach($questions as $question){ ;
        ?>

                    <tr>
                        <td><?php  $question['Question_reponse']['id']; ?></td>
                        <td><?php echo $question['theme']['nom']; ?></td>
                        <td><?php echo $question['personne']['login']?></td>
                        <td><?php echo $question['Question_reponse']['question']; ?></td>
                        <td><?php echo $question['Question_reponse']['reponse1']; ?></td>
                        <td><?php echo $question['Question_reponse']['reponse2']; ?></td>
                        <td><?php echo $question['Question_reponse']['reponse3']; ?></td>
                        <td><?php echo $question['Question_reponse']['reponse4']; ?></td>
                        <td><?php echo $question['Question_reponse']['solution']; ?> </td>


                        <td>
                            <?php

                            if($question['Question_reponse']['personne_id'] == $user_id){
                                ?>
                                <a class="modifier_question" href="/professeurs/modifier_question/<?php echo $question['Question_reponse']['id']?>">Modifier</a>/
                                <a class="supprimer_question" href="/professeurs/supprimer_question/<?php echo $question['Question_reponse']['id']?>    ">Supprimer</a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
        <?php        }    ?>
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td> <a href="/professeurs/add_question" class="btn btn-success">Ajouter une question</a></td>
                </tr>
                </tfoot>
                </table>

    </div>

</div>
