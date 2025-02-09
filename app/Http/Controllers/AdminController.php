<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login()
    {
        return view('Christopher_AdminDashboard.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where(['email' => $request->email])->first();

        if ($admin) {
            $result = $request->only('email', 'password');

            if (auth('admin')->attempt($result)) {

                return redirect('/Christopher_AdminDashboard/dashboard');
            }
            return back()->withErrors(['errors' => "Password does not match"]);
        }
        return back()->withErrors(['errors' => "email does not exist"]);
    }

    public function logout()
    {
        Auth::forgetUser();
        \Session::getHandler()->gc(0);
        return redirect('/Christopher_AdminDashboard');
    }

    public function showProduct()
    {
        $products = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select('products.*', 'product_details.id as detailId', 'product_details.color', 'product_details.stock_qty')
            ->paginate(4);
        return view('Christopher_AdminDashboard.product', ['products' => $products]);
    }

    public function edit($pid, $detailId)
    {
        $product = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->where('products.id', $pid)
            ->where('product_details.id', $detailId)
            ->select('products.*', 'product_details.id as detailId', 'product_details.color', 'product_details.stock_qty')
            ->get();
        return view('Christopher_AdminDashboard.edit', ['product' => $product]);
    }

    public function save($pid, $detailId, Request $request)
    {
        Product::where('id', $pid)->update(['price' => $request->price]);
        ProductDetail::where('id', $detailId)->update(['stock_qty' => $request->stock_qty]);
        $products = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select('products.*', 'product_details.id as detailId', 'product_details.color', 'product_details.stock_qty')
            ->paginate(4);
        return redirect('/Christopher_AdminDashboard/product')->withInput(['products' => $products]);
    }

    public function dashboard()
    {
        $userCount = User::count('id');
        $categoryCount = Product::select('(distinct(category)')->count();
        $orderCount = Order::where('order_status', 'pending')->count('id');
        $saleAmount = Order::join('order_details', 'orders.order_id', '=', 'order_details.order_id')->join('products', 'order_details.product_id', '=', 'products.id')
            ->whereMonth('orders.created_at', now()->month)
            ->where('order_status', 'deliver')
            ->selectRaw('sum(products.price*order_details.qty  )as saleAmount')
            ->value('saleAmount');

        $orderByDay =  Order::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('count(*) as total')
        )
            ->whereMonth('created_at', now()->month)
            ->where('order_status', 'pending')
            ->groupBy('day')
            ->get();

        //prepare data for the chart
        $days = $orderByDay->pluck('day');
        $oTotal = $orderByDay->pluck('total');

        //Sale by Day
        $saleByDay =  Order::select(
            DB::raw('DAY(created_at) as day'),
            DB::raw('count(*) as total')
        )
            ->whereMonth('created_at', now()->month)
            ->where('order_status', 'deliver')
            ->groupBy('day')
            ->get();

        //prepare data for the chart
        $sdays = $saleByDay->pluck('day');
        $sTotal = $saleByDay->pluck('total');

        $users =  User::all();

        $orders = Order::join('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('order_status', 'pending')
            ->select('users.name', 'orders.*', 'products.*', 'order_details.*')
            ->take(3)
            ->get();

        return view('Christopher_AdminDashboard.dashboard', ['user' => $userCount, 'category' => $categoryCount, 'order' => $orderCount, 'sale' => $saleAmount, 'days' => $days, 'orderTotal' => $oTotal, 'saleday' => $sdays, 'saletotal' => $sTotal, 'users' => $users, 'orders' => $orders]);
    }

    public function remove($detailId)
    {
        ProductDetail::where('id', $detailId)->delete();
        $products = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select('products.*', 'product_details.id as detailId', 'product_details.color', 'product_details.stock_qty')
            ->paginate(4);
        return redirect('/Christopher_AdminDashboard/product')->withInput(['products' => $products]);
    }

    public function addProduct()
    {
        return view('Christopher_AdminDashboard.newproduct');
    }

    public function saveProduct(Request $request)
    {
        $data = new Product();
        $data->category = $request->category;
        $data->brand = $request->brand;
        $data->price = $request->price;
        $data->description = $request->description;
        if ($request->hasFile('img_name')) {
            $file = $request->file('img_name');
            $fileName = $file->getClientOriginalName();
            $request->img_name->move(public_path('images'), $fileName);
            $data->img_name = $fileName;
        }
        $data->save();
        $pid = Product::max('id');
        $detail = new ProductDetail();
        $detail->product_id = $pid;
        $detail->color = $request->color;
        $detail->stock_qty = $request->stock_qty;
        $detail->save();
        return back()->withErrors(['errors' => "Add new product successfully"]);
    }

    public function addDetail()
    {
        return view('Christopher_AdminDashboard.addDetail');
    }

    public function saveDetail(Request $request)
    {
        $pid = Product::max('id');
        $detail = new ProductDetail();
        $detail->product_id = $pid;
        $detail->color = $request->color;
        $detail->stock_qty = $request->stock_qty;
        $detail->save();
        return back()->withErrors(['errors' => 'Add detail product success']);
    }

    public function orders()
    {
        $orders = Order::join('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('order_status', 'pending')
            ->select('users.name', 'orders.*', 'products.*', 'order_details.*')
            ->get();
        return view('Christopher_AdminDashboard.orders', ['orders' => $orders]);
    }

    public function sales()
    {
        $sales = Order::join('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->where('order_status', 'deliver')
            ->select('users.name', 'orders.*', 'products.*', 'order_details.*')
            ->get();
        return view('Christopher_AdminDashboard.sales', ['sales' => $sales]);
    }

    public function statusChange($oid)
    {
        Order::where('order_id', $oid)->update(['order_status' => 'deliver']);
        return back();
    }

    public function profile()
    {
        // $admin = Admin::where('id', auth('admin')->user()->id)->get();
        return view('Christopher_AdminDashboard.profile');
        // , ['admin' => $admin]
    }

    public function profileUpdate(Request $request)
    {
        Admin::where('id', auth('admin')->user()->id)->update(['name' => $request->name, 'email' => $request->email, 'password' => \Hash::make($request->password)]);
        return redirect('/Christopher_AdminDashboard');
    }

    public function user()
    {
        $users =  User::all();
        return view('Christopher_AdminDashboard.user', ['users' => $users]);
    }


    public function deleteUser($userId)
    {
        User::where('id', $userId)->delete();
        return redirect('/Christopher_AdminDashboard/user');
    }

    public function viewMessage()
    {
        $messages =  Message::join('users', 'messages.user_id', '=', 'users.id')->select('users.*', 'messages.message', 'messages.id as msg_id')->get();
        return view('Christopher_AdminDashboard.contactmessage', ['messages' => $messages]);
    }

    public function deleteMessage($msgId)
    {
        Message::where('id', $msgId)->delete();
        return redirect('/Christopher_AdminDashboard/contact');
    }
}