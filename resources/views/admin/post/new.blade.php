@extends('admin.layouts.admin')

@section('content')

<div class="contentpanel">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col text-end">
            <a href="{{ route('admin-'.$slug) }}?type={{request()->get('type')}}" class="btn btn-warning"><i class="fa fa-list-alt"></i> {{__('List')}} {{ __($plural_name) }}</a>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php if(isset($row->id)) echo __("Edit"); else echo __("New"); ?> {{$singular_name}}</div>
                <div class="card-body">

                    <form action="{{ route('admin-'.$slug."-update", $row->id??'') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="type" value="{{request()->get('type')??'page'}}" />
                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title" value="{{$row->title??''}}" required />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Category')}}</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach($categories AS $category)
                                    <option value="{{$category->id??''}}" <?php 
                                        if(
                                            isset($row) 
                                            && $row->category_id==$category->id
                                        ) echo "selected='true'"; 
                                    ?>>{{$category->title??''}}</option>
                                    @endforeach
                                </select>
                            </div>

                           

                            <div class="col">
                                <label>&nbsp;</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" <?php if(isset($row) && $row->is_featured==1) echo "checked='true'"; ?>>
                                    <label class="form-check-label" for="is_featured">{{__('Is featured?')}}</label>
                                </div>
                            </div>

                            <div class="col">
                                <label>{{__('Publish in')}}</label>
                                <input type="date" class="form-control" name="published_at" value="{{isset($row->published_at)? date("Y-m-d", strtotime($row->published_at) ) :''}}" />
                            </div>

                        </div>

                        
                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Image')}}</label>
                                <input type="file" name="featured_image" class="form-control" />
                            </div>
                            @if(isset($row->featured_image))
                            <div class="col">
                                <label>{{__('Image Current')}}</label><br>
                                <img src="{{$row->featured_image}}" style="width:400px;" />
                            </div>
                            @endif
                        </div>
                        

                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Introdution')}}</label>
                                <textarea class="form-control" name="intro" rows="10">{{$row->intro??''}}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label>{{__('Content')}}</label>
                                <textarea class="form-control editor" name="content" height="600">{{$row->content??''}}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{$row->meta_title??''}}" required />
                            </div>
                            <div class="col">
                                <label>Meta Keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" value="{{$row->meta_keywords??''}}" required />
                            </div>
                            <div class="col">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="{{$row->meta_description??''}}" required />
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