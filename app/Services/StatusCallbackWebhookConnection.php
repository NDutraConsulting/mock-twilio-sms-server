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

    $res = Http::post($this->targetEndpoint, [
        'form_params' => $payload
    ]);
    \Log::info($res);
  }

}
