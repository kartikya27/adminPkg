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
}
