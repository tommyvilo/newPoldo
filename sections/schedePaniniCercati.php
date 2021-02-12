<html>
<?php require_once("../config.php");?>
<?php require_once(ROOT_PATH . "/functions/viewPanini.php");?>
<?php require_once(ROOT_PATH ."/libs/Mobile_Detect.php"); ?>
</head>
<body>
<table id="tabellaPanini" style="border: 0;">
    <?php $panini=getPaniniCercati($_GET['tipo'],$_GET['dato']);?>
    <?php //header("refresh: 10"); ?>
    <?php  $acapo= 0?>
    <?php if(count($panini)==0): ?>
        <tr>
            <td></td>
            <td class="spiacante"><img id='poldoTriste' src='images/poldoSgravatoTriste.gif'></td>
            <td></td>
        </tr>
    <?php else: ?>
    <?php foreach($panini as $panino):
        if($acapo==4){ echo '</tr>'; $acapo=1;echo '<tr>'; }
        else{$acapo=$acapo+1;} ?>
        <td>
            <div class="categorie">
                <table style="width: 100%;border: 0;">
                    <tr>
                        <td class="categoriaSX"><img id="bandierina" src="images/DS<?php echo $panino['DS']; ?>.PNG" ></td>
                        <td class="categoriaDX"><img id="bandierina" src="images/caldoFreddo<?php echo $panino['caldoFreddo'];?>.PNG" ></td>
                    </tr>
                    <tr>
                        <td class="categoriaSX"><img id="bandierina" <?php if($panino['categoria']==1): ?>src="images/categoria1.PNG"<?php elseif($panino['categoria']==2): ?>src="images/categoria2.PNG"><?php endif; ?></td>
                        <td class="categoriaDX"><img id="bandierina" <?php if($panino['categoria']==3): ?>src="images/categoria3.PNG"<?php endif; ?>></td>
                    </tr>
                </table>

                <?php $detect = new Mobile_Detect; ?>

                <?php if($detect->isMobile() && !$detect->isTablet()):?>
                <div class="square" id="square<?php echo $panino['nome']; ?>" align="center" style="margin-top: -<?php if($panino['categoria']==0){echo "22";}else{echo "30";}?>vw;">
                    <?php else: ?>
                    <div class="square" id="square<?php echo $panino['nome']; ?>" align="center" style="<?php  ?>margin-right: 0.9vw; margin-top: -<?php if($panino['categoria']==0){echo "6.5";}else{echo "8";}?>vw;margin-left: 0.9vw">
                        <?php endif; ?>
                        <img id="paninoIMG" src="images/<?php echo $panino['image']; ?>" >
                        <hr>
                        <?php if($detect->isMobile() && !$detect->isTablet()):?>
                            <p style="font-size: 5vw;line-height: 0.2;"><b id="nome<?php echo $panino['nome']; ?>"><?php echo $panino['nome']; ?></b></p>
                        <?php else: ?>
                            <p style="font-size: 1.4vw;"><b id="nome<?php echo $panino['nome']; ?>"><?php echo $panino['nome']; ?></b></p>
                        <?php endif; ?>
                        <hr>
                        <div class="testoPiccolo">
                            <div class="ingredienti">
                                <p align="left"><?php echo '<br>'.$panino['ingredienti']; ?></p>
                            </div>
                            <p align="left">Disponibilità: &nbsp; <i class="quantitaI" id="D<?php echo $panino['nome']; ?>"><?php if($panino['quantita']==10000){echo "Non garantita";}else{echo $panino['quantita'];} ?></i></p>
                        </div>
                        <hr>
                        <?php if($detect->isMobile() && !$detect->isTablet()):?>
                            <p id="prezzo<?php echo $panino['nome']; ?>" align="left" style="font-size: 7vw;margin-top: 0;">€ <?php echo fixaPrezzi($panino['prezzo']); ?></p>
                        <?php else: ?>
                            <p id="prezzo<?php echo $panino['nome']; ?>" align="left" style="font-size: 1.8vw;">€ <?php echo fixaPrezzi($panino['prezzo']); ?></p>
                        <?php endif; ?>
                <div class="pulsantiD" align="right">
                    <button class="aggiungi" id="<?php echo $panino['nome']; ?>" onclick="aggiungi('<?php echo $panino['nome']; ?>')">+</button>
                    <button class="togli" onclick="togli('<?php echo $panino['nome']; ?>')">-</button>
                </div>
            </div>
            </div>
        </td>
    <?php endforeach ?>
    <?php echo '</tr>' ?>
    <?php endif; ?>
</table>
</body>
</html>