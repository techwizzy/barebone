
<x-app-layout>

 <!-- start  -->
 <div class="row">
    <div class="col-12" style="border-bottom:1px solid #ccc;">
        <div >
            <h4 class="float-left">Users</h4>
            <span class="float-right"><a href="{{ route('access.users.create') }}" class="btn btn-primary btn-sm"><i class=" mdi mdi-plus-circle-outline "></i> Add User </a></span>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="mt-5">

            <table id="usersTable" class="table table-bordered table-bordered responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>

                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>



<script>

function deactivate_user(event) {
            let id = event.getAttribute('data-id');
            swal.fire({
                    title: "Are you sure?",
                    text: "You can activate the user later!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, deactivate user!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ml-2 mt-2",
                    buttonsStyling: !1
                }).then((willDelete) => {
                        if (willDelete.value) {
                            $.ajax({
                                type:'POST',
                                url: '{!! url('access/users/delete-user') !!}',
                                data:{
                                    id : id,
                                    "_token" : "{{csrf_token()}}",
                                },
                                success:function (response) {
                                    swal.fire({
                                        type: "success",
                                        text:"User Successfully deactivated!"

                                    });
                                    $("#"+id+"").remove(); //remove the tr without refreshing
                                    setTimeout(function(){  location.reload(); }, 5000);

                                }
                            }); // ajax end

                        } else {
                            swal.fire({
                                title:"The user has not been deactivated!",
                                type: "warning"
                            });
                        }
                    });
                }


  $(document).ready(function() {


      var table = $('#usersTable').DataTable({
          processing: true,
          serverSide: true,
          dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [ {
                extend:    'excel',
                text:      '<i class="mdi mdi-file-excel-outline text-success"></i>Excel',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'pdf',
                text:      '<i class="mdi mdi mdi-file-pdf-box-outline text-danger"></i>PDF',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'print',
                text:      '<i class="mdi mdi-printer text-primary"></i>Print',
                className: 'btn btn-flat btn-sm btn-light'
            },
            {
                extend:    'colvis',
                text:      '<i class="mdi mdi-eye-off-outline text-warning"></i>Columns',
                className: 'btn btn-flat btn-sm btn-light'
            },

    ],
    lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
          ajax: "{{ route('access.users.list') }}",
          columns: [

              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'roles'},
              {data: 'created_at', name: 'created_at'},


              {
                  data: 'action',
                  name: 'action',
                  orderable: true,
                  searchable: true
              },
          ]
      });

      table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );



    });



  </script>
</x-app-layout>
