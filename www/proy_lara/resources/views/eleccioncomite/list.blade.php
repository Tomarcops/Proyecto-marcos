@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Periodo de eleccion</th>
                <th>Funcionario</th>
                <th>Rol</th>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($eleccioncomites as $eleccioncomite)
            <tr>
                <td>{{$eleccioncomite->id}}</td>
                <td>{{$eleccioncomite->eleccion}}</td>
                <td>{{$eleccioncomite->funcionario}}</td>
                <td>{{$eleccioncomite->rol}}</td>
                <td><a href="{{ route('eleccioncomite.edit', $eleccioncomite->id)}}" 
                     class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('eleccioncomite.destroy', $eleccioncomite->id)}}" 
                       method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" 
                        onclick="return confirm('Esta seguro de borrar ')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>

    
        @endsection