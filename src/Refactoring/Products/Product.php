<?php

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /**
     * @var UuidInterface
     */
    private $serialNumber;

    /**
     * @var BigDecimal|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $desc;

    /**
     * @var string|null
     */
    private $longDesc;

    /**
     * @var int|null
     */
    private $counter;

    /**
     * Product constructor.
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     */
    public function __construct(?BigDecimal $price, ?string $desc, ?string $longDesc, ?int $counter)
    {
        $this->serialNumber = Uuid::uuid4();
        $this->price = $price;
        $this->desc = $desc;
        $this->longDesc = $longDesc;
        $this->counter = $counter;
    }

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->serialNumber;
    }

    /**
     * @return BigDecimal|null
     */
    public function getPrice(): ?BigDecimal
    {
        return $this->price;
    }

    /**
     * @return string|null
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * @return string|null
     */
    public function getLongDesc(): ?string
    {
        return $this->longDesc;
    }

    /**
     * @return int|null
     */
    public function getCounter(): ?int
    {
        return $this->counter;
    }

    /**
     * @throws \Exception
     */
    public function decrementCounter(): void
    {
        if ($this->counter === null) {
            throw new \Exception("null counter");
        }

        if ($this->counter === 0) {
            throw new \Exception("Negative counter");
        }

        --$this->counter;
    }

    /**
     * @throws \Exception
     */
    public function incrementCounter(): void
    {
        if ($this->counter === null) {
            throw new \Exception("null counter");
        }

        ++$this->counter;
    }

    /**
     * @param BigDecimal|null $newPrice
     * @throws \Exception
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        if ($newPrice === null) {
            throw new \Exception("new price null");
        }

        $this->price = $newPrice;
    }

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws \Exception
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        $this->longDesc = str_replace($charToReplace, $replaceWith, $this->longDesc);
        $this->desc = str_replace($charToReplace, $replaceWith, $this->desc);
    }

    /**
     * @return string
     */
    public function formatDesc(): string
    {
        if (empty($this->longDesc) || empty($this->desc)) {
            return "";
        }

        return $this->desc . " *** " . $this->longDesc;
    }
}





















