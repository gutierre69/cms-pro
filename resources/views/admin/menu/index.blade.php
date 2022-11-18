@extends('admin.layouts.admin')

@section('after_styles')
<style>
    #sortable { 
        list-style-type: none; 
        margin: 0; 
        padding: 0; 
        width: 60%; 
    }
    #sortable li { 
        margin: 0 5px 5px 5px; 
        width: 300px;
        padding: 10px; 
        font-size: 1.2em; 
        min-height: 25px;
        border: 2px solid rgba(0,0,0,0.1);
        cursor: grab;
        background-color: #fff;
    }

    .ui-state-highlight { 
        margin: 0 5px 5px 5px; 
        padding: 10px; 
        height: 45px;
        background: #fc02 !important; 
        border: 2px solid #fc0 !important;
        border-style: dashed !important;
        box-shadow: inset 2px 2px 5px rgba(0,0,0,0.1);
    }
    #sortable li .icons {

    }
    #sortable li .icons a {
        color: #444;
        margin-left: 2px;
        margin-right: 2px;
    }
    #sortable li .icons a.edit:hover {
        color: #00f;
    }
    #sortable li .icons a.delete:hover {
        color: #f00;
    }
    .jGrowl .changeCount {
        background-color: #444 !important;
        color: #fff !important;
        border-radius: 0 !important;
        margin-top: 5px !important;
        border: 1px solid #000 !important;
    }
</style>
@stop
@section('content')

<div class="contentpanel">
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">{{__('Create and Edit Menu')}}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label>{{__('Name')}}</label>
                            <input type="text" class="form-control" id="label" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>{{__('Address')}}</label>
                            <input type="text" class="form-control" id="url" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label>{{__('Open in New Window?')}}</label>
                            <select class="form-control" id="target">
                                <option value="">{{__('NO')}}</option>
                                <option value="_blank">{{__('YES')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-end">
                            <input type="hidden" id="edit" value="" />
                            <button id="clear_menu" class="btn btn-secondary">{{__('Clear')}}</button>
                            <button id="add_menu" class="btn btn-success">{{__('Add Menu')}} <i class="fa fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{__('Menu Position Preview')}} <small class="float-end">{{__('Drag and Drop to reorder')}}</small></div>
                <div class="card-body">

                    <ul id="sortable">
                        @foreach($menus AS $menu)
                        <li class="ui-state-default" id="li_{{rand(1000,99999)}}" data-label="{{$menu->label}}" data-url="{{$menu->url}}" data-target="{{$menu->target}}">
                            <span class="label_menu">{{$menu->label}}</span>
                            <div class="float-end icons">
                                <a href="javascript:void(0)" class="edit"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" class="delete"><i class="fa fa-trash-alt"></i></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="float-end"><button class="btn btn-success" id="saveMenu">{{__('Save Menu')}}</button></div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('javascript')
<script>
    function saveMenu(){
        var data = [];
        $("#sortable li").each(function(){
            var li = $(this);
            var menu = {
                "label": li.attr("data-label"),
                "url": li.attr("data-url"),
                "target": li.attr("data-target"),
            };
            data.push(menu);
        }).promise().done( function(){ 
            var json = JSON.stringify(data); 

            $.post("{{ route('admin-menu-save') }}",{
                '_token': '{{ csrf_token() }}',
                json: json
            },function(response){
                $.jGrowl({
                    message: "{{__('Saved!')}}",
                    group: 'alert-success',
                    position: 'center',
                    theme:  'changeCount',
                });
            });
        });
    }

    $(document).ready(function(){
        $("#sortable").sortable({
            placeholder: "ui-state-highlight"
        });

        $("#add_menu").on("click",function(){
            var label   = $("#label").val();
            var url     = $("#url").val();
            var target  = $("#target").val();
            var edit    = $("#edit").val();



            if(label!="" && url!=""){
                if(edit==""){
                    $("#sortable").append('<li class="ui-state-default" id="li_'+Math.floor(Math.random() * 99999)+'" data-label="'+label+'" data-url="'+url+'" data-target="'+target+'"><span class="label_menu">'+label+'</span> <div class="float-end icons"><a href="javascript:void(0)" class="edit"><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" class="delete"><i class="fa fa-trash-alt"></i></a></div></li>');
                } else {
                    console.log(edit);
                    var li = $("#"+edit);
                        li.attr("data-label", label);
                        li.attr("data-url", url);
                        li.attr("data-target", target);
                        li.find(".label_menu").html(label);
                }

                $("#label").val("");
                $("#url").val("");
                $("#target").val("");
                $("#edit").val("");
            }
        });

        $("#clear_menu").on("click",function(){
            $("#label").val("");
            $("#url").val("");
            $("#target").val("");
            $("#edit").val("");
        });

        $("#saveMenu").on("click",function(){
            saveMenu();
        })

        $("body").on("click",".edit", function(){
            var li          = $(this).parents("li");
            var label       = li.attr("data-label");
            var url         = li.attr("data-url");
            var target      = li.attr("data-target");
            var edit        = li.attr("id");

            $("#label").val(label);
            $("#url").val(url);
            $("#target").val(target);
            $("#edit").val(edit);
        });

        $("body").on("click",".delete", function(){
            $(this).parents("li").remove();
        });
    });
</script>
@stop