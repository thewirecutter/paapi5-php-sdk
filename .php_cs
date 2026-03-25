<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/examples');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'array_syntax' => ['syntax' => 'short'],
        'strict_comparison' => true,
        'strict_param' => true,
    ])
    ->setFinder($finder);
