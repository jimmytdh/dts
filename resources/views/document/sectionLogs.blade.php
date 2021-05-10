<?php
use App\Users;
use App\Section;
use App\Http\Controllers\DocumentController as Doc;

$code = Session::get('doc_type_code');
?>
@extends('layouts.app')

@section('content')
    <style>
        .input-group {
            margin:5px 0;
        }
    </style>
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
        <h2 class="page-header">Print Section Logs</h2>
        <form class="form-inline" method="POST" action="{{ asset('document/section/logs') }}" onsubmit="return searchDocument()">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </div>
                    <input type="text" class="form-control" name="keywordSectionLogs" value="{{ isset($keywordSectionLogs) ? $keywordSectionLogs: null }}" placeholder="Input keyword...">
                </div>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="reservation" name="daterange" value="{{ isset($daterange) ? $daterange: null }}" placeholder="Input date range here..." required>
                </div>

                <button type="submit" class="btn btn-success" onclick="checkDocTye()"><i class="fa fa-search"></i> Filter</button>
                @if(count($documents))
                    {{--<a target="_blank" href="{{ asset('pdf/logs/'.$doc_type.'?type=section') }}" class="btn btn-warning"><i class="fa fa-print"></i> Print Logs</a>--}}
                    <a target="_blank" href="{{ asset('report/logs/section') }}" class="btn btn-warning"><i class="fa fa-print"></i> Print Logs</a>
                @endif
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="page-divider"></div>
        <div class="alert alert-danger error hide">
            <i class="fa fa-warning"></i> Please select Document Type!
        </div>
        @if(count($documents))
            <table class="table table-list table-hover table-striped">
                <thead>
                <tr>
                    <th width="8%"></th>
                    <th width="17%">Route # / Remarks</th>
                    <th width="15%">Received Date</th>
                    <th width="15%">Received From</th>
                    <th width="15%">Released Date</th>
                    <th width="15%">Released To</th>
                    <th width="20%">Document Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $doc)
                    <tr>
                        <td>
                            <a href="#track" data-link="{{ asset('document/track/'.$doc->route_no) }}" data-route="{{ $doc->route_no }}" data-toggle="modal" class="btn btn-sm btn-success col-sm-12"><i class="fa fa-line-chart"></i> Track</a>
                        </td>
                        <td>
                            <a class="title-info" data-route="{{ $doc->route_no }}" data-link="{{ asset('/document/info/'.$doc->route_no) }}" href="#document_info" data-toggle="modal">{{ $doc->route_no }}</a>
                            <br>
                            {!! nl2br($doc->description) !!}
                        </td>
                        <td>{{ date('M d, Y',strtotime($doc->date_in)) }}<br>{{ date('h:i:s A',strtotime($doc->date_in)) }}</td>
                        <td>
                            <?php $user = Users::find($doc->delivered_by);?>
                            @if($user)
                                {{ $user->fname }}
                                {{ $user->lname }}
                                <br>
                                <em>({{ Section::find($user->section)->description }})</em>
                            @endif
                        </td>
                        <?php
                        $out = Doc::deliveredDocument($doc->route_no,$doc->received_by,$doc->doc_type);
                        ?>
                        @if($out)
                            <td>{{ date('M d, Y',strtotime($out->date_in)) }}<br>{{ date('h:i:s A',strtotime($out->date_in)) }}</td>
                            <td>
                                <?php $user = Users::find($out->received_by);?>
                                @if($user)
                                    {{ $user->fname }}
                                    {{ $user->lname }}
                                    <br>
                                    <em>({{ Section::find($user->section)->description }})</em>
                                @else
                                    <?php
                                        if($x = App\Tracking_Details::where('received_by',0)
                                                ->where('id',$out->id)
                                                ->where('route_no',$out->route_no)
                                                ->first()){

                                            $string = $x->code;
                                            $temp1   = explode(';',$string);
                                            $temp2   = array_slice($temp1, 1, 1);
                                            $section_id = implode(',', $temp2);
                                            $x_section=null;
                                            if($section_id)
                                            {
                                                $x_section = Section::find($section_id)->description;
                                            }
                                        } else {
                                            $x_section = "No section";
                                        }
                                        

                                        ?>
                                        <font class="text-bold text-danger">
                                            {{ $x_section }}<br />
                                            <em>(Unconfirmed)</em>
                                        </font>
                                @endif
                            </td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                        <td>{{ \App\Http\Controllers\DocumentController::docTypeName($doc->doc_type) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $documents->links() }}
        @else
            <div class="alert alert-warning">
                <strong><i class="fa fa-warning fa-lg"></i> No documents found! </strong>
            </div>
        @endif
    </div>
@endsection
@section('plugin')
    <script>
        $('#reservation').daterangepicker();
        $('.chosen-select').chosen();

        function checkDocTye(){
            var doc = $('select[name="doc_type"]').val();
            if(doc.length == 0){
                $('.error').removeClass('hide');
            }
        }
    </script>
    <script>
        function searchDocument(){
            $('.loading').show();
            setTimeout(function(){
                return true;
            },2000);
        }
    </script>
@endsection

@section('css')

@endsection

