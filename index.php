<?php

include 'page/debut.php';
include 'data/pendu.php';

if(isset($_GET['jeu_id'])) { //+ ds la liste
	include 'data/dico_FR.php';
	commencer($_GET['jeu_id'], $dico_FR);
	header('Location:jeu.php');
}

?>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <?php for($i=0; $i<count($niveau); $i++) { ?>
            <div class="card mb-4 shadow-sm">
                <div class="bg-info text-white card-header">
                    <h4 class="my-0 font-weight-normal"><?php echo $niveau[$i]['nom']; ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"> <?php echo $niveau[$i]['essai']; ?>essais <small class="text-muted">/partie</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li> <?php echo $niveau[$i]['lettre']; ?> lettre(s)</li>
                        <li> <?php echo $niveau[$i]['nomCommun']; ?> majuscule(s)</li>
                        <li> <?php echo $niveau[$i]['cDiacr']; ?> caracteres diactritiques</li>
                        <li> <?php echo $niveau[$i]['mComp']; ?> mots compose</li>
                    </ul>
                    <a type="button" class="btn btn-lg btn-block btn-outline-success" href="index.php?jeu_id=<?php echo $niveau[$i]['id']; ?>">
                        Jouer
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<?php

include 'page/fin.php';