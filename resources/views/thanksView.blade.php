@extends('layouts.master')

@section('page-title','Thank You | Shankaraayan - A Help Initiative')
@section('page-css','body{background:white;}')
@extends('layouts.footer')
@section('content')
<?php
if(isset($_GET['order_id'])){
   $order_id = $_GET['order_id'];
}else{
    $order_id = '';
}
?>
<main class="main-content">
    <div class="donation-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">@if(!empty($order_id))<span style="color:green">Your Donation Id is = {{$order_id}}</span><br>@endif
                    Thank you for your great generosity! We, at Shankaraayan Foundation, greatly appreciate your donation, and your sacrifice. Your support helps to further our mission through Education Programs, including child adoption.
<br>
Your support is invaluable to us, thank you again! If you have specific questions about our mission be sure to mail us support@shankaraayan.com /shankaraayanfoundation@gmail.com or reach out to +91 7014875375
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection