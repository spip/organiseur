<?php

/***************************************************************************\
 *  SPIP, Système de publication pour l'internet                           *
 *                                                                         *
 *  Copyright © avec tendresse depuis 2001                                 *
 *  Arnaud Martin, Antoine Pitrou, Philippe Rivière, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribué sous licence GNU/GPL.     *
 *  Pour plus de détails voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function formulaires_configurer_messagerie_agenda_charger_dist() {
	$valeurs = array();
	foreach (array(
		'messagerie_agenda',
	) as $m) {
		$valeurs[$m] = $GLOBALS['meta'][$m];
	}
	return $valeurs;
}

function formulaires_configurer_messagerie_agenda_traiter_dist() {
	$res = array('editable' => true);
	foreach (array(
		'messagerie_agenda',
	) as $m) {
		if (!is_null($v = _request($m))) {
			ecrire_meta($m, $v == 'oui' ? 'oui' : 'non');
		}
	}

	$res['message_ok'] = _T('config_info_enregistree');

	return $res;
}
