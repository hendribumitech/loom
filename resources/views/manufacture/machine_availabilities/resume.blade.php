@extends('layouts.app')

@section('content')
    @push('breadcrumb')
    <ol class="breadcrumb  my-0 ms-2">
      <li class="breadcrumb-item">
         <a href="{!! route($baseRoute.'.index') !!}">@lang('models/machineAvailabilities.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
    @endpush
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => $baseRoute.'.store']) !!}
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Resume @lang('models/machineAvailabilities.singular')</strong>
                            </div>
                            <div class="card-body">                                

                                   @include($baseView.'.resume_fields')
                                
                            </div>                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    </div>
@endsection