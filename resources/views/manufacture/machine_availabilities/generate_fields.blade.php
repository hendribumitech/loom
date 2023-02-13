<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineAvailabilities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id[]', $machineItems, null, ['class' => 'form-control select2', 'id' => 'machine_id','required' => 'required', 'multiple' => 'multiple']) !!}
    <label class="checkbox-inline">                                            
        {!! Form::checkbox('', '1', null,['onchange' => 'main.select2AllOption(this,\'#machine_id\')']) !!}
        pilih semua
    </label>
</div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineAvailabilities.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('work_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode(config('local.daterange')),'id'=>'work_date']) !!}
</div>
</div>

