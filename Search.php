<?php

namespace Search;

class Search
{
    public function filterModels($employees, string $query): array
    {
        $parts = preg_split('/\s+/', $query);
        $surname = $parts[0] ?? '';
        $name = $parts[1] ?? '';
        $patronymic = $parts[2] ?? '';

        return array_filter($employees, function ($employee) use ($surname, $name, $patronymic) {
            return preg_match("/$surname/", $employee->surname)
                && preg_match("/$name/", $employee->name)
                && preg_match("/$patronymic/", $employee->patronymic);
        });
    }
}