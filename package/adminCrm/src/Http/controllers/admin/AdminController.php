<?php

namespace Kartikey\AdminCrm\Http\controllers\admin;

use Kartikey\AdminCrm\Models\orders;
use Kartikey\AdminCrm\Models\checkouts;
use Carbon\Carbon;
use Kartikey\AdminCrm\Models\products;
use Kartikey\AdminCrm\Models\categories;
use Kartikey\AdminCrm\Models\orders_customers;
use Kartikey\AdminCrm\Models\orders_items;
use Kartikey\AdminCrm\Models\announcementBar;
use Kartikey\AdminCrm\Models\HomeBanner;
use Kartikey\AdminCrm\Models\whoWeAre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
		$orders = orders::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->get();
		$todayOrders = orders::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->whereDate('created_at', Carbon::today())->get();
		$checkouts = checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->get();
		$todayCheckouts = checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->whereDate('created_at', Carbon::today())->get();
		$UnfulfillOrders = orders::whereIn('order_status', ['Reviewed', 'Shipped'])->get();
		
		return view('AdminCrm::dashboard', ['orders'=>$orders ,'todayOrders'=>$todayOrders,'checkouts'=>$checkouts ,'todayCheckouts'=>$todayCheckouts, 'noOfUnfulfillOrders'=>count($UnfulfillOrders)]);
	}

    public function orders(){
		$orders = orders::orderBy('id', 'desc')
		->join ('orders_customers', 'orders.id', '=', 'orders_customers.orders_id')
		->join ('orders_items', 'orders.id', '=', 'orders_items.orders_id')
		->selectRaw('orders.*, orders_customers.first_name, orders_customers.last_name, orders_items.product_quantity')
		->get();
		
		$orders = $orders->groupBy('id');
		return view('AdminCrm::orders', ['orders'=>$orders]);
	}

    public function checkouts(){
		$checkouts = Checkouts::orderBy('id', 'desc')->get();
		return view('AdminCrm::checkouts', ['checkouts'=>$checkouts]);
	}

    public function products(){
		$products = products::orderBy('id', 'desc')->simplePaginate(25);
		$activeProducts = products::where('product_status','Active')->orderBy('id', 'desc')->simplePaginate(25);
		$draftProducts = products::where('product_status','Draft')->orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::products', ['products'=>$products, 'activeProducts'=>$activeProducts, 'draftProducts'=>$draftProducts]);
	}

    public function categories(){
		$categories = categories::orderBy('category','asc')->get();
		return view('AdminCrm::categories', ['categories'=>$categories]);
	}

    public function announcement_bar_show(){
		$announcement = announcementBar::orderBy('id','asc')->get();
		return view('AdminCrm::announcement/show', ['announcements'=>$announcement]);
	}
	public function announcement_create(){
		return view('AdminCrm::announcement/create');
	}
	public function announcement_store(Request $request){
		announcementBar::create([
		    'content' => $request->content,
		    'url' => $request->page_url,
		]);
		return redirect('/admin/announcement_bar')->with('status', 'Announcement added successfully!');
	}
	public function announcement($announcementID){
		$announcement = announcementBar::where('id', $announcementID)->first();
		return view('AdminCrm::announcement/edit', ['announcement'=>$announcement]);	
}
	public function announcement_edit($announcementID, Request $request){
		$announcement = announcementBar::where('id', $announcementID)->first();
			announcementBar::where('id', $announcementID)->update([
				'content' => $request->content,
				'url' => $request->page_url
			]);
		return redirect('/admin/announcement_bar')->with('status', 'Announcement Updated successfully!');	
	}
	public function announcement_delete($announcementID){
		announcementBar::where('id', $announcementID)->delete();
		return redirect('/admin/announcement_bar')->with('status', 'Announcement Deleted successfully!');
	
	}

	// Home Banner Here
	public function home_banner(){
		$banner = HomeBanner::orderBy('sequence', 'asc')->simplePaginate(25);
		return view('AdminCrm::home-slider/show', ['data'=>$banner]);
	}
	public function home_banner_new(){
		return view('AdminCrm::home-slider/create');
	}
	public function home_banner_add(Request $request){
		$uniqueId = date("HisdmY");
		$desktopImageFilename = "null";
		if($request->hasFile('desktopImg'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/banner/";
			
			foreach($request->file('desktopImg') as $image)
			{	
				$extension = $image->getClientOriginalExtension();
				$desktopImageFilename = 'shankaraayan-'.str_replace(' ','-',strtolower($request->slider_heading)).'-desktopImage-'.$uniqueId.'.'.$extension;
				$check = in_array($extension,$allowedfileExtension);
				
				if($check)
				{
					$image->storeAs($folder_name, $desktopImageFilename);
				}
				else
				{
					echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
			}
		}
		
		$mobileImageFilename = "null";
		if($request->hasFile('mobileImg'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/banner/";
			
			foreach($request->file('mobileImg') as $image)
			{	
				$extension = $image->getClientOriginalExtension();
				$mobileImageFilename = 'shankaraayan-'.str_replace(' ','-',strtolower($request->slider_heading)).'-mobileImg-'.$uniqueId.'.'.$extension;
				$check = in_array($extension,$allowedfileExtension);
				
				if($check)
				{
					$image->storeAs($folder_name, $mobileImageFilename);
				}
				else
				{
					echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
			}
		}
		
		HomeBanner::create([
		    'sequence' => $request->id,
		    'heading' => ucwords($request->slider_heading),
		    'subHeading' => $request->slider_subHeading,
		    'desktopImg' => $desktopImageFilename,
		    'mobileImg' => $mobileImageFilename,
		    'btnText' => $request->btn_title,
		    'btnLink' => $request->btn_url,
		    'status' => $request->btnStatus,
		]);
		return redirect('/admin/home_banner')->with('status', 'Slider added successfully!');
	}
	public function home__banner_form($bannerID){
			$bannerContent = HomeBanner::where('id', $bannerID)->first();
			return view('AdminCrm::home-slider/edit', ['bannerContent'=>$bannerContent]);
		
	}
	public function home_banner_edit($bannerID, Request $request){
		HomeBanner::where('id', $bannerID)
		->update([
		    'heading' => $request->heading,
		    'subHeading' => $request->subHeading,
		    'btnText' => $request->btnText,
		    'btnLink' => $request->btnLink,
		    'status' => $request->status
		]);
		return redirect('/admin/home_banner')->with('status', 'Slider Updated successfully!');
		
	}

	public function home_banner_edit_image($bannerID, Request $request){
		$uniqueId = date("HisdmY");
		$banner = HomeBanner::where('id', $bannerID)->first();
		$filename = "";
		
		if($request->hasFile('banner'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/banner/";
			
			foreach($request->file('banner') as $image)
			{
				$extension = $image->getClientOriginalExtension();
				if($request->type == "Mobile"){
					$filename = 'shankaraayan-'.str_replace(' ','-',strtolower($banner->heading)).'-mobileImg-'.$uniqueId.'.'.$extension;
				}else{
					$filename = 'shankaraayan-'.str_replace(' ','-',strtolower($banner->heading)).'-desktopImage-'.$uniqueId.'.'.$extension;
				}
				$check = in_array($extension,$allowedfileExtension);
				
				if($check)
				{
					$image->storeAs($folder_name, $filename);
				}
				else
				{
					echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
			}
		}
		
		if($request->type == "Mobile"){
		    HomeBanner::where('id', $bannerID)->update([
		        'mobileImg' => $filename
		    ]);
		}else{
			HomeBanner::where('id', $bannerID)->update([
		        'desktopImg' => $filename
		    ]);
		}
		
		return back();
	}

	public function home_banner_delete($bannerID){
		$bannerImg = HomeBanner::where('id', $bannerID)->first();
		$oldImg = 'public/home/banner/'.$bannerImg->desktopImg;
		$oldImg1 = 'public/home/banner/'.$bannerImg->mobileImg;
		Storage::delete($oldImg);
		Storage::delete($oldImg1);

		HomeBanner::where('id', $bannerID)->delete();
		return redirect('/admin/home_banner')->with('status', 'Slider Deleted successfully!');
		
	}


	// who_we Section 
	public function who_we(){
		$who_weContent = whoWeAre::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::who-we-are/show', ['data'=>$who_weContent]);
	}
	public function who_we_new(){
		return view('AdminCrm::who-we-are/create');	
	}
	public function who_we_add(Request $request){
		whoWeAre::create([
		    'heading' => $request->content,
		    'btnText' => $request->btnText,
		    'btnURL' => $request->page_url,
		]);
		return redirect('/admin/who-we-are')->with('status', 'Section added successfully!');
	}
	public function who_we_form($sectionID){
		$who_weContent = whoWeAre::where('id', $sectionID)->first();
		return view('AdminCrm::who-we-are/edit', ['who_weContent'=>$who_weContent]);	
	}
	public function who_we_edit($sectionID,Request $request){
		$who_weContent = whoWeAre::where('id', $sectionID)->first();
		whoWeAre::where('id', $sectionID)->update([
			'heading' => $request->content,
			'btnText' => $request->btnText,
			'btnURL' => $request->page_url]);
			return redirect('/admin/who-we-are')->with('status', 'Section Updated successfully!');	
	}
	public function who_we_delete($sectionID){
		whoWeAre::where('id', $sectionID)->delete();
		return redirect('/admin/who-we-are')->with('status', 'Section Deleted successfully!');
	}

	// Red Section 
	public function red_section(){
		$redContent = RedSection::orderBy('id', 'desc')->simplePaginate(25);
		return view('admin.red-section', ['data'=>$redContent]);
	}
	public function red_section_new(){
		return view('admin.red-section-new');	
	}
	public function red_section_add(Request $request){
		RedSection::create([
		    'content' => $request->content,
		    'heading' => $request->heading,
		    'page' => $request->page
		]);
		return redirect('/admin/red_section')->with('status', 'Section added successfully!');
	}
	public function red_section_form($sectionID){
		$redContent = RedSection::where('id', $sectionID)->first();
		return view('admin.red-section-edit', ['redContent'=>$redContent]);	
	}
	public function red_section_edit($sectionID,Request $request){
		$blueContent = RedSection::where('id', $sectionID)->first();
		RedSection::where('id', $sectionID)->update([
			'content' => $request->content,
			'heading' => $request->heading,
		    'page' => $request->page
			]);
			return redirect('/admin/red_section')->with('status', 'Section Updated successfully!');	
	}
	public function red_section_delete($sectionID){
		RedSection::where('id', $sectionID)->delete();
		return redirect('/admin/red_section')->with('status', 'Section Deleted successfully!');
	}

}
