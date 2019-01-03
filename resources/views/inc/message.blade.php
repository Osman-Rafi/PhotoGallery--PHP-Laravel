@if(count($errors))
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>

        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-primary">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif