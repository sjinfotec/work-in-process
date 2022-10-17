<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
//use App\Models\Outsourcing;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
         $authusers = Auth::user();
         $data = $request->session()->all();
         $value = $request->session()->get('code');

        return view('home',
            compact(
                'authusers','data','value'

            ));

    }


    public function getRequestFunc(Request $request)
    {

        $mode = !empty($_POST["mode"]) ? $_POST['mode'] : "";
        $str1 = !empty($_GET["str1"]) ? $_GET['str1'] : "";
        $str2 = !empty($_POST["str2"]) ? $_POST['str2'] : "";
        $str3 = "変数の値";

	        return view('home', [
            	'smode' => $mode,
            	'str1' => $str1,
            	'str2' => $str2,
            	'str3' => $str3,
	        ]);



    }


    public function topView()
    {
 
    	if (isset($_GET["order_info"]) && $_GET["order_info"] == 1) {
            $rv_order_info = !empty($_GET["order_info"]) ? $_GET['order_info'] : "";
            $rv_order_no = !empty($_GET["order_no"]) ? $_GET['order_no'] : "";
            $rv_company_id = !empty($_GET["company_id"]) ? $_GET['company_id'] : "";
            $rv_product_id2 = !empty($_GET["product_id2"]) ? $_GET['product_id2'] : "";
            $rv_receipt_day = !empty($_GET["receipt_day"]) ? $_GET['receipt_day'] : "";
            $rv_delivery_day = !empty($_GET["delivery_day"]) ? $_GET['delivery_day'] : "";
            $rv_orderfr = !empty($_GET["orderfr"]) ? $_GET['orderfr'] : "";

	        return view('view_inventory_a', [
            	'order_info' => $rv_order_info,
            	'order_no' => $rv_order_no,
            	'company_id' => $rv_company_id,
            	'product_id2' => $rv_product_id2,
            	'receipt_day' => $rv_receipt_day,
            	'delivery_day' => $rv_delivery_day,
            	'orderfr' => $rv_orderfr
	        ]);
	    }
    	elseif (isset($_GET["order_info"]) && $_GET["order_info"] == 2) {
            $rv_order_info = !empty($_GET["order_info"]) ? $_GET['order_info'] : "";
            $rv_order_no = !empty($_GET["order_no"]) ? $_GET['order_no'] : "";
            $rv_company_id = !empty($_GET["company_id"]) ? $_GET['company_id'] : "";
            $rv_product_id2 = !empty($_GET["product_id2"]) ? $_GET['product_id2'] : "";
            $rv_supply_day = !empty($_GET["supply_day"]) ? $_GET['supply_day'] : "";
            $rv_order_day = !empty($_GET["order_day"]) ? $_GET['order_day'] : "";
            $rv_orderfr = !empty($_GET["orderfr"]) ? $_GET['orderfr'] : "";

            return view('view_inventory_z', [
            	'order_info' => $rv_order_info,
            	'order_no' => $rv_order_no,
            	'company_id' => $rv_company_id,
            	'product_id2' => $rv_product_id2,
            	'supply_day' => $rv_supply_day,
            	'order_day' => $rv_order_day,
            	'orderfr' => $rv_orderfr
	        ]);
	    }
        else {
	        $authusers = Auth::user();
            return view('home', compact('authusers'));
    	}  
 
 
 
    }



}
