<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>

<body>
{!! Form::open(['method'=>'post','action'=>['MakersController@index'],'files'=>true]) !!}
<div class="form-group">
    <div class="form-group">
        {!! Form::label('name','name') !!}
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone','phone') !!}
        {!! Form::text('phone',null,['class'=>'form-control','required']) !!}
    </div>

    <button class="btn btn-success" type="submit">Create</button>
    <button class="btn btn-default" data-dismiss="modal" >Cancel</button>
{!! Form::close() !!}

</body>

</html>