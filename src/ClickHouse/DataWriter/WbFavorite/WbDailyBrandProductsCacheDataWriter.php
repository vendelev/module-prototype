<?php
declare(strict_types=1);

namespace ClickHouse\DataService\WbFavorite;

use ClickHouse\DataService\WbFavorite\QueryBuilder\BuildCacheQueryBuilder;
use DateTimeImmutable;
use Vendor\ClickHouse;

class WbDailyBrandProductsCacheDataWriter
{
    public BuildCacheQueryBuilder $queryBuilder;
    private ClickHouse $clickHouse;

    /**
     * @param BuildCacheQueryBuilder $queryBuilder
     */
    public function __construct(ClickHouse $clickHouse, BuildCacheQueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
        $this->clickHouse = $clickHouse;
    }

    public function buildCache(string $fieldIdValue, DateTimeImmutable $checkDate, int $periodDays): void
    {
        $dto = $this->queryBuilder->buildCache($fieldIdValue, $checkDate, $periodDays);
        $this->clickHouse->select($dto->sql, $dto->bindings);
    }
}