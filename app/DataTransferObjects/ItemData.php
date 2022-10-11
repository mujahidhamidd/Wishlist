<?php

namespace App\DataTransferObjects;

class ItemData
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $price,
        public readonly string $url,
        public readonly string $description,
    ) {
    }
}
