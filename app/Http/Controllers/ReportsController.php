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
            'referedpapers' => 'required|numeric',
            'referedpaperswstudents' => 'required|numeric',
            'nonreferedpapers' => 'required|numeric',
            'books' => 'required|numeric',
            'bookchapters' => 'required|numeric',
            'manuscripts' => 'required|numeric',
             'booktitle' => 'nullable',
             'abstract' => 'nullable',
            'conferences' => 'required|numeric',
            'conferenceswspeakers' => 'required|numeric',
            'studentsconferences' => 'required|numeric',
            'exfunding' => 'required|numeric',
            'cunyfunding' => 'required|numeric',
            'exgrants' => 'required|numeric',
            'cunygrants' => 'required|numeric',
            'exawards' => 'required|numeric',
            'cunyawards' => 'required|numeric',
            'nominatedfaculty' => 'required|numeric',
            'honors' => 'required|numeric',
            'phdmentored' => 'required|numeric',
            'msmentored' => 'required|numeric',
            'undergradmentored' => 'required|numeric',
            'postdocssupervised' => 'required|numeric',
            'thesis' => 'required|numeric',
            'studentawards' => 'required|numeric',
            'awards' => 'required',
            'bsdegrees' => 'required|numeric',
            'msdegrees' => 'required|numeric',
            'phddegrees' => 'required|numeric',
            
        ]);
        //$empty = is_empty($abstract);
            
        
        //report
        $report = new Report();
        $report->faculty_id = $request->input('facultyid');
        $report->department = $request->input('dept');
        $report->total_prefered_papers = $request->input('referedpapers');
        $report->total_prefered_papers_wstudents = $request->input('referedpaperswstudents');
        $report->total_nonprefered_papers = $request->input('nonreferedpapers');
        $report->books = $request->input('books');
        $report->book_chapters = $request->input('bookchapters');
        $report->manuscripts = $request->input('manuscripts');
        $report->conferences = $request->input('conferences');
        $report->conferences_wspeaker = $request->input('conferenceswspeakers');
        $report->student_conferences = $request->input('studentsconferences');
        $report->external_proposals = $request->input('exfunding');
        $report->cuny_proposals = $request->input('cunyfunding');
        $report->external_grant_awarded = $request->input('exgrants');
        $report->cuny_grant_awarded = $request->input('cunygrants');
        $report->extotal_amount_awarded = $request->input('exawards');
        $report->cunytotal_amount_awarded = $request->input('cunyawards');
        $report->nbr_faculty_nominated = $request->input('nominatedfaculty');
        $report->honors_awards = $request->input('honors');
        $report->phd_students_mentored = $request->input('phdmentored');
        $report->ms_students_mentored = $request->input('msmentored');
        $report->undergrad_students_mentored = $request->input('undergradmentored');
        $report->postdocs_supervised = $request->input('postdocssupervised');
        $report->defense = $request->input('thesis');
        $report->student_awards = $request->input('studentawards');
        $report->awards = $request->input('awards');
        $report->bs_awarded = $request->input('bsdegrees');
        $report->ms_awarded = $request->input('msdegrees');
        $report->phd_awarded = $request->input('phddegrees');
        $report->year = $request->input('year');
        
        $report->save();
        
        
        if($request->input('books') > 0 && $request->input('booktitle')[0] != ''){
            $book = new Book();
            $books = $request->input('booktitle');
            $abstracts = $request->input('abstract');
            foreach($books as $key => $val){
                $book->faclId = $request->input('facultyid');
                $book->title = $books[$key];
                $book->abstracts = $abstracts[$key];
                $book->save();
            }
        }
        
        //$book->faclId = $request->input('')
        if($request->input('studentawards')>0 && $request->input('awards') != ''){
            $award = new Award();
            $award->award_name = $request->input('awards');
            $award->faclID = $request->input('facultyid');
            $award->save();
        }
        
        $faculty_count = Faculty::where('emplid', $request->input('facultyid'))->count();
            if($faculty_count < 1){
                $faculty = new Faculty();
                $faculty->emplid = $request->input('facultyid');
                $faculty->name = $request->input('profname');
                $faculty->deptId = $request->input('dept');
                $faculty->save();
            }
        
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
