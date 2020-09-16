<?php
namespace App\Interfaces\Services;

interface ShoutServiceInterface
{
    public function getShouts(string $famous_person_name, int $limit): array;
}