<?php


    define("nome_host", "localhost");
    define("nome_db", "my_matiasgrosso");
    define("nomeutente_db", "matiasgrosso");
    define("password_db", "");

    $conn=mysql_connect(nome_host, nomeutente_db, password_db) or die("Errore".mysql_error());
    mysql_select_db(nome_db, $conn) or die("Errore".mysql_error());

?>