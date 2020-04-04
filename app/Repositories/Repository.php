<?php

namespace App\Repositories;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

abstract class Repository
{
    protected $table;

    protected function createQueryBuilder(): Builder
    {
        return DB::table($this->table);
    }
}
