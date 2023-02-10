{!! Form::open(['route' => ['base.machines.machineCapacities.destroy', [$machine_id, $id]], 'method' => 'delete']) !!}
<div class='btn-group'>    
    <a href="{{ route('base.machines.machineCapacities.edit', [$machine_id, $id]) }}" class='btn btn-ghost-info'>
       <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
