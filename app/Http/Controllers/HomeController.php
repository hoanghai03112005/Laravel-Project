<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $banners = Banner::where('status', 1)->limit(3)->get();
        $products_home = Product::where('status', 1)->limit(8)->orderBy('created_at', 'desc')->get();
        return view('public.index', compact('products_home', 'banners'));
    }
    public function about() {
        return view('public.about');
    }
    public function contact() {
        return view('public.contact');
    }
    public function login() {
        return view('public.login');
    }
    public function logout() {
        auth('cus')->logout();
        return redirect()->route('public.login')->with('yes','Đăng xuất thành công');
    }
    public function post_login(Request $req) {
        $form_type = $req->input('form_type');
        if($form_type === 'login') {
            $req->validate([
                'email' => 'required|email|exists:customers',
                'password' => 'required'
            ]);
    
            $data = $req->only('email', 'password');
            $check = auth('cus')->attempt($data);
            if($check) {
                return redirect()->route('public.index')->with('yes','Đăng nhập thành công');
            }
            return redirect()->back()->with('no','Đăng nhập không thành công');
            
        }
    }
    public function post_register(Request $req) {
        $form_type = $req->input('form_type');
        if($form_type === 'register') {
            $req->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'phone' => 'required|unique:customers',
                'address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);
            $data = $req->only('name', 'email', 'phone', 'address');
            $data['password'] = bcrypt($req->password);
    
            if(Customer::create($data)) {
                return redirect()->route('public.login')->with('yes','Đăng ký thành công');
            }
            return redirect()->back()->with('no','Đăng ký không thành công');
            
        }
    }
    public function shop(Category $category) {
        
        $keyword = request('keyword');
        $order = request('order');
        $order_price = request('order_price');
        $query = Product::where('status', 1);
        $keyword_down = request('keyword_down');

        if ($category->name) {
            $query = $category->products(); // where category_id = $category->id
        }
        
        if ($order) {
            $arr = explode('-', $order);
            $query = $query->orderBy($arr[0], $arr[1]); 
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if($order_price) {
            $arr_price = explode('-', $order_price);
            if(count($arr_price) === 2) {
                $query = $query->whereBetween('price', [$arr_price[0], $arr_price[1]]);
            } 
            if(count($arr_price) === 1) {
                $query = $query->where('price', '>', $arr_price[0]);
            } 
        }

        if ($keyword) {
            $query = $query->where('name','LIKE', '%'.$keyword.'%');
        }
        if ($keyword_down) {
            $query = $query->where('name','LIKE', '%'.$keyword_down.'%');
        }
        $products = $query->paginate(8);
        return view('public.shop', compact('category', 'products'));
    }
    public function product(Product $product) {
        return view('public.product', compact('product'));
    }
    public function checkout(Cart $cart) {
        $auth = auth('cus')->user();
        return view('order.checkout', compact('auth', 'cart'));
    }
    public function post_checkout(Request $req) {
        $check = true;
        $data = $req->only('name', 'email', 'address', 'phone');
        $data['customer_id'] = auth('cus')->id();
        $cart = new Cart();

        if($order = Order::create($data)) {
            foreach ($cart->items as $item) {
                $detail = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => ($item->price - (isset($item->sale_price) && $item->sale_price ? ($item->sale_price * $item->price) / 100 : 0)),
                    'quantity' => $item->quantity
                ];

                if(!OrderDetail::create($detail)) {
                    $check = false;
                    break;
                }
            }
        }

        if($check) {
            $cart->clear();
            return redirect()->route('public.shop')->with('yes','Đặt hàng thành công');
        } else {
            OrderDetail::where('order_id', $order->id)->delete();
            Order::where('id', $order->id)->delete();
            return redirect()->route('public.cart')->with('no','Đặt hàng thất bại');
        }
    }
    public function order_success() {
        return view('order.success');
    }

    public function order_failed() {
        return view('order.failed');
    }
    public function order_history() {
        $auth = auth('cus')->user();

        $orders = $auth->orders()->orderBy('created_at', 'desc')->paginate(5);

        return view('order.history', compact('orders'));
    }
    public function order_detail(Order $order) {
        return view('order.detail', compact('order'));
    }

}


