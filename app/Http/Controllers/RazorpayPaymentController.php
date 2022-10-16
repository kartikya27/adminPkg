<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Models\Donation;
class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        
        return view('razorpayView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        // $input = $request->all();
  
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
        //         $response = $response.$api->payment->fetch($id);
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }
        // }

        // $data = [
        //     'user_id' => $request->phone,
        //     'product_id' => $request->product_id,
        //     'r_payment_id' => $request->payment_id,
        //     'amount' => $request->amount,
        //  ];

        // $getId = Donation::insertGetId($data);  

        // $arr = array('msg' => 'Payment successfully credited', 'status' => true);

        // return Response()->json($arr); 
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function razorPaySuccess(){
        print_r($_GET['order_id']);
        $arr = array('msg' => 'Payment successfully credited', 'status' => true);
        return Response()->json($arr); 
   }
}
