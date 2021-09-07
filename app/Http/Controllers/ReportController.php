<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function todayOrder(){
        $today=date('d-m-y');
        $order=DB::table('orders')->where('date',$today)->where('status',0)->get();
        return view('admin.report.today_order',compact('order'));
    }
    public function todayDelivery(){
        $today=date('d-m-y');
        $order=DB::table('orders')->where('date',$today)->where('status',3)->get();
        return view('admin.report.today_order',compact('order'));
    }
    public function monthDelivery(){
        $today=date('F');
        $order=DB::table('orders')->where('month',$today)->where('status',3)->get();
        return view('admin.report.today_order',compact('order'));
    }
    public function searchOrder(){
        $today=date('F');
        $order=DB::table('orders')->where('date',$today)->where('status',0)->get();
            return view('admin.report.search',compact('order'));
    }
    public function searchByDate(Request $request){
        $date=$request->date;
        $date=date('d-m-y',strtotime($date));
        // echo "$date";
        $total=DB::table('orders')->where('date',$date)->where('status',3)->sum('total');
        $order=DB::table('orders')->where('date',$date)->where('status',3)->get();
        return view('admin.report.search_result',compact('order','total','date'));
    }

    public function searchByMonth(Request $request){
        $month=$request->month;
        $total=DB::table('orders')->where('month',$month)->where('status',3)->sum('total');
        $order=DB::table('orders')->where('month',$month)->where('status',3)->get();
        return view('admin.report.search_result',compact('order','total','month'));
    }
 
    public function searchByYear(Request $request){
        $year=$request->year;
        $total=DB::table('orders')->where('year',$year)->where('status',3)->sum('total');
        $order=DB::table('orders')->where('year',$year)->where('status',3)->get();
        return view('admin.report.search_result',compact('order','total','year'));
    }
}
