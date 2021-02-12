<?php require_once(ROOT_PATH . "/functions/admin_functions.php");?>

<table id="userTab">
    <thead>
    <tr>
        <th>&ensp;&ensp;&ensp;&ensp;</th>
        <th>USERNAME</th>
        <th>RUOLO</th>
    </tr>
    </thead>
    <tbody>
    <?php $contatore=1 ?>
    <?php $laTesta='<td><table id="userTab" ><thead><tr><th>&ensp;&ensp;&ensp;&ensp;</th><th>USERNAME</th><th>RUOLO</th></tr></thead><tbody>' ?>
    <?php $laTesta1='</tr><tr><td><table id="userTab" ><thead><tr><th>&ensp;&ensp;&ensp;&ensp;</th><th>USERNAME</th><th>RUOLO</th></tr></thead><tbody>' ?>
    <?php $users=getUsers(); ?>
    <?php $acapo=0; ?>
    <?php foreach($users as $user): ?>
        <?php if($acapo==20){ echo ' </tbody></table></td>'; if($contatore<2){$acapo=1; $contatore=$contatore+1; echo $laTesta;}else{$acapo=1; $contatore=1; echo $laTesta1;}}
        else{ $acapo=$acapo+1; } ?>
        <tr>
            <td><input name="id<?php echo $user['id'];?>" value="0" type="checkbox" onclick="cambia(<?php echo $user['id'];?>)"></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php switch($user['role'])
                {
                    case 0:
                        echo "ADMIN";
                        break;
                    case 1:
                        echo "CLASSE";
                        break;
                    case 2:
                        echo "ATA";
                        break;   } ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>