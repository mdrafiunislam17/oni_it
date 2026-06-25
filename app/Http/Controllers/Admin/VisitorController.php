<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    //

//    public function chartData()
//    {
//        $data = Visitor::select(
//            DB::raw('DATE(created_at) as date'),
//            DB::raw('COUNT(*) as total')
//        )
//            ->groupBy('date')
//            ->orderBy('date', 'ASC')
//            ->get();
//
//        return response()->json($data);
//    }

    public function chartData()
    {
        $data = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return response()->json($data);
    }

//    public function revenueData()
//    {
//        $data = DB::table('orders')
//            ->select(
//                DB::raw('MONTH(created_at) as month'),
//                DB::raw('SUM(amount) as total')
//            )
//            ->groupBy('month')
//            ->pluck('total', 'month');
//
//        $labels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
//
//        $monthlyData = [];
//
//        for ($i = 1; $i <= 12; $i++) {
//            $monthlyData[] = $data[$i] ?? 0;
//        }
//
//        return response()->json([
//            'labels' => $labels,
//            'data' => $monthlyData
//        ]);
//    }
}
