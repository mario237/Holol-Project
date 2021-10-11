<style>
    label {
        font-size: 14px;
    }

    h6 {
        font-size: 15px;
    }
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="section-title mb-3">تفاصيل العميل </h5>
                        <hr />
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class=" text-muted">الاسم الثلاثي</label>
                                <h6>{{$item->fullname}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">حالة الطلب</label>
                                <h6>{{$item->status_name}} </h6>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=" text-muted">موظف البنك </label>
                                <h6>{{$item->owner_name}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">محال الى </label>
                                <h6>{{$item->target_name}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted"> البنك </label>
                                <h6>{{$item->bank}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted"> تاريخ الميلاد </label>
                                <h6>{{$item->birthday}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">الوظيفه </label>
                                <h6>{{$item->job}} {{($item->job_type!='')?' - '.$item->job_type:''}} </h6>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=" text-muted"> رقم الجوال </label>
                                <h6>{{$item->mobile}} </h6>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=" text-muted">الدعم </label>
                                <h6>{{($item->support=='0')?'لا':'نغم'}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">ملاحظات </label>
                                <h6>{{$item->note}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">تاريخ تسجيل الطلب </label>
                                <h6>{{$item->reg_date}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">الراتب الاساسي </label>
                                <h6>{{$item->salary}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">اجمالي الراتب </label>
                                <h6>{{$item->total_salary}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">تاريخ التعيين </label>
                                <h6>{{$item->hiring_date}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">الالتزام</label>
                                <h6>{{$item->commitment}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">المتبقي على الالتزام</label>
                                <h6>{{$item->commitment_remain}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">الالتزام </label>
                                <h6>{{$item->commitment2}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">المتبقي على الالتزام</label>
                                <h6>{{$item->commitment_remain2}} </h6>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=" text-muted">التمويل الشخصي </label>
                                <h6>{{$item->self_financing}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">التمويل العقاري </label>
                                <h6>{{$item->estate_financing}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">اجمالي التمويل </label>
                                <h6>{{$item->total_financing}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">القسط قبل الدعم </label>
                                <h6>{{$item->pre_installment}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">القسط بعد الدعم</label>
                                <h6>{{$item->after_installment}} </h6>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">المدة</label>
                                <h6>{{$item->duration}} </h6>
                            </div>

                            <div class="form-group col-md-3">
                                <label class=" text-muted">ملفات اخرى</label>
                                <div class="d-block">
                                    @if(count($item->files)==0)
                                    <h6>لا يوجد </h6>
                                    @endif
                                    @foreach($item->files as $file)
                                    <a class="d-inline-block" target="_blank" href="{{url($file->file)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">صورة الهوية</label>
                                <div class="d-block">
                                    @if($item->identity)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->identity)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">صورة بطاقة العائلة</label>
                                <div class="d-block">
                                    @if($item->family_identity)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->family_identity)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">تعريف بالراتب</label>
                                <div class="d-block">
                                    @if($item->salary_identity)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->salary_identity)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">كشف حساب اخر 3 شهور مختوم من البنك</label>
                                <div class="d-block">
                                    @if($item->account_statement)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->account_statement)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">صورة الصك</label>
                                <div class="d-block">
                                    @if($item->instrument)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->instrument)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">صورة رخصة البناء</label>
                                <div class="d-block">
                                    @if($item->construction_license)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->construction_license)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class=" text-muted">صورة هوية المالك</label>
                                <div class="d-block">
                                    @if($item->owner_identity)
                                    <a class="d-inline-block" target="_blank" href="{{url($item->owner_identity)}}">اضغط هنا
                                        لفتح الملف</a>
                                    @else
                                    <h6>لا يوجد </h6>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>