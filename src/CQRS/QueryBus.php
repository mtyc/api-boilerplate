<?php

declare(strict_types=1);

namespace App\CQRS;

interface QueryBus
{
    /**
     * @param Query $query
     * @return mixed
     */
    public function handle(Query $query);
}