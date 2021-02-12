<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
            <table id="userTab" >
                <thead>
                    <tr>
                        <th></th>
                        <th>NOME</th>
                        <th>PREZZO</th>
                        <th>INGREDIENTI</th>
                        <th <?php echo getDisplayValue(); ?> >DISPONIBILITA LIMITATA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php $panini=getTotalPanini1(); ?>
                    <?php foreach($panini as $panino): ?>

                        <tr>
                            <td><input type="checkbox" onclick="selectColor('<?php echo $panino['nome'] ?>')" ></td>
                            <td id="<?php echo $panino['nome'] ?>"><?php echo $panino['nome']?></td>
                            <td><input class="modPanini"  type="text" id="<?php echo $panino['nome']."Price" ?>" placeholder="<?php echo $panino['prezzo']?>" name="username"></td>
                            <td><input class="modPanini"  type="text" id="<?php echo $panino['nome']."Ingredients" ?>" placeholder="<?php echo $panino['ingredienti']?>" name="username"></td>
                            <td <?php echo getDisplayValue(); ?> ><input class="modPanini"  type="text" id="<?php echo $panino['nome']."Quantity" ?>" placeholder="<?php echo $panino['quantita']?>" name="username"></td>
                            <td><input id="<?php echo $panino['nome']."Check" ?>"  type="checkbox" onclick="allowDispo('<?php echo $panino['nome'] ?>')" ></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>