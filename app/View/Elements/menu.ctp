<?php
$this->start('menu'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if($this->Session->read('etudiant')){
                ?>
                <ul class="nav navbar-nav">
                    <li class="">
                        <a class="navbar-brand"  href="/personnes/profil">Profil</a>
                    </li>

                    <li class="">
                        <a class="navbar-brand"  href="/etudiants/qcms">QCM</a>
                    </li>
                    <li class="">
<!--                        <a class="navbar-brand"  href="/etudiant/resultats">RESULTATS</a>-->
                    </li>
                    <li>
                        <a id="btn_deconnexion" class="navbar-brand"   href= "/personnes/logout">Déconnexion</a>
                    </li>
                </ul>

            <?php }
            if($this->Session->read('professeur')){
                ?>
                <ul class="nav navbar-nav">
                    <li class="">
                        <a class="navbar-brand"  href="/personnes/profil">Profil</a>
                    </li>
                    <li class="dropdown">
                        <a class="navbar-brand"  href="/professeurs/questions"> Questions</a>
                    </li>
                    <li class="">
                        <a class="navbar-brand"  href="/professeurs/qcms"> QCM</a>
                    </li>
                    <li>
                        <a id="btn_deconnexion" class="navbar-brand"   href= "/personnes/logout">Déconnexion</a>
                    </li>
                </ul>
            <?php } ?>

        </div>

    </div> <!-- Fermeture container-fluid -->

</nav> <!-- Fermeture navbar -->
<?php $this->end('menu') ?>