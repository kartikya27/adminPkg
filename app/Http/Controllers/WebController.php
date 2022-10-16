<?php

namespace App\Http\Controllers;
use Kartikey\AdminCrm\Models\HomeBanner;
use Kartikey\AdminCrm\Models\WhoWeAre;
use Kartikey\AdminCrm\Models\successStories;
use Kartikey\AdminCrm\Models\Testimonial;
use Kartikey\AdminCrm\Models\Contact;
use Illuminate\Http\Request;
use Kartikey\AdminCrm\Models\Event;
use Kartikey\AdminCrm\Models\products;
use Kartikey\AdminCrm\Models\WebMenu;
use Kartikey\AdminCrm\Models\PageContent;
use Kartikey\AdminCrm\Models\enquiries;
use Artisan;
use Illuminate\Support\Facades\Schema;



class WebController extends Controller
{
    public function index(){
        $banner = HomeBanner::where('status','Active')->orderBy('sequence', 'asc')->get();
        $whoWeContent = WhoWeAre::get()->first();
        $data['successStories'] = successStories::where('section','Main_page')->get()->first();
        $data['donationContent'] = successStories::where('section','Donation')->get()->first();
        $data['connectusContent'] = successStories::where('section','Footer')->get()->first();
        $testimonials = Testimonial::where('status','Active')->orderBy('id','asc')->get();
        $event = Event::where('type','Event')->orderBy('id','desc')->get()->first();
        return view('index',['banner'=>$banner,'events'=>$event,'testimonials'=>$testimonials ,'whoWeContent'=>$whoWeContent, 'data'=>$data]);
    }

    public function programs($category,$schemeUrl){
        $scheme = products::
        where('program_category',$category)
        ->where('program_url',$schemeUrl)
        ->get()->first();
        return view('programs',['scheme'=>$scheme]);
        //return response($scheme);
    }
    public function contact(){
        $contact = Contact::get()->first();
        return view('contact',['contact'=>$contact]);
    }

    public function volunteer(){
        return view('volunteer');
    }

    public function events(){
        $event = Event::where('type','Event')->orderBy('id','desc')->get();
        return view('events',['events'=>$event,'title'=>'Events']);
    }

    public function activity(){
        $event = Event::where('type','Activity')->orderBy('id','desc')->get();
        return view('activity',['events'=>$event,'title'=>'Activity']);
    }

    public function successStories(){
        $activity = Event::where('type','Activity')->orderBy('id','desc')->get();
        return view('success-stories',['activity'=>$activity]);
    }

    public function gallery(){
        return view('gallery');
    }

    public function webpage($param){
        $menu = WebMenu::where('menuName',$param)->get()->first();
        $page = PageContent::where('menu',$menu['id'])->get()->first();
        return view('webpage',['menu' =>$menu, 'page' => $page]);
    }

    public function details(){
        $type = $_GET['type'];
        $id = $_GET['id'];
        
        if($type == 'activity'){
            $event = Event::where('type','Activity')->first();
            return view('blog_details',['events'=>$event,'title'=>'School Activity']);
        }
        elseif($type == 'event'){
            $event = Event::where('type','Event')->first();
            return view('blog_details',['events'=>$event,'title'=>'Events']);
        }
    }
    
    public function donate(){
        return view('donate');
    }

    public function contact_submit(Request $req){
        header('Content-Type: application/json; charset=utf-8');
        $name = $req->con_name;
        $phone = $req->con_phone;
        $email = $req->con_email;
        $message = $req->con_message;

        if(empty($name) || empty($phone)|| empty($email)|| empty($message)){
            $return_arr = array("res" => false,"msg" => "All details are important",);
            echo json_encode($return_arr);
            exit;
        }else{
            enquiries::create([
                'users_id' =>0,
                'name' =>$name,
                'phone' =>$phone,
                'email' =>$email,
                'message' =>$message,
            ]);
            $return_arr = array("res" => true,"msg" => "Thank you, your enquiry has been submitted successfully.",);
            echo json_encode($return_arr);exit;
        }

       
    }

    
    // makemodel
    public function makemodel($model){
        Artisan::call('make:model', ['name' => $model, '-m' =>true]);
        // Artisan::call('make:migration', ['name' => 'create_'.$model.'_table']);
    }
    
    public function migrate($model){
        $hasTable = Schema::hasTable($model);      

if ($hasTable==0)
        {
            

            $migrate = Artisan::call('migrate');
            

            print_r($migrate);
           
        }
    }
    
    
    
    
    
}

