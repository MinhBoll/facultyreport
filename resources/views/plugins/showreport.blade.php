@extends(admin)
@section(report)
<div class="col-md-8 report-main">         
            <div class="row">
                <div clas="col-md-6">
                    <button onclick='printReport("official-report")'>Print Report</button>
                </div>
            </div>
            <div class="row" id='official-report'>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <col width="auto">
                        <col width="400">
                        <col width="400">
                        <tr>
                            <th class="dept-name" colspan="2"><strong>Department:</strong> Computer Science</th>
                            <th>
                                <strong> Year: </strong> 2017
                            </th>
                        </tr>
                        <tr>
                            <th>Publications</th>
                            <th>REFEREED PAPERS</th>
                            <th>STUDENT CO-AUTHORS</th>
                        </tr>
                        <tr>
                            <td class="menu">Total # Refereed Papers <small>Indicate # with student coauthors</small></td>
                            <td class="data">
                                {{$prefered_papers}}
                            </td>
                            <td class="data">
                                {{$prefered_papers_wstudents}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Total # Non-refereed papers</td>
                            <td class="data" colspan="2">
                                {{$nonprefered_papers}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Books</td>
                            <td class="data">
                                {{$books}}
                            </td>
                            <td class="data">
                                {{$books}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Book Chapters</td>
                            <td class="data" colspan="2">
                                {{$book_chapters}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Submitted Manuscripts</td>
                            <td class="data" colspan="2">
                                {{$manuscripts}}
                            </td>
                        </tr>
                        <!--conferences-->
                        <tr>
                            <th>Presentations/Conferences</th>
                            <th></th>
                            <th>INVITED SPEAKER</th>
                        </tr>
                        <tr>
                            <td class="menu">Conference Presentations. Specify if invited speaker (I)</td>
                            <td class="data">
                                {{$conferences}}
                            </td>
                            <td class="data">
                                {{$conferences_wspeaker}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Students' Conference Presentations </td>
                            <td class="data" colspan="2">
                                {{$student_conferences}}
                            </td>
                        </tr>
                        <!--Funding-->
                        <tr>
                            <th>External Funding</th>
                            <th>EXTERNAL</th>
                            <th>CUNY</th>
                        </tr>
                        <tr>
                            <td class="menu">Proposals Submitted <small>(Specify #external grant proposals and # of CUNY grant proposals)</small></td>
                            <td class="data">
                                {{$external_proposals}}
                            </td>
                            <td class="data">
                                {{$cuny_proposals}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">New Grants awarded <small>(Specify # external grants and # of CUNY grants)</small></td>
                            <td class="data" >
                                {{$external_grant_awarded}}
                            </td>
                            <td class="data" >
                                {{$cuny_grant_awarded}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Total Amounts Awarded <small>(Specify amount of external grants and amount of CUNY grants)</small></td>
                            <td class="data" >
                                $ {{ number_format($extotal_amount_awarded, 2, '.', ',') }}
                            </td>
                            <td class="data" >
                                $ {{ number_format($cunytotal_amount_awarded, 2, '.', ',') }}
                            </td>
                        </tr>
                        <!-- honnor -->
                        <tr>
                            <th>Honors and Awards</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <td class="menu">Number of faculty nominated for Honors and Awards</td>
                            <td class="data" colspan="2">
                                {{$nbr_faculty_nominated}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Number of Honors and Awards recieved</td>
                            <td class="data" colspan="2">
                                {{$honors_awards}}
                            </td>
                        </tr>
                        <!-- Mentoring-->
                        <tr>
                            <th>Mentoring</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <td class="menu">PhD. students mentored</td>
                            <td class="data" colspan="2">
                                {{$phd_students_mentored}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">MS students mentored</td>
                            <td class="data" colspan="2">
                                {{$ms_students_mentored}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Undergrad students mentored</td>
                            <td class="data" colspan="2">
                                {{$undergrad_students_mentored}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Postdocs supervised</td>
                            <td class="data" colspan="2">
                                {{$postdocs_supervised}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Defended Thesis</td>
                            <td class="data" colspan="2">
                                {{$defense}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">Student Awards</td>
                            <td class="data" >
                                {{$student_awards}}
                            </td>
                            <td class="data">CSI, CUNY</td>
                        </tr>
                        <!-- Performance -->
                        <tr>
                            <th>Program Performance</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <td class="menu">BS Degrees awarded <small>(specify program)</small></td>
                            <td class="data" colspan="2">
                                {{$bs_awarded}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">MS Degrees awarded <small>(specify program)</small></td>
                            <td class="data" colspan="2">
                                {{$ms_awarded}}
                            </td>
                        </tr>
                        <tr>
                            <td class="menu">PhD Degrees awarded <small>(specify program)</small></td>
                            <td class="data" colspan="2">
                                {{$phd_awarded}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
          <!--nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav-->

        </div><!-- /.report-main -->

        <div class="col-sm-3 col-sm-offset-1 report-sidebar">
          <div class="sidebar-module">
            <h4>Retrieving Reports For Each Year</h4>
            <ol class="list-unstyled">
                @foreach($academic_year as $year)
                <li><a href="{{$year->year}}">{{$year->year}}</a></li>
                @endforeach
            </ol>
          </div>
        </div><!-- /.report-sidebar -->
@endsection