<!DOCTYPE html>
<html lang="en">
<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pubsolve</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{url('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{url('assets/img/favicon.ico')}}' />
</head>
<body>
    <div class="loader"></div>
    <div class="main-content">
        <section class="section">
            <center><img src="{{url('assets\img\banner\pubsolve-logo.png') }}" alt="" width="30%" height="auto" style="position: relative; top:-30vh; left:-7vh"></center>
            <div class="section-body">
                <div class="row">
                    <div class="col-10" style="position: relative; top:-20vh; left:15vh">
                        <div class="card">
                            <div class="card-header "  >
                                <h4 style="position: relative; left:38vh;top:-4vh">Pubsolve Certificate Verification</h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group " style="position: relative; left:-43vh ;top:5vh;margin:30px 20px">
                                            <input type="search" name="search" class="form-control"
                                                placeholder="Search" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @if ($status == '0')
                                <center>
                                    <div class="badge badge-danger col-4 " style="margin-bottom: 10px">not registered</div>
                                </center>
                            @elseif($status == '2')
                                <center>
                                    <div class="badge badge-info col-4" style="margin-bottom: 10px">Enter Certificate no</div>
                                </center>
                            @else
                            @endif
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    @if ($status != '1')
                                        <style>
                                            table {
                                                display: none;
                                            }
                                        </style>
                                    @endif
                                    <table class="table table-striped">
                                        <center>
                                            <tr>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Certificate no</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </center>
                                        <tr>
                                            @foreach ($data as $Certificat)
                                                <td class="text-center">{{ $Certificat->cer_date }}</td>
                                                <td class="text-center">
                                                    {{ $Certificat->cer_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $Certificat->cer_no }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($status == '1')
                                                        <div class="badge badge-success">Number is Registered</div>
                                                    @else
                                                        <div class="badge badge-success">not registered</div>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{url('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{url('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{url('assets/js/page/advance-table.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{url('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{url('assets/js/custom.js')}}"></script>
</body>
<!-- advance-table.html  21 Nov 2019 03:55:21 GMT -->
</html>
