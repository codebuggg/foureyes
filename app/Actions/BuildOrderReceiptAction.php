<?php

namespace App\Actions;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class BuildOrderReceiptAction
{

  public function execute($order)
  {
    $order_courses = $order->order_courses;
    $customer = $order->user;

    $c = new Buyer([
      'name' => $customer->name,
      "custom_fields" => [
        'email' => $customer->email,
      ]
    ]);
    $items = [];
    foreach ($order_courses as $key => $order_course)
    {
      $item = (new InvoiceItem())
              ->title($order_course->course->title)
              ->pricePerUnit($order_course->total);
      $items[$key] = $item;
    }

    $client = new Party([
      'name' => "STOR Institute",
      'phone'=> "",
    ]);

    $invoice = Invoice::make()
                        ->series("STIN")
                        ->sequence(667)
                        ->serialNumberFormat('{SERIES}-{SEQUENCE}')
                        ->seller($client)
                        ->buyer($c)
                        ->status("paid")
                        ->currencySymbol('$')
                        ->currencyCode('USD')
                        ->currencyFormat('{SYMBOL}{VALUE}')
                        ->currencyThousandsSeparator(',')
                        ->currencyDecimalPoint('.')
                        ->filename($customer->name."-".now()->format('Y-m-d'))
                        ->addItems($items)
                        ->taxRate(15)
                        ->logo(public_path('/logo.png'));

      return $invoice;

  }
}
