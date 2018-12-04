@extends('layouts.app')

@section('title', '- '.$department[0]->dept_name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
    </div>
    
    <!-- PANELS -->
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body my-panel-body bg-aqua">
                    <h3>Official Report</h3>
                    <p>{{$report_count}} Reports</p>
                    <div id="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="panel-footer my-panel-footer bg-aqua">
                    <a href="{{ url('#official-report') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
            <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body my-panel-body bg-green">
                    <h3>{{$faculty_count}}</h3>
                    <p>Faculty</p>
                    <div id="icon">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <div class="panel-footer my-panel-footer bg-green">
                    <a href="{{ url('#') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body my-panel-body bg-aqua">
                    <h3>{{$book_count}}</h3>
                    <p>Books</p>
                    <div id="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="panel-footer my-panel-footer bg-aqua">
                    <a href="{{ url('#') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- REPORT -->
    <div class="row">
        <div class="form-group col-md-6 ">
            <label for="dept" class="col-form-label">View Report</label>
            <select id="year" class="form-control dynamic" name="year" data-dependent="year">
                <option value="" disabled selected>Select one year</option>
                @foreach($academic_year as $year)
                <option value="{{$year->year}}">
                    {{$year->year}}
                </option>
                @endforeach
            </select>
        </div>
        {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-12 report-main" data-dependent="report">
            <button onclick='printReport("official-report")'>Print Report</button>
        </div>
    </div>
    <div class="row">    
        <div class="col-md-12 report-main" id="report-main">

        </div><!-- /.report-main -->
    </div><!-- /.row -->
</div>
@endsection

