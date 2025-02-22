<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class GoogleBooksService
{
    protected $baseUrl = 'https://www.googleapis.com/books/v1/volumes';

    public function searchBooks($query)
    {
        $page = request('page', 1);
        $perPage = 10;
        $startIndex = ($page - 1) * $perPage;
        
        $queryParams = array_merge($query, [
            'startIndex' => $startIndex,
            'maxResults' => $perPage, 
            'key' => env('GOOGLE_BOOKS_API_KEY'),
        ]);

        $response = Http::get($this->baseUrl, $queryParams);

        if ($response->failed()) {
            return null;
        }
        
        $books = $response->json();
        
        $totalItems = $books['totalItems'] ?? 0;
        $items = $books['items'] ?? [];

        $paginator = new LengthAwarePaginator($items, $totalItems, $perPage, $page, [
            'path' => url()->current(),
            'query' => request()->query(),
        ]);

        return $paginator;
    }
}