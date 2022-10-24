<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineResults.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'required' => 'required', 'onchange' => 'setUomResult(this)'], $machineData) !!}
</div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineResults.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('shiftment_id', $shiftmentItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineResults.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('work_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'work_date']) !!}
</div>
</div>

<!-- Amount Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount', __('models/machineResults.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('amount', null, ['class' => 'form-control inputmask', 'required' => 'required', 'data-optionmask' => json_encode(config('local.number.decimal')) ]) !!}
</div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineResults.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

@push('scripts')
<script type="text/javascript">
    function setUomResult(elm){
     let _val = $(elm).val()
     let _uomId = $(elm).find('option:selected').attr('capacity_uom_id')
     $('#uom_id').find('option').prop('disabled',1)     
     $('#uom_id').find('option[value='+_uomId+']').prop('disabled',0)
     $('#uom_id').val(_uomId).trigger('change');   
    } 
</script>
@endpush