
@extends('main.app')

@section('content')


<div class="col-lg">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
        </div>
        <form class="user" method="POST" action="{{ route('Antrian.DashboardPerBulanPost') }}">
            @csrf
            
            <div class="form-group">
                <label for="parameter1">{{ $label2 }}</label>
                <select name="parameter1" id="" class="form-control">
                    <option disabled>{{ $label2 }}</option>
                    @foreach ($bulan as $index => $month)
                        <option value="{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}">{{ $month }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="parameter2">{{ $label2 }}</label>
                <input type="number" name="parameter2" class="form-control form-control-user">
            </div>
            
            <div class="form-group">
                <label for="parameter3">{{ $label2 }}</label>
                <select name="parameter3" id="" class="form-control">
                    <option disabled>{{ $label2 }}</option>
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