<div class="form-group">
    {!! Form::label('name', '球員姓名：') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tid', '所屬球隊：') !!}
    {!! Form::select('tid', $teams, $teamSelected, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('birthdate','出生年月日:') !!}
    {!! Form::date('birthdate',null ,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('onboarddate','到職日:') !!}
    {!! Form::date('onboarddate',null ,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('position', '球員位置：') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('height', '球員身高：') !!}
    {!! Form::text('height', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('weight', '球員體重：') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('year', '球員年資：') !!}
    {!! Form::text('year', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nationality', '球員國籍：') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
