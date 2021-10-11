

@if($errors->any())
    @foreach($errors as $error)

        <div class="alert alert-danger alert-dismissible text-center  m-0" role="alert" style="position: relative">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endforeach
@endif

@if($successes)
    @foreach($successes as $success)

        <div class="alert alert-success alert-dismissible text-center  m-0" role="alert" style="position: relative;">
            {{$success}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    @endforeach
@endif
