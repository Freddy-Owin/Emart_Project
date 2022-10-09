<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function registerView()
    {
        return view('customers.register');
    }

    public function register (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();

        Auth::guard('customer')->loginUsingId($customer->id);
        return redirect('/')->with('created','You have created your account');
    }

    public function loginView()
    {
        return view('customers.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('customer')->attempt(['email'=> $request->email, 'password'=> $request->password]))
        {
            Auth::guard('customer')->loginUsingId(Customer::where('email', $request->email)->first()->id);
            return redirect()->route('customer.profile', auth('customer')->user()->id);
        }
        else
        {
            return redirect()->back()->with('error', 'Credentials does not match!');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    public function profile($id)
    {
        if(auth('customer')->check())
        {
            return view('customers.profile');
        }
        else
        {
            return redirect()->back();
        }

    }

    public function addToCart(Request $request)
    {
        if(auth('customer')->check()) {
            // $product = Product::find($request->id);
            $cart = Cart::where([['product_id',$request->product_id], 'customer_id' => auth('customer')->user()->id])->first();

            if(is_null($cart)) {

                $cart = new Cart();

                $cart->product_id = $request->product_id;
                $cart->customer_id = auth('customer')->user()->id;
                $cart->quantity = 1;
                $cart->save();
                return response()->json([
                    'cart' => $cart,
                    'success' => true
                ], 200);
            } else {
                return response()->json([
                    'cart' => $cart,
                    'success' => false
                ], 200);
            }
        }
        else
        {
            return response()->json([
                'success' => false,
            ], 403);
        }
    }

    public function cartDelete(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts')->with('deleted', 'Your cart has been removed successfully!');
    }

}
