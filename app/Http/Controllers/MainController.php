<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

use Illuminate\Contracts\Session\Session;

use Illuminate\Support\Facades\Hash;  // Import for password hashing
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index()
    {
        $allProducts = Product::all();
        // dd($allProducts);
        $newArrival = Product::where('type', 'new-arrivals')->get();
        $hotSale = Product::where('type', 'sale')->get();


        return View('index', compact('allProducts', 'newArrival', 'hotSale'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function shop()
    {
        return view('shop');
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
        return view('singleProduct', compact('product'));
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return view('login');
    }
    public function loginUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
        if ($user) {
            session()->put('id', $user->id);
            session()->put('type', $user->type);
            if ($user->type == 'Customer') {
                return redirect('/');
            }
        } else {
            return redirect('login')->with('error', 'Email/password is incorrect');
        }
    }

    public function registerUser(Request $data)
    {
        // dd($data->file('file'));
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        // $newUser->picture = $data->file('file')->getClientOriginalName();
        // $data->file('file')->move('uploads/profiles/', $newUser->picture);
        $newUser->type = "Customer";
        if ($newUser->save()) {
            return redirect('login')->with('success', 'Congratulations ! Your Account is Ready.');
        }
    }


    // public function registerUser(Request $data)
    // {

    //     $newUser = new User();
    //     $newUser->fullname = $data->input('fullname');
    //     $newUser->email = $data->input('email');
    //     $newUser->password = Hash::make($data->input('password'));
    //     $newUser->type = "Customer";
    //     // Handel file upload only if a file is present
    //     if ($data->hasFile('file')) {
    //         $file = $data->file('file');
    //         $filename = time() . '_' . $file->getClientOriginalName();  // Generate a unique filename
    //         $file->move('uploads/profiles/', $newUser->picture);  // Move the file
    //         $newUser->picture = $filename;  // Save the unique filename
    //     } else {
    //         $newUser->picture = null;  // Or set a default image if needed
    //     }





    //     // $newUser->picture = $data->file('file')->getClientOriginalName();
    //     // $data->file('file')->move('uploads/profiles/', $newUser->picture);
    //     // $newUser->type = "Customer";
    //     if ($newUser->save()) {
    //         return redirect('login')->with('success', 'Congratulations! Your acount is ready.');
    //     } else {
    //         return redirect()->back()->with('error', 'Registration failed , please try again.');
    //     }
    // }
}
