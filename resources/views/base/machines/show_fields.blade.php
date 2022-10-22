<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/machines.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/machines.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->name }}</p>
    </div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machines.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->capacity }}</p>
    </div>
</div>

<!-- Capacity Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity_uom_id', __('models/machines.fields.capacity_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->capacity_uom_id }}</p>
    </div>
</div>

<!-- Period Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('period_uom_id', __('models/machines.fields.period_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->period_uom_id }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row mb-3">
    {!! Form::label('description', __('models/machines.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->description }}</p>
    </div>
</div>

<!-- Types Field -->
<div class="form-group row mb-3">
    {!! Form::label('types', __('models/machines.fields.types').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machine->types }}</p>
    </div>
</div>

