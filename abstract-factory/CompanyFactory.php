<?php

abstract class CompanyFactory
{
    protected $monitor;
    protected $gpu;

    public function __construct(MonitorContract $monitor,GpuContract $gpu)
    {
        $monitor = $monitor->createMonitor();
        $cpu     = $gpu->createGPU();

        $cpu-$monitor();
        $cpu->assemble();

    }

     abstract public function createMonitor();
     abstract public function createGPU();
}