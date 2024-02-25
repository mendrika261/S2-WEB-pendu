<?php

	include 'page/debut.php';
	include 'data/pendu.php';

	if(isset($_GET['fin']) || !isset($_SESSION['mot'])) {
		finir();
		header('Location:index.php');
	}

	print_r($_SESSION['mot']);
	$mot = $_SESSION['mot'];

	if(isset($_GET['lettre'])) {
		$res = iDansChaine($_GET['lettre'], $mot);
		if($res[0] != -1 AND !in_array($res[0], $_SESSION['iTrouve'])) {
			for($i = 0; $i<count($res); $i++) {
				$_SESSION['iTrouve'][] = $res[$i];
			}
        } elseif ($res[0] != -1 AND in_array($res[0], $_SESSION['iTrouve'])) {
            $erreur = 'Il';
		} else {
			$erreur = 'Il n\'y a pas de '.htmlspecialchars($_GET['lettre']).' dans le mot';
		}
	}

	if(count($_SESSION['iTrouve']) == mb_strlen($mot)+1) {
		finir();
		header('Location:index.php');
	}

	print_r($_SESSION['niveau']);
	
?>


<div>	
	<div>
		<?php afficherMot($_SESSION['iTrouve'], $mot); ?>
	</div>

	<?php for($iA=0; $iA<count($alphabet); $iA++) { ?>
	<div>
		<?php for($i=0; $i<mb_strlen($alphabet[$iA]); $i++) { ?>
			<a class="btn m10 <?php echo (in_array($i, $_SESSION['iTrouve']))?'btn-secondary':'btn-primary'; ?>" href="jeu.php?lettre=<?php echo mb_substr($alphabet[$iA], $i, 1, 'utf8'); ?>">
				<?php echo mb_substr($alphabet[$iA], $i, 1, 'utf8'); ?>
			</a>
		<?php } ?>
	</div>
	<?php } ?>

	<a href="jeu.php?fin">Finir</a>
</div>

<?php

include 'page/fin.php';