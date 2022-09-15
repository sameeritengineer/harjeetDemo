<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use DB;
class BarchartController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
	public function barChart()
    {
        $products = Product::select(
            DB::raw('product_name as name'),
            DB::raw('product_stock as product_stock'))
            ->oldest()->get();
        $result[] = ['product_name','product_stock'];
        foreach ($products as $key => $value) {
            $result[++$key] = [$value->name, $value->product_stock];
            info($result);
        }
        return view('barchart')->with('product_name', json_encode($result));
    }
}