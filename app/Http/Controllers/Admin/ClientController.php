<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\ClientFile;
use App\ClientStatus;
use App\Http\Controllers\Controller;
use App\Job;
use App\Models\Bank;
use App\Models\Employee;
use App\Status;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $clients = Client::all();
        $phases = $this->getPhases();

        return view('admin.clients.all-clients')->with([
            'clients' => $clients,
            'phases' => $phases
        ]);
    }


    public function create()
    {

        $helper = array(
            'method' => 'POST',
            'action' => route('store-client'),
            'title' => 'انشاء'
        );

        $client = new Client();

        $users = User::all()->where('id', '!=', '1');
        $statuses = ClientStatus::all();
        $employees = Employee::all();
        $banks = Bank::all();
        $jobs = $this->getJobs();
        $job_types = $this->getJobTypes();
        $phases = $this->getPhases();

        return view('admin.clients.client-create')->with([
            'item' => $client,
            'helper' => $helper,
            'users' => $users,
            'statuses' => $statuses,
            'employees' => $employees,
            'banks' => $banks,
            'jobs' => $jobs,
            'job_types' => $job_types,
            'phases'=> $phases
        ]);
    }


    public function store(Request $request): RedirectResponse
    {

        $request->validate(
            [
                'status' => 'required',
                'bank_id' => 'required',
                'birthday' => 'required',
                'job' => 'required',
                'mobile' => 'required',
                'support' => 'required',
                'reg_date' => 'required',
                'salary' => 'required',
                'total_salary' => 'required',
                'hiring_date' => 'required',
                'commitment' => 'required',
                'commitment_remain' => 'required',
                'commitment2' => 'required',
                'commitment_remain2' => 'required',
                'self_financing' => 'required',
                'estate_financing' => 'required',
                'total_financing' => 'required',
                'pre_installment' => 'required',
                'after_installment' => 'required',
                'duration' => 'required',
                'phase' => 'required',

                'identity' => 'required',
                'family_identity' => 'required',
                'salary_identity' => 'required',
                'account_statement' => 'required',
                'instrument' => 'required',
                'construction_license' => 'required',
                'owner_identity' => 'required'
            ],
            [

                'status.required' => 'يرجي اختيار الحالة',
                'bank_id.required' => 'يرجي اختيار البنك',
                'birthday.required' => 'يرجي اختيار تاريخ الميلاد',
                'job.required' => 'يرجي اختيار الوظيفة',
                'mobile.required' => 'يرجي ادخال رقم الهاتف',
                'support.required' => 'يرجي ادخال الدعم',
                'reg_date.required' => 'يرجي ادخال تاريخ التسجيل',
                'salary.required' => 'يرجي ادخال الراتب الاساسي',
                'total_salary.required' => 'يرجي ادخال الراتب الاجمالي',
                'hiring_date.required' => 'يرجي ادخال تاريخ التعيين',
                'commitment.required' => 'يرجي ادخال الالتزام',
                'commitment_remain.required' => 'يرجي ادخال المتبقي علي الالتزام ',
                'commitment2.required' => ' يرجي ادخال الالتزام 2',
                'commitment_remain2.required' => 'يرجي ادخال المتبقي علي الالتزام 2',
                'self_financing.required' => 'يرجي ادخال التمويل الشخصي ',
                'estate_financing.required' => 'يرجي ادخال التمويل العقاري ',
                'total_financing.required' => 'يرجي ادخال اجمالي التمويل ',
                'pre_installment.required' => 'يرجي ادخال القسط قبل الدعم',
                'after_installment.required' => 'يرجي ادخال القسط بعد الدعم',
                'duration.required' => 'يرجي ادخال المدة',
                'phase.required' => 'يرجي ادخال المرحلة',


                'identity.required' => 'يرجي اختيار صورة الهوية',
                'family_identity.required' => 'يرجي اختيار صورة بطاقة العائلة',
                'salary_identity.required' => 'يرجي اختيار تعريف بالراتب',
                'account_statement.required' => 'يرجي اختيار صورة كشف حساب اخر 3 شهور مختوم من البنك',
                'instrument.required' => 'يرجي اختيار صورة الصك',
                'construction_license.required' => 'يرجي اختيار صورة رخصة البناء',
                'owner_identity.required' => 'يرجي اختيار صورة هوية المالك',
            ]);


        Client::create([
            'fullname' => User::find($request->user_id)->name,
            'status' => $request->status,
            'users_id' => $request->users_id,
            'user_id' => $request->user_id,

            'bank' => Bank::find($request->bank_id)->name,
            'bank_id' => $request->bank_id,
            'birthday' => $request->birthday,
            'job' => $request->job,
            'job_type' => $request->job_type,
            'mobile' => $request->mobile,
            'support' => $request->support,
            'reg_date' => $request->reg_date,
            'salary' => $request->salary,
            'total_salary' => $request->total_salary,
            'hiring_date' => $request->hiring_date,
            'commitment' => $request->commitment,
            'commitment_remain' => $request->commitment_remain,
            'commitment2' => $request->commitment2,
            'commitment_remain2' => $request->commitment_remain2,
            'self_financing' => $request->self_financing,
            'estate_financing' => $request->estate_financing,
            'total_financing' => $request->total_financing,
            'pre_installment' => $request->pre_installment,
            'after_installment' => $request->after_installment,
            'duration' => $request->duration,
            'phase' => $request->phase,
            'note' => ($request->note) ?: '',
            'refuse_reson' => ($request->refuse_reson) ?: '',


            'identity' => $this->setImageName($request->file('identity')),
            'family_identity' => $this->setImageName($request->file('family_identity')),
            'salary_identity' => $this->setImageName($request->file('salary_identity')),
            'account_statement' => $this->setImageName($request->file('account_statement')),
            'instrument' => $this->setImageName($request->file('instrument')),
            'construction_license' => $this->setImageName($request->file('construction_license')),
            'owner_identity' => $this->setImageName($request->file('owner_identity')),
        ]);


        return redirect()->route('show-clients')->with('successes', ['تمت الاضافة بنجاح']);
    }


    public function edit($id)
    {

        $client = Client::find($id);
        $client->files = ClientFile::all();
        $helper = array(
            'method' => 'PUT',
            'action' => route('update-client', ['id' => $id]),
            'title' => 'تعديل'
        );



        $users = User::all()->where('id', '!=', '1');
        $statuses = ClientStatus::all();
        $employees = Employee::all();
        $banks = Bank::all();

        $supports = $this->getSupportType();

        $jobs = $this->getJobs();

        $job_types = $this->getJobTypes();

        $phases = $this->getPhases();


        return view('admin.clients.client-edit')->with([
            'client' => $client,
            'helper' => $helper,
            'users' => $users,
            'statuses' => $statuses,
            'employees' => $employees,
            'banks' => $banks,
            'jobs' => $jobs,
            'job_types' => $job_types,
            'supports' => $supports,
            'phases'=> $phases

        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate(
            [
                'status' => 'required',
                'bank_id' => 'required',
                'birthday' => 'required',
                'job' => 'required',
                'mobile' => 'required',
                'support' => 'required',
                'reg_date' => 'required',
                'salary' => 'required',
                'total_salary' => 'required',
                'hiring_date' => 'required',
                'commitment' => 'required',
                'commitment_remain' => 'required',
                'commitment2' => 'required',
                'commitment_remain2' => 'required',
                'self_financing' => 'required',
                'estate_financing' => 'required',
                'total_financing' => 'required',
                'pre_installment' => 'required',
                'after_installment' => 'required',
                'duration' => 'required',
                'phase' => 'required',

            ],
            [

                'status.required' => 'يرجي اختيار الحالة',
                'bank_id.required' => 'يرجي اختيار البنك',
                'birthday.required' => 'يرجي اختيار تاريخ الميلاد',
                'job.required' => 'يرجي اختيار الوظيفة',
                'mobile.required' => 'يرجي ادخال رقم الهاتف',
                'support.required' => 'يرجي ادخال الدعم',
                'reg_date.required' => 'يرجي ادخال تاريخ التسجيل',
                'salary.required' => 'يرجي ادخال الراتب الاساسي',
                'total_salary.required' => 'يرجي ادخال الراتب الاجمالي',
                'hiring_date.required' => 'يرجي ادخال تاريخ التعيين',
                'commitment.required' => 'يرجي ادخال الالتزام',
                'commitment_remain.required' => 'يرجي ادخال المتبقي علي الالتزام ',
                'commitment2.required' => ' يرجي ادخال الالتزام 2',
                'commitment_remain2.required' => 'يرجي ادخال المتبقي علي الالتزام 2',
                'self_financing.required' => 'يرجي ادخال التمويل الشخصي ',
                'estate_financing.required' => 'يرجي ادخال التمويل العقاري ',
                'total_financing.required' => 'يرجي ادخال اجمالي التمويل ',
                'pre_installment.required' => 'يرجي ادخال القسط قبل الدعم',
                'after_installment.required' => 'يرجي ادخال القسط بعد الدعم',
                'duration.required' => 'يرجي ادخال المدة',
                'phase.required' => 'يرجي ادخال المرحلة',
            ]);

        $client = Client::find($id);


        Client::whereId($id)->update([
            'fullname' => User::find($request->user_id)->name,
            'status' => $request->status,
            'users_id' => $request->users_id,
            'user_id' => $request->user_id,

            'bank' => Bank::find($request->bank_id)->name,
            'bank_id' => $request->bank_id,
            'birthday' => $request->birthday,
            'job' => $request->job,
            'job_type' => $request->job_type,
            'mobile' => $request->mobile,
            'support' => $request->support,
            'reg_date' => $request->reg_date,
            'salary' => $request->salary,
            'total_salary' => $request->total_salary,
            'hiring_date' => $request->hiring_date,
            'commitment' => $request->commitment,
            'commitment_remain' => $request->commitment_remain,
            'commitment2' => $request->commitment2,
            'commitment_remain2' => $request->commitment_remain2,
            'self_financing' => $request->self_financing,
            'estate_financing' => $request->estate_financing,
            'total_financing' => $request->total_financing,
            'pre_installment' => $request->pre_installment,
            'after_installment' => $request->after_installment,
            'duration' => $request->duration,
            'phase' => $request->phase,
            'note' => ($request->note) ?: '',
            'refuse_reson' => ($request->refuse_reson) ?: '',

            'identity' => ($request->identity) ? $this->setImageName($request->file('identity')) : $client->identity,
            'family_identity' => ($request->family_identity) ? $this->setImageName($request->file('family_identity')) : $client->family_identity,
            'salary_identity' => ($request->salary_identity) ? $this->setImageName($request->file('salary_identity')) : $client->salary_identity,
            'account_statement' => ($request->account_statement) ? $this->setImageName($request->file('account_statement')) : $client->account_statement,
            'instrument' => ($request->instrument) ? $this->setImageName($request->file('instrument')) : $client->instrument,
            'construction_license' => ($request->construction_license) ? $this->setImageName($request->file('construction_license')) : $client->construction_license,
            'owner_identity' => ($request->owner_identity) ? $this->setImageName($request->file('owner_identity')) : $client->owner_identity,
        ]);


        return redirect()->route('show-clients')->with('successes', ['تمت التعديل بنجاح']);

    }

    public function show($id)
    {

        $client = Client::find($id);
        $status = ClientStatus::find($client->status);
        $employee = Employee::find($client->users_id);
        $supports = $this->getSupportType();

        return view('admin.clients.show-client')->with([
            'client' => $client,
            'status' => $status,
            'employee' => $employee,
            'supports' => $supports

        ]);
    }


    public function destroy($id): RedirectResponse
    {


        Client::find($id)->delete();



        return redirect()->route('show-clients')->with('successes', ['تمت حذف الطلب بنجاح']);
    }


    private function setImageName($file): string
    {


        $name = uniqid() . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/clients'), $name);
        return 'storage/clients/' . $name;

    }


    private function getSupportType(): Collection
    {
        $support_id = [0 => '0', 1 => '1'];
        $support_title = [0 => 'لا', 1 => 'نعم'];

        return collect($support_id)->zip($support_title)->transform(function ($values) {
            return [
                'id' => $values[0],
                'title' => $values[1],
            ];
        });
    }


    private function getJobTypes(): array
    {
        return
            ['جندي', 'جندي أول', ' عريق', 'وكيل رقيب', 'رقيب', 'رقيب اول', 'رئيس رقباء', 'ملازم',
                'ملازم أول', 'نقيب', 'رائد', 'مقدم', 'عقيد', 'عميد', 'لواء', 'فريق', 'فريق أول', 'متقاعد'];

    }

    private function getJobs(): array
    {
        return [
            'عسكري',
            'مدني حكومي',
            'قطاع خاص'
        ];
    }


    private function getPhases(): Collection
    {
        $phase_id = [0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4' , 5 => '5' , 6=> '6'];
        $phase_title = [
            0 => 'إنشاء طلب',
            1 => 'التحقق من البيانات',
            2 => 'الموافقة المبدئية',
            3 => 'ترحيل الطلب للتقييم العقاري',
            4 => 'الإستحقاق و توقيع العقد',
            5 => 'الافراغ',
            6 => 'الانتهاء',
            ];

        return collect($phase_id)->zip($phase_title)->transform(function ($values) {
            return [
                'id' => $values[0],
                'title' => $values[1],
            ];
        });
    }
}

