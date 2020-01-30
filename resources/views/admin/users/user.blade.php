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

                    </ol>
                </div>
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>
    <a href="{{route('admin.export')}}"><button style="" class="btn btn-success btn-sm">Export</button></a>
    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Import</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Users List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="users">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
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



    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('admin.user.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this user ?
                            <input type="hidden" name="deleteuser" class="deleteuser">
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


        function deleteuser(id) {
            $('.deleteuser').val(id);
        }


        function editdai(id)
        {
            var id = id;
            console.log(id);
            $.ajax({
                type : "POST",
                url : "",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.daionosiseditid').val(id);
                    $('.daionosisname').val(data.daionosis_name);
                }
            });
        };

        $(document).ready(function () {



            $('#users').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.users') }}",
                columns: [
                    { data: 'first_name', name: 'first_name',class : 'text-center' },
                    { data: 'last_name', name: 'last_name',class : 'text-center' },
                    { data: 'email', name: 'email',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });


        });
    </script>
@endsection
