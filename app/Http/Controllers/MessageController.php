<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MockMessageStatusReady;
use Carbon\Carbon;
use Log;

class MessageController extends Controller
{

    public function sendSms(Request $request)
    {
      /* Request:
        {
          "from" => "+12005550000",
          "to" => "+12005550100",
          "body" => "N/A",
          "webhookUrl" => "http://example.com?target=qa-05&api_key=xyz"
        }
      */


      $request = $request->all();
      Log::info(__METHOD__, ['REQUEST'=>$request]);
      $sid = "mt-"md5($request['to'].hrtime(true).'-'.hrtime(true));
      $message = Message::create([
                        "sid" => $sid,
                        "phone" => $request['to'],
                        "status" => Message::getStatus($request['to'])
                      ]);

      // Trigger Web Hook Event
      MockMessageStatusReady::dispatch($request, $message->toArray());

      return response()->json([
                                'sid' => $sid,
                                'status' => 'accepted',
                                'dateCreated' => [
                                  'date' => Carbon::now()->format('Y-m-d H:i:s'),
                                  'timezone' => "+00:00",
                                  'timezone_type' => 1
                                ]
                              ]);
    }

    public function getMessageBySID(Request $request, $sid)
    {
        $messageStatus =  Message::select('status')->where('sid', $sid)->first();
        return response()->json([
                                    'status' => $messageStatus['status'],
                                ]);
    }




}
