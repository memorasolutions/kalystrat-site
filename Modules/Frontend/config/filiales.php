<?php

/**
 * P22-S13 [I] Cleanup doublon : ce fichier est désormais un PROXY vers la source canonique
 * Modules/Kalystrat/config/filiales.php. Conserve la rétrocompatibilité avec les vues legacy
 * qui utilisent `require module_path('Frontend', 'config/filiales.php')`.
 *
 * Source unique de vérité : Modules/Kalystrat/config/filiales.php (chargé via ServiceProvider
 * en clé `kalystrat.filiales`, accessible aussi via config('kalystrat.filiales')).
 *
 * Désactivable : restaurer filiales.php.bak-p22s13 si nécessaire.
 */
return require module_path('Kalystrat', 'config/filiales.php');
