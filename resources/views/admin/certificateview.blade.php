@extends('admin.mainbody')
@section('main-section')

    <div class="row">
        <div class="col-10" style="margin-left: 15vh;
        margin-top: 22vh;">
            <div class="card">
                <div class="card-header">
                    <h4>Certificates of Pubsolve</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Certificate no</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Certificate as $Certificat)
                                <tr>
                                    <td>{{ $Certificat->cer_id }}</td>
                                    <td>{{ $Certificat->cer_name }}</td>
                                    <td>{{ $Certificat->cer_date }}</td>
                                    <td>{{ $Certificat->cer_no }}</td>
                                    <td><a href="{{ url('certificate-edit') }}/{{ $Certificat->cer_id }}" class="btn btn-primary">Edit</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

