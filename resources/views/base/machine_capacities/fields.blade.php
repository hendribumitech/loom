<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineCapacities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Product Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('product_id', __('models/machineCapacities.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('product_id', $productItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machineCapacities.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('capacity', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Capacity Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity_uom_id', __('models/machineCapacities.fields.capacity_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('capacity_uom_id', $capacityUomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Period Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('period_uom_id', __('models/machineCapacities.fields.period_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('period_uom_id', $periodUomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>
