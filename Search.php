<?php

namespace Search;
use Src\Request;
class Search
{
    public function search(Request $request, $model)
    {
        $query = $request->query('query');
        $parts = explode(' ', $query);
        $surname = $parts[0] ?? '';
        $name = $parts[1] ?? '';
        $patronymic = $parts[2] ?? '';

        return $model->where(function($query) use ($surname, $name, $patronymic) {
            $query->where('surname', 'like', '%'.$surname.'%')
                ->where('name', 'like', '%'.$name.'%')
                ->where('patronymic', 'like', '%'.$patronymic.'%');
        })->get();
    }
}