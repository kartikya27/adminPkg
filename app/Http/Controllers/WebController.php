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

    public function successStories(){
        return view('success-stories');
    }

    public function events(){
        $event = Event::where('type','Event')->orderBy('id','desc')->get();
        return view('events',['events'=>$event]);
    }

    public function gallery(){
        return view('gallery');
    }
}
