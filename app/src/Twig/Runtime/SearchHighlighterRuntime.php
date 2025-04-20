<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class SearchHighlighterRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function highlight(string $text, string $searchTerm): string
    {
        if (!$searchTerm || empty($searchTerm)) {
            return $text;
        }

        $parts = explode(strtolower($searchTerm), strtolower($text));

        if (count($parts) < 2) {
            return $text;
        }

        $beforeSearchTerm = $parts[0];
        $beforeLength = strlen($beforeSearchTerm);
        $afterSearchTerm = $parts[1];
        $afterLength = strlen($afterSearchTerm);

        $beforeSearchTerm = substr($text, 0, $beforeLength);
        $afterSearchTerm = substr($text, $beforeLength + strlen($searchTerm));
        $originalSearchTerm = substr($text, $beforeLength, strlen($searchTerm));

        return $beforeSearchTerm . '<span style="background-color: yellow;">' . $originalSearchTerm . '</span>' . $afterSearchTerm;
    }
}
