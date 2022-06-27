<?php

class BeafBurger extends BurgerFactory
{

    public function createBurger($type)
    {
        if(empty($type)) throw new \InvalidArgumentException;

        if($type == 'beaf') return new Beaf();
    }
}