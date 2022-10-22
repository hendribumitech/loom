<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/machines.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/machines.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machines.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('capacity', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Capacity Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity_uom_id', __('models/machines.fields.capacity_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('capacity_uom_id', $capacityUomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Period Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('period_uom_id', __('models/machines.fields.period_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('period_uom_id', $periodUomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row mb-3">
    {!! Form::label('description', __('models/machines.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100, 'required' => 'required']) !!}
</div>
</div>

<!-- Types Field -->
<div class="form-group row mb-3">
    {!! Form::label('types', __('models/machines.fields.types').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('types', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15, 'required' => 'required']) !!}
</div>
</div>
