@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->checkout_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="mb-4">
                <form action="{{ route('registration.submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nik">NIK:</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ session()->has('billing_nik') ? session()->get('billing_nik') : Auth::guard('customer')->user()->nik }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ session()->has('billing_name') ? session()->get('billing_name') : Auth::guard('customer')->user()->name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ session()->has('billing_email') ? session()->get('billing_email') : Auth::guard('customer')->user()->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="divisi">Divisi:</label>
                                <input type="text" class="form-control" id="divisi" name="divisi" value="{{ session()->has('billing_divisi') ? session()->get('billing_divisi') : Auth::guard('customer')->user()->divisi }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4">
                            <div class="form-group">
                                <label for="unit">Unit:</label>
                                <input type="text" class="form-control" id="unit" name="unit" value="{{ session()->has('billing_unit') ? session()->get('billing_unit') : Auth::guard('customer')->user()->unit }}" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-group">
                                <label for="nama_training">Nama Training:</label>
                                <input type="text" class="form-control" id="nama_training" name="nama_training" value="{{ $room_data->name }}" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
