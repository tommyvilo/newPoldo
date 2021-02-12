<?php

    echo "ciao";
    // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:newpoldo.database.windows.net,1433; Database = barpoldo", "barpoldo", "Zermaculo180202@");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }

    // SQL Server Extension Sample Code:
    $connectionInfo = array("UID" => "barpoldo", "pwd" => "Zermaculo180202@", "Database" => "barpoldo", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:newpoldo.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);