<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Report;
use App\User;
use App\Faculty;
use App\Award;
use DB;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$depts = Department::select('dept_name')->join
        $dept_id = Auth::user()->department;
        $report_count = Report::where('department',$dept_id)->count();
        $faculty_count = Faculty::where('deptId',$dept_id)->count();
        
        $department = Department::select('dept_name')->where('id',$dept_id)->get();
        $academic_year = Report::distinct()->where('department',$dept_id)->get(['year']);        
        
        /*$prefered_papers = Report::select()->where([['year', $value],['department', 1]])->sum('total_prefered_papers');
        
        $prefered_papers_wstudents = Report::select()->where([['year', $value],['department', 1]])->sum('total_prefered_papers_wstudents');
        
        $nonprefered_papers = Report::select()->where([['year', $value],['department', 1]])->sum('total_nonprefered_papers');
        
        $books = Report::select()->where([['year', $value],['department', 1]])->sum('books');
        
        $book_chapters = Report::select()->where([['year', $value],['department', 1]])->sum('book_chapters');
        
        $manuscripts = Report::select()->where([['year', $value],['department', 1]])->sum('manuscripts');
        
        $conferences = Report::select()->where([['year', $value],['department', 1]])->sum('conferences');
        
        $conferences_wspeaker = Report::select()->where([['year', $value],['department', 1]])->sum('conferences_wspeaker');
        
        $student_conferences = Report::select()->where([['year', $value],['department', 1]])->sum('student_conferences');
        
        $external_proposals = Report::select()->where([['year', $value],['department', 1]])->sum('external_proposals');
        
        $cuny_proposals = Report::select()->where([['year', $value],['department', 1]])->sum('cuny_proposals');
        
        $external_grant_awarded = Report::select()->where([['year', $value],['department', 1]])->sum('external_grant_awarded');
        
        $cuny_grant_awarded = Report::select()->where([['year', $value],['department', 1]])->sum('cuny_grant_awarded');
        
        $extotal_amount_awarded = Report::select()->where([['year', $value],['department', 1]])->sum('extotal_amount_awarded');
        
        $cunytotal_amount_awarded = Report::select()->where([['year', $value],['department', 1]])->sum('cunytotal_amount_awarded');
        
        $nbr_faculty_nominated = Report::select()->where([['year', $value],['department', 1]])->sum('nbr_faculty_nominated');
        
        $honors_awards = Report::select()->where([['year', $value],['department', 1]])->sum('honors_awards');
        
        $phd_students_mentored = Report::select()->where([['year', $value],['department', 1]])->sum('phd_students_mentored');
    
        $ms_students_mentored = Report::select()->where([['year', $value],['department', 1]])->sum('ms_students_mentored');
        
        $undergrad_students_mentored = Report::select()->where([['year', $value],['department', 1]])->sum('undergrad_students_mentored');
        
        $postdocs_supervised = Report::select()->where([['year', $value],['department', 1]])->sum('postdocs_supervised');
        
        $defense = Report::select()->where([['year', $value],['department', 1]])->sum('defense');
        
        $student_awards = Report::select()->where([['year', $value],['department', 1]])->sum('student_awards');
        
        //$awards = Report::select('awards')->where([['year', $value],['department', 1]])->sum('a');
        
        $bs_awarded = Report::select('awards')->where([['year', $value],['department', 1]])->sum('bs_awarded');
        
        $ms_awarded = Report::select('awards')->where([['year', $value],['department', 1]])->sum('bs_awarded');
        
        $phd_awarded = Report::select('awards')->where([['year', $value],['department', 1]])->sum('bs_awarded');*/
        
        $data = [
            'academic_year' => $academic_year,
            'report_count' => $report_count,
            'faculty_count' => $faculty_count,
            'department' => $department,
        ];
        
        
        return view('admin')->with($data);//'report_count', $report_count);
    }
    
    public function fetch(Request $request)
    {
        $dept_id = Auth::user()->department;
        $department = Department::select('dept_name')->where('id',$dept_id)->get();
        
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $prefered_papers = Report::select()->where([['year', $value],['department', $dept_id]])->sum('total_prefered_papers');
        
        $prefered_papers_wstudents = Report::select()->where([['year', $value],['department', $dept_id]])->sum('total_prefered_papers_wstudents');
        
        $nonprefered_papers = Report::select()->where([['year', $value],['department', $dept_id]])->sum('total_nonprefered_papers');
        
        $books = Report::select()->where([['year', $value],['department', $dept_id]])->sum('books');
        
        $book_chapters = Report::select()->where([['year', $value],['department', $dept_id]])->sum('book_chapters');
        
        $manuscripts = Report::select()->where([['year', $value],['department', $dept_id]])->sum('manuscripts');
        
        $conferences = Report::select()->where([['year', $value],['department', $dept_id]])->sum('conferences');
        
        $conferences_wspeaker = Report::select()->where([['year', $value],['department', $dept_id]])->sum('conferences_wspeaker');
        
        $student_conferences = Report::select()->where([['year', $value],['department', $dept_id]])->sum('student_conferences');
        
        $external_proposals = Report::select()->where([['year', $value],['department', $dept_id]])->sum('external_proposals');
        
        $cuny_proposals = Report::select()->where([['year', $value],['department', $dept_id]])->sum('cuny_proposals');
        
        $external_grant_awarded = Report::select()->where([['year', $value],['department', $dept_id]])->sum('external_grant_awarded');
        
        $cuny_grant_awarded = Report::select()->where([['year', $value],['department', $dept_id]])->sum('cuny_grant_awarded');
        
        $extotal_amount_awarded = Report::select()->where([['year', $value],['department', $dept_id]])->sum('extotal_amount_awarded');
        
        $cunytotal_amount_awarded = Report::select()->where([['year', $value],['department', $dept_id]])->sum('cunytotal_amount_awarded');
        
        $nbr_faculty_nominated = Report::select()->where([['year', $value],['department', $dept_id]])->sum('nbr_faculty_nominated');
        
        $honors_awards = Report::select()->where([['year', $value],['department', $dept_id]])->sum('honors_awards');
        
        $phd_students_mentored = Report::select()->where([['year', $value],['department', $dept_id]])->sum('phd_students_mentored');
    
        $ms_students_mentored = Report::select()->where([['year', $value],['department', $dept_id]])->sum('ms_students_mentored');
        
        $undergrad_students_mentored = Report::select()->where([['year', $value],['department', $dept_id]])->sum('undergrad_students_mentored');
        
        $postdocs_supervised = Report::select()->where([['year', $value],['department', $dept_id]])->sum('postdocs_supervised');
        
        $defense = Report::select()->where([['year', $value],['department', $dept_id]])->sum('defense');
        
        $student_awards = Report::select()->where([['year', $value],['department', $dept_id]])->sum('student_awards');
        
        $awards = Award::distinct()->select('award_name')->join('faculties','faclId','emplid')->join('reports','faclId','faculty_id')->where([['year', $value],['deptId', $dept_id]])->pluck('award_name');
        
        $bs_awarded = Report::select('awards')->where([['year', $value],['department', $dept_id]])->sum('bs_awarded');
        
        $ms_awarded = Report::select('awards')->where([['year', $value],['department', $dept_id]])->sum('bs_awarded');
        
        $phd_awarded = Report::select('awards')->where([['year', $value],['department', $dept_id]])->sum('bs_awarded');
        
        $data2 = [
            'value' => $value,
            'prefered_papers' => $prefered_papers,
            'prefered_papers_wstudents' => $prefered_papers_wstudents,
            'nonprefered_papers' => $nonprefered_papers,
            'books' => $books,
            'book_chapters' => $book_chapters,
            'manuscripts' => $manuscripts,
            'conferences' => $conferences,
            'conferences_wspeaker' => $conferences_wspeaker,
            'student_conferences' => $student_conferences,
            'external_proposals' => $external_proposals,
            'cuny_proposals' => $cuny_proposals,
            'external_grant_awarded' => $external_grant_awarded,
            'cuny_grant_awarded' => $cuny_grant_awarded,
            'extotal_amount_awarded' => $extotal_amount_awarded,
            'cunytotal_amount_awarded' => $cunytotal_amount_awarded,
            'nbr_faculty_nominated' => $nbr_faculty_nominated,
            'honors_awards' => $honors_awards,
            'phd_students_mentored' => $phd_students_mentored,
            'ms_students_mentored' => $ms_students_mentored,
            'undergrad_students_mentored' => $undergrad_students_mentored,
            'postdocs_supervised' => $postdocs_supervised,
            'defense' => $defense,
            'student_awards' => $student_awards,
            //$awards = Report::select('awards')->where([['year', $value],['department', 1]])->sum('a');
            'bs_awarded' => $bs_awarded,
            'ms_awarded' => $ms_awarded,
            'phd_awarded' => $phd_awarded,
        ];
        
        $output = "
            <div class='row' id='official-report'>
                <div class='table-responsive'>
                    <table class='table table-bordered'>
                        <col width='auto'>
                        <col width='400'>
                        <col width='400'>
                        <tr>
                            <th class='dept-name' colspan='2'><strong>Department:</strong> ".$department[0]->dept_name."</th>
                            <th>
                                <strong> Year: </strong> ".$value."
                            </th>
                        </tr>
                         <tr>
                            <th>Publications</th>
                            <th>REFEREED PAPERS</th>
                            <th>STUDENT CO-AUTHORS</th>
                        </tr>
                        <tr>
                            <td class='menu'>Total # Refereed Papers <small>Indicate # with student coauthors</small></td>
                            <td class='data'>
                                ".$prefered_papers."
                            </td>
                            <td class='data'>
                                ".$prefered_papers_wstudents."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Total # Non-refereed papers</td>
                            <td class='data' colspan='2'>
                                ".$nonprefered_papers."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Books</td>
                            <td class='data'>
                                ".$books."
                            </td>
                            <td class='data'>
                                ".$books."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Book Chapters</td>
                            <td class='data' colspan='2'>
                                ".$book_chapters."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Submitted Manuscripts</td>
                            <td class='data' colspan='2'>
                                ".$manuscripts."
                            </td>
                        </tr>
                        <!--conferences-->
                        <tr>
                            <th>Presentations/Conferences</th>
                            <th></th>
                            <th>INVITED SPEAKER</th>
                        </tr>
                        <tr>
                            <td class='menu'>Conference Presentations. Specify if invited speaker (I)</td>
                            <td class='data'>
                                ".$conferences."
                            </td>
                            <td class='data'>
                                ".$conferences_wspeaker." 
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Students' Conference Presentations </td>
                            <td class='data' colspan='2'>
                                ".$student_conferences."
                            </td>
                        </tr>
                        <!--Funding-->
                        <tr>
                            <th>External Funding</th>
                            <th>EXTERNAL</th>
                            <th>CUNY</th>
                        </tr>
                        <tr>
                            <td class='menu'>Proposals Submitted <small>(Specify #external grant proposals and # of CUNY grant proposals)</small></td>
                            <td class='data'>
                                ".$external_proposals."
                            </td>
                            <td class='data'>
                                ".$cuny_proposals."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>New Grants awarded <small>(Specify # external grants and # of CUNY grants)</small></td>
                            <td class='data'>
                                ".$external_grant_awarded."
                            </td>
                            <td class='data' >
                                ".$cuny_grant_awarded."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Total Amounts Awarded <small>(Specify amount of external grants and amount of CUNY grants)</small></td>
                            <td class='data' >
                                $ ".number_format($extotal_amount_awarded, 2, '.', ',')."
                            </td>
                            <td class='data'>
                                $ ".number_format($cunytotal_amount_awarded, 2, '.', ',')."
                            </td>
                        </tr>
                        <!-- honnor -->
                        <tr>
                            <th>Honors and Awards</th>
                            <th colspan='2'></th>
                        </tr>
                        <tr>
                            <td class='menu'>Number of faculty nominated for Honors and Awards</td>
                            <td class='data' colspan='2'>
                                ".$nbr_faculty_nominated."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Number of Honors and Awards recieved</td>
                            <td class='data' colspan='2'>
                                ".$honors_awards."
                            </td>
                        </tr>
                        <!-- Mentoring-->
                        <tr>
                            <th>Mentoring</th>
                            <th colspan='2'></th>
                        </tr>
                        <tr>
                            <td class='menu'>PhD. students mentored</td>
                            <td class='data' colspan='2'>
                                ".$phd_students_mentored."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>MS students mentored</td>
                            <td class='data' colspan='2'>
                                ".$ms_students_mentored."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Undergrad students mentored</td>
                            <td class='data' colspan='2'>
                                ".$undergrad_students_mentored."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Postdocs supervised</td>
                            <td class='data' colspan='2'>
                                ".$postdocs_supervised."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Defended Thesis</td>
                            <td class='data' colspan='2'>
                                ".$defense."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>Student Awards</td>
                            <td class='data'>
                                ".$student_awards."
                            </td>
                            <td class='data'>
                            ".$awards."</td>
                        </tr>
                        <!-- Performance -->
                        <tr>
                            <th>Program Performance</th>
                            <th colspan='2'></th>
                        </tr>
                        <tr>
                            <td class='menu'>BS Degrees awarded <small>(specify program)</small></td>
                            <td class='data' colspan='2'>
                                ".$bs_awarded."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>MS Degrees awarded <small>(specify program)</small></td>
                            <td class='data' colspan='2'>
                                ".$ms_awarded."
                            </td>
                        </tr>
                        <tr>
                            <td class='menu'>PhD Degrees awarded <small>(specify program)</small></td>
                            <td class='data' colspan='2'>
                                ".$phd_awarded."
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        ";
        return $output;
    }
    /*protected function authenticated($request, $user)
    {
        if($user->department === '1') {
            return redirect()->intended('/admin-computer-science');
        }

        return redirect()->intended('/path_for_normal_user');
    }*/
}
