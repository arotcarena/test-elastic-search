<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\SearchHighlighterRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class SearchHighlighterExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('search_highlight', [SearchHighlighterRuntime::class, 'highlight']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('search_highlight', [SearchHighlighterRuntime::class, 'highlight']),
        ];
    }
}
