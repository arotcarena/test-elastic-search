<?php

namespace App\Model;

use ApiPlatform\Elasticsearch\Filter\MatchFilter;
use ApiPlatform\Elasticsearch\State\CollectionProvider;
use ApiPlatform\Elasticsearch\State\Options;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(
    operations: [
        new GetCollection(
            provider: CollectionProvider::class,
            stateOptions: new Options(index: 'product'),
            normalizationContext: ['groups' => ['product:read']]
        )
    ],
)]
#[ApiFilter(MatchFilter::class, properties: ['designation'])]
class Product
{
    #[ApiProperty(identifier: true)]
    #[Groups(['product:read'])]
    public ?int $id = null;

    #[Groups(['product:read'])]
    public string $designation;

    #[Groups(['product:read'])]
    public int $price;
} 
