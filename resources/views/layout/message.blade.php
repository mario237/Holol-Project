@php
    $_errors =   \Illuminate\Support\Facades\Session::get('_errors');
    $_successes =   \Illuminate\Support\Facades\Session::get('successes');
    \Illuminate\Support\Facades\Session::remove('_errors');
    \Illuminate\Support\Facades\Session::remove('successes');
if (!$_errors){$_errors = array();}
if (!$_successes){$_successes = array();}

@endphp


@foreach($_errors as $error)

        <div class="alert alert-danger alert-dismissible text-center  m-0" role="alert" style="position: relative">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

@endforeach

@foreach($successes as $success)

    <div class="alert alert-success alert-dismissible text-center  m-0" role="alert" style="position: relative;">
        {{$success}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


@endforeach
