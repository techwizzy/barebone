<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class UserSettingController extends Controller
{
    /**
 * Store a new user setting.
 *
 * @param  Request  $request
 * @return Response
 */
public function storeUserSetting(Request $request)
{
    //run validation on data sent in
    $validatedData = $request->validate([

        'phone' => 'numeric',
        'email' => 'email',
    ]);
   // dd($request->all());
    $user_setting_model = new UserSetting();
    $user_setting_model->client_id = $request->input('client_id');
    $user_setting_model->receive_sms_alerts = $request->input('receive_phone_alerts');
    $user_setting_model->receive_email_alerts = $request->input('receive_email_alerts');
    $user_setting_model->phone = $request->input('phone');
    $user_setting_model->email = $request->input('email');
    $user_setting_model->save();
    $this->sendMessage('Your Phone has been Registered for sms alerts successfully!!', $request->input('phone'));
    return back()->with(['success'=>" User Setting updated"]);
}

    /**
 * Update user setting.
 *
 * @param  Request  $request
 * @return Response
 */
public function updateUserSetting(Request $request)
{
    //run validation on data sent in
    $id = $request->input('client_id');
    //dd($request->all());
    $user_setting_model =UserSetting::where('client_id', $id)->first();
    $user_setting_model->receive_sms_alerts = $request->input('receive_phone_alerts');
    $user_setting_model->receive_email_alerts = $request->input('receive_email_alerts');
    $user_setting_model->phone = $request->input('phone');
    $user_setting_model->email = $request->input('email');
    $user_setting_model->save();
    $this->sendMessage('Your Phone has been Registered for sms alerts successfully!!', '+'.$request->input('phone'));
    return back()->with(['success'=>" User Setting updated"]);
}

public function sendMessage($message, $recipients)
{
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");
    $twilio_number = getenv("TWILIO_NUMBER");
    $client = new Client($account_sid, $auth_token);
    $client->messages->create($recipients,
            ['from' => $twilio_number, 'body' => $message] );
}


}
