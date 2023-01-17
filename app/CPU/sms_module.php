<?php

namespace App\CPU;

use App\Model\BusinessSetting;
use Illuminate\Support\Facades\Config;
use Nexmo\Laravel\Facade\Nexmo;
use Twilio\Rest\Client;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\DeliveryMan;
use \App\CPU\OrderManager;

use App\User;



class SMS_module
{
    public static function send($receiver, $otp,$status = '',$order_id='',$email='')
    {
        $config = self::get_settings('twilio_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::twilio($receiver, $otp);
            return $response;
        }

        $config = self::get_settings('nexmo_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::nexmo($receiver, $otp);
            return $response;
        }

        $config = self::get_settings('2factor_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::two_factor($receiver, $otp);
            return $response;
        }

        $config = self::get_settings('msg91_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::msg_91($receiver, $otp);
            return $response;
        }

        $config = self::get_settings('releans_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::releans($receiver, $otp);
            return $response;
        }

        $config = self::get_settings('kp_sms');
        if (isset($config) && $config['status'] == 1) {
            $response = self::kp_sms($receiver, $otp, $status, $order_id,$email);
            return $response;
        }

        return 'not_found';
    }

    public static function twilio($receiver, $otp)
    {
        $config = self::get_settings('twilio_sms');
        $response = 'error';
        if (isset($config) && $config['status'] == 1) {
            $message = str_replace("#OTP#", $otp, $config['otp_template']);
            $sid = $config['sid'];
            $token = $config['token'];
            try {
                $twilio = new Client($sid, $token);
                $twilio->messages
                    ->create($receiver, // to
                        array(
                            "messagingServiceSid" => $config['messaging_service_sid'],
                            "body" => $message
                        )
                    );
                $response = 'success';
            } catch (\Exception $exception) {
                $response = 'error';
            }
        }
        return $response;
    }

    public static function nexmo($receiver, $otp)
    {
        $sms_nexmo = self::get_settings('nexmo_sms');
        $response = 'error';
        if (isset($sms_nexmo) && $sms_nexmo['status'] == 1) {
            $message = str_replace("#OTP#", $otp, $sms_nexmo['otp_template']);
            try {
                $config = [
                    'api_key' => $sms_nexmo['api_key'],
                    'api_secret' => $sms_nexmo['api_secret'],
                    'signature_secret' => '',
                    'private_key' => '',
                    'application_id' => '',
                    'app' => ['name' => '', 'version' => ''],
                    'http_client' => ''
                ];
                Config::set('nexmo', $config);
                Nexmo::message()->send([
                    'to' => $receiver,
                    'from' => $sms_nexmo['from'],
                    'text' => $message
                ]);
                $response = 'success';
            } catch (\Exception $exception) {
                $response = 'error';
            }
        }
        return $response;
    }

    public static function two_factor($receiver, $otp)
    {
        $config = self::get_settings('2factor_sms');
        $response = 'error';
        if (isset($config) && $config['status'] == 1) {
            $api_key = $config['api_key'];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://2factor.in/API/V1/" . $api_key . "/SMS/" . $receiver . "/" . $otp . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }
        return $response;
    }

    public static function msg_91($receiver, $otp)
    {
        $config = self::get_settings('msg91_sms');
        $response = 'error';
        if (isset($config) && $config['status'] == 1) {
            $receiver = str_replace("+", "", $receiver);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=" . $config['template_id'] . "&mobile=" . $receiver . "&authkey=" . $config['authkey'] . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{\"OTP\":\"$otp\"}",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if (!$err) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        }
        return $response;
    }

    public static function releans($receiver, $otp)
    {
        $config = self::get_settings('releans_sms');
        $response = 'error';
        if (isset($config) && $config['status'] == 1) {
            $curl = curl_init();
            $from = $config['from'];
            $to = $receiver;
            $message = str_replace("#OTP#", $otp, $config['otp_template']);

            try {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.releans.com/v2/message",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "sender=$from&mobile=$to&content=$message",
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer ".$config['api_key']
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                $response = 'success';
            } catch (\Exception $exception) {
                $response = 'error';
            }

        }
        return $response;
    }

    public static function kp_sms($receiver, $otp, $status= '',$order_id,$email='')
    {
        // return $order_id;
        // return $email;
        // die;
        if($email != ''){
         $customer = User::where('email', '=',$email)->first();
         $customer_name = $customer->f_name;
        }
        else{
            $customer_name = '';
        }
        if($order_id != ''){
            // return $order_id;
            //  $order = Order::where('orders.id','=',$order_id)->first();

             $order = Order::find($order_id);

            // $delevery_man_name =  $order->f_name . ' ' . $order->l_name;
            $delevery_man_name = '';
            if(isset($order->delivery_man_id) && $order->delivery_man_id > 0){
                $delevery_man =   DeliveryMan::find($order->delivery_man_id);
                if($delevery_man)
                {
                    $delevery_man_name = $delevery_man->f_name . ' ' . $delevery_man->l_name;
                }
            }

            // return $order_detail=OrderManager::order_summary($order);
            // $order_details = OrderDetail::select('price')
            //                             ->join('orders', 'orders.id','order_details.order_id')
            //                             ->where('orders.id',$order_id)->first();

            // $order_price = $order_details->price;
            $order_price = $order->order_amount;
        }else{
            $delevery_man_name = '';
            $order_id = '';
            $order_price = '';
        }
        
        try {
            $config = self::get_settings('kp_sms');
        if($status != ''){

            if($status == 'confirmed'){
                $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Congratulations! You have successfully placed your order with Happy Harvest Farms. Thank you for supporting sustainable farming. www.happyharvestfarms.com" . "&sender=" . $config['sender'] . "&template_id=1007791978704113931"  . "";

            }

            if($status == 'out_for_delivery'){
                $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Our delivery agent $delevery_man_name is out to deliver your Happy Harvest Farms order $order_id. Your order will be delivered between 11am to 4pm." . "&sender=" . $config['sender'] . "&template_id=1007570208645274365"  . "";

            }
            if($status == 'delivered'){
                    // $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Congratulations! Your Happy Harvest Farms Order {#var#} has been successfully delivered! Sustainably grown & chemical-free, now and forever, only with Happy Harvest Farms!" . "&sender=" . $config['sender'] . "&template_id=1007005975909080452"  . "";
                    $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Congratulations! Your Happy Harvest Farms Order $order_id has been successfully delivered! Sustainably grown and chemical-free, now and forever, only with Happy Harvest Farms!" . "&sender=" . $config['sender'] . "&template_id=1007651811429933896" . "";
            
                }
            if($status == 'Payment_succeeded'){
                $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Congratulations! Your payment of $order_price INR is successful for your Happy Harvest Farms order $order_id. We look forward to having you shop with us again at www.happyharvestfarms.com" . "&sender=" . $config['sender'] . "&template_id=1007640109483841206"  . "";

            }
            if($status == 'Payment_failed'){
                $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Oops. There seems to be a problem. We were unable to process your payment of $order_price INR for your Happy Harvest Farms order $order_id. Please contact our customer care on xxxx to get this resolved!" . "&sender=" . $config['sender'] . "&template_id=1007162514233304655"  . "";

            }
            if($status == 'password_resets'){
                $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=Dear  $customer_name, $otp is the OTP verification code for your Happy Harvest Farms account. Do not share it with anyone. One step closer to sustainably grown produce." . "&sender=" . $config['sender'] . "&template_id=1007916073233998481"  . "";
            }

        }
        else{
        $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=" . $config['message'] . "&sender=" . $config['sender'] . "&template_id=" . $config['template_id']  . "";

        }
        // $url = "http://trans.kapsystem.com/api/v4/?api_key=" . $config['api_key'] . "&method=sms" . "&to=" . $receiver . "&message=" . $config['message'] . "&sender=" . $config['sender'] . "&template_id=" . $config['template_id']  . "";
        
       
        
        
        $config = self::get_settings('kp_sms');
        $response = 'error';
        if (isset($config) && $config['status'] == 1) {
            $receiver = str_replace("+", "", $receiver);
             $curl = curl_init();
               $url = str_replace(" ", '%20', $url);
               curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{\"OTP\":\"$otp\"}",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if (!$err) {
                $response =  $response;
                // $response = 'success';
            } else {
                $response = 'error';
            }
        }
        return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    public static function get_settings($name)
    {
        $config = null;
        $data = BusinessSetting::where(['type' => $name])->first();
        if (isset($data)) {
            $config = json_decode($data['value'], true);
            if (is_null($config)) {
                $config = $data['value'];
            }
        }
        return $config;
    }
}
