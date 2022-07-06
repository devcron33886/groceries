<?php

namespace App\Models\Traits;

trait Search
{
    private function buildWildCards($searchQuery) {
        if ($searchQuery == "") {
            return $searchQuery;
        }

        // Strip MySQL reserved symbols
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchQuery = str_replace($reservedSymbols, '', $searchQuery);

        $words = explode(' ', $searchQuery);
        foreach($words as $idx => $word) {
            // Add operators so we can leverage the boolean mode of
            // fulltext indices.
            $words[$idx] = "+" . $word . "*";
        }
        $searchQuery = implode(' ', $words);
        return $searchQuery;
    }

    protected function scopeSearch($query, $searchQuery) {
        $columns = implode(',', $this->searchable);

        // Boolean mode allows us to match john* for words starting with john
        // (https://dev.mysql.com/doc/refman/5.6/en/fulltext-boolean.html)
        $query->whereRaw(
            "MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",
            $this->buildWildCards($searchQuery)
        );
        return $query;
    }
}
