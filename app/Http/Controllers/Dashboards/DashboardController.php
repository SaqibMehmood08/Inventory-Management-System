<?php

namespace App\Http\Controllers\Dashboards;

use Carbon\Carbon;
use App\Models\Donor;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where("user_id", auth()->id())->count();
        $products = Product::where("user_id", auth()->id())->count();

        $purchases = Purchase::where("user_id", auth()->id())->count();
        $todayPurchases = Purchase::whereDate('date', today()->format('Y-m-d'))->count();
        $todayProducts = Product::whereDate('created_at', today()->format('Y-m-d'))->count();
        $todayQuotations = Quotation::whereDate('created_at', today()->format('Y-m-d'))->count();
        $todayOrders = Order::whereDate('created_at', today()->format('Y-m-d'))->count();

        $categories = Category::where("user_id", auth()->id())->count();
        $quotations = Quotation::where("user_id", auth()->id())->count();
        $today_payment = Donor::whereDate('created_at', Carbon::today())->sum('payment');
        $all_payment = Donor::whereDate('created_at', Carbon::today())->sum('payment');
        $all_donor = Donor::count();
        $today_donor = Donor::whereDate('created_at', Carbon::today())->count();
        return view('dashboard', [
            'products' => $products,
            'orders' => $orders,
            'purchases' => $purchases,
            'todayPurchases' => $todayPurchases,
            'todayProducts' => $todayProducts,
            'todayQuotations' => $todayQuotations,
            'todayOrders' => $todayOrders,
            'categories' => $categories,
            'quotations' => $quotations,
            'today_payment'=>$today_payment,
            'all_payment'=>$all_payment,
            'all_donor'=>$all_donor,
            'today_donor'=>$today_donor,

        ]);
    }
}
