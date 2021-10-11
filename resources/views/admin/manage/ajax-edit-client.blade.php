<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-5">


                    <form class="edit-form" action="{{$helper['action']}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($helper['method'])


                        <div class="row">
                            <!-- <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">الاسم</label>
                                <div class="col-sm-12">
                                    <input required type="text" class="form-control" id="title" placeholder="ادخل الاسم" name="fullname" value="{{$item->fullname}}">
                                </div>
                            </div> -->

                            <div class="form-group col-md-4">
                                <label for="user_id" class="col-sm-12 col-form-label">العميل</label>
                                <div class="col-sm-12">
                                    <select name="user_id" class="form-control select2">
                                        @foreach(App\User::where('id','!=',1)->get() as $user)
                                        <option value="{{$user->id}}" {{($user->id==$item->user_id)?'selected':''}}>
                                            {{old('name', $user->name)}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">الحالة</label>
                                <div class="col-sm-12">
                                    <select name="status" class="form-control">
                                        @foreach($statuses as $status)
                                        <option class="bg-{{$status->color}}" value="{{$status->id}}" {{($status->id==$item->status)?'selected':''}}>{{$status->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if($helper['method']!='PUT')
                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label ">موظف البنك</label>
                                <div class="col-sm-12">
                                    <select name="users_id" class="form-control select2">
                                        @foreach($employees as $emp)
                                        <option value="{{$emp->id}}" {{($emp->id==$item->users_id)?'selected':''}}>{{$emp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if($helper['method']=='PUT')
                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">محال الى </label>
                                <div class="col-sm-12">
                                    <select name="target_id" class="form-control select2">
                                        @foreach($employees as $emp)
                                        <option value="{{$emp->id}}" {{($emp->id==$item->target_id)?'selected':''}}>{{$emp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="form-group col-md-6">
                                <label for="bank_id" class="col-sm-2 col-form-label">البنك </label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="bank_id">
                                        <option value="0">غير محدد
                                        </option>
                                        @foreach(App\Models\Bank::all() as $bank)
                                        <option value="{{$bank->id}}" {{($bank->id==$item->bank_id)?'selected':''}}>{{$bank->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> تاريخ الميلاد </label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="title" placeholder="yyyy/mm/dd" required name="birthday" value="{{$item->birthday}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4" id="job_container">
                                <div class="col-sm-12">
                                    <label class="text-black" for="email">الوظيفة</label>
                                    <select id="job" class="form-control" name="job" required>
                                        <option value="عسكري" {{($item->job=='عسكري')?'selected':''}}>عسكري</option>
                                        <option value="مدني حكومي" {{($item->job=='مدني حكومي')?'selected':''}}> مدني
                                            حكومي
                                        </option>
                                        <option value="قطاع خاص" {{($item->job=='قطاع خاص')?'selected':''}}> قطاع خاص
                                        </option>
                                    </select>
                                </div>
                            </div>

                            @php
                            $job_types = ['جندي','جندي أول',' عريق','وكيل رقيب','رقيب','رقيب اول','رئيس رقباء','ملازم','ملازم أول','نقيب','رائد','مقدم','عقيد','عميد','لواء','فريق','فريق أول','متقاعد']
                            @endphp
                            <div class="form-group col-md-4 {{($item->job=='عسكري')?'':'d-none'}}" id="type_container">
                                <label for="job_type" class="col-form-label col-sm-12">الرتبة</label>
                                <div class="col-sm-12">
                                    <select name="job_type" class="form-control ">
                                        @foreach($job_types as $job_type)
                                        <option value="{{$job_type}}" {{($job_type==$item->job_type)?'selected':''}}>{{$job_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> رقم الجوال</label>
                                <div class="col-sm-12">
                                    <input required type="number" class="form-control" id="title" placeholder="ادخل  رقم الجوال " name="mobile" value="{{$item->mobile}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <div class="col-sm-12">
                                    <label class="text-black" for="email">الدعم</label>
                                    <select class="form-control" name="support" required>
                                        <option value="0">لا</option>
                                        <option value="1">نعم</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="name" class="col-sm-12 col-form-label"> ملاحظات </label>
                                <div class="col-sm-12">
                                    <textarea type="text" class="form-control" id="title" placeholder="ادخل ملاحظات " name="note">{{$item->note}}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> تاريخ التسجيل </label>
                                <div class="col-sm-12">
                                    <input required type="date" class="form-control" id="title" placeholder="ادخل  تاريخ التسجيل " name="reg_date" value="{{$item->reg_date}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> الراتب الاساسي </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  الراتب الاساسي " name="salary" value="{{$item->salary}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> اجمالي الراتب </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  اجمالي الراتب " name="total_salary" value="{{$item->total_salary}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label"> تاريخ التعيين </label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="title" placeholder="ادخل تاريخ التعيين " name="hiring_date" value="{{$item->hiring_date}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">الالتزام </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  الالتزام " name="commitment" value="{{$item->commitment}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">المتبقي على الالتزام </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  المتبقي على الالتزام " name="commitment_remain" value="{{$item->commitment_remain}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">الالتزام2 </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  الالتزام2 " name="commitment2" value="{{$item->commitment2}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">المتبقي على الالتزام2 </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل  المتبقي على الالتزام2 " name="commitment_remain2" value="{{$item->commitment_remain2}}">
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">التمويل الشخصي </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل التمويل الشخصي" name="self_financing" value="{{$item->self_financing}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">التمويل العقاري </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل التمويل العقاري" name="estate_financing" value="{{$item->estate_financing}}">
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">اجمالي التمويل </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل اجمالي التمويل" name="total_financing" value="{{$item->total_financing}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">القسط قبل الدعم </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل القسط قبل الدعم" name="pre_installment" value="{{$item->pre_installment}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">القسط بعد الدعم </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل القسط بعد الدعم" name="after_installment" value="{{$item->after_installment}}">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="name" class="col-sm-12 col-form-label">المدة </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" placeholder="ادخل المدة" name="duration" value="{{$item->duration}}">
                                </div>
                            </div>

                            <livewire:file-uploader name="identity" title="صورة الهوية" :item="$item" />
                            <livewire:file-uploader name="family_identity" title="صورة بطاقة العائلة" :item="$item" />
                            <livewire:file-uploader name="salary_identity" title="تعريف بالراتب" :item="$item" />
                            <livewire:file-uploader name="instrument" title="صورة الصك" :item="$item" />
                            <livewire:file-uploader name="construction_license" title="صورة رخصة البناء" :item="$item" />
                            <livewire:file-uploader name="owner_identity" title="صورة هوية المالك" :item="$item" />



                        </div>
                        <div class="form-group row">
                            <div class="w-100 d-flex justify-content-between ">
                                <button type="reset" class="btn btn-dark">مسح البيانات</button>
                                <button type="submit" class="btn btn-primary">{{$helper['title']}}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>


            <div class="card">
                <div class="card-body p-5">


                    <form class="extra-form" action="{{url('/dashboard/clients/extra/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('POST') }}
                        <input type="hidden" name="clients_id" value="{{$item->id}}" />
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="file" class="col-sm-12 col-form-label">اضافة ملف</label>
                                <div class="col-sm-12">
                                    <input required type="file" class="form-control" id="file" name="image">
                                </div>
                                <br />
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary">اضافة</button>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" ">ملفات اخرى</label>
                                <div class="d-block extra-files">
                                    @if(count($item->files)==0)
                                    <h6>لا يوجد </h6>
                                    @endif
                                    @foreach($item->files as $file)
                                    <div class="file">
                                        <a class="d-inline-block" target="_blank" href="{{url($file->file)}}">اضغط
                                            هنا
                                            لفتح الملف</a>
                                        <a href="#" class="text-danger float-left btn-delete-file" data-id="{{$file->id}}"><span class="fa fa-times"></span></a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

<script>
    $('#job').on('change', function() {
        if ($(this).val() === 'عسكري') {
            $('#type_container').removeClass("d-none");;

        } else {
            $('#type_container').addClass("d-none");;
            $('input[name=job_type]').val("");
        }
    });
    $('.select2').select2();
</script>