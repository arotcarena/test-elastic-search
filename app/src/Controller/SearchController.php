<?php

namespace App\Controller;

use Elastica\Query\BoolQuery;
use Elastica\Query\MatchPhrase;
use Elastica\Query\MatchPhrasePrefix;
use Elastica\Query\MatchQuery;
use Elastica\Query\MultiMatch;
use FOS\ElasticaBundle\Finder\FinderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function __construct(
        private FinderInterface $finder,
    ) {
    }

    #[Route('/search', name: 'app_search', methods: ['GET', 'POST'])]
    public function search(Request $request): Response
    {
        $searchTerm = $request->query->getString('q');

        $boolQuery = new BoolQuery();

        if ($searchTerm !== '') {
            $multiMatch = (new MultiMatch())
                ->setFields(['designation^2', 'designation.plain'])
                ->setQuery($searchTerm)
                ->setFuzziness('AUTO')
                ->setType('best_fields')
                ->setOperator('or');
            $matchPhrase = (new MatchPhrase('designation', $searchTerm))->setParams(['boost' => 2.0]);

            $boolQuery = (new BoolQuery())
                ->addShould($multiMatch)
                ->addShould($matchPhrase);
        }
        $products = $this->finder->find($boolQuery, 1000);

        return $this->render('search/index.html.twig', [
            'searchTerm' => $searchTerm,
            'products' => $products,
        ]);
    }
}
