<?php

class ManufactureController
{

   public function getItems()
   {
       $msi = new MsiManufecturer();

       $msi->createGPU();
       $msi->createMonitor();

       $asus = new AsusManufecturer();
       $asus->createMonitor();
       $asus->createGPU();
   }

}