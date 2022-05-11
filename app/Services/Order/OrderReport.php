<?php

namespace App\Services\Order;

use App\Models\Order;
use Carbon\CarbonInterface;

class OrderReport
{
  // Single responsibility principle
  public function orderBetween(CarbonInterface $startDate, CarbonInterface $endDate)
  {
    return Order::whereBetween('shipped_at', [$startDate, $endDate])
      ->latest()
      ->get();
  }
}
