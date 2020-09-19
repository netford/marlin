<?php
require 'libs/rb.php';
R::setup( 'mysql:loclhost;dbname=my_project','root', 'root' );

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();