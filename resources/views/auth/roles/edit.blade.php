<x-app-layout>


    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title"> Edit role and manage permissions.</h3>
        </div>

        <div class="card-body mt-2">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('access.roles.update', $role->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input value="{{ $role->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>
                </div>

                <label for="permissions" class="form-label">Assign Permissions</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox"
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'
                                {{ in_array($permission->name, $rolePermissions)
                                    ? 'checked'
                                    : '' }}>
                            </td>
                            <td class="modal-text">{{ $permission->name }}</td>
                            <td class="modal-text">{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-check-circle-outline" style="font-size: 20px"></i> Save changes</button>

            </form>
        </div>

    </div>


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
</x-app-layout>
