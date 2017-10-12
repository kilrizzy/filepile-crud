@extends('layouts.app')

@section('content')

    @component('components.panel',['title'=>'Manage __ModelClasses__'])
        @slot('action')
            <a href="{{ url('__modelRoute__/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create</a>
        @endslot

        <table class="table table-bordered table-striped table-responsive">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>

                @foreach($__modelVariables__ as $__modelVariable__)
                    <tr>
                        <td><a href="{{ url('__modelRoute__/'.$__modelVariable__) }}" class="btn btn-primary">View</a></td>
                        <td>{{ $__modelVariable__->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $__modelVariables__->appends($_GET)->render() !!}

    @endcomponent

@endsection
