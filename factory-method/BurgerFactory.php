<?php

abstract class BurgerFactory
{

    protected $createBurger;
    public function __construct(BurgerContract $createBurger)
    {
        $this->createBurger = $createBurger;
    }

    public function orderBurger($burger)
    {
        $burger = $this->createBurger($burger);
        $this->createBurger->prepare($burger);
    }
    abstract public function createBurger($burger);
}