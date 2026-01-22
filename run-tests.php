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

$files = [];
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $files[] = $file->getPathname();
    }
}

$interfaces = [];
$abstracts  = [];
$classes    = [];

foreach ($files as $file) {
    $contents = file_get_contents($file);

    if (preg_match('/interface\s+\w+/', $contents)) {
        $interfaces[] = $file;
    } elseif (preg_match('/abstract\s+class\s+\w+/', $contents)) {
        $abstracts[] = $file;
    } else {
        $classes[] = $file;
    }
}

foreach (array_merge($interfaces, $abstracts, $classes) as $file) {
    require_once $file;
}

/* Load tests */
foreach (glob($root . '/tests/*Test.php') as $file) {
    require_once $file;
}

/* Run */
$tests = [
    new SingletonTest(),
    new FactoryMethodTest(),
    new AbstractFactoryTest(),
];

exit(TestRunner::run($tests));
