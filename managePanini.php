
<?php //session_start();?>
<?php require_once("config.php");?>
<?php include(ROOT_PATH . "/sections/head_section.html"); //incorporo il tag head ?>
<?php require_once(ROOT_PATH . "/functions/saluto.php");?>
<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>

<link rel="stylesheet" type="text/css" href="style/seller.css" />



</head>
<body>
<?php $panini=getTotalPanini(); ?>
<?php $laDispo=getIfDispo(); ?>


<div class="container">
    <?php include(ROOT_PATH . "/sections/menu_sectionSeller.php"); //incorporo il menu ?>
    <div class="bordi" id="sellerPage">
        <h5 id="subtitle" >GESTIONE PANINI</h5>
        <hr style="background-color: orange; height: 3px;">
        <br>
        <th id="save" >
            <table id="checkBox2" >
                <td>
                    <button id="edit" onclick="editModeON()" >EDIT</button>
                </td>
                <td>
                    <table id="checkBox" ><th>FUNZIONE DISPONIBILITA'</th><th><?php echo getFraseDisponibilita(); ?></th></table>
                </td>
            </table>
        </th>



        <table id="checkBox1" >
            <th>
                <table id="checkBox" ><th>FUNZIONE DISPONIBILITA'</th><th><input name="disponibilita" id="spuntone" value="<?php echo getAvaiable(); ?>" type="checkbox" onclick="change()" id="avaiable" <?php echo getChecked(); ?> ></th></table>
            </th>

            <th>
                <td>
                    <button id="salva" onclick="done()" >SALVA</button>
                </td>
                <td>
                    <button id="annulla" onclick="editModeOFF()" >ANNULLA</button>
                </td>
            </th>
        </table>

        <table id="SHOWtotalBox" >
            <th>
                <?php  include(ROOT_PATH . "/sections/sectionShowPanini.php"); ?>
            </th>
        </table>

        <table id="totalBox" >
            <th>
                <?php  include(ROOT_PATH . "/sections/sectionManPanini.php"); ?>
            </th>
            <th id="save" >
            </th>
        </table>
        <br>
        <h2 id="SubTitle" >Crea Panini:</h2>
        </table>
        <table id="addPanino" >
            <th>
                <?php include(ROOT_PATH . "/sections/schedePaniniEditable.php"); ?>
            </th>

            <div id="pc" >
                <th>
                    <table id="checkBoxPC" >
                        <tr id="aoRiordina">
                            <th>
                                <label for="cars">CATEGORIA:</label>
                                <select name="cars" id="categoria">
                                    <option value="0">Dolce</option>
                                    <option value="1">Salato</option>
                                </select>
                            </th>

                            <th>
                                <label for="nothing">TIPOLOGIA:</label>
                                <select name="nothing" id="tipo">
                                    <option value="0">Normale</option>
                                    <option value="1">Piccante</option>
                                    <option value="2">Veggy</option>
                                    <option value="3">Gluten Free</option>
                                </select>
                            </th>
                            <th>
                                <label for="nothing">SCEGLI SE è:</label>
                                <select name="nothing" id="caldoFreddo">
                                    <option value="0">Caldo</option>
                                    <option value="1">Freddo</option>
                                </select>
                            </th>
                        </tr>
                        <tbody>
                        <td id="save" >
                            <button id="salva1" onclick="takeAll2()" >SALVA</button>
                        </td>
                        </tbody>
                    </table>
                </th>
            </div>
        </table>
        <br>
        <div id="smartphone" >
            <label for="cars">CATEGORIA:</label>
            <select name="cars" id="categoria">
                <option value="0">Dolce</option>
                <option value="1">Salato</option>
            </select>
            <label for="nothing">TIPOLOGIA:</label>
            <select name="nothing" id="tipo">
                <option value="0">Normale</option>
                <option value="1">Piccante</option>
                <option value="2">Veggy</option>
                <option value="3">Gluten Free</option>
            </select>
            <label for="nothing">SCEGLI SE è:</label>
            <select name="nothing" id="caldoFreddo">
                <option value="0">Caldo</option>
                <option value="1">Freddo</option>
            </select>
            <button id="salva1" onclick="takeAll2()" >SALVA</button>

        </div>
    </div>
<br>
    <br>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script>
<script> // src="libs/dropzone-5.7.0/dist/dropzone.js"></script>
<script>

    var panini = <?php echo json_encode($panini); ?>;
    var laDispo = <?php echo json_encode($laDispo); ?>;

    var coloriSelect = [];
    console.log(laDispo);

    var i;
    for (i = 0; i < panini.length; i++) {
        coloriSelect.push(0);
    }

    console.log(laDispo.length);

    for (i = 0; i < laDispo.length; i++){
        console.log("ciao");
        if(laDispo[i][1]=='0'){
            document.getElementById(laDispo[i][0]+"Quantity").disabled = true ;
            document.getElementById(laDispo[i][0]+"Check").checked  = false ;

        }
        else{
            document.getElementById(laDispo[i][0]+"Quantity").disabled = false ;
            document.getElementById(laDispo[i][0]+"Check").checked  = true   ;

        }
        }




    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    var element = document.getElementById('text');
    if (isMobile && screen.width<900) {
        console.log ("You are using Mobile");
        console.log (screen.width);
        document.getElementById("checkBoxPC").style.display = "none";
        document.getElementById("checkBoxMobile").style.display = "unset";
    }
    else {
        document.getElementById("smartphone").style.display = "none";
        document.getElementById("pc").style.display = "unset";
        document.getElementById("checkBoxPC").style.display = "unset";
        console.log ("You are using Desktop");

    }

    //document.getElementById("spuntone").disabled = true;

    function allowDispo(panino) {
        var campo = document.getElementById(panino+"Quantity").disabled;
        console.log(campo);
        if(campo){
            document.getElementById(panino+"Quantity").disabled = false;

        }
        else{
            document.getElementById(panino+"Quantity").disabled = true;
        }
    }

    function done(){
        takeAll();
        location.replace("/functions/modAvaiableCK.php?check="+document.getElementById("spuntone").value);
    }

    function editModeON(){
        document.getElementById("SHOWtotalBox").style.display = "none";
        document.getElementById("checkBox2").style.display = "none";
        document.getElementById("totalBox").style.display = "unset";
        document.getElementById("checkBox1").style.display = "inline-flex";
    }

    function editModeOFF(){
        document.getElementById("checkBox2").style.display = "inline-flex";
        document.getElementById("SHOWtotalBox").style.display = "unset";
        document.getElementById("totalBox").style.display = "none";
        document.getElementById("checkBox1").style.display = "none";
    }

    function change()
    {
        if(document.getElementById("spuntone").value==0){
            document.getElementById("spuntone").value = 1;
        }
        else{
            document.getElementById("spuntone").value = 0;
        }

    }





    function takeAll() {
        var i;
        //var vuoto="";
        for (i = 0; i < panini.length; i++) {

            if (document.getElementById(panini[i].nome+"Price").value.localeCompare("")){
                panini[i].prezzo=document.getElementById(panini[i].nome+"Price").value;
                //console.log("ciao");
            }
            //else{console.log("co");}
            if (document.getElementById(panini[i].nome+"Ingredients").value.localeCompare("")){
                panini[i].ingredienti=document.getElementById(panini[i].nome+"Ingredients").value;}
            //else{console.log("fuck");}
            if (document.getElementById(panini[i].nome+"Quantity").value.localeCompare("")){
                panini[i].quantita=document.getElementById(panini[i].nome+"Quantity").value;}
            //else{console.log("zio");}
            if (document.getElementById(panini[i].nome+"Check").checked == true){
                panini[i].disponibilita=1;
            }
            else{
                panini[i].disponibilita=0;
            }
        }
        console.log(panini);
        //panini=  [{ 'name' : 'Abel', 'age' : 1 },{ 'name' : 'Bella', 'age' : 2 },{ 'name' : 'Chad', 'age' : 3 },];
        //var myObject = JSON.parse(panini);
        //console.log(myObject);
        var json_str = JSON.stringify(panini);
        var json_str1 = JSON.stringify(returnDelPanini());
        console.log(json_str);
        document.cookie = "mioBiscotto" + "=" + json_str + "; path=/";
        //document.cookie = "ssssssssssss" + "=" + 'sssss' + "; path=/";s
        console.log("suffraggette");
        document.cookie = "toDelete" + "=" + json_str1 + "; path=/";
        //console.log(JSON.stringify(myObject));
    }

    function checkAlForm(){
        var check1=1;
        if (document.getElementById("titolo").value.localeCompare("")) {
            check1=check1*1;
        }
        else{
            check1=check1*0;
        }
        if (document.getElementById("ingredienti").value != null) {
            check1=check1*1;
        }
        else{
            check1=check1*0;
        }
        if (document.getElementById("prezzoEdit").value.localeCompare("")) {
            check1=check1*1;
        }
        else{
            check1=check1*0;
        }
        if (document.getElementById("editQT").value.localeCompare("")) {
            check1=check1*1;
        }
        else{
            check1=check1*0;
        }
        console.log(check1);
        return check1;
    }


    function takeAll2(){
        var panino = {nome:"", ingredienti:"", prezzo:"", DS:"", quantita:"", categoria:"", image:"", avaiableCK:"", caldoFreddo:""};
        if (checkAlForm()) {
                panino.nome = document.getElementById("titolo").value;
                panino.ingredienti = document.getElementById("ingredienti").value;
                panino.prezzo = document.getElementById("prezzoEdit").value;
                panino.DS = document.getElementById("categoria").value;
                panino.quantita = document.getElementById("editQT").value;
                //console.log(document.getElementById("prezzoEdit").value);
                panino.categoria = document.getElementById("tipo").value;
                panino.image = "default.png";
                panino.avaiableCK = panini[0].avaiableCK;
                panino.caldoFreddo = document.getElementById("caldoFreddo").value;
                console.log("ciao");
                var json_str = JSON.stringify(panino);
                document.cookie = "mioBiscotto1" + "=" + json_str + "; path=/   ";
                location.replace("/functions/addPanino.php");
        }

    }

    function checkIfHaveToDelete(){
        var erRisultato=1;
        for(i = 0; i < coloriSelect.length; i++){
            if(coloriSelect[i]==1){
                erRisultato= erRisultato*0;
            }
        }
        return erRisultato;
    }


    function returnIdPosition(id){
        var contatore=0;
        var i;
        for (i = 0; i < panini.length; i++) {
            if(!panini[i].nome.localeCompare(id)){
                return contatore;
            }
            contatore++;
        }

    }

    function returnDelPanini(){
        var i;
        var paniniToDelete = [];
        for(i = 0; i < coloriSelect.length; i++){
            if(coloriSelect[i]==1){
                paniniToDelete.push(panini[i].nome);
            }

        }
        return paniniToDelete;
    }

    function selectColor(id){
        var laPosizione=returnIdPosition(id);
        if(coloriSelect[laPosizione]==0){
            document.getElementById(id).style.color="red";
            coloriSelect[laPosizione]=1;
        }
        else{
            coloriSelect[laPosizione]=0;
            document.getElementById(id).style.color="black";
        }


        if(!checkIfHaveToDelete()){
            document.getElementById("salva").innerHTML="ELIMINA e SALVA";
        }
        else{
            document.getElementById("salva").innerHTML="SALVA";
        }
        console.log(checkIfHaveToDelete());
    }

    //takeAll();
</script>
</body>
</html>