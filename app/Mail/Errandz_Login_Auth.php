<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Loginotp;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
class Errandz_Login_Auth extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $otpnber = mt_rand(100000000, 999999999);
        
        $checkid = Loginotp::where('user_id', '=', Auth::user()->id)->first();
        if (!$checkid === null) {
            $otp = new Loginotp([
                'otp'     => $otpnber,
                'status'     =>  'active',
                'user_id'     =>  Auth::user()->id,
                'date'=>Carbon::now(),
                ]);
                $otp->save(); 
        }else{
            DB::table('loginotp')->where('user_id',Auth::user()->id)->limit(1)->update(['otp' => $otpnber]);
        }

  
        return $this->markdown('Emails.Login_Login_Auth');
    }
}
