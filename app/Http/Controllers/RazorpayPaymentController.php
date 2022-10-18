<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Donation;

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
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // print_r($input);exit;
        $payment = $api->payment->fetch($input['payment_id']);
  
        $data = new Donation();

        $data->user_id = "guest";
        $data->product_id = "Donation";
        $data->r_payment_id = $input['payment_id'];
        $data->amount = $input['amount'];

        $data->save();

        $arr = array('msg' => 'Payment successfully credited', 'status' => true);

        // return Response()->json($arr); 
          
        Session::put('success', 'Payment successful');
        return redirect('thankyou');
    }

    public function success(){
        return view('thanksView');
   }

   public function pay(Request $req){
        $name = $req->input('name');
        $product_id = $req->input('product_id');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $name = $req->input('name');
        $totalAmount = $req->input('totalAmount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt'=>123,'amount'=>$totalAmount*100,'currency'=>'INR'));
        $order_id = $order['id'];
        $status = $order['status'];

        $data = new Donation();

        $data->user_id = $email ;
        $data->product_id = "Donation";
        $data->r_payment_id = 'Null';
        $data->amount = $totalAmount;
        $data->order_id = $order_id;
        $data->payment_status = $status;

        $data->save();
        $data =array('order_id'=>$order_id,'status'=>$status);
        echo json_encode($data);
   }

   public function paymentsuccess(Request $request){
        $input = $request->all();
        // print_r($input);        
        $user = Donation::where('order_id',$input['order_id'])->first();
        $user->payment_status = "Paid";
        $user->r_payment_id = $input['payment_id'];
        $user->save();
        // return redirect('thankyou');
        $order_id = array('order_id'=>$input['order_id']);
        echo json_encode($order_id);
   }
}
