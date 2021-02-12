<?php require_once("config.php");?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>

    <?php $panini=getPanini(); ?>
    <?php //header("refresh: 10"); ?>
    <?php  $acapo= 0?>
        <div id="tabellaPanini">
    <?php foreach($panini as $panino): ?>


            <div class="categorie">
                <table style="width: 100%;border: 0;" id="BANDIERINE<?php echo $panino['nome']; ?>" >
                    <tr>
                        <td class="categoriaSX"><img id="bandierina" src="images/DS<?php echo $panino['DS']; ?>.PNG" ></td>
                        <td class="categoriaDX"><img id="bandierina" src="images/caldoFreddo<?php echo $panino['caldoFreddo'];?>.PNG" ></td>
                    </tr>
                    <tr>
                        <td class="categoriaSX"><img id="bandierina" <?php if($panino['categoria']==1): ?>src="images/categoria1.PNG"<?php elseif($panino['categoria']==2): ?>src="images/categoria2.PNG"><?php endif; ?></td>
                        <td class="categoriaDX"><img id="bandierina" <?php if($panino['categoria']==3): ?>src="images/categoria3.PNG"<?php endif; ?>></td>
                    </tr>
                </table>
            <div class="square" id="square<?php echo $panino['nome']; ?>" align="center" style="margin-top: -<?php if($panino['categoria']==0){echo "22";}else{echo "30";}?>vw;">
                <img id="paninoIMG" src="images/<?php echo $panino['image']; ?>" >
                <hr>
                <p style="font-size: 5vw;line-height: 0.2;"><b id="nome<?php echo $panino['nome']; ?>"><?php echo $panino['nome']; ?></b></p>
                <hr>
                <div class="testoPiccolo">
                    <div class="ingredienti">
                        <p align="left"><?php echo '<br>'.$panino['ingredienti']; ?></p>
                    </div>
                    <p align="left">Disponibilità: &nbsp; <i class="quantitaI" id="D<?php echo $panino['nome']; ?>"><?php if($panino['quantita']==10000){echo "Non garantita";}else{echo $panino['quantita'];} ?></i></p>
                </div>
                <hr>
                <p id="prezzo<?php echo $panino['nome']; ?>" align="left" style="font-size: 7vw;margin-top: 0;">€ <?php echo fixaPrezzi($panino['prezzo']); ?></p>

                <div class="pulsantiD" align="right">
                    <button class="aggiungi" id="<?php echo $panino['nome']; ?>" onclick="aggiungi('<?php echo $panino['nome']; ?>')">+</button>
                    <button class="togli" onclick="togli('<?php echo $panino['nome']; ?>')">-</button>
                </div>
            </div>
            </div>
    <?php endforeach ?>

        </div>
