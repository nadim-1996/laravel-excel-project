@extends('home')

@section('content')
    <style>
        .preview-table {
            margin-top: 20px;
        }

        .preview-table table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .preview-table table th,
        .preview-table table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
    <div class="container">
        {{-- <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel_file">
            <button type="submit">Upload Excel File</button>
        </form> --}}

        <div class="container">
            <h2>Preview and Upload Excel File</h2>

            <form id="uploadForm" action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group m-2">
                    <input class="form-control" type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" onclick="previewExcel()">Preview Excel File</button>
                    <button type="submit" class="btn btn-success">Upload to Database</button>
                </div>
            </form>

 
            <div id="previewTable" class="preview-table">
            </div>
        </div>

        <!-- Include XLSX library for Excel file handling -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <script>
            function previewExcel() {
                var fileInput = document.getElementById('excel_file');
                var file = fileInput.files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var data = new Uint8Array(e.target.result);
                        var workbook = XLSX.read(data, {
                            type: 'array'
                        });
                        var sheetName = workbook.SheetNames[0];
                        var worksheet = workbook.Sheets[sheetName];
                        var htmlTable = XLSX.utils.sheet_to_html(worksheet);

                        document.getElementById('previewTable').innerHTML = htmlTable;
                        enhanceTable();
                    };

                    reader.readAsArrayBuffer(file);
                }
            }

            function enhanceTable() {
                var table = document.querySelector('.preview-table table');
                if (table) {
                    table.classList.add('table', 'table-striped', 'table-bordered');
                }
            }
        </script>
    </div>
@endsection
