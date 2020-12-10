<div class="form-group">
    {!! Form::label('name', '球隊名字：') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('city', '城市：') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('zone', '分區：') !!}
    {!! Form::text('zone', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('home', '主場：') !!}
    {!! Form::text('home', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
