
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('Antrian.DashboardPerTanggalPost') }}">
            @csrf
            <div class="form-group">
                <label for="parameter1">{{ $label1 }}</label>
                <input type="date" class="form-control form-control-user" value="{{ date('Y-m-d') }}" id="parameter1" aria-describedby="emailHelp" name="parameter1" placeholder="{{ $label1 }}">
            </div>
            <div class="form-group">
                <label for="parameter2">{{ $label2 }}</label>
                <select name="parameter2" id="" class="form-control">
                    <option disabled>{{ $label2 }}</option>
                    {{-- <option value="1">satu</option> --}}
                    <option value="rs">RS</option>
                    <option value="server">Server</option>
                </select>
            </div>
            <button class="btn btn-primary btn-user btn-block">Cari</button>
            <hr>
            
        </form>
        {{-- <hr> --}}
        
    </div>
</div>

@endsection