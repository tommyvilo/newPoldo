
<?php foreach($panini as $panino):
    if($acapo==4){ echo '</tr>'; $acapo=0;echo '<tr>'; }
    else{$acapo=$acapo+1;} ?>
    <td>
        <div class="square" align="center" style="margin-right: 3vw; margin-top: 2vw;">
            <img id="paninoIMG" src="images/panino.png">
            <hr>
            <p style="font-size: 1.4vw;"><b id="nome<?php echo $panino['id']; ?>"><?php echo $panino['nome']; ?></b></p>
            <hr>
            <div class="testoPiccolo">
                <div class="ingredienti">
                    <p align="left"><?php echo '<br>'.$panino['ingredienti']; ?></p>
                </div>
                <p align="left">Disponibilità: &nbsp; <i class="quantitaI" id="D<?php echo $panino['id']; ?>"><?php //echo $panino['quantita']; ?></i></p>
            </div>
            <hr>
            <p id="prezzo<?php echo $panino['id']; ?>" align="left" style="font-size: 1.8vw;">€ <?php echo $panino['prezzo']; ?></p>

            <div class="pulsantiD" align="right">
                <button class="aggiungi" id="<?php echo $panino['id']; ?>" onclick="aggiungi(<?php echo $panino['id']; ?>)">+</button>
                <button class="togli" onclick="togli(<?php echo $panino['id']; ?>)">-</button>
            </div>
        </div>
    </td>
<?php endforeach ?>