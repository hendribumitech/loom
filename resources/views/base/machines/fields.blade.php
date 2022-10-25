<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/machines.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/machines.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' =>
        'required']) !!}
    </div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machines.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('capacity', null, ['class' => 'form-control inputmask','data-unmask' => 1, 'required' => 'required',
            'data-optionmask' => json_encode( config('local.number.decimal'))]) !!}
            {!! Form::select('capacity_uom_id', $capacityUomItems, null, ['class' => 'form-control', 'required'
            => 'required']) !!}
            <span class="input-group-text"> / </span>
            {!! Form::select('period_uom_id', $periodUomItems, null, ['class' => 'form-control', 'required' =>
            'required']) !!}
        </div>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row mb-3">
    {!! Form::label('description', __('models/machines.fields.description').':', ['class' => 'col-md-3 col-form-label'])
    !!}
    <div class="col-md-9">
        {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3,'maxlength' => 100, 'required'
        => 'required']) !!}
    </div>
</div>