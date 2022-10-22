<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineResults.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount', __('models/machineResults.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineResults.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>
