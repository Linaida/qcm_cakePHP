<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 28/11/2015
 * Time: 12:07
 */

?>
<div id="resultat_etudiant">

    <?php foreach($etudiant_qcm as $etudiant) ?>
    Votre resultat au qcm  <?php echo $etudiant['Qcm']['titre'];?> est de :
    <?php echo $etudiant['Etudiant']['resultat'];?> / <?php echo sizeof($qcm['Question_reponse']) ;?>

</div>
