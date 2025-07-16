<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Lib\Cart;
use App\Lib\StrFun;
use App\Models\Order;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Session;
use Str;

class HomeController extends Controller {

    public function home() {
        return view('public.content.homepage', [
            'featured' => Product::mostWanted()->get(),
            'shoes' => Product::mostWanted('shoes')->get(),
            'coats' => Product::mostWanted('coats')->get(),
            'watches' => Product::mostWanted('watches')->get(),
        ]);
    }

    public function shop() {
        return view('public.content.shop', ['products' => Product::inRandomOrder()->paginate(40)]);
    }

    public function singleproduct(Product $product) {
        if (is_string($product)) {
            $product = Product::find($product);
        }

        return is_a($product, Product::class) && $product
            ? view('public.content.singleproduct', ['product' => $product,
                'featured' => $product->othersMostWantedByCategory()->get()])
            : redirect('shop');
    }

    public function contact(Request $request) {
        return view('public.content.contact');
    }

    public function cart() {
        return view('public.content.cart', ['cart' => Session::has('cart') ? Session::get('cart') : new Cart()]);
    }

    public function addtocart(Request $request) {
        $this->validate($request, ['id' => 'required',
            'quantity' => 'required|min:1|max:100']);

        $product = Product::find($request->id);
        if ($product) {
            $cart = Session::has('cart') ? Session::get('cart') : new Cart();
            $cart->add($product, $request->quantity);
            Session::put('cart', $cart);
        }

        return back();
    }

    public function updateqty(Request $request) {
        $this->validate($request, ['id' => 'required',
            'quantity' => 'required|min:1|max:100']);

        $cart = Session::has('cart') ? Session::get('cart') : new Cart();
        $cart->updateQty($request->id, $request->quantity);

        Session::put('cart', $cart);
        return back();
    }

    public function removefromcart(Request $request) {
        $this->validate($request, ['id' => 'required']);

        $cart = Session::has('cart') ? Session::get('cart') : new Cart();
        $cart->removeItem($request->id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return back();
    }

    public function checkout() {
        if (!Session::has('cart') || Session::get('cart')->isEmpty()) {
            return back()->with('fail_status', __('common.cart.fail_status'));
        }
        return view('public.content.checkout', ['cart' => Session::get('cart')]);
    }

    public function placeorder(Request $request) {
        $this->validate($request, ['city' => 'required',
            'address' => 'required']);

        if (!Session::has('cart') || Session::get('cart')->isEmpty()) {
            return redirect('cart')->with('fail_status', __('common.cart.fail_status'));
        }

        $order = new Order();
        $order->user_id = Session::get('user')->id;
        $order->status_id = 1; // i.e not paid
        $order->cost = Session::get('cart')->totalPrice;
        $order->address = json_encode(['city' => StrFun::sanitize($request->city),
            'address' => StrFun::sanitize($request->address)]);
        $order->save();

        foreach (Session::get('cart')->items as $item) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['qty'],
                'created_at' => date_create(),
                'updated_at' => date_create()
            ];
            DB::table('orders_products')->insert($data);
        }

        Session::forget('cart');

        return redirect()->route('user.payment', ['order' => $order])->with('success_status', __('userdash.payment.success_status.0'));
    }

    public function login() {
        return view('public.content.login');
    }

    public function register() {
        return view('public.content.register');
    }

}
