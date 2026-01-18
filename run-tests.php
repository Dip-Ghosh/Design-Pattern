<?php

declare(strict_types = 1);

require 'TestFramework.php';
require 'Logger.php';
require 'SingletonTest.php';
// require other pattern tests here

exit(
TestRunner::run(
    [
        new SingletonTest(),
        // new FactoryTest(),
        // new StrategyTest(),
    ])
);
