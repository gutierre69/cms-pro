@extends('admin.layouts.admin')

@section('content')

<div class="contentpanel">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col text-end">
            <a href="{{ route('admin-'.$slug.'-new') }}" class="btn btn-primary"><i class="fa fa-certificate"></i> {{__('New')}} {{ __($singular_name) }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$plural_name}} {{__('registered')}}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Slug')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows AS $row)
                            <?php if($row->slug=="website-page") continue; ?>
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->title??''}}</td>
                                    <td>{{$row->slug??''}}</td>
                                    <td>
                                        <a href="{{ route('admin-'.$slug.'-edit', $row->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> {{__('Edit')}}</a>
                                        <a href="{{ route('admin-'.$slug.'-delete', $row->id)}}" class="btn btn-danger" onclick="return confirm('{{__('Do you really want to erase?')}}')"><i class="fa fa-trash"></i> {{__('Delete')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row mt-5 mb-2">
                        <div class="col text-center">
                            {{$rows->appends(request()->input())->render("pagination::bootstrap-4")}}
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>

            

        </div>
    </div>
</div>

@stop