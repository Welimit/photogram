<?php

class mic
{
    public $brand;
    public $color;
    public $usb_port;
    public $model;
    public $light;
    public $price;

    public function setLight($light){
        print($light);
        print($this->light);
    }

    public static function testFunction(){
        printf(" This is a static function, this can be run without object installaization..");
    }
}