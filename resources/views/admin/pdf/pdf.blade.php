@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#createpdf">Create New</button>
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
                            <th>member</th>
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



    <div class="modal fade" id="createpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.pdf')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pdf File Name</label>
                            <input type="text" class="form-control" name="pdf_name">
                        </div>
                        <div class="form-group">
                            <label>Pdf File</label>
                            <input type="file" class="form-control" name="pdf_file">
                        </div>
                        <div class="form-group">
                            <label>Member</label>
                            <select class="form-control" name="member">
                                <option value="0">selecte any</option>
                                <option value="1">Free</option>
                                <option value="2">paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editpdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update.pdf')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pdf File Name</label>
                            <input type="hidden" name="pdf_edit" class="pdfrdit">
                            <input type="text" class="form-control pdfname" name="pdf_name">
                        </div>
                        <div class="form-group">
                            <label>Pdf File</label>
                            <input type="file" class="form-control" name="pdf_file">
                        </div>
                        <div class="form-group">
                            <label>Member</label>
                            <select class="form-control pdfmember" name="member">
                                <option value="0">selecte any</option>
                                <option value="1">Free</option>
                                <option value="2">paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deletepdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.pdf')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this pdf ?
                            <input type="hidden" name="pdf_delete" class="pdfdelete">
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
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
                "ajax": "{{ route('get.pdf') }}",
                columns: [
                    { data: 'pdf_name', name: 'pdf_name',class : 'text-center' },
                    {
                        data: 'member',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Free</span>";
                            }else if (data == 2) {
                                return "<span class='label label-danger label-mini text-center'>paid</span>";
                            }
                            else {
                                return "<span class='label label-danger label-mini text-center'>Not Set</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });


        });
    </script>
@endsection
