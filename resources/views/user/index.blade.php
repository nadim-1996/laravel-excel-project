@extends('home')

@section('content')
    <style>
        .data-table {
            margin-top: 20px;
        }

        .data-table table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .data-table table th,
        .data-table table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
    </head>

    <body>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
        <div class="container">
            <div class="float-end">
                <a href="{{ route('upload') }}" class="btn btn-info">Upload Excel file</a>
            </div>
            <h2>Dashboard</h2>

            <div class="data-table">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Scheme Code</th>
                            <th>Scheme Name</th>
                            <th>Central State Scheme</th>
                            <th>Financial Year</th>
                            <th>State Disbursement</th>
                            <th>Central Disbursement</th>
                            <th>Total Disbursement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->scheme_code }}</td>
                                <td>{{ $row->scheme_name }}</td>
                                <td>{{ $row->central_state_scheme }}</td>
                                <td>{{ $row->fin_year }}</td>
                                <td>{{ $row->state_disbursement }}</td>
                                <td>{{ $row->central_disbursement }}</td>
                                <td>{{ $row->total_disbursement }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
