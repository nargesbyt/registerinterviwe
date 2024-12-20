<?php
namespace App\Services;

class PaginationService
{
    public function calculateTotalPages(int $totalCount, int $recordsPerPage): int
    {
        return (int) ceil($totalCount / $recordsPerPage);
    }
}
