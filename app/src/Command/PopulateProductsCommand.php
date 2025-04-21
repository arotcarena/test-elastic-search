<?php

namespace App\Command;

use App\Repository\ProductRepository;
use Elasticsearch\Client;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:populate-products',
    description: 'Index all products into Elasticsearch.'
)]
class PopulateProductsCommand extends Command
{
    private $client;
    private $productRepository;

    public function __construct(Client $client, ProductRepository $productRepository)
    {
        parent::__construct();
        $this->client = $client;
        $this->productRepository = $productRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Vérifier la connexion à Elasticsearch
        try {
            $this->client->ping();
            $output->writeln('Connected to Elasticsearch successfully.');
        } catch (\Exception $e) {
            $output->writeln('Error connecting to Elasticsearch: ' . $e->getMessage());
            return Command::FAILURE;
        }

        // Récupérer tous les produits depuis la base de données
        $products = $this->productRepository->findAll();

        $output->writeln('Indexing products...');

        foreach ($products as $product) {
            // Préparer les données pour l'indexation
            $data = [
                'index' => 'product',
                'id' => $product->getId(),
                'body' => [
                    'id' => $product->getId(),
                    'designation' => $product->getDesignation(),
                    'price' => $product->getPrice(),
                ]
            ];

            // Envoyer les données vers Elasticsearch
            try {
                $this->client->index($data);
                $output->writeln('Indexed product: ' . $product->getDesignation());
            } catch (\Exception $e) {
                $output->writeln('Error indexing product ' . $product->getId() . ': ' . $e->getMessage());
            }
        }

        $output->writeln('Indexing completed.');

        return Command::SUCCESS;
    }
}
