<x-app-layout>


    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Edit User</h3>


      </div>
      <!-- /.card-header -->
      <div class="card-body">


        @if (count($errors) > 0)
        <div class="alert alert-icon bg-white text-danger alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="mdi mdi-block-helper mr-2"></i>
            <strong>Attention!</strong> Correct these issues and try submitting again.
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        {!! Form::model($user, ['method' => 'PATCH','route' => ['access.users.update', $user->id]]) !!}
        <form action="{{ route('access.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Role:</label>

                    <select name="roles[]"  class="form-control select2-multiple" data-toggle="select2"  multiple="multiple" data-placeholder="Select Role">
                        <optgroup label="Roles">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" <?php if(in_array($role, $userRoles->toArray())) { ?> selected="true" <?php } ?>>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary btn-sm btn-flat">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</x-app-layout>
