<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrowserStat;

class ChartController extends Controller
{
    public function index()
    {
        // $browsers = BrowserStat::all();

        // $dataPoints = [];

        // foreach ($browsers as $browser) {
            
        //     $dataPoints[] = [
        //         "name" => $browser['name'],
        //         "y" => floatval($browser['total_usage'])
        //     ];
        // }

        // return view("chart-js", [
        //     "data" => json_encode($dataPoints)
        // ]);



           $browsers = BrowserStat::all();
    
            $dataPoints = [];
    
            foreach ($browsers as $browser) {
                
                $dataPoints[] = array(
                    "complaint_no" => $browser['complaint_no'],
                    "data" => [($browser['time'])
                    ],
                );
            }
    
            return view("chart-js", [
                "data" => json_encode($dataPoints),
                "time" => json_encode(array("data")),
            ]);
        }



    }
