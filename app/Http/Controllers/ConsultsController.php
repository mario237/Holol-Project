<?php

namespace App\Http\Controllers;

use App\City;
use App\Models\Consult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConsultsController extends Controller
{
    public function index()
    {
        //
        $consults = Consult::all();

        $cities = City::all();

        $investments = $this->getInvestments();
        $transactions = $this->getTransactions();

        return view('admin.consult.all-consult')->with([
            'consults' => $consults,
            'cities'=>$cities,
            'investments'=>$investments,
            'transactions'=>$transactions
        ]);
    }

    public function create()
    {
        //

        $helper = array(
            'method' => 'POST',
            'action' => route('store-consult'),
            'title' => 'انشاء'
        );


        $cities = City::all();
        $investments = $this->getInvestments();
        $transactions = $this->getTransactions();

        return view('admin.consult.consult-create')
            ->with([
                'helper' => $helper,
                'cities'=>$cities,
                'investments'=>$investments,
                'transactions'=>$transactions
            ]);

    }

    public function store(Request $request): RedirectResponse
    {
        //
       $request->validate([
           'name' => 'required',
           'mobile' => 'required',
       ],[
           'name.required' =>'برجاء ادخال الاسم',
           'mobile.required' =>'برجاء ادخال رقم الجوال',
       ]);


       Consult::create([
           'name' => $request->name,
           'mobile' => $request->mobile,
           'city_id' =>$request->city_id,
           'investment' => $request->investment,
           'transaction' => $request->transaction
       ]);

        return redirect()->route('show-all-consults')->with('successes', ['تمت الاضافة بنجاح']);

    }


    public function edit($id)
    {
        //

        $consult= Consult::find($id);

        $helper = array(
            'method' => 'PUT',
            'action' => route('update-consult', ['id' => $id]),
            'title' => 'تعديل'
        );

        $cities = City::all();
        $investments = $this->getInvestments();
        $transactions = $this->getTransactions();


        return view('admin.consult.consult-edit')->with([
            'consult' =>$consult,
            'helper' => $helper,
            'cities'=>$cities,
            'investments'=>$investments,
            'transactions'=>$transactions


        ]);

    }

    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ],[
            'name.required' =>'برجاء ادخال الاسم',
            'mobile.required' =>'برجاء ادخال رقم الجوال',
        ]);



        Consult::whereId($id)->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'city_id' =>$request->city_id,
            'investment' => $request->investment,
            'transaction' => $request->transaction
        ]);

        return redirect()->route('show-all-consults')->with('successes', ['تمت التعديل بنجاح']);

    }

    public function destroy($id): RedirectResponse
    {


        Consult::whereId($id)->delete();


        return redirect()->route('show-all-consults')->with('successes', ['تمت حذف الطلب بنجاح']);
    }

    private function getInvestments(): \Illuminate\Support\Collection
    {
        $investment_id = [1 => '1', 2 => '2'];
        $investment_title = [1 => 'تمويل عقاري', 2 => 'تمويل شخصي'];

        return collect($investment_id)->zip($investment_title)->transform(function ($values) {
            return [
                'id' => $values[0],
                'title' => $values[1],
            ];
        });
    }

    private function getTransactions(): \Illuminate\Support\Collection
    {
        $transaction_id = [1 => '1', 2 => '2'];
        $transaction_title = [1 => 'لم يتم التواصل', 2 => 'تم التواصل'];

        return collect($transaction_id)->zip($transaction_title)->transform(function ($values) {
            return [
                'id' => $values[0],
                'title' => $values[1],
            ];
        });
    }

}
