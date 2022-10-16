<x-app-layout>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="nav-item">
                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <span class="d-block d-sm-none"><i class="mdi mdi-account-outline font-18"></i></span>
                            <span class="d-none d-sm-block">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="mdi mdi-settings-outline font-18"></i></span>
                            <span class="d-none d-sm-block">Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="profile-b2">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['access.users.update', $user->id]]) !!}
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
                             <div class="alert alert-icon bg-white text-info alert-info alert-dismissible fade show" role="alert">

                                <i class="mdi mdi-information mr-2"></i>
                                <strong>Heads up!</strong> Fill the fields below only when you want to change the password
                            </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','autocomplete'=>'off')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-outline-success  btn-sm btn-sm btn-flat"><i class="mdi mdi-checkbox-marked-circle-outline"> </i> Save changes</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="tab-pane" id="settings-b2">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-centered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Notification Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Receive SMS about your account</td>
                                            <td>
                                                <input type="checkbox"   data-plugin="switchery" data-color="#64b0f2" data-size="small" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Receive Email alerts </td>
                                            <td>
                                                <input type="checkbox"   data-plugin="switchery" data-color="#64b0f2" data-size="small" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

