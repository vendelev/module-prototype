<?php
declare(strict_types=1);

namespace ClickHouse\DataProvider\WbFavorite;

use ClickHouse\DataProvider\WbFavorite\Entity\WbAnalyticsListItem;
use ClickHouse\DataProvider\WbFavorite\QueryBuilder\FavoriteBrandsQueryBuilder;
use Vendor\ClickHouse;

class WbFavoriteBrandsDataReader
{
    public FavoriteBrandsQueryBuilder $queryBuilder;
    private ClickHouse $clickHouse;

    /**
     * @param FavoriteBrandsQueryBuilder $queryBuilder
     */
    public function __construct(ClickHouse $clickHouse, FavoriteBrandsQueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
        $this->clickHouse = $clickHouse;
    }

    public function getAnalyticsList(): array
    {
        return array_map(
            static function ($item) {
                return new WbAnalyticsListItem($item);
            },
            $this->clickHouse->select(
                $this->queryBuilder->getAnalyticsQuery(),
                $this->queryBuilder->getBindings(),
            )
        );
    }
}