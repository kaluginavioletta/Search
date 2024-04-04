<?php

namespace Search;
class Search
{
    public function search(Request $request, Model $model): View
    {
        $query = $request->query('query');

        $parts = explode(' ', $query);
        $column1 = $parts[0] ?? '';
        $column2 = $parts[1] ?? '';
        $column3 = $parts[2] ?? '';

        $filteredModels = $model->where(function($query) use ($column1, $column2, $column3) {
            $query->where($column1, 'like', '%'.$column1.'%')
                ->where($column2, 'like', '%'.$column2.'%')
                ->where($column3, 'like', '%'.$column3.'%');
        })->get();

        return new View('site.search', ['filteredModels' => $filteredModels]);
    }
}