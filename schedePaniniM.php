<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>

    <?php $panini=getPanini(); ?>
    <?php //header("refresh: 10"); ?>
    <?php  $acapo= 0?>
    <?php foreach($panini as $panino): ?>

            <div class="square" align="center" style="margin-right: 3vw; margin-top: 2vw;">
                <img id="paninoIMG" src="images/<?php echo $panino['image']; ?>" >
                <hr>
                <p style="font-size: 1.4vw;"><b id="nome<?php echo $panino['nome']; ?>"><?php echo $panino['nome']; ?></b></p>
                <hr>
                <div class="testoPiccolo">
                    <div class="ingredienti">
                        <p align="left"><?php echo '<br>'.$panino['ingredienti']; ?></p>
                    </div>
                    <p align="left">Disponibilità: &nbsp; <i class="quantitaI" id="D<?php echo $panino['nome']; ?>"><?php //echo $panino['quantita']; ?></i></p>
                </div>
                <hr>
                <p id="prezzo<?php echo $panino['nome']; ?>" align="left" style="font-size: 1.8vw;">€ <?php echo fixaPrezzi($panino['prezzo']); ?></p>

                <div class="pulsantiD" align="right">
                    <button class="aggiungi" id="<?php echo $panino['nome']; ?>" onclick="aggiungi('<?php echo $panino['nome']; ?>')">+</button>
                    <button class="togli" onclick="togli('<?php echo $panino['nome']; ?>')">-</button>
                </div>
            </div>

    <?php endforeach ?>

