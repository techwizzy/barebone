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
                        <form method="POST"
                        @empty($settings)
                        action="{{route('user-setting.store')}}"
                        @else
                         action="{{route('user-setting.update')}}"
                        @endempty >
                        @csrf

                        <div class="card">
                            <div class="table-responsive">
                             <input type="hidden" value="{{$user->id}}" name="client_id"/>
                                <table class="table table-centered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Notification Settings</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>Receive SMS Alerts</p>
                                                <div id="phone"

                                                 class="form-group">
                                                    <input type="tel" class="form-control" name="phone"
                                                    @empty($settings)
                                                    value=""
                                                    @else
                                                    value="{{$settings['phone']}}"
                                                    @endempty
                                                    placeholder="Enter Phone Number">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox"
                                                id="showPhone"
                                                name="receive_phone_alerts"
                                                @empty($settings)

                                                @else
                                                checked
                                                @endempty
                                                 data-plugin="switchery" data-color="#64b0f2" data-size="small" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p>Receive Email Alerts</p>
                                                <div id="email" class="form-group">
                                                    <input type="email"
                                                     class="form-control"
                                                      name="email"
                                                       data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="change if you want a different email to receive alerts"

                                                        @empty($settings)
                                                        value="{{ $user->email}}"
                                                        @else
                                                        value="{{$settings['email']}}"
                                                        @endempty
                                                        placeholder="Enter Email">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox"
                                                 id="showEmail"
                                                 name="receive_email_alerts"
                                                 @empty($settings)

                                                 @else
                                                 checked
                                                 @endempty
                                                  data-plugin="switchery"
                                                  data-color="#64b0f2"
                                                   data-size="small" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-outline-success  btn-sm btn-sm btn-flat"><i class="mdi mdi-checkbox-marked-circle-outline"> </i> Save changes</button>
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <script>

         $(function () {

        let setting = {!! json_encode($settings) !!};
        let sms_setting = setting.receive_sms_alerts;
        let email_setting = setting.receive_email_alerts;
       // console.log(sms_setting);
        if(sms_setting !== "on"){
            $('#phone').hide();
        }else{
            $('#phone').fadeIn();
        }


        //show it when the checkbox is clicked
        $('#showPhone').on('change', function () {
            if ($(this).prop('checked')) {
                $('#phone').fadeIn();
            } else {
                $('#phone').hide();
            }
        });

        if(email_setting !== "on"){
        $('#email').hide();
        }else{
            $('#email').fadeIn();
        }
        //show it when the checkbox is clicked
        $('#showEmail').on('change', function () {
            if ($(this).prop('checked')) {
                $('#email').fadeIn();
            } else {
                $('#email').hide();
            }
        });
    });
    </script>
</x-app-layout>

