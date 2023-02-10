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
        <div class="input-group">
            {!! Form::text('capacity', null, ['class' => 'form-control inputmask', 'data-unmask' => 1,'required' => 'required',
            'data-optionmask' => json_encode( config('local.number.decimal'))]) !!}
            {!! Form::select('capacity_uom_id', $capacityUomItems, null, ['class' => 'form-control', 'required'
            => 'required']) !!}
            <span class="input-group-text"> / </span>
            {!! Form::select('period_uom_id', $periodUomItems, null, ['class' => 'form-control', 'required' =>
            'required']) !!}
        </div>
    </div>
</div>
