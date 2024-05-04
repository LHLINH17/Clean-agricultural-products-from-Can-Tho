<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('admin.statistics.index',[
            'title' => 'Statistics'
        ]);
    }
    public function index2(Request $request)
    {
        $query = Order::query();
        $dateFilter = $request->date_filter;

        switch($dateFilter){
            case 'today':
                $query->whereDate('created_at',Carbon::today());
                break;
            case 'yesterday':
                $query->wheredate('created_at',Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()]);
                break;
            case 'this_month':
                $query->whereMonth('created_at',Carbon::now()->month);
                break;
            case 'last_month':
                $query->whereMonth('created_at',Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $query->whereYear('created_at',Carbon::now()->year);
                break;
            case 'last_year':
                $query->whereYear('created_at',Carbon::now()->subYear()->year);
                break;
        }

        $orders = $query->get();

        return view('admin.statistics.index2',compact('orders'),[
            'title' => 'Statistics'
        ]);
    }
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['fromdate'];
        $to_date = $data['todate'];

        $get = DB::table('tbl_statistical')->whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date', 'ASC')->get();

        foreach ($get as $key => $val)
        {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);

    }
}
