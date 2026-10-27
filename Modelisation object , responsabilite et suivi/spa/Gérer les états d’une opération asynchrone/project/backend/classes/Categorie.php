<?php

class Categorie
{
    public function __construct(
        public int $id,
        public string $name
    ){
      
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name
        ];
    }
}
