<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/uoms.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/uoms.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Category Field -->
<div class="form-group row mb-3">
    {!! Form::label('category', __('models/uoms.fields.category').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('category', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15, 'required' => 'required']) !!}
</div>
</div>

<!-- Types Field -->
<div class="form-group row mb-3">
    {!! Form::label('types', __('models/uoms.fields.types').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('types', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Ratio Field -->
<div class="form-group row mb-3">
    {!! Form::label('ratio', __('models/uoms.fields.ratio').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('ratio', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>
