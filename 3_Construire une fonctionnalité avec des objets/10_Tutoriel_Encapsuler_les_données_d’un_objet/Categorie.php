<?php
class Categories
{
    private int $id ;
    private string $name ;
    private string $icon ;
    private string $color ;
    public string $bb = "good" ;

    public function passt_name() : string
    {
       return $this->name ; 
    }

    public function passt_color() : string 
    {
        return $this->color ;
    }

    public function insert_name(string $injected_name ) :void
    {
      $this->name = $injected_name ;
    }

    public function insert_color(string $injected_color) :void 
    {
        $this->color = $injected_color ;
    }
}


?>