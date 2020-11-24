<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Response;
use App\nepali_date;
use App\Setting;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bills = Bill::orderBy('created_at', 'desc')->where('status', 0)->paginate(7);
        return view('bill.bill-index', ['bills' => $bills, 'n' => 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $setting = Setting::find(1);

        if (!$setting) {
            return redirect()->route('setting')->with('message', 'Please configure the application for first run');
        }

        $nepali_date = new nepali_date();
        $year_en = date("Y", time());
        $month_en = date("m", time());
        $day_en = date("d", time());
        $date_ne = $nepali_date->get_nepali_date($year_en, $month_en, $day_en);
        $bill_no = "";
        $bills = Bill::all();
        if (count($bills) > 0) {
            $bill = DB::table('bills')->orderBy('created_at', 'desc')->first();
            $bill_no1 = $bill->bill_no;
            $bill_no = $bill_no1 + 1;
        } else {
            $bill_no = $date_ne['y'] . "1";
        }
        return view('bill.bill-create', ['date_ne' => $date_ne, 'bill_no' => $bill_no, 'shop_name' => $setting->shop_name, 'address' => $setting->address, 'contact_no' => $setting->contact_no, 'pan_no' => $setting->pan_no, 'date_type' => $setting->date_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request);
        // return count($request->particular);
        $id;
        $arrData = [];
        // dd($arrData);
        $this->validate($request, [
            'bill_no' => 'required|unique:bills',
            'byer_name' => 'required',
            'byer_address' => 'required'
        ]);
        $bill = new Bill();
        $bill->byer_name = $request->byer_name;
        $bill->byer_address = $request->byer_address;
        $bill->bill_no = $request->bill_no;
        $bill->total = $request->subtotal;
        $bill->total_string = $request->sum_amount;
        $bill->date = $request->date;
        if ($bill->save()) {
            for ($i = 0; $i < count($request->particular); $i++) {
                $arrData = array(
                    'bill_id' => $bill->id,
                    'particular' => $request->particular[$i],
                    'qty' => $request->quantity[$i],
                    'price' => $request->product_price[$i],
                    'sub_total' => $request->total_cost[$i]

                );
                $id = DB::table('bill_assistants')->insert($arrData);
            }
            if ($id > 0) {
                if (request()->ajax()) {
                    return Response::json('200');
                }
            } else {
                if (request()->ajax()) {
                    return Response::json('201');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function print($id = '')
    {
        //
        $bill = Bill::find($id);
        $bill_assistants = DB::table('bill_assistants')->where('bill_id', $id)->get();
        // return $bill_assistants;
        // return $id;
        $setting = Setting::find(1);
        return view('bill.bill-print', ['shop_name' => $setting->shop_name, 'address' => $setting->address, 'contact_no' => $setting->contact_no, 'pan_no' => $setting->pan_no, 'bill' => $bill, 'bill_assistants' => $bill_assistants, 'n' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $bill = Bill::find($request->id);
        $bill->status = 1;
        if ($bill->save()) {
            return redirect()->route('bill.index')->with('sucess', 'Sucessfully Deleted');
        } else {
            return back()->with('error', 'Could not be deleted');
        }
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $data = '';
            $root = "billprint";
            $query = $request->query1;
            if ($query != '') {
                $data = DB::table('bills')->where('status', 0)
                    ->where('bill_no', 'like', '%' . $query . '%')
                    ->orWhere('byer_name', 'like', '%' . $query . '%')
                    ->orWhere('byer_address', 'like', '%' . $query . '%')
                    ->orWhere('date', 'like', '%' . $query . '%')
                    ->orWhere('total', 'like', '%' . $query . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $data = Bill::orderBy('created_at', 'desc')->where('status', 0)->paginate(7);
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                $n = 1;
                foreach ($data as $bill) {
                    if ($bill->status == 0) {
                        $output .= '
                     <tr>
                        <td>' . $n++ . '</td>
                        <td>' . $bill->bill_no . '</td>
                        <td>' . $bill->byer_name . '</td>
                        <td>' . $bill->byer_address . '</td>
                        <td>' . $bill->total . '</td>
                        <td>' . $bill->date . '</td>
                        <td><a href="http://getbill.io/home/bill/list/' . $bill->id . '"><i class="fas fa-print"></i></a></td>
                        <td><a href="#"><i class="fas fa-trash"></i></a></td>
                     </tr>
                     
                   ';
                    }
                }
            } else {
                $output = '
                        <tr>
                          <td colspan="8"><center>Record Not found</center></td>
                        </tr>
                 ';
            }

            $data = array(
                'table_data'    => $output
            );
            echo json_encode($data);
        }
    }
}
