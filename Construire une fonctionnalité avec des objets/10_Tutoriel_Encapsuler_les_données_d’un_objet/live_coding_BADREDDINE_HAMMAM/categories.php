<?php

class Categorie
{
 private string $color ;
 private string $name ;

 public function get_name() : string 
 {
    return $this->name ;
 }


 public function get_color() : string 
 {
    return $this->color ;
 }
 

 public function set_name(string $new_name)
 {
    $this->name = $new_name ;
 }


 public function set_color(string $new_color)
 {
    $this->color = $new_color ;
 }
 

}

?>