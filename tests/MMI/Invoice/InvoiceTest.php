<?php

use MMI\Invoice\Invoice;
use MMI\Invoice\InvoiceLine;

class InvoiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test methods add and getNumberOfLines
     */
    public function testGetNumberOfLines()
    {
        $invoice = new Invoice([new InvoiceLine]);
        $invoice->add(new InvoiceLine());
        $invoice->add(new InvoiceLine());
        $invoice->add(new InvoiceLine());

        $this->assertSame($invoice->getNumberOfLines(), 4);
    }

    public function testCalculation()
    {
        $invoice = new Invoice();
        $line1 = $this->prophesize(InvoiceLine::class);
        $line2 = $this->prophesize(InvoiceLine::class);

        $line1->calculateTotal()->willReturn(11);
        $line2->calculateTotal()->willReturn(100);

        $line1 = $line1->reveal();
        $line2 = $line2->reveal();

        $invoice->add($line1);
        $invoice->add($line2);

        $this->assertEquals(111, $invoice->calculateTotal());
    }

}
