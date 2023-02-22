<?php
declare(strict_types=1);

namespace ClickHouse\DataProvider\WbFavorite\QueryBuilder;

use ClickHouse\Dictionary\DictClientArticlesClickHouseTable;
use ClickHouse\Table\WbBrandCollectionClickHouseTable;

class FavoriteBrandsQueryBuilder
{
    public function getAnalyticsQuery(): string
    {
        return '';
    }

    public function getBindings(): array
    {
        return [
            'DictClientArticlesClickHouse' => DictClientArticlesClickHouseTable::class,
            'WbBrandCollectionClickHouse' => WbBrandCollectionClickHouseTable::class,
        ];
    }
}