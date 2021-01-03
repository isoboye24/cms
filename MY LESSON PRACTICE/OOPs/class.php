<?php
    class Car
    {
//        var is equal to public
        public $wheels = 4;
        protected $hood = 1;
        private $engine = 1;
        var $doors = 4;
        
        
    }

    class Boats extends Car
    {
        function ShowProperty()
        {
            echo $this->hood;
        }
    }


    $bmw = new Boats();
   
    echo $bmw->ShowProperty();
    
?>