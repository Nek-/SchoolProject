<?php

use MMI\Invoice\Invoice;
use MMI\Invoice\InvoiceLine;

require 'vendor/autoload.php';

$faker = \Faker\Factory::create();


// Fake some data
$invoices = [new Invoice(), new Invoice(), new Invoice()];
foreach ($invoices as $invoice) {
    for ($i = 0; $i < 10; $i++) {
        $line = new InvoiceLine();
        $line->setVat(20);
        $line->setDescription($faker->text(50));
        $line->setAmount($faker->numberBetween(10, 50));
        $invoice->add($line);
    }
}

// print totals
foreach ($invoices as $invoice) {
    echo $invoice->getFormattedDescriptions() . "\n";
    echo 'Total: ' . $invoice->calculateTotal() . "\n\n";
}
