<?phpif((int)$_COOKIE["easterEgg"]>= 5){    $easterEgg = "quantita>=-1";}else{    $easterEgg = "quantita>=0";}function getPanini(){    global $conn;    global $easterEgg;    //$sql = "SELECT * FROM panini WHERE quantita!=0";    if((int)$_COOKIE["easterEgg"]>= 5){        $sql = "SELECT * FROM panini WHERE " . $easterEgg;    }    else{        $sql = "SELECT * FROM panini WHERE " . $easterEgg;    }    $result = mysqli_query($conn, $sql);    //$panini = mysqli_fetch_all($result, MYSQLI_ASSOC);    return mysqli_fetch_all($result, MYSQLI_ASSOC);}function getPanini2(){    global $conn;    $sql = "(SELECT * FROM `panini` WHERE quantita!=0) UNION (SELECT * FROM `panini` WHERE quantita=0)";    $result = mysqli_query($conn, $sql);    //$panini = mysqli_fetch_all($result, MYSQLI_ASSOC);    return mysqli_fetch_all($result, MYSQLI_ASSOC);}function updatePanini(){    global $conn;    $sql = "SELECT quantita FROM panini WHERE quantita!=0";    $result = mysqli_query($conn, $sql);//$panini = mysqli_fetch_all($result, MYSQLI_ASSOC);    return mysqli_fetch_all($result, MYSQLI_ASSOC);}function getPaninoById($id){    global $conn;    $sql = "SELECT * FROM panini WHERE id='$id'";    $result = mysqli_query($conn, $sql);    return mysqli_fetch_assoc($result, MYSQLI_ASSOC);}function fixaPrezzi($prezzo){    /*    switch (strlen($prezzo))    {        case 1:            return $prezzo.".00";        case 3:            return $prezzo."0";    }*/    $index=strpos($prezzo,".");    if($index=="")    {        return $prezzo .".00";    }    else    {        return $prezzo ."0";    }}function getPaniniCercati($tipo, $dato){    global $conn;    global $easterEgg;    switch ($tipo)    {        case 0:            $sql = "SELECT * FROM panini WHERE " . $easterEgg;            $result = mysqli_query($conn, $sql);            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);            if ($dato=="")            {                return $result;            }            $panini = array();            foreach ($result as $panino)            {                $percentuale = similar_text($dato, $panino['nome'], $percent);                if ($percent >= 40)                {                    array_push($panini, $panino);                }            }            return $panini;        case 1:            switch ($dato)            {                case -1:                    $sql = "SELECT * FROM panini WHERE " . $easterEgg;                    break;                case 0:                    $sql = "SELECT * FROM panini WHERE caldoFreddo=0 AND " . $easterEgg;                    break;                case 1:                    $sql = "SELECT * FROM panini WHERE caldoFreddo=1 AND " . $easterEgg;                    break;                case 2:                    $sql = "SELECT * FROM panini WHERE DS=1 AND ". $easterEgg;                    break;                case 3:                    $sql = "SELECT * FROM panini WHERE DS=0 AND " . $easterEgg ;                    break;                case 4:                    $sql = "SELECT * FROM panini WHERE categoria=1 AND " . $easterEgg ;                    break;                case 5:                    $sql = "SELECT * FROM panini WHERE categoria=2 AND " . $easterEgg ;                    break;                case 6:                    $sql = "SELECT * FROM panini WHERE categoria=3 AND " . $easterEgg ;                    break;            }            $result = mysqli_query($conn, $sql);            $result = mysqli_fetch_all($result, MYSQLI_ASSOC);            return $result;        case 2:            $prezzi=explode(",", $dato);            $minimo=$prezzi[0];            $massimo=$prezzi[1];            $sql = "SELECT * FROM `panini` WHERE prezzo BETWEEN '$minimo' AND '$massimo' AND " . $easterEgg ;            $result = mysqli_query($conn, $sql);            if(mysqli_num_rows($result)>1)            {                $result = mysqli_fetch_all($result, MYSQLI_ASSOC);            }            else            {                return mysqli_fetch_assoc($result, MYSQLI_ASSOC);            }            return $result;    }}