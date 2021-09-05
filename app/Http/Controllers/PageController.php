<?php

namespace App\Http\Controllers;

use App\Mail\orderconfirmed;
use App\Models\product;
use App\Models\pc_build;
use App\Models\accessory;
use App\Models\category;
use App\Models\cart;

use App\Models\hardware;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

use Illuminate\Support\Str;

use Mail;
use App\Mail\OrderShipped;


class PageController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function categories()
    {
        return view('categories');
    }
    public function about()
    {
        return view('about');
    }

    public function buildsPaginator(Request $request)
    {

        $builds = pc_build::where('visibility', 1)->orderBy('id', 'desc')->paginate(16);
        $paginate = $builds;


        return view('builds', compact('builds', 'paginate'));
    }

    public function buildsTier(Request $request, $tier)
    {
        if ($tier == 'office') {
            $tier = 1;
        } elseif ($tier == 'middle') {
            $tier = 2;
        } elseif ($tier == 'gaming') {
            $tier = 3;
        } else {
            $tier = 4;
        }

        $builds = pc_build::where('visibility', 1)->where('tier', $tier)->paginate(16);

        return view('builds', compact('builds'));
    }

    public function hardwarePaginator()
    {
        $hardwares = hardware::where('visibility', 1)->orderBy('id', 'desc')->paginate(15);
        $paginate = $hardwares;

        $categories = category::get();

        $amounth = hardware::all();


        // dd($a);

        return view('hardware', compact('hardwares', 'categories', 'amounth', 'paginate'));
    }
    public function filter_hardwarePaginator($category)
    {
        // $categoryID = category::where('name', $category)->get();

        $hardwares = hardware::where('visibility', 1)->orderBy('id', 'desc')->where('category_id', $category)->paginate(16);
        $paginate = $hardwares;
        $categories = category::get();

        return view('hardware', compact('hardwares', 'categories', 'paginate'));
    }

    public function accessoriesPaginator()
    {
        $accessories = accessory::paginate(16);

        $categories = category::get();

        return view('accessories', compact('accessories', 'categories'));
    }


    public function buildsHardware()
    {
        // $hardware = pc_hardware::;
    }

    // public function sendEmail()
    // {
    //     $name = 'Ferris';
    //     $email = 'argyleferris@gmail.com';
    //     // Mail::to('argyleferris@gmail.com')->send(new orderconfirmed($name));
    //     return redirect('/');
    // }

    public function buildView(pc_build $build)
    {
        return view('Routes.viewProduct.buildShow', compact('build'));
    }
    public function hardwareView(hardware $hardware)
    {
        return view('Routes.viewProduct.hardwareShow', compact('hardware'));
    }
    public function accessoryView(accessory $accessory)
    {
        return view('Routes.viewProduct.accessoryShow', compact('accessory'));
    }



    public function footer_FAQ()
    {
        return view('Routes.Footer.faq');
    }
    public function footer_CC()
    {
        return view('Routes.Footer.Copyrights');
    }
    public function footer_ProductProblems()
    {
        return view('Routes.Footer.ProductProblems');
    }
    public function footer_BuyInformation()
    {
        return view('Routes.Footer.BuyInformation');
    }
    public function footer_CustomerSupport()
    {
        return view('Routes.Footer.CustomrSupport');
    }
    public function footer_OrderTaking()
    {
        return view('Routes.Footer.OrderTaking');
    }
    public function footer_Warranty()
    {
        return view('Routes.Footer.Warranty');
    }

}

