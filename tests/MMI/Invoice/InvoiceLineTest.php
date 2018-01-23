<?php


use MMI\Invoice\InvoiceLine;

class InvoiceLineTest extends \PHPUnit\Framework\TestCase
{
    public function testItSetAmount()
    {
        $line = new InvoiceLine();
        $line->setAmount(10);

        $this->assertEquals($line->getAmount(), 10);
    }

    public function testItSetDescription()
    {
        $line = new InvoiceLine();
        $line->setDescription('foobar');

        $this->assertEquals($line->getDescription(), 'foobar');
    }

    public function testItCalculateTotalWithVAT()
    {
        $line = new InvoiceLine();
        $line->setAmount(150);
        $line->setVat(20);

        $this->assertEquals($line->calculateTotal(), 180);
    }
}
