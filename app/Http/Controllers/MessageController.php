<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function sendSms(Request $request)
    {
      /* Request:
        {
          "from" => "+12005550000",
          "to" => "+12005550100",
          "body" => "N/A",
          "qa-server" => "05",
        }
      */
      // Message::create();

      echo "SENDING SMS";
    }

    public function getMessageBySID()
    {
        // TODO
    }

}
