<?php
class category 
{
    public function __construct(public string $name , public int $id)
    {

    }
    public function to_array() :array
    {
      return [
       "name" => $this->name ,
       "id" => $this->id  
      ];
    }
}
?>