<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $table = "newsletter";
    protected $fillable = ['email'];

    public static function store($request)
    {
        self::create( $request->all() );

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.apikey'),
            'server' => config('services.mailchimp.prefix') 
        ]);

        $list_id='298ae56b23';
        
        try {
            $response = $mailchimp->lists->addListMember($list_id, [
                "email_address" => $request->input('email'),
                "status" => "subscribed"
            ]);
            return response()->json([
                'message' => 'Thank you for your subscription'
            ], 200);
        } catch (\MailchimpMarketing\ApiException $e) {
            return response()->json([
                'message' => 'Invalid Email Address'
            ], 500);
        }
    }
}
