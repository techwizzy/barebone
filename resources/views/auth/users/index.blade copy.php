<?php
use Illuminate\Support\Arr;
?>

<x-app-layout>
 <!-- start  -->
 <div class="row">
    <div class="col-12">
        <div style="border-bottom:1px solid #ccc; padding-bottom:35px">
            <h4 class="float-left">Users</h4>
            <span class="float-right"><a href="{{ route('access.users.create') }}" class="btn btn-primary">Add User </a></span>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="mt-5">

            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                    @isset($users)
                    @foreach($users as $user)

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                            <label class="badge badge-success">{{ $role }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td>{{ $user->created_at }}</td>

                        <td>
                            <div class="row">
                            <div class="col-md-3">
                            <a class=""  href="{{ route('access.users.edit',$user->id) }}" data-toggle="tooltip" data-placement="bottom" title="View User Profile">
                                    <i class=" mdi mdi-pencil-circle-outline text-secondary" style="font-size: 24px">
                                    </i>

                            </a>
                            </div>
                            <div class="col-md-3">
                            <form method="POST" action="{{ route('access.users.destroy', $user->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="pt-0 btn btn-xs btn-default-outline btn-flat show_confirm" data-toggle="tooltip" title='Delete'>  <i class="mdi mdi mdi-delete-circle-outline text-secondary" style="font-size: 24px">
                                </i></button>
                            </form>
                            </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                    @endisset

                    @empty($users)
                    <td colspan="=4">No users found. Create one..</td>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
</x-app-layout>
