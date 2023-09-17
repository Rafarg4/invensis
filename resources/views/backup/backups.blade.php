@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Copias de seguridad</h1>
                </div>
                <div class="col-sm-6"> 
                       <form action="{{ url('backup/create') }}" method="GET" class="add-new-backup" enctype="multipart/form-data" id="CreateBackupForm">
                {{ csrf_field() }}
                <input type="submit" name="submit" class="btn btn-primary float-right" style="margin-bottom:2em;" value="Crear copia">
            </form>
                </div>
                
        
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
               

                <section class="content-header">
        <div class="container-fluid">
            
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
                   
                 <div class="table-responsive" style="padding:15px;">
                 <table class="table" id="table">
                    <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Size</th>
                        <th>Created Date</th>
                        <th>Created Age</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backups as $backup)
                        <tr>
                            <td>{{ $backup['file_name'] }}</td>
                            <td>{{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }}</td>
                            <td>
                                {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-success"
                                   href="{{ url('backup/download/'.$backup['file_name']) }}"> Descargar</a>
                                <a class="btn btn-danger" onclick="return confirm('Estas seguro?')" data-button-type="delete"
                                   href="{{ url('backup/delete/'.$backup['file_name']) }}">
                                    Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
        </div>
    </div>



                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>


        
@endsection