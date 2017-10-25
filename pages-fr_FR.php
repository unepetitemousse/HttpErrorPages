<?php
return array(

  // STANDARD ERROR CODES
  // =======================================================

  '400' => array(
    'emoji' => '💩',
    'permanent' => true,
    'global' => false,
    'title' => 'Mauvaise Requête',
    'message' => 'Le serveur ne peut pas traiter la requête en raison de quelque chose qui est perçu comme une erreur du client.'
  ),
  '401' => array(
    'emoji' => '🔐',
    'permanent' => true,
    'global' => false,
    'title' => 'Non-autorisé',
    'message' => 'La ressource demandée nécessite une authentification.'
  ),

  '403' => array(
    'emoji' => '✋',
    'permanent' => false,
    'global' => false,
    'title' => 'Accès refusé',
    'message' => 'La ressource demandée nécessite une authentification.'
  ),

  // http 404 not found
  '404' => array(
    'emoji' => '😅',
    'permanent' => true,
    'global' => false,
    'title' => 'Ressource introuvable',
    'message' => "La ressource demandée n'a pas pu être trouvée mais peut être à nouveau disponible dans le futur."
  ),

  // internal server error
  '500' => array(
    'emoji' => '☠️',
    'permanent' => false,
    'global' => false,
    'title' => 'Page actuellement indisponible',
    'message' => "Un souci technique nous empêche de vous présenter la page."
  ),

  // unknown http method
  '501' => array(
    'emoji' => '🤔',
    'permanent' => true,
    'global' => false,
    'title' => 'Non implémenté',
    'message' => 'Le serveur ne peut pas reconnaître la méthode de requête.'
  ),

  // http proxy forward error
  '502' => array(
    'emoji' => '💔',
    'permanent' => false,
    'global' => true,
    'title' => 'Page actuellement indisponible',
    'message' => "Nous rencontrons des difficultés techniques sur nos serveurs.\nNos techniciens cherchent à rétablir le service."
  ),

  // webserver service error
  '503' => array(
    'emoji' => '🔥',
    'permanent' => false,
    'global' => true,
    'title' => 'Page actuellement indisponible',
    'message' => "Nous rencontrons des difficultés techniques sur nos serveurs.\nNos techniciens cherchent à rétablir le service."
  ),

  // gateway timeout
  '504' => array(
    'emoji' => '⏲️',
    'permanent' => false,
    'global' => false,
    'title' => 'Page actuellement indisponible',
    'message' => "Nous rencontrons des difficultés techniques sur nos serveurs.\nNos techniciens cherchent à rétablir le service."
  ),

  // CUSTOM ERROR CODES
  // =======================================================

  // webserver origin error
  '520' => array(
    'emoji' => '📛',
    'permanent' => false,
    'global' => true,
    'title' => 'Erreur d\'origine - Hôte inconnu',
    'message' => 'Le nom d\'hôte demandé n\'est pas routé. Utilisez uniquement des noms d\'hôtes pour accéder aux ressources.'
  ),

  // webserver down error
  '521' => array(
    'permanent' => false,
    'global' => true,
    'title' => 'Page actuellement indisponible',
    'message' => "Nous rencontrons des difficultés techniques sur nos serveurs.\nNos techniciens cherchent à rétablir le service."
  ),

  // maintenance
  '533' => array(
    'emoji' => '🛠',
    'permanent' => false,
    'global' => true,
    'title' => 'Maintenance planifiée',
    'message' => "Ce site est actuellement en maintenance. \nNos techniciens travaillent dur pour le remettre en ligne bientôt."
  )
);