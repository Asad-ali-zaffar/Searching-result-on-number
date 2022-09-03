@extends('admin.mainbody')
@section('main-section')
{{-- <div class="loader"></div> --}}
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-12 offset-lg-2 col-xl-9 offset-xl-3">
                        <div class="card card-primary" style="margin-top:10vh ">
                            <div class="card-header">
                                <h4>{{$titel}}</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ $url }}">
                                    @csrf
                                    @foreach ($Certificate as $Certificat)
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="frist_name">First Name</label>
                                                <input id="frist_name" type="text" class="form-control" name="frist_name"
                                                    value="{{ $Certificat->cer_name }}" autofocus>
                                                {{-- <span class="text-danger">
                                                @error('frist_name')
                                                    {{ $message }}
                                                @enderror
                                            </span> --}}
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="last_name">Date</label>
                                                <input id="last_name" type="date" class="form-control" name="date"
                                                    value="{{ $Certificat->cer_date }}">
                                                {{-- <span class="text-danger">
                                                @error('date')
                                                    {{ $message }}
                                                @enderror
                                            </span> --}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Certificate No</label>
                                            <input id="email" type="number" class="form-control" name="cert_no"
                                                value="{{ $Certificat->cer_no }}">
                                            {{-- <span class="text-danger">
                                            @error('cert_no')
                                                {{ $message }}
                                            @enderror
                                        </span> --}}
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Add Certificate
                                            </button>
                                        </div>
                                    @endforeach
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
