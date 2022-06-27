<?php

class EggBurger extends BurgerFactory
{

    public function createBurger($type)
    {
        if(empty($type)) throw new \InvalidArgumentException;

        if($type == 'chicken') return new Beaf();
    }
}