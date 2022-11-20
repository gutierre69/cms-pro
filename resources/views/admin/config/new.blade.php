@extends('admin.layouts.admin')

@section('content')

<div class="contentpanel">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col text-end">
            <a href="{{ route('admin-'.$slug) }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> {{__('List')}} {{ __($plural_name) }}</a>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php if(isset($row->id)) echo __("Edit"); else echo __("New"); ?> {{$singular_name}}</div>
                <div class="card-body">

                    <form action="<?php if(!isset($row->id)) echo route('admin-'.$slug."-store"); else echo route('admin-'.$slug."-update", $row->id??''); ?>" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="{{request()->get('type')??'page'}}" />
                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$row->name??''}}" required />
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Value')}}</label>
                                <textarea class="form-control" name="value" rows="10">{{$row->value??''}}</textarea>
                            </div>
                        </div>
                        

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success"><i class="fa fa-save"></i> {{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop