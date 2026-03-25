<?php

    function conexion(){

    $host = "host=dpg-d71v6qffte5s73a9oj2g-a.oregon-postgres.render.com";
    $port = "port=5432";
    $dbname = "dbname=test_daj1";
    $user = "user=test_daj1_user";
    $password = "password=lB1Zz2I0lw9ePSHLiDSLht6JB1bjNPlj";

    $db = pg_connect("$host $port $dbname $user $password");

    return $db;
}
?>