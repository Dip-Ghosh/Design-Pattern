<?php

class RestaurantController extends Controller
{
    protected $burger;

    public function __construct(BurgerFactory $burger){

        $this->burger = $burger;
    }


    public function order(Request $request)
    {
        $this->burger->orderBurger($request->burgerType);

    }

}