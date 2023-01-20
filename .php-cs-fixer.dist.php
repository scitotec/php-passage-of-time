<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/'])
    ->exclude(__DIR__ . '/vendor');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
    ])
    ->setFinder($finder);
