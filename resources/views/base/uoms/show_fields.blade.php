<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/uoms.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/uoms.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->name }}</p>
    </div>
</div>

<!-- Category Field -->
<div class="form-group row mb-3">
    {!! Form::label('category', __('models/uoms.fields.category').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->category }}</p>
    </div>
</div>

<!-- Types Field -->
<div class="form-group row mb-3">
    {!! Form::label('types', __('models/uoms.fields.types').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->types }}</p>
    </div>
</div>

<!-- Ratio Field -->
<div class="form-group row mb-3">
    {!! Form::label('ratio', __('models/uoms.fields.ratio').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $uom->ratio }}</p>
    </div>
</div>

