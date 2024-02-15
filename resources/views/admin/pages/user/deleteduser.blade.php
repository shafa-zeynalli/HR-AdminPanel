@extends('layout.admin')

@section('content')
    <h2>Deleted Users</h2>

    <table class="table table-bordered mt-3" id="myTable">
        <thead>
        <tr>
            <th>#ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


    <script type="text/javascript">
        $(function () {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('deletedUsers.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'address', name: 'address'},
                    {data: 'position', name: 'position'},
                    {data: 'email', name: 'email'},
                    {data: 'visible_password', name: 'visible_password'},
                    {data: 'action', name: 'action'},
                ]
            });
        });
    </script>
@endsection
