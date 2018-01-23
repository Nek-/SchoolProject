<?php

namespace MMI\Invoice;

class InvoiceLine
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $vat;

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * 20% / 5% ...
     * @param int $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat/100 + 1;
    }

    /**
     * @return float|int
     */
    public function calculateTotal()
    {
        $amount = $this->amount;

        return $amount + $this->vat * $amount;
    }
}
