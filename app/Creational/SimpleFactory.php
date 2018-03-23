<?php
namespace App\Creational;

class SimpleFactory
{
    public function createBicycle()
    {
        return new Bicycle();
    }
}

class Bicycle
{

    public function driveTo($destination)
    {
        echo 'driveTo'.$destination;
    }

    public function driveBack($destination)
    {
        echo 'driveBack'.$destination;
    }
}