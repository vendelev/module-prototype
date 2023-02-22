<?php
declare(strict_types=1);

namespace ClickHouse\DataProvider\Common;

use ClickHouse\DataProvider\Common\Entity\WbBrandItem;
use DateTimeImmutable;
use Vendor\ClickHouse;

class WbBrandCollectionDataProvider
{
    public ClickHouse $clickHouse;

    /**
     * @param ClickHouse $clickHouse
     */
    public function __construct(ClickHouse $clickHouse)
    {
        $this->clickHouse = $clickHouse;
    }

    public function get(string $id, DateTimeImmutable $checkDate): ?WbBrandItem
    {
        return new WbBrandItem($this->clickHouse->select(''));
    }
}