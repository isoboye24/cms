<?php
    class Car
    {
        static $wheels = 2;
        var $doors = 4;
        
        function MoveWheels()
        {
            Car::$wheels = 20;
        }
    }

    //$bmw = new Car();
    
    Car::MoveWheels();

    echo Car::$wheels;
    
?>