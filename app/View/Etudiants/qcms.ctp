<div class="row">
    <div class="col-md-11 col-md-offset-1">

        <div>
            <table id="qcm_consulter" class="table table-striped">
                <h3>QCM déjà remplis</h3>
                <thead>
                <tr>
                    <td></td>
                    <td>Titre</td>
                    <td>Opérations</td>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach($qcms_consulter as $qcm_consulter){ ;
                if( $qcm_consulter['Etudiant']['qcm_id'] != null || $qcm_consulter['Etudiant']['qcm_id'] == $user_id ) {
                    ?>
                    <tr>
                        <td><?php $qcm_consulter['Qcm']['id']; ?></td>
                        <td><?php echo $qcm_consulter['Qcm']['titre'] ?></td>

                        <td>

                            <a class="" href="/etudiants/consulter_resultat/<?php echo $qcm_consulter['Qcm']['id']; ?>">Consulter
                                ses resultats</a>

                        </td>
                    </tr>
                    <?php
                }
                }
                ?>
                </tbody>
                </table>
        </div>
        <div>
            <table id="qcm_remplir" class="table table-striped">
                <h3>QCM à remplir</h3>
                <thead>
                <tr>
                    <td></td>
                    <td>Titre</td>
                    <td>Opérations</td>
                </tr>
                </thead>
                <tbody>

                <?php
                //  debug($qcms);
                foreach($qcms_remplir as  $qcm_remplir){ ;
                    ?>
                    <?php


                    if( $qcm_remplir['Etudiant']['personne_id']== null || $qcm_remplir['Etudiant']['personne_id'] != $user_id ) {
                        ?>

                        <tr>
                            <td><?php $qcm_remplir['Qcm']['id']; ?></td>
                            <td><?php echo $qcm_remplir['Qcm']['titre'] ?></td>
                            <td>

                                <a class="" href="/etudiants/remplir_qcm/<?php echo $qcm_remplir['Qcm']['id']; ?>">Remplir
                                    QCM</a>
                            </td>
                        </tr>

                        <?php
                    }else{}
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>