<?php

namespace Kartikey\AdminCrm\Http\controllers\admin;

use Kartikey\AdminCrm\Models\orders;
use Kartikey\AdminCrm\Models\checkouts;
use Kartikey\AdminCrm\Models\products;
use Kartikey\AdminCrm\Models\categories;
use Kartikey\AdminCrm\Models\orders_customers;
use Kartikey\AdminCrm\Models\orders_items;
use Kartikey\AdminCrm\Models\announcementBar;
use Kartikey\AdminCrm\Models\HomeBanner;
use Kartikey\AdminCrm\Models\WhoWeAre;
use Kartikey\AdminCrm\Models\successStories;
use Kartikey\AdminCrm\Models\Testimonial;
use Kartikey\AdminCrm\Models\Contact;
use Kartikey\AdminCrm\Models\Event;
use Kartikey\AdminCrm\Models\Filters;
use Kartikey\AdminCrm\Models\Menu;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use PDF;
use Image;

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

	public function menu(){
		$menu = Menu::orderBy('id','asc')->get();
		return view('AdminCrm::menu.show', ['menu'=>$menu]);
	}
	public function menu_form($menuID, Request $request){
		$category = Categories::orderBy('id','asc')->get();
		$products = products::orderBy('id','asc')->get();
		$menu = Menu::where('id',$menuID)->get()->first();
		return view('AdminCrm::menu.edit', ['menu'=>$menu,'category'=>$category,'products'=>$products]);
	}
	public function menu_add(){
		$category = Categories::orderBy('id','asc')->get();
		$products = products::orderBy('id','asc')->get();
		return view('AdminCrm::menu.create', ['category'=>$category,'products'=>$products]);
	}
	public function menu_delete($menuID){
		Menu::where('id', $menuID)->delete();
		return redirect('/admin/menu')->with('status', 'Section Deleted successfully!');
	}
	public function menu_store(Request $request){
		$menuSlug = str_replace(' ','-',strtolower($request->program_category));
		$programSlug = $request->program_url;
		$product = products::where('program_url',$programSlug)->get()->first();
		Menu::create([
		    'main_menu' => $request->program_category,
		    'menu_slug' => $menuSlug,
		    'program_id' => $product->id,
		    'program_slug' => $programSlug,
		]);
		return redirect('/admin/menu')->with('status', 'Category created!');
	}
	public function menu_edit($menuID, Request $request){
		$menuSlug = str_replace(' ','-',strtolower($request->program_category));
		$programSlug = $request->program_url;
		$product = products::where('program_url',$programSlug)->get()->first();

		$menu = Menu::where('id', $menuID)->first();
		Menu::where('id', $menuID)->update([
			'main_menu' => $request->program_category,
		    'menu_slug' => $menuSlug,
		    'program_id' => $product->id,
		    'program_slug' => $programSlug,
		]);
		return redirect('/admin/menu')->with('status', 'Category created!');
	}

## Program Start Here
    
	public function products(){
		$products = products::orderBy('id', 'desc')->simplePaginate(25);
		$activeproducts = products::where('program_status','Active')->orderBy('id', 'desc')->simplePaginate(25);
		$draftproducts = products::where('program_status','Draft')->orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::program.show', ['products'=>$products, 'activeProducts'=>$activeproducts, 'draftproducts'=>$draftproducts]);
	}
	
	public function product_new(){
		$categories = Categories::orderBy('category','asc')->get();
		return view('AdminCrm::program.create', ['categories'=>$categories]);
	}

	public function product_store(Request $request){
		$request->validate([
		    'program_code' => 'required|unique:products',
		]);
		
		$programName = ucwords($request->programName);
		$programs = products::where('programName', $programName)->get();
		
		$program_url = str_replace(' ','-',strtolower($request->programName));
		if(count($programs)){
			$program_url = $program_url.'-'.count($programs);
		}
		
		$program_url = str_replace(['(',')'],'',$program_url);
		
		if($request->hasFile('mediaImage'))
        {
			$names = [];
			$i=1;
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/programs/".str_replace(' ','-',strtoupper($request->program_code));
			
			foreach($request->file('mediaImage') as $image)
			{
				$extension = $image->getClientOriginalExtension();
				$filename = 'Shankaraayan-'.str_replace(' ','-',strtolower($request->programName)).'-'.$i.'.'.$extension;
				
				$check = in_array($extension,$allowedfileExtension);
				
				if($check)
				{
					array_push($names, $filename);
					$image->storeAs($folder_name, $filename);
				}
				else
				{
					echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
				}
				
				$filename1 = 'Shankaraayan-'.str_replace(' ','-',strtolower($request->programName)).'-'.$i.'-540px.'.$extension;
				$filename2 = 'Shankaraayan-'.str_replace(' ','-',strtolower($request->programName)).'-'.$i.'-270px.'.$extension;
				
				$source = storage_path().'/app/'.$folder_name.'/'.$filename;
				$target1 = storage_path().'/app/'.$folder_name.'/'.$filename1;
				$target2 = storage_path().'/app/'.$folder_name.'/'.$filename2;
				
				Image::make($source)->widen(540)->save($target1);
				Image::make($source)->widen(270)->save($target2);
				
				$i++;
			}
			
			$namesCount = count($names);
			for($i=$namesCount; $i<4; $i++)
			{
				$names[$i] = "null";
			}
			
			
			$filter = $request->tag;
			
			products::create([
			'program_category' => str_replace(' ','-',strtolower($request->programCategory)),
			'programName' => ucwords($request->programName),
			'heading' => ucwords($request->heading),
			'subHeading' => ucwords($request->subHeading),
			'program_url' => $program_url,
			'program_pic1' => $names[0],
			'program_pic2' => $names[1],
			'program_pic3' => $names[2],
			'program_pic4' => $names[3],
		    'filter' => $filter,
			'program_code' => $request->program_code,
		    'programDescription' => $request->programDescription,
		    'description' => $request->description,
		    'parent_heading' => $request->parent_heading,
		    'program_additional' => $request->program_additional,
		    'video_link' => $request->video_link,
		    'program_status' => $request->program_status,
		    'product_most-viewed' => 0,
		    'product_bestsellers' => 0
			]);
			
			Filters::updateOrInsert(
			    ['filter_value' => ucwords($request->productCategory)],
				['filter_type' => 'product_category']
			);
			Filters::updateOrInsert(
			    ['filter_value' => $filter],
				['filter_type' => 'tag_filter']
			);
			
			return redirect('admin/products')->with('status', 'Product created successfully!');
		}
	}
	
	public function product($productID){
		$product = products::where('id', $productID)->first();
		$categories = Categories::orderBy('category','asc')->get();
		return view('AdminCrm::program.edit', ['product'=>$product, 'categories'=>$categories]);
	}

	public function product_edit($productID, Request $request){
		$products = products::where('id', $productID)->first();
		if($request->program_code != $products['program_code'])
		{
			$request->validate([
			    'program_code' => 'required|unique:products',
			]);
			$oldDirectory = '/public/home/programs/'.str_replace(' ','-',strtoupper($products['program_code']));
			$NewDirectory = '/public/home/programs/'.str_replace(' ','-',strtoupper($request->program_code));
			Storage::move($oldDirectory, $NewDirectory);
		}
		
		$programName = ucwords($request->programName);
		$program_url = $products['program_url'];
		$Urls = [];
		
		if($programName != $products['programName']){
			$products = products::where('programName', $programName)->get();
		    $program_url = str_replace(' ','-',strtolower($request->programName));
		    if(count($products)){
				for($i=0;$i<count($products);$i++){
					$Urls[$i] = str_replace($program_url,'',$products[$i]['program_url']);
					$Urls[$i] = str_replace('-','',$Urls[$i]);
				}
				if(count($Urls) == 1){
					if($Urls[0] == ""){
						$Urls[0] = 0;
					}
				}
				$program_url = $program_url.'-'.(max($Urls)+1);
		    }
		}
		
		$program_url = str_replace(['(',')'],'',$program_url);
		$filter = $request->tag;
		
		products::where('id', $productID)
		->update([
			'program_category' => str_replace(' ','-',strtolower($request->programCategory)),
			'programName' => ucwords($request->programName),
			'heading' => ucwords($request->heading),
			'subHeading' => ucwords($request->subHeading),
			'program_url' => $program_url,
		    'filter' => $filter,
			'program_code' => $request->program_code,
		    'programDescription' => $request->programDescription,
		    'description' => $request->description,
		    'parent_heading' => $request->parent_heading,
		    'program_additional' => $request->program_additional,
		    'video_link' => $request->video_link,
		    'program_status' => $request->program_status,
		    'product_most-viewed' => 0,
		    'product_bestsellers' => 0
		]);
		
		Filters::updateOrInsert(
		    ['filter_value' => ucwords($request->productCategory)],
			['filter_type' => 'program_category']
		);
		Menu::where('program_id',$productID)->update(
		    ['program_slug' => $program_url],
		);
		
		Filters::updateOrInsert(
			['filter_value' => $filter],
			['filter_type' => 'tag_filter']
		);

        return back()->with('status', 'Product updated!');
    }
	
	public function product_delete(Request $request){
		$request->validate([
		    'sku' => 'bail|required',
		]);
		
		$directory = 'public/home/programs/'.str_replace(' ','-',strtoupper($request->sku));
		Storage::deleteDirectory($directory);
		
		Menu::where('program_id',$request->id)->delete();

		products::where('program_code', $request->sku)->delete();
	}

	public function add_image($productID, Request $request){
		$product = products::where('id', $productID)->first();
		
		if($request->hasFile('mediaImage'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/programs/".str_replace(' ','-',str_replace('/','',$product['program_code']));
			
			foreach($request->file('mediaImage') as $image)
			{
				$extension = $image->getClientOriginalExtension();
				if($product->program_pic1 == 'null'){
					$i = 1;
					$picNum = 'program_pic1';
				}elseif($product->program_pic2 == 'null'){
					$i = 2;
					$picNum = 'program_pic2';
				}elseif($product->program_pic3 == 'null'){
					$i = 3;
					$picNum = 'program_pic3';
				}else{
					$i = 4;
					$picNum = 'program_pic4';
				}
				
				$filename = 'Shankraayan-'.str_replace(' ','-',strtolower($product->programName)).'-'.$i.'.'.$extension;
				$check = in_array($extension,$allowedfileExtension);
				
				if($check){
					$image->storeAs($folder_name, $filename);
				}
				
				$filename1 = 'Shankraayan-'.str_replace(' ','-',strtolower($product->programName)).'-'.$i.'-540px.'.$extension;
				$filename2 = 'Shankraayan-'.str_replace(' ','-',strtolower($product->programName)).'-'.$i.'-270px.'.$extension;
				
				$source = storage_path().'/app/'.$folder_name.'/'.$filename;
				$target1 = storage_path().'/app/'.$folder_name.'/'.$filename1;
				$target2 = storage_path().'/app/'.$folder_name.'/'.$filename2;
				
				Image::make($source)->widen(540)->save($target1);
				Image::make($source)->widen(270)->save($target2);
				
				products::where('id', $productID)
			    ->update([
			        $picNum => $filename
			    ]);
			}
		}
		return back();
	}

	public function delete_image(Request $request){
		$request->validate([
		    'sku' => 'bail|required',
		    'imgName' => 'bail|required',
		]);
		
		$img = 'public/home/programs/'.str_replace(' ','-',str_replace('/','',$request->sku)).'/'.$request->imgName;
		Storage::delete($img);
		$img = 'public/home/programs/'.str_replace(' ','-',str_replace('/','',$request->sku)).'/'.str_replace('.jpg','-540px.jpg',$request->imgName);
		Storage::delete($img);
		$img = 'public/home/programs/'.str_replace(' ','-',str_replace('/','',$request->sku)).'/'.str_replace('.jpg','-270px.jpg',$request->imgName);
		Storage::delete($img);
		
		$product = products::where('program_code', $request->sku)->first();
		
		if($product->program_pic1 == $request->imgName){
			products::where('program_code', $request->sku)
			->update([
			    'program_pic1' => 'null'
			]);
		}
		elseif($product->program_pic2 == $request->imgName){
			products::where('program_code', $request->sku)
			->update([
			    'program_pic2' => 'null'
			]);
		}
		elseif($product->program_pic3 == $request->imgName){
			products::where('program_code', $request->sku)
			->update([
			    'program_pic3' => 'null'
			]);
		}
		else{
			products::where('program_code', $request->sku)
			->update([
			    'program_pic4' => 'null'
			]);
		}
	}

## Program End Here

## Categories Start Here
    public function categories(){
		$categories = categories::orderBy('category','asc')->get();
		return view('AdminCrm::category/show', ['categories'=>$categories]);
	}
	public function categories_new(){
		return view('AdminCrm::category/create');
	}
	public function categories_store(Request $request){
		$slug = str_replace(' ','-',strtolower($request->category));
		Categories::create([
		    'category' => $request->category,
		    'description' => $request->description,
		    'slug' => $slug,
		]);
		
		Filters::updateOrInsert(
		    ['filter_value' => ucwords($request->category)],
			['filter_type' => 'product_category']
		);
		
		return redirect('/admin/categories')->with('status', 'Category created!');
	}
	public function categorie($categorieID){
		$category = Categories::where('id', $categorieID)->first();
		$products = products::where('program_category', $category->category)->orderBy('id', 'desc')->get();
		return view('AdminCrm::category/edit', ['category'=>$category, 'products'=>$products]);
	}
	
	public function categorie_edit($categorieID, Request $request){
		$slug = str_replace(' ','-',strtolower($request->category));
		Categories::where('id', $categorieID)
		->update([
		    'category' => $request->category,
		    'description' => $request->description,
			'slug' => $slug,
		]);
		
		Filters::updateOrInsert(
		    ['filter_value' => ucwords($request->category)],
			['filter_type' => 'product_category']
		);
		
		return redirect('/admin/categories')->with('status', 'Category updated!');
	}
	public function categorie_delete($categorieID){
		Categories::where('id', $categorieID)->delete();
		return redirect('admin/categories');
	}
## Categories End Here

    public function announcement_bar_show(){
		$announcement = announcementBar::orderBy('id','asc')->get();
		return view('AdminCrm::announcement/show', ['announcements'=>$announcement]);
	}
	public function announcement_create(){
		return view('AdminCrm::announcement/create');
	}
	public function announcement_store(Request $request){
		announcementBar::create([
		    'hashtag' => $request->hashtag,
		    'facebook' => $request->facebook,
		    'instagram' => $request->instagram,
		    'twitter' => $request->twitter,
		    'linkedin' => $request->linkedin,
		    'youtube' => $request->youtube,
		    'phone' => $request->phone,
		    'email' => $request->email,
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
				'hashtag' => $request->hashtag,
		    	'facebook' => $request->facebook,
		    	'instagram' => $request->instagram,
		    	'twitter' => $request->twitter,
		    	'linkedin' => $request->linkedin,
		    	'youtube' => $request->youtube,
		    	'phone' => $request->phone,
		    	'email' => $request->email,
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
	public function arrange_slider_table(Request $request){
		$allData = $request->allData;
		$i = 1;
		foreach ($allData as $key => $value) {

			HomeBanner::where('id', $value)->update([
				'sequence' => $i
			]);
	    $i++;

		}
		return true;
	}

	// who_we Section 
	public function who_we(){
		$who_weContent = WhoWeAre::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::who-we-are/show', ['data'=>$who_weContent]);
	}
	public function who_we_new(){
		return view('AdminCrm::who-we-are/create');	
	}
	public function who_we_add(Request $request){
		$uniqueId = date("HisdmY");
		$desktopImageFilename = "null";
		if($request->hasFile('desktopImg'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/who_we_section/";
			
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
		WhoWeAre::create([
		    'heading' => $request->heading,
		    'content' => $request->content,
		    'btnText' => $request->btnText,
		    'btnURL' => $request->page_url,
		    'image' => $desktopImageFilename,
		]);
		return redirect('/admin/who-we-are')->with('status', 'Section added successfully!');
	}
	public function who_we_form($sectionID){
		$who_weContent = WhoWeAre::where('id', $sectionID)->first();
		return view('AdminCrm::who-we-are/edit', ['who_weContent'=>$who_weContent]);	
	}
	public function who_we_edit($sectionID,Request $request){
		$who_weContent = WhoWeAre::where('id', $sectionID)->first();
		WhoWeAre::where('id', $sectionID)->update([
			'heading' => $request->heading,
		    'content' => $request->content,
		    'btnText' => $request->btnText,
		    'btnURL' => $request->page_url,
		]);
			return redirect('/admin/who-we-are')->with('status', 'Section Updated successfully!');	
	}

	public function who_we_edit_image($bannerID, Request $request){
		$uniqueId = date("HisdmY");
		$banner = WhoWeAre::where('id', $bannerID)->first();
		$filename = "";
		
		if($request->hasFile('banner'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/who_we_section/";
			
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
		    WhoWeAre::where('id', $bannerID)->update([
		        'mobileImg' => $filename
		    ]);
		}else{
			WhoWeAre::where('id', $bannerID)->update([
		        'image' => $filename
		    ]);
		}
		
		return back();
	}

	public function who_we_delete($sectionID){
		WhoWeAre::where('id', $sectionID)->delete();
		return redirect('/admin/who-we-are')->with('status', 'Section Deleted successfully!');
	}

	// success_stories 
	public function success_stories(){
		$successStoriesContent = successStories::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::success_stories/show', ['data'=>$successStoriesContent]);
	}
	public function success_stories_new(){
		return view('AdminCrm::success_stories/create');	
	}
	public function success_stories_add(Request $request){
		successStories::create([
		    'content' => $request->content,
		    'heading' => $request->heading,
		    'page' => $request->page,
		    'section' => $request->section
		]);
		return redirect('/admin/success-stories')->with('status', 'Section added successfully!');
	}
	public function success_stories_form($sectionID){
		$successStoriesContent = successStories::where('id', $sectionID)->first();
		return view('AdminCrm::success_stories/edit', ['successStoriesContent'=>$successStoriesContent]);	
	}
	public function success_stories_edit($sectionID,Request $request){
		$successStoriesContent = successStories::where('id', $sectionID)->first();
		successStories::where('id', $sectionID)->update([
			'content' => $request->content,
			'heading' => $request->heading,
		    'page' => $request->page,
			'section' => $request->section
			]);
			return redirect('/admin/success-stories')->with('status', 'Section Updated successfully!');	
	}
	public function success_stories_delete($sectionID){
		successStories::where('id', $sectionID)->delete();
		return redirect('/admin/success-stories')->with('status', 'Section Deleted successfully!');
	}

	//Testimonials
	public function testimonial(){
		$testimonialContent = Testimonial::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::testimonials/show', ['data'=>$testimonialContent]);
	}

	public function testimonial_new(){
		return view('AdminCrm::testimonials/create');	
	}
	public function testimonial_add(Request $request){
		Testimonial::create([
		    'name' => $request->name,
		    'content' => $request->content,
		    'post' => $request->post,
		    'status' => $request->status
		]);
		return redirect('/admin/testimonial')->with('status', 'Section added successfully!');
	}

	public function testimonial_form($sectionID){
		$testimonialContent = Testimonial::where('id', $sectionID)->first();
		return view('AdminCrm::testimonials.edit', ['testimonialContent'=>$testimonialContent]);	
	}
	public function testimonial_edit($sectionID,Request $request){
		$successStoriesContent = Testimonial::where('id', $sectionID)->first();
		Testimonial::where('id', $sectionID)->update([
			'name' => $request->name,
		    'content' => $request->content,
		    'post' => $request->post,
		    'status' => $request->status
			]);
			return redirect('/admin/testimonial')->with('status', 'Section Updated successfully!');	
	}
	public function testimonial_delete($sectionID){
		Testimonial::where('id', $sectionID)->delete();
		return redirect('/admin/testimonial')->with('status', 'Section Deleted successfully!');
	}

	//Contact
	public function contact(){
		$Contact = Contact::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::Contact/show', ['data'=>$Contact]);
	}

	public function contact_new(){
		return view('AdminCrm::Contact/create');	
	}
	public function contact_add(Request $request){
		Contact::create([
		    'phone1' => $request->phone1,
		    'phone2' => $request->phone2,
		    'email1' => $request->email1,
		    'email2' => $request->email2,
		    'map' => $request->map,
			'address' => $request->address,
		]);
		return redirect('/admin/Contact')->with('status', 'Section added successfully!');
	}

	public function contact_form($sectionID){
		$Contact = Contact::where('id', $sectionID)->first();
		return view('AdminCrm::Contact.edit', ['contact'=>$Contact]);	
	}
	public function contact_edit($sectionID,Request $request){
		$Contact = Contact::where('id', $sectionID)->first();
		Contact::where('id', $sectionID)->update([
			'phone1' => $request->phone1,
		    'phone2' => $request->phone2,
		    'email1' => $request->email1,
		    'email2' => $request->email2,
		    'map' => $request->map,
		    'address' => $request->address,
			]);
			return redirect('/admin/Contact')->with('status', 'Section Updated successfully!');	
	}
	public function contact_delete($sectionID){
		Contact::where('id', $sectionID)->delete();
		return redirect('/admin/Contact')->with('status', 'Section Deleted successfully!');
	}

	//Events
	public function events(){
		$events = Event::orderBy('id', 'desc')->simplePaginate(25);
		return view('AdminCrm::events_and_activity/show', ['data'=>$events]);
	}

	public function events_new(){
		return view('AdminCrm::events_and_activity/create');	
	}
	public function events_add(Request $request){
		$uniqueId = date("HisdmY");
		$desktopImageFilename = "null";
		if($request->hasFile('desktopImg'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/events/";
			
			foreach($request->file('desktopImg') as $image)
			{	
				$extension = $image->getClientOriginalExtension();
				$desktopImageFilename = 'shankaraayan-'.str_replace(' ','-',strtolower($request->eventName)).'-desktopImage-'.$uniqueId.'.'.$extension;
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
			$folder_name = "public/home/events/";
			
			foreach($request->file('mobileImg') as $image)
			{	
				$extension = $image->getClientOriginalExtension();
				$mobileImageFilename = 'shankaraayan-'.str_replace(' ','-',strtolower($request->eventName)).'-mobileImg-'.$uniqueId.'.'.$extension;
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
		Event::create([
		    'eventName' => $request->eventName,
		    'venue' => $request->venue,
		    'date' => $request->date,
		    'shortContent' => $request->shortContent,
		    'desktopImg' => $desktopImageFilename,
		    'mobileImg' => $mobileImageFilename,
		    'content' => $request->content,
		    'type' => $request->type,
		]);
		return redirect('/admin/events')->with('status', 'Section added successfully!');
	}
	public function events_form($sectionID){
		$event = Event::where('id', $sectionID)->first();
		return view('AdminCrm::events_and_activity/edit', ['event'=>$event]);	
	}
	public function events_edit($sectionID,Request $request){
		$event = Event::where('id', $sectionID)->first();
		Event::where('id', $sectionID)->update([
			'eventName' => $request->eventName,
		    'venue' => $request->venue,
		    'date' => $request->date,
		    'shortContent' => $request->shortContent,
		    'content' => $request->content,
		    'type' => $request->type,
		]);
			return redirect('/admin/events')->with('status', 'Section Updated successfully!');	
	}

	public function events_edit_image($bannerID, Request $request){
		$uniqueId = date("HisdmY");
		$banner = Event::where('id', $bannerID)->first();
		$filename = "";
		
		if($request->hasFile('banner'))
        {
			$allowedfileExtension=['jpg','png','jpeg'];
			$folder_name = "public/home/events/";
			
			foreach($request->file('banner') as $image)
			{
				$extension = $image->getClientOriginalExtension();
				if($request->type == "Mobile"){
					$filename = 'shankaraayan-'.str_replace(' ','-',strtolower($banner->eventName)).'-mobileImg-'.$uniqueId.'.'.$extension;
				}else{	
					$filename = 'shankaraayan-'.str_replace(' ','-',strtolower($banner->eventName)).'-desktopImage-'.$uniqueId.'.'.$extension;
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
		    Event::where('id', $bannerID)->update([
		        'mobileImg' => $filename
		    ]);
		}else{
			Event::where('id', $bannerID)->update([
		        'desktopImg' => $filename
		    ]);
		}
		
		return back();
	}

	public function events_delete($sectionID){
		Event::where('id', $sectionID)->delete();
		return redirect('/admin/events')->with('status', 'Section Deleted successfully!');
	}
}
