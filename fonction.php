<?php


function getNiveau($id) {
	global $niveau;
	for($i=0;$i<count($niveau); $i++) {
		if($niveau[$i][$id] == $id)
			return $id;
	}
}

function commencer($id, $dico) {
	$iR = rand(0, count($dico));

	if($id == 4551) {
		while(mb_strlen($dico[$iR])>=8) {
			$iR = rand(0, count($dico));
		}
	} else {
		while(mb_strlen($dico[$iR])<8) {
			$iR = rand(0, count($dico));
		}
	}

	$_SESSION['mot'] = $dico[$iR];
	$_SESSION['niveau'] = $niveau;
	$_SESSION['iTrouve'][] = -1;
	$_SESSION['essai'] = 0;
}

function iDansChaine($carac, $mot) {
	$res[] = -1;
	$iR = 0;
	for($i=0; $i<mb_strlen($mot); $i++) {
		if(mb_substr($mot, $i, 1, 'utf8') == $carac) {
			$res[$iR] = $i;
			$iR++;
		}
	}
	return $res;
}

function afficherMot($trouve, $mot) {
	for($i=0; $i<mb_strlen($mot); $i++) {
		?><span class="case"><?php
			if(in_array($i, $trouve)) {
				echo mb_substr($mot, $i, 1, 'utf8');
			} else if($mot[$i] == ' ') {
				echo ' ';
			} else {
				echo '_';
			}
		?></span><?php
	}
}

function finir() {
	session_destroy();
}