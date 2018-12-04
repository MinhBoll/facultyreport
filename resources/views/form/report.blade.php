<?php
    $academic_years = array("2017", "2018");
?>
@extends('layouts.mainlayout')

@section('content')
<div class="col-12">
    <div class="col-md-8 col-md-offset-2">
        <div class="form-wrapper">
            {!! Form::open(['action' => 'ReportsController@store', 'method' => 'POST' ]) !!}
            {!! csrf_field() !!}

    <!--Information-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">1.Information<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="dept" class="col-form-label">Department</label>
                    <select id="dept" class="form-control {{ $errors->has('dept') ? 'has-error' : ''}}" name="dept">
                        <option value="" disabled selected>Choose your department</option>
                        @foreach($depts as $dept)
                        <option value="{{$dept->id}}" @if (old('dept') == $dept->dept_name ) selected="selected" @endif >
                            {{$dept->dept_name}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('dept', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="year" class="col-form-label">Academic year</label>
                    <select id="year" class="form-control {{ $errors->has('year') ? 'has-error' : ''}}" name="year">
                        <option value="" disabled selected>Choose an academic year</option>
                        <?php
                        foreach($academic_years as $year){
                        ?>
                        <option value=" <?php echo $year; ?> " @if (old('year') == $year) selected="selected" @endif>
                            <?php echo $year ?>    
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                    {!! $errors->first('year', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Faculty's Name </label><input class="form-control {{ $errors->has('profname') ? 'has-error' : ''}}" id="profname" name="profname" type="text" value="{{ old('profname') }}">
                    {!! $errors->first('profname', '<p class="danger-block text-danger">:message</p>') !!} 
                </div>
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="title">Emplid# </label>
                        <input class="form-control {{ $errors->has('facultyid') ? 'has-error' : ''}}" placeholder="12345678" maxlength="8" id="facultyid" name="facultyid" type="text" value="{{ old('facultyid') }}">
                        {!! $errors->first('facultyid', '<p class="danger-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Publications-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">2.Publiccations<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Total # Refereed Papers </label>
                    <input class="form-control {{ $errors->has('referedpapers') ? 'has-error' : ''}}" placeholder="0" id="referedpapers" name="referedpapers" type="text" value="{{ old('referedpapers') }}">
                    {!! $errors->first('referedpapers', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">Indicate # with student coauthors </label>
                    <input class="form-control {{ $errors->has('referedpaperswstudents') ? 'has-error' : ''}}" placeholder="0" id="referedpaperswstudents" name="referedpaperswstudents" type="text" value="{{ old('referedpaperswstudents') }}">
                    {!! $errors->first('referedpaperswstudents', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">Total # Non-refereed papers</label>
                    <input class="form-control {{ $errors->has('nonreferedpapers') ? 'has-error' : ''}}" placeholder="0" id="nonreferedpapers" name="nonreferedpapers" type="text" value="{{ old('nonreferedpapers') }}">
                    {!! $errors->first('nonreferedpapers', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Books</label>
                    <input class="form-control {{ $errors->has('books') ? 'has-error' : ''}}" placeholder="0" id="books" name="books" type="text" value="{{ old('books') }}">
                    {!! $errors->first('books', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">Book Chapters</label>
                    <input class="form-control {{ $errors->has('bookchapters') ? 'has-error' : ''}}" placeholder="0" id="bookchapters" name="bookchapters" type="text" value="{{ old('bookchapters') }}">
                    {!! $errors->first('bookchapters', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">Submitted Manuscripts</label>
                    <input class="form-control {{ $errors->has('manuscripts') ? 'has-error' : ''}}" placeholder="0" id="manuscripts" name="manuscripts" type="text" value="{{ old('manuscripts') }}">
                    {!! $errors->first('manuscripts', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
           <!-- <div id="dynamic_employment_field">
                <div class="group-employment">
                    <div class="row">
                        <div class="form-group col-md-12 {{ $errors->has('booktitle.*') ? 'has-error' : '' }}">
                            {{Form::label('title', 'Book Title')}}
                            {{Form::text('booktitle[]', '', ['class'=>'form-control', 'placeholder'=>'CSI'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 {{ $errors->has('abstract.*') ? 'has-error' : '' }}">
                            {{Form::label('title', 'Abstract')}}
                            {{Form::text('abstract[]', '', ['class'=>'form-control', 'placeholder'=>'Software Engineer'])}}
                        </div>
                    </div>
                   
                    <center>
                        <button type="button" name="add-publications" id="add-publications" class="btn btn-success">Add More Books</button>
                    </center>
                </div>
            </div>-->
        </div>
    </div>
    <!--Presentations-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">3.Presentations/Conferences<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Conference Presentations</label>
                    <input class="form-control {{ $errors->has('conferences') ? 'has-error' : ''}}" placeholder="0" id="conferences" name="conferences" type="text" value="{{ old('conferences') }}">
                    {!! $errors->first('conferences', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">Indicate # with invited speaker </label>
                    <input class="form-control {{ $errors->has('conferenceswspeakers') ? 'has-error' : ''}}" placeholder="0" id="conferenceswspeakers" name="conferenceswspeakers" type="text" value="{{ old('conferenceswspeakers') }}">
                    {!! $errors->first('conferenceswspeakers', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">Students' Conference Presentations</label>
                    <input class="form-control {{ $errors->has('studentsconferences') ? 'has-error' : ''}}" placeholder="0" id="studentsconferences" name="studentsconferences" type="text" value="{{ old('studentsconferences') }}">
                    {!! $errors->first('studentsconferences', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
                                    
            <!--   <div id="dynamic_employment_field">
                                    <div class="group-employment">
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="title">Name of Company</label>
                                                <input class="form-control employmentname" placeholder="CSI" name="employmentname[]" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="title">Position/Title</label>
                                                <input class="form-control position" placeholder="Software Engineer" id="position" name="position[]" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="salary" class="col-form-label">Salary <small>/Year Estimate</small></label>
                                                <select id="salary" class="form-control salary" name="salary[]">
                                                    <option value="" disabled selected>Choose A Range</option>
                                                    <option value="1" > &#x2268; $50,000 </option>
                                                    <option value="2" >$50,000 - $60,000</option>
                                                    <option value="3" >$60,000 - $70,000</option>
                                                    <option value="4" >$70,000 - $80,000</option>
                                                    <option value="5" > &#8808; $80,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="title">How did you find the job?</label>
                                                <input class="form-control how" placeholder="Job Fair, Internet, reference...." name="how[]" type="text" value="">
                                            </div>
                                        </div>
                                        <center>
                                            <button type="button" name="add-employment" id="add-employment" class="btn btn-success">Add More Employment</button>
                                        </center>
                                    </div>
                                </div>-->
        </div>
    </div>
    <!--External Funding-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">3.External Funding<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title"> External Proposals Submitted </label>
                    <input class="form-control {{ $errors->has('exfunding') ? 'has-error' : ''}}" placeholder="0" id="exfunding" name="exfunding" type="text" value="{{ old('exfunding') }}">
                    {!! $errors->first('exfunding', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">CUNY Proposals Submitted </label>
                    <input class="form-control {{ $errors->has('cunyfunding') ? 'has-error' : ''}}" placeholder="0" id="cunyfunding" name="cunyfunding" type="text" value="{{ old('cunyfunding') }}">
                    {!! $errors->first('cunyfunding', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title"> External New Grants awarded </label>
                    <input class="form-control {{ $errors->has('exgrants') ? 'has-error' : ''}}" placeholder="0" id="exgrants" name="exgrants" type="text" value="{{ old('exgrants') }}">
                    {!! $errors->first('exgrants', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">CUNY New Grants awarded </label>
                    <input class="form-control {{ $errors->has('cunygrants') ? 'has-error' : ''}}" placeholder="0" id="cunygrants" name="cunygrants" type="text" value="{{ old('cunygrants') }}">
                    {!! $errors->first('cunygrants', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-inline form-group col-md-6 ">
                    <label for="title"> External Total Amounts Awarded </label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input class="form-control {{ $errors->has('exawards') ? 'has-error' : ''}}" placeholder="0" id="exawards" name="exawards" type="text" value="{{ old('exawards') }}">
                        <div class="input-group-addon">.00</div>
                    </div>
                    {!! $errors->first('exawards', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-inline form-group col-md-6 ">
                    <label for="title">CUNY Total Amounts Awarded </label>
                    <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input class="form-control {{ $errors->has('cunyawards') ? 'has-error' : ''}}" placeholder="0" id="cunyawards" name="cunyawards" type="text" value="{{ old('cunyawards') }}">
                        <div class="input-group-addon">.00</div>
                    </div>
                    {!! $errors->first('cunyawards', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <!--Honors and Awards-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">3.Honors and Awards<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title"> Number of faculty nominated for Honors and Awards </label>
                    <input class="form-control {{ $errors->has('nominatedfaculty') ? 'has-error' : ''}}" placeholder="0" id="nominatedfaculty" name="nominatedfaculty" type="text" value="{{ old('nominatedfaculty') }}">
                    {!! $errors->first('nominatedfaculty', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title"> Number of Honors and Awards recieved </label>
                    <input class="form-control {{ $errors->has('honors') ? 'has-error' : ''}}" placeholder="0" id="honors" name="honors" type="text" value="{{ old('honors') }}">
                    {!! $errors->first('honors', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <!--<div id="dynamic_workshop_field">
                                    <div class="group-workshop">
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="title">Name of Workshop</label>
                                                <input class="form-control workshopname" placeholder="Software Engineer" name="workshopname[]" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 ">
                                                <label for="workshopDate" class="col-form-label">Semester</label>
                                                <select id="workshopDate" class="form-control workshopTimes" name="workshopDate[]">
                                                    <option value="" disabled selected>Choose A Semester</option>
                                                    <option value="1" > Fall 2016 </option>
                                                    <option value="2" > Spring 2016 </option>
                                                    <option value="3" > Fall 2017 </option>
                                                    <option value="4" > Spring 2017 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="button" name="add-workshop" id="add-workshop" class="btn btn-success">Add More Workshop</button>
                                        </center>
                                    </div>
                                </div>-->
        </div>
    </div>
    <!--Mentoring-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">4.Mentoring<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">PhD. students mentored </label>
                    <input class="form-control {{ $errors->has('phdmentored') ? 'has-error' : ''}}" placeholder="0" id="phdmentored" name="phdmentored" type="text" value="{{ old('phdmentored') }}">
                    {!! $errors->first('phdmentored', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">MS students mentored</label>
                    <input class="form-control {{ $errors->has('msmentored') ? 'has-error' : ''}}" placeholder="0" id="msmentored" name="msmentored" type="text" value="{{ old('msmentored') }}">
                    {!! $errors->first('msmentored', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Undergrad students mentored</label>
                    <input class="form-control {{ $errors->has('undergradmentored') ? 'has-error' : ''}}" placeholder="0" id="undergradmentored"   name="undergradmentored" type="text" value="{{ old('undergradmentored') }}">
                    {!! $errors->first('undergradmentored', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">Postdocs supervised</label>
                    <input class="form-control {{ $errors->has('postdocssupervised') ? 'has-error' : ''}}" placeholder="0" id="postdocssupervised" name="postdocssupervised" type="text" value="{{ old('postdocssupervised') }}">
                    {!! $errors->first('postdocssupervised', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="title">Defended Thesis</label>
                    <input class="form-control {{ $errors->has('thesis') ? 'has-error' : ''}}" placeholder="0" id="thesis" name="thesis" type="text" value="{{ old('thesis') }}">
                    {!! $errors->first('thesis', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group col-md-6 ">
                    <label for="title">Student Awards</label>
                    <input class="form-control {{ $errors->has('studentawards') ? 'has-error' : ''}}" placeholder="0" id="studentawards" name="studentawards" type="text" value="{{ old('studentawards') }}">
                    {!! $errors->first('studentawards', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">Specify Awards</label>
                    <input class="form-control {{ $errors->has('awards') ? 'has-error' : ''}}" placeholder="CSI, CUNY, state, national" id="awards" name="awards" type="text" value="{{  old('awards') }}">
                    {!! $errors->first('awards', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <!--Program Performances-->
    <div class="panel panel-default">
        <div class="panel-heading block-header">5.Program Performance<small id='required-sign'>(*)</small></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">BS Degrees awarded </label>
                    <input class="form-control {{ $errors->has('bsdegrees') ? 'has-error' : ''}}" placeholder="0" id="bsdegrees" name="bsdegrees" type="text" value="{{ old('bsdegrees') }}">
                    {!! $errors->first('bsdegrees', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">MS Degrees awarded</label>
                    <input class="form-control {{ $errors->has('msdegrees') ? 'has-error' : ''}}" placeholder="0" id="msdegrees" name="msdegrees" type="text" value="{{ old('msdegrees') }}">
                    {!! $errors->first('msdegrees', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="title">PhD Degrees awarded</label>
                    <input class="form-control {{ $errors->has('phddegrees') ? 'has-error' : ''}}" placeholder="0" id="phddegrees" name="phddegrees" type="text" value="{{ old('phddegrees') }}">
                    {!! $errors->first('phddegrees', '<p class="danger-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
   </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

        </div>
    </div>
</div>

@endsection