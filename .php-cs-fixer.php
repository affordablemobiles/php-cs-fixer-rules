<?php

declare(strict_types=1);

use AffordableMobiles\PhpCsFixer\Fixer\Operator\NotEmptyTernaryToNullCoalescingFixer;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

require_once __DIR__.'/vendor/autoload.php';

$finder = Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->in(__DIR__)
;

$config = new Config();
$config
    ->registerCustomFixers([
        new NotEmptyTernaryToNullCoalescingFixer(),
    ])
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP83Migration'        => true,
        '@PHP80Migration:risky'  => true,
        'heredoc_indentation'    => false,
        '@PhpCsFixer'            => true,
        '@PhpCsFixer:risky'      => true,
        'yoda_style'             => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'binary_operator_spaces' => [
            'default'   => 'align',
        ],
        'AffordableMobiles/not_empty_ternary_to_null_coalescing' => true,
    ])
    ->setFinder($finder)
;

return $config;
