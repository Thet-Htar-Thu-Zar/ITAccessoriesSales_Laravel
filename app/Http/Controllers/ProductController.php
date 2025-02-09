<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->limit(20)->get();
        return view('Christopher_IT_Accessories.index', ['products' => $products]);
    }

    public function showproduct()
    {
        $product = Product::paginate(6);
        return view('Christopher_IT_Accessories.product', ['showProducts' => $product]);
    }

    public function currentOrder()
    {
        if (session()->has('user')) {
            $order = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
                ->join('orders', 'order_details.order_id', '=', 'orders.order_id')
                ->where("orders.order_status", 'pending')
                ->where('orders.user_id', session()->get('user')['id'])
                ->get();
            return view('Christopher_IT_Accessories.currentorder', ["orders" => $order]);
        }
        return back();
    }

    public function historyOrder()
    {
        if (session()->has('user')) {
            $order = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
                ->join('orders', 'order_details.order_id', '=', 'orders.order_id')
                ->where("orders.order_status", 'deliver')
                ->where('orders.user_id', session()->get('user')['id'])
                ->get();
            return view('Christopher_IT_Accessories.orderhistory ', ["orders" => $order]);
        }
        return back();
    }

    public function searchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $product = Product::where('brand', 'like', '%' . $request->search . '%')->paginate(1);
        return view('Christopher_IT_Accessories.search', ['searchProducts' => $product]);
    }

    public function cartList()
    {
        if (session()->has('user')) {
            $cartList = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('user_id', session()->get('user')->id)
                ->select('products.*', 'carts.qty', 'carts.color', 'carts.id as cart_id')
                ->get();
            Cart::where('user_id', session()->get('user')->id)->get();
            return view('Christopher_IT_Accessories.cartlist', ['list' => $cartList]);
        }
        return back();
    }

    public function details($id)
    {
        $product = Product::where('id', $id)->get();
        $productDetail = ProductDetail::where('product_id', $id)->get();
        return view('Christopher_IT_Accessories.details', ['products' => $product, 'productDetail' => $productDetail]);
    }

    public function addToCart(Request $request, $pid)
    {
        $request->validate([
            'color' => 'required',
            'qty' => 'required'
        ]);

        if (session()->get('user')) {
            $data = new Cart();
            $data->user_id = session()->get('user')->id;
            $data->product_id = $pid;
            $data->color = $request->color;
            $data->qty = $request->qty;
            $data->save();

            return back()->withErrors(['errors' => "Add To Cart Success"]);
        } else
            return redirect('/Christopher_IT_Accessories/signin');
    }


    public static function countItem()
    {
        if (session()->get('user'))
            return Cart::where('user_id', session()->get('user')->id)
                ->count();
    }

    public function decrease($id, $qty)
    {
        if ($qty > 1) {
            Cart::where('id', $id)->update(['qty' => $qty - 1]);
            return redirect()->back();
        } else
            return back();
    }

    public function increase($id, $qty)
    {

        Cart::where('id', $id)->update(['qty' => $qty + 1]);
        return redirect()->back();
    }

    public function remove($id)
    {
        Cart::destroy($id);
        return back();
    }

    public function checkout($total)
    {
        return view('Christopher_IT_Accessories.checkout', ['total' => $total]);
    }

    public function order(Request $request)
    {
        $count = Db::table('orders')->count('order_id');
        $data = new Order();
        $data->order_id = 'o' . ($count + 1);
        $data->user_id = session()->get('user')->id;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->payment = $request->payment;
        $data->order_status = 'pending';
        $data->save();

        $carts = Cart::where('user_id', session()->get('user')->id)->get();
        foreach ($carts as $cart) {
            $detail = new OrderDetail();
            $detail->order_id = 'o' . ($count + 1);
            $detail->product_id = $cart->product_id;
            $detail->color = $cart->color;
            $detail->qty = $cart->qty;
            $detail->save();
        }
        Cart::where('user_id', session()->get('user')->id)->delete();

        $order = OrderDetail::join('products', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.order_id')
            ->where("orders.order_status", 'pending')
            ->where('orders.user_id', session()->get('user')['id'])
            ->get();
        return view('Christopher_IT_Accessories.currentorder', ["orders" => $order]);
    }
}
