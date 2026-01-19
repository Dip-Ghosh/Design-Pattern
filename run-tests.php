<?php
declare(strict_types=1);

$root = __DIR__;

/* Load test framework */
foreach (glob($root . '/tests/Framework/*.php') as $file) {
    require_once $file;
}

/* Load src recursively (includes src/singleton) */
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root . '/src')
);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        require_once $file->getPathname();
    }
}

/* Load tests */
foreach (glob($root . '/tests/*Test.php') as $file) {
    require_once $file;
}

/* Run */
$tests = [
    new LoggerTest(),
];

exit(TestRunner::run($tests));
