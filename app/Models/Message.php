<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    // Id, sid, status, accessed_at, created_at, updated_at
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sid',
        'phone',
        'status',
        'accessed_at',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'accessed_at' => 'datetime',
    ];

    public static function getStatus($phone)
    {
      $statusMap = [
                      '+12005550200' => 'delivered',
                      '+12005550500' => 'failed',
                      '+12005550503' => 'undelivered',
                      '+12005550100' => 'queued',
                      '+12005550102' => 'processing',
                      '+12005550308' => 'sent',
                      '+12005550404' => 'not_available'
                    ];

      if (array_key_exists($phone, $statusMap)) {
        return $statusMap[$phone];
      } else {
        return 'sent';
      }

    }
}
