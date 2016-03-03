<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2015
 * Time: 12:07
 */

?>
<div id="resultat_etudiant">


        <table class="table table-striped">
            <thead>
            <tr>
                <td></td>
                <td>Etudiant</td>
                <td>Resultat</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($resultats as $resultat){
                ?>

                <tr>
                    <td></td>
                    <td><?php echo $resultat['Personne']['login'];?></td>
                    <td><?php echo $resultat['Etudiant']['resultat'];?> / <?php echo sizeof($qcm['Question_reponse']) ;?></td>
                </tr>

                <?php

            } ?>
            </tbody>
        </table>
</div>
