<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>
<table id="userTab" >
    <thead>
    <tr>
        <th>NOME</th>
        <th>PREZZO</th>
        <th>INGREDIENTI</th>
        <th <?php echo getDisplayValue(); ?> >DISPONIBILITA' LIMITATA</th>
    </tr>
    </thead>
    <tbody>

    <?php $panini=getTotalPanini1(); ?>
    <?php foreach($panini as $panino): ?>

        <tr>
            <td><?php echo $panino['nome']?></td>
            <td><?php echo €.$panino['prezzo']?></td>
            <td><?php echo $panino['ingredienti']?></td>
            <td <?php echo getDisplayValue(); ?> ><?php if(!strcmp($panino['disponibilita'],'1')){echo $panino['quantita']." pz";}else{ echo "/" ;}?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

