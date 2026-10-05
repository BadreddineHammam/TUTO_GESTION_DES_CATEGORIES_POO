<?php
class Data
{
    public string $name ;
    public string $hobby ;
    public int $age ;

    public function __construct($name ,$hobby ,$age )
    {
      $this->name = $name ;
      $this->hobby = $hobby ;
      $this->age = $age ;
    } 
    public function show()
    {
        echo "<h2>" . $this->name . "</h2><br><h2>" . $this->hobby . "</h2><br><h2>" . $this->age . "</h2><br>";
    }
}
?>