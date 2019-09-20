<?php

$massa = new Massa(0.50); 
$saida = $massa->CalculaMassa();
print_r("Massa: ".$saida."\n");


class Massa {
    private $tempo = 0;
    private $massa;
   
    public  function __construct($massa)
    {
        $this->massa = $massa;
       
    }
    public function CalculaMassa()
    {       
        while($this->massa > 0.10){
            $this->massa = ($this->massa * 0.75);
                $this->tempo++;
        }
        $this->tempo =  $this->tempo*30;
        return   $this->tempo;
     
    }
    


}