<?php
declare(strict_types=1);

namespace Controller\WbFavorite;

use ClickHouse\DataProvider\WbFavorite\QueryBuilder\FavoriteBrandsQueryBuilder;
use ClickHouse\DataProvider\WbFavorite\WbFavoriteBrandsDataReader;
use ClickHouse\DataService\WbFavorite\QueryBuilder\BuildCacheQueryBuilder;
use ClickHouse\DataService\WbFavorite\WbDailyBrandProductsCacheDataWriter;
use DateTimeImmutable;
use Vendor\ClickHouse;

class FavoriteBrandsController
{
    private WbFavoriteBrandsDataReader $dataReader;
    private WbDailyBrandProductsCacheDataWriter $dataWriter;

    public function __construct(
        WbFavoriteBrandsDataReader          $dataReader,
        WbDailyBrandProductsCacheDataWriter $dataWriter
    ) {
        $this->dataReader = $dataReader;
        $this->dataWriter = $dataWriter;
    }

    public function buildCache(): void
    {
        $this->dataWriter->buildCache('', new DateTimeImmutable(), 3);
    }

    public function getList(): void
    {
        $this->dataReader->getAnalyticsList();
    }
}