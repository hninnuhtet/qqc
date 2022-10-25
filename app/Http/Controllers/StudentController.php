<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\QuestionSheet;
use App\Models\Question;
use App\Models\Achoice;
use App\Models\Bchoice;
use App\Models\Cchoice;
use App\Models\Dchoice;
use App\Models\ExamHistory;

use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Student::all();
        return view('admin.students.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accessCode = $this->generateRandomCode(10);

        return view ('admin.students.create', ['accessCode' => $accessCode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.students.create')->with('success', 'Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::find($id);
        return view('admin.students.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return view('admin.students.edit', ['data'=>$data]);
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        Student::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Data has been updated.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id',$id)->delete();
        return redirect()->route('admin.students.index')->with('success', 'Data has been deleted.');   
    }

    private function generateRandomCode($length_of_string)
    {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
     
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),0, $length_of_string);
    }


    public function validateAccessCode(Request $request, $qs_id){
        $email = $request->email;
        $accessCode = $request->password;
        
        $validStudent = Student::where('email', $email)->where('password', $accessCode)->exists();

        if($validStudent){
            $studentID = Student::where('email', $email)->where('password', $accessCode)->first('id')->id;

            $alreadyTook = ExamHistory::where('student_id', $studentID)->exists();
            if($alreadyTook){
                return view('students.login', ['qs_id'=>$qs_id])->with('errorMessage', 'You Already took this exam!');
            }

            $sheet = QuestionSheet::find($qs_id);
            $question = Question::where('qs_id', $qs_id)->get();
            $answer = array();
            foreach($question as $each){
                $a[] = Achoice::where('q_id', $each->id)->get();
                $b[] = Bchoice::where('q_id', $each->id)->get();
                $c[] = Cchoice::where('q_id', $each->id)->get();
                $d[] = Dchoice::where('q_id', $each->id)->get();
            }
            $data = [
                'sheet'=>$sheet, 
                'question'=>$question, 
                'a'=>$a, 'b'=>$b, 'c'=>$c, 'd'=>$d, 
                'email'=>$email,
                'accessCode'=>$accessCode];

            return view('students.question', $data);
        }else{
            return abort(403);
        }

    }
}
