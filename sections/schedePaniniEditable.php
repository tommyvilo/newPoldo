<table id="tabellaPanini" style="border: 0;">        <td>            <div class="square" align="center" id="square1" style="margin-right: 3vw; margin-top: 2vw;">                <h4>"IMMAGINE"</h4>                <hr>                <p style="font-size: 1.4vw;"><input id="titolo" placeholder="TITOLO"  maxlength="20" required></p>                <hr>                <div class="testoPiccolo">                    <div class="ingredienti">                        <p align="left">INGREDIENTI:</p>                        <textarea type="text" id="ingredienti" placeholder="inserisci con separatore - " row="4" cols="10" required></textarea>                        <br>                    </div>                    <table id="addPanino2" ><td><p id="disponibilita" align="left">Disponibilità PZ:</p></td><td><input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="modPanini"  type="number" id="editQT" placeholder="<?php echo 0 ;?>" name="username" maxlength="3" required ></td></table>                </div>                <hr>                <table id="addPanino1" ><td><p id="prezzo" align="left" >€</p></td><td><input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="modPanini"  type="number" id="prezzoEdit" placeholder="<?php echo 0 ;?>" name="username" maxlength="4" required ></td></table>                </p>                <div class="pulsantiD" align="right">                    <button class="aggiungi" id="nome" >+</button>                    <button class="togli">-</button>                </div>            </div>        </td></table><script src="libs/dropzone-5.7.0/dist/dropzone.js"></script>