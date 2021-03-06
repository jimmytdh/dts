<?php use \App\Http\Controllers\SectionController as Section; ?>
@extends('layouts.app')
@section('content')
    <span id="url" data-link="{{ asset('searchSection') }}"></span>
    <span id="token" data-token="{{ csrf_token() }}"></span>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="alert alert-jim" id="inputText">
        <h2 class="page-header">Sections</h2>
        <form class="form-inline form-accept" action="{{ url('/section') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="section" value="{{ Session::get("searchSection") }}" placeholder="Quick Search" id="search" autofocus>
                <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                <div class="btn-group">
                    <a href="#document_form" class="btn btn-success" data-toggle="modal" data-link="{{ asset('addSection') }}">
                        <i class="fa fa-plus"></i>  Add New
                    </a>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        @if(count($section))
            <div class="table-responsive">
                <table class="table table-list table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Section</th>
                        <th>Division</th>
                        <th>Head</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($section as $sec)
                        <tr>
                            <td><a class="title-info">{{ $sec->description }}</a></td>
                            <td>{{ \App\Http\Controllers\DivisionController::getDivisionDesc($sec->division) }}</td>
                            <td>{{ Section::getHead($sec->head) }}</td>
                            <td style="">
                                <div class="btn-group">
                                    <a href="#document_form" class="btn btn-sm btn-info" data-toggle="modal" data-link="{{ asset('updateSection/'.$sec->id.'/'.$sec->division.'/'.$sec->head.'/') }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" value="{{ $sec->description }}" data-link="{{ asset('deleteSection/'.$sec->id) }}" id="deleteValue" data-toggle="modal" data-target="#confirmation" onclick="deleteSection($(this));"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $section->links() }}
        @else
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle fa-lg"></i> Section not found! </strong>
            </div>
        @endif
    </div>
@endsection
@section('plugin')
    <script src="{{ asset('resources/plugin/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('resources/plugin/daterangepicker/daterangepicker.js') }}"></script>
@endsection



@section('css')
    <link href="{{ asset('resources/plugin/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
@endsection


