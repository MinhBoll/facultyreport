<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Faculty;
use App\Report;
use App\Book;
use App\Award;
use DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts = Department::all();
        return view('form.report')->with('depts', $depts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'profname' => 'required',
             'facultyid' => 'required|numeric',
            'dept' => 'required',
             'year' => 'required',            
        ]);
        //$empty = is_empty($abstract);
        //report
        
        $facultyId = uniqid('csi');
        
        $report = new Report();
        $report->faculty_id = $facultyId;
        $report->department = $request->input('dept');
        $report->total_prefered_papers = $request->input('referedpapers') ?: 0;
        $report->total_prefered_papers_wstudents = $request->input('referedpaperswstudents') ?: 0;
        $report->total_nonprefered_papers = $request->input('nonreferedpapers') ?: 0;
        $report->books = $request->input('books') ?: 0;
        $report->book_chapters = $request->input('bookchapters') ?: 0;
        $report->manuscripts = $request->input('manuscripts') ?: 0;
        $report->conferences = $request->input('conferences') ?: 0;
        $report->conferences_wspeaker = $request->input('conferenceswspeakers') ?: 0;
        $report->student_conferences = $request->input('studentsconferences') ?: 0;
        $report->external_proposals = $request->input('exfunding') ?: 0;
        $report->cuny_proposals = $request->input('cunyfunding') ?: 0;
        $report->external_grant_awarded = $request->input('exgrants') ?: 0;
        $report->cuny_grant_awarded = $request->input('cunygrants') ?: 0;
        $report->extotal_amount_awarded = $request->input('exawards') ?: 0;
        $report->cunytotal_amount_awarded = $request->input('cunyawards') ?: 0;
        $report->nbr_faculty_nominated = $request->input('nominatedfaculty') ?: 0;
        $report->honors_awards = $request->input('honors') ?: 0;
        $report->phd_students_mentored = $request->input('phdmentored') ?: 0;
        $report->ms_students_mentored = $request->input('msmentored') ?: 0;
        $report->undergrad_students_mentored = $request->input('undergradmentored') ?: 0;
        $report->postdocs_supervised = $request->input('postdocssupervised') ?: 0;
        $report->defense = $request->input('thesis') ?: 0;
        $report->student_awards = $request->input('studentawards') ?: 0;
        $report->bs_awarded = $request->input('bsdegrees') ?: 0;
        $report->ms_awarded = $request->input('msdegrees') ?: 0;
        $report->phd_awarded = $request->input('phddegrees') ?: 0;
        $report->year = $request->input('year') ?: 0;
        
        $report->save();
        
        
        /*if($request->input('books') > 0 && $request->input('booktitle')[0] != ''){
            $book = new Book();
            $books = $request->input('booktitle');
            $abstracts = $request->input('abstract');
            foreach($books as $key => $val){
                $book->faclId = $request->input('facultyid');
                $book->title = $books[$key];
                $book->abstracts = $abstracts[$key];
                $book->save();
            }
        }*/
        
        //$book->faclId = $request->input('')
        /*if($request->input('studentawards')>0 && $request->input('awards') != ''){
            $awardArr = array_map('trim', explode(",",$request->input('awards')));
            $award = new Award();
            foreach($awardArr as $award){
                $award->award_name = $award;
                $award->faclId = $request->input('facultyid');
                $award->save();
            }
        }*/
        if($request->input('studentawards')>0 && $request->input('awards') != ''){
            $award = new Award();
            $award->award_name = $request->input('awards');
            $award->faclId = $facultyId;;
            $award->save();
        }
        $faculty_name = strtolower($request->input('profname'));
        $faculty_count = Faculty::where([['emplid', $facultyId], ['name', $faculty_name]])->count();
            if($faculty_count < 1){
                $faculty = new Faculty();
                $faculty->emplid = $facultyId;;
                $faculty->name = $request->input('profname');
                $faculty->deptId = $request->input('dept');
                $faculty->save();
            }
        return redirect('/report')->with('success', 'You have submitted the report successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
