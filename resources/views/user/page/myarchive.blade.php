@extends('layouts.user')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    </ol>
                </div>
                <h4 class="page-title">Pdf</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Pdf List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="users">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>


        function deletepdf(id) {
            $('.pdfdelete').val(id);
        }


        function editpdf(id)
        {
            var id = id;
            console.log(id);
            $.ajax({
                type : "POST",
                url : "{{route('psf.single')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.pdfrdit').val(id);
                    $('.pdfname').val(data.pdf_name);
                    $('.pdfmember').val(data.member);
                }
            });
        };

        $(document).ready(function () {



            $('#users').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.pdf.user.archive') }}",
                columns: [
                    { data: 'pdf.pdf_name', name: 'pdf.pdf_name',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });


        });
    </script>
@endsection
