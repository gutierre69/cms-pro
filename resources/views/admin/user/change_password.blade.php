@extends('admin.layouts.admin')

@section('content')

<div class="contentpanel">

    @if (session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php if(isset($row->id)) echo __("Edit"); else echo __("Change Password"); ?></div>
                <div class="card-body">

                    <form action="{{ route('admin-'.$slug."-password") }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('New Password')}}</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" value="" required />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Retype the New Password')}}</label>
                                <input type="password" class="form-control" name="re_new_password" id="re_new_password" value="" required />
                                <span id="confirm_password"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h5>{{__('Tips for a strong password')}}:</h5>
                                <ul>
                                    <li>{{__('Use more than 8 characters')}}</li>
                                    <li>{{__('Use numbers and letters')}}</li>
                                    <li>{{__('Use uppercase and lowercase letters')}}</li>
                                    <li>{{__('Use special characters like')}}: * $ # @ &</li>
                                </ul>
                            </div>
                        </div>
 
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success" id="btnSave" disabled="true"><i class="fa fa-save"></i> {{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')
<script>
    function compare(){
        var new_passord = $("#new_password").val();
        var re_new_passord = $("#re_new_password").val();

        var are_ok = false;

        if(new_passord.length<=4)       { $("#confirm_password").removeClass("text-success").removeClass("text-danger").html(""); $("#btnSave").prop("disabled",true); return; }
        if(re_new_passord.length<=4)    { $("#confirm_password").removeClass("text-success").removeClass("text-danger").html(""); $("#btnSave").prop("disabled",true); return; }

        if(new_passord==re_new_passord){
            $("#confirm_password").removeClass("text-danger").addClass("text-success").html("YES! passwords are the same.");
            $("#btnSave").prop("disabled",false);
        } else {
            $("#confirm_password").removeClass("text-success").addClass("text-danger").html("NO! The passwords are different.");
            $("#btnSave").prop("disabled",true);
        }
    }
    $(document).ready(function(){
        $("#new_password, #re_new_password").keyup(function(){
            compare();
        });
    });
</script>
@stop