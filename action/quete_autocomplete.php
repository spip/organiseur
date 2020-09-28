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

function action_quete_autocomplete_dist() {
	$securiser_action = charger_fonction('securiser_action', 'inc');
	$arg = $securiser_action();
	if ($arg
		and $arg == $GLOBALS['visiteur_session']['id_auteur']
	) {
		include_spip('inc/actions');
		include_spip('inc/json');
		echo ajax_retour(
			recuperer_fond('prive/squelettes/inclure/organiseur-autocomplete-auteur', array('term' => _request('term'))),
			'application/json'
		);
	}
}
