<?php
declare(strict_types=1);

namespace ClickHouse\DataService\WbFavorite\QueryBuilder;

use ClickHouse\DataService\WbFavorite\QueryBuilder\Entity\BuilderSql;
use ClickHouse\Dictionary\DictClientArticlesClickHouseTable;
use ClickHouse\Table\WbBrandCollectionClickHouseTable;
use DateTimeImmutable;

class BuildCacheQueryBuilder
{
    public function buildCache(string $fieldIdValue, DateTimeImmutable $checkDate, int $periodDays): BuilderSql
    {
        $result = new BuilderSql();
        $result->bindings = [
            'DictClientArticlesClickHouse' => DictClientArticlesClickHouseTable::class,
            'WbBrandCollectionClickHouse' => WbBrandCollectionClickHouseTable::class,
        ];

        $result->sql = '{DictClientArticlesClickHouse}';

        return $result;
    }
}