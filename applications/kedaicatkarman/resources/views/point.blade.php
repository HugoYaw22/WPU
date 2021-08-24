@extends('layouts.main')

@section('container')
    <div class="row">     
        <div class="offset-sm-3 col-sm-6 offset-sm-3">
            @if (session('status_exists'))
                <div class="alert alert-success">{{ session('status_exists') }}</div>
            @endif 
            @if (session('status_not_exists'))
                <div class="alert alert-danger">{{ session('status_not_exists') }}</div>
            @endif 

            <form method="post" action="/point">
                @csrf
                
                <input class="form-control form-control-lg" type="text" id="id_member" name="id_member" placeholder="Masukan id member anda..." aria-label=".form-control-lg example" value="{{ old('id_member') }}">

                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                    <button class="btn btn-primary" type="submit">Cek !</button>
                </div>
            </form>
        </div>
    </div>
    
    @isset($customer)
        <div class="row mt-5">     
            <div class="offset-sm-3 col-sm-6 offset-sm-3">
                <div class="card text-center">
                    <div class="card-header">
                        ID Member : {{ $customer->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $customer->nama }}</h5>
                        <p class="card-text my-3">{{ $customer->alamat }}</p>
                        <p><h4>{{ $customer->contact }}</h4></p>
                        {{-- <a href="#" class="btn btn-primary my-3">Lihat Transaksi Anda</a> --}}
                    </div>
                    <div class="card-footer text-muted">
                        <h3>Point Anda : {{ $customer->sisa_point }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection