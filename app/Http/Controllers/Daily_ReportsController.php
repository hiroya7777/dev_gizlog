<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Http\Requests\User\DailyReportRequest;
use Auth; 
use DB;

class Daily_ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $daily_report;

    public function __construct(DailyReport $daily_report)
    {
        $this->middleware('auth');
        $this->daily_report = $daily_report;
    }

    public function index(Request $request)
    { 
        $daily_reports = $this->daily_report->all();
        $daily_reports = DailyReport::latest()->get();
        return view('user.daily_report.index',compact('daily_reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contents' =>'required',
        ],
        [
            'title.required' => '入力必須の項目です。',
            'contents.required' => '入力必須の項目です。', 
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->daily_report->fill($input)->save();
        return redirect()->to('daily_report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daily_report = $this->daily_report->find($id);
        return view('user.daily_report.show',compact('daily_report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daily_report = $this->daily_report->find($id);
       
        return view('user.daily_report.edit',compact('daily_report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->daily_report->find($id)->fill($input)->save();
        return redirect()->to('daily_report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->daily_report->find($id)->delete();
        return redirect()->to('daily_report');
    }

    public function search()
    {
        if(!empty($dates)){
            $daily_report->where('reporting_time','like','%'.$daily_report.'%');
        }
        $dates = $daily_report->get();
        return view('user.daily_report.index',compact('dates','daily_report'));
    }
}
