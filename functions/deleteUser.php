<?php

    require_once("config.php");

    $sql = "SELECT * FROM utenti WHERE role IS NOT NULL";
        $result = $conn->query($query);
        echo $result;
        echo "ciao";
        $rowcount = mysqli_num_rows($result);
        echo "ciao";
        echo $rowcount;
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        for ($i = 0; $i < $rowcount; $i++) {
            echo "ciao" . $i;
            if (isset($_POST[$users[$i]['id']])) {
                echo "ciao" . $i;
                delete($users[$i]['id']);
            }
        }


    function delete($id){
        $sql="DELETE * FROM 'utenti' WHERE id='$id'";
        $result=mysqli_query($conn,$sql);
    }
?>
