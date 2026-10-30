<?php
require_once __DIR__ . '/categorie.php' ;
class gestion
{
    public function __construct(public string $file)
    {
        $this->file = __DIR__ . '/../data/data.json' ;
    }
    
    public function get_all() : array
    {
        return json_decode(file_get_contents($this->file),true) ?? [] ;
    }

    public function add(string $name) :array
    {
        $data = $this->get_all();
        foreach($data as $i)
        {
            if(strcasecmp($i["name"],$name) === 0)
            {
              throw new Exception("error ...");
            }
        }

        $ids = array_column($data,"id") ;
        $id = empty($ids) ? 1 : max($ids) + 1 ;
        $data_1 = new category($name ,$id ) ;
        $data[] = $data_1->to_array() ;
        
        file_put_contents($this->file,json_encode($data,JSON_PRETTY_PRINT),LOCK_EX );
        return $data_1->to_array() ;
        
    }
}
?>