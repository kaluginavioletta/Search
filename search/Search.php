<?php

namespace Search;
class Search
{
    public function search(string $query): array
    {
        $parts = explode(' ', $query);
        $surname = $parts[0] ?? '';
        $name = $parts[1] ?? '';
        $patronymic = $parts[2] ?? '';

        $filteredEmployees = Employee::where(function($query) use ($surname, $name, $patronymic) {
            $query->where('surname', 'like', '%'.$surname.'%')
                ->where('name', 'like', '%'.$name.'%')
                ->where('patronymic', 'like', '%'.$patronymic.'%');
        })->get();

        return $filteredEmployees->toArray();
    }
}
