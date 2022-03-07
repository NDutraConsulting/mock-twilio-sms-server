<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StatusCallbackWebhookConnection
{

  public function __construct($webhookUrl)
  {
    $this->targetEndpoint = $webhookUrl;
  }

  public function post($payload)
  {

    $res = Http::asForm()->post($this->targetEndpoint, $payload);
    \Log::info($res);
  }

}
