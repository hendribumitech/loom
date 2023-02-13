<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineAvailabilities.fields.machine_id').':', ['class' => 'col-md-2 col-form-label']) !!}
<div class="col-md-10"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'id' => 'machine_id','required' => 'required', 'multiple' => 'multiple']) !!}
    <label class="checkbox-inline">                                            
        {!! Form::checkbox('', '1', null,['onchange' => 'main.select2AllOption(this,\'#machine_id\')']) !!}
        pilih semua
    </label>
</div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineAvailabilities.fields.work_date').':', ['class' => 'col-md-2 col-form-label']) !!}
<div class="col-md-10"> 
    {!! Form::text('work_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode(config('local.daterange')),'id'=>'work_date']) !!}
</div>
</div>

<!-- Generate button -->
<div class="form-group row mb-3">
    <div class="col-md-10 offset-2">
        {!! Form::button(__('crud.generate'), ['class' => 'btn btn-danger', 'data-target' => '#list_machine_availability', 'data-url' => route($baseRoute.'.generate'), 'data-json' => '{}', 'data-ref' => 'input[name=work_date],select[name="machine_id"]' ,'onclick' => 'main.loadDetailPage(this,\'get\', function(){ main.initCalendar($(\'form\'));main.showLoading(false) })', 'type' => 'button']) !!}
    </div>
    <div class="row" id="list_machine_availability">

    </div>
</div>


