<?php

namespace App\Http\Controllers;

use App\ProductConfigurations;
use Illuminate\Http\Request;

class SuggestMyDeviceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = config('productconfig.form');
        return view('suggest-my-pc',['form'=>$form]);
    }

    public function configProducts()
    {
        $products = ProductConfigurations::all();
        return view('config-products',['products' => $products]);
    }

    public function configProductShow($id)
    {
        $single_row = ProductConfigurations::find($id);

        $form = config('productconfig.form');
        $all_option = [];
        foreach ($form as $single=>$value){
            $all_option = array_merge($all_option,$value);
        }

        $products = config('productconfig.products');
        $all_product = [];
        foreach ($products as $grade=>$product){
            $all_product = array_merge($all_product,$product);
        }

        return view('config-product-show',[
            'single_row' => $single_row,
            'options'=>$all_option,
            'products'=>$all_product,
        ]);
    }

    public function configProductUpdate(Request $request, $id)
    {
        $single_row = ProductConfigurations::find($id);

        $single_row->update($request->all());

        return redirect('config-products')->with('status', 'Updated Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function suggestedMyPc(Request $request)
    {

        $input = [
            $request->age,
            $request->performance,
            $request->gaming_performance,
        ];

        if(!is_null($request->regular_usage)){
            $input = array_merge($input,$request->regular_usage);
        }

        if(!is_null($request->applications)){
            $input = array_merge($input,$request->applications);
        }

        $product_details = ProductConfigurations::all();

        $final_grade = [
            'g1' => true,
            'g2' => true,
            'g3' => true,
            'g4' => true,
            'g5' => true,
            'g6' => true,
            'g7' => true,
            'g8' => true,
        ];

        $result = [];

        foreach($input as $single){
            if(is_null($single)) continue;

            foreach($product_details as $product_detail){
                $single_options = json_decode($product_detail->options);

                if(!in_array($single,$single_options)){
                    $final_grade[$product_detail->grade] = false;
                }
                $grades[$product_detail->grade] = json_decode($product_detail->products);
            }
        }

        foreach($final_grade as $key=>$value){
            if($value){
                $product = $grades[$key];
                $result = array_merge($result,$product);
            }
        }

        if(count($result) == 0){
            $result = 'Nothing Suggested. Please change your parameter.';
        }

        return view('suggest-my-pc-result' , ['results' => $result]);
    }
}
