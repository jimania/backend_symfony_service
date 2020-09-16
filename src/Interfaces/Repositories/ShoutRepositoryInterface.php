<?php
namespace App\Interfaces\Repositories;

interface ShoutRepositoryInterface
{
    public function getShouts(string $name, int $limit): array;
}