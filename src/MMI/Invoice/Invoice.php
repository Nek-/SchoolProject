<?php

namespace MMI\Invoice;

class Invoice
{
    /**
     * @var array|InvoiceLine[]
     */
    private $lines;

    /**
     * @param InvoiceLine[] $lines
     */
    public function __construct(array $lines = [])
    {
        $this->lines = $lines;
    }

    /**
     * @param InvoiceLine $line
     */
    public function add(InvoiceLine $line)
    {
        $this->lines[] = $line;
    }

    /**
     * @return int
     */
    public function getNumberOfLines()
    {
        return count($this->lines);
    }

    public function getFormattedDescriptions()
    {
        $res = '';

        foreach ($this->lines as $line) {
            $res .= $line->getDescription() . ' : ' . $line->getAmount() . "\n";
        }

        return $res;
    }

    /**
     * @return float
     */
    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->lines as $line) {
            $total += $line->calculateTotal();
        }

        return $total;
    }
}
