# Projet QCM sous CakePHP


## Ce projet a été réalisé dans le cadre d'un projet d'étude,  les sources sont libres

##Difficultés pour le lancement en local :
Si vous rencontrez des difficultés pour le lancer sous WAMP ou EASYPHP, assurez vous que le module rewrite soit activé sous apache.
Si les problèmes persistent, il vous faudra faire un virtualhost sous cette forme :

    <VirtualHost 127.0.0.1:80>
    DocumentRoot D:\Lab\qcm2
    ServerName qcm2.dev
    ServerAlias www.qcm2.dev
    DirectoryIndex index.php

	<Directory "D:\Lab\qcm2">
	Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order Allow,Deny
    Allow from all
	</Directory>

    </VirtualHost>

