<?php

declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
$config
    ->registerCustomFixers([
        new \A1comms\PhpCsFixer\Fixer\Operator\NotEmptyTernaryToNullCoalescingFixer(),
    ])
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP81Migration'        => true,
        '@PHP80Migration:risky'  => true,
        'heredoc_indentation'    => false,
        '@PhpCsFixer'            => true,
        '@PhpCsFixer:risky'      => true,
        'yoda_style'             => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'binary_operator_spaces' => [
            'default'   => 'align',
        ],
        'A1comms/not_empty_ternary_to_null_coalescing' => true,
    ])
    ->setFinder($finder)
;

return $config;
