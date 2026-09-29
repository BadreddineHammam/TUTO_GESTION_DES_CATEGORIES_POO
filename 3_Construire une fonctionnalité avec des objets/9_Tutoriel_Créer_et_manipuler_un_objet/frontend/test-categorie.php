<?php 
require_once "../backend/Categorie.php" ;

 $P00 = new Categorie(1,"team_1","blue","t_shirt_blue") ;
 $P01 = new Categorie(2,"team_2","red","t_shirt_red") ;

 $P00->showing();
 $P01->showing();
?>