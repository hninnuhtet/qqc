<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\QuestionSheet;
use App\Models\Question;
use App\Models\Achoice;
use App\Models\Bchoice;
use App\Models\Cchoice;
use App\Models\Dchoice;
use App\Models\Answer;
use App\Models\StudentAnswer;
use App\Models\Student;
use App\Models\ExamHistory;
use App\Exports\ResultsExport;
use App\Mail\ExamResultMail;
use Excel;
use Mail;


class QuestionController extends Controller
{
    public function index(){
        $data = QuestionSheet::all();
        return view('admin.questions.index', ['data'=>$data]);
    }

    public function create(){
        return view('admin.questions.create');
    }

    public function store(Request $request){        
        $request->validate([            
            'qs_title'=>'required',            
            'qs_description'=>'required', 
            'qs_status'=>'required', 
            'qs_created_by'=>'required', 
            'qs_min'=>'required',
            'qs_sec'=>'required',
            'questions' =>'required',
            'a_choice' =>'required',
            'b_choice' =>'required',
            'c_choice' =>'required',
            'd_choice' =>'required',
            'answer' =>'required',
        ]);

        $qs_id = Str::uuid();
        QuestionSheet::create([
            'id' => $qs_id,
            'code' => 'testing' ,
            'title' => $request->qs_title,
            'description' => $request->qs_description,
            'status' => $request->qs_status,
            'allowed_time' => $request->qs_min .':'.$request->qs_sec,
            'created_by' => $request->qs_created_by,
        ]);

        foreach($request->questions as $key=>$value){
            $q_id = Str::uuid();
            Question::create([
                'id' => $q_id,
                'question' => $request->questions[$key],
                'qs_id' => $qs_id,
            ]);

            Achoice::create([
                'text' => $request->a_choice[$key],
                'q_id' => $q_id,
            ]);

            
            Bchoice::create([
                'text' => $request->b_choice[$key],
                'q_id' => $q_id,
            ]);

            Cchoice::create([
                'text' => $request->c_choice[$key],
                'q_id' => $q_id,
            ]);

            Dchoice::create([
                'text' => $request->d_choice[$key],
                'q_id' => $q_id,
            ]);

            Answer::create([
                'answer' => $request->answer[$key],
                'q_id' => $q_id,
            ]);
        }
        return redirect('admin/questions/create')->with('success', 'Data has been added.');
    }

    public function show($id){
        $sheet = QuestionSheet::find($id);
        $question = Question::where('qs_id', $id)->get();
        $answer = array();
        foreach($question as $key=>$value){
            $a[] = Achoice::where('q_id', $question[$key]->id)->get();
            $b[] = Bchoice::where('q_id', $question[$key]->id)->get();
            $c[] = Cchoice::where('q_id', $question[$key]->id)->get();
            $d[] = Dchoice::where('q_id', $question[$key]->id)->get();
            $answer[] = Answer::where('q_id', $question[$key]->id)->get();
        }
        return view('admin.questions.show', ['sheet'=>$sheet, 'question'=>$question, 'a'=>$a, 'b'=>$b, 'c'=>$c, 'd'=>$d, 'answer'=>$answer]);
    }

    public function edit($id){
        $sheet = QuestionSheet::find($id);
        $allowed_time = explode(":",$sheet->allowed_time);
        $question = Question::where('qs_id', $id)->get();
        $answer = array();
        foreach($question as $key=>$value){
            $a[] = Achoice::where('q_id', $question[$key]->id)->get();
            $b[] = Bchoice::where('q_id', $question[$key]->id)->get();
            $c[] = Cchoice::where('q_id', $question[$key]->id)->get();
            $d[] = Dchoice::where('q_id', $question[$key]->id)->get();
            $answer[] = Answer::where('q_id', $question[$key]->id)->get();
        }  
        return view('admin.questions.edit', ['sheet'=>$sheet, 'allowed_time'=>$allowed_time, 'question'=>$question, 'a'=>$a, 'b'=>$b, 'c'=>$c, 'd'=>$d, 'answer'=>$answer]);
    }

    public function update($qs_id, Request $request){
        $request->validate([            
            'qs_title'=>'required',            
            'qs_description'=>'required', 
            'qs_status'=>'required', 
            'qs_min'=>'required',
            'qs_sec'=>'required',
            'qs_created_by'=>'required', 
            'questions' =>'required',
            'a_choice' =>'required',
            'b_choice' =>'required',
            'c_choice' =>'required',
            'd_choice' =>'required',
            'answer' =>'required',
        ]);

        $qsheet = QuestionSheet::find($qs_id);
        $qsheet->code = 'testing';
        $qsheet->title =$request->qs_title;
        $qsheet->description = $request->qs_description;
        $qsheet->status = $request->qs_status;
        $qsheet->allowed_time = $request->qs_min .':'.$request->qs_sec;
        $qsheet->created_by = $request->qs_created_by;
        $qsheet->save();
        
        foreach($request->questions as $key=>$value){
            if($request->q_id[$key] === null){
                $q_id = Str::uuid();
                Question::create([
                    'id' => $q_id,
                    'question' => $request->questions[$key],
                    'qs_id' => $qs_id,
                ]); 

                Achoice::create([
                    'text' => $request->a_choice[$key],
                    'q_id' => $q_id,
                ]);

                Bchoice::create([
                    'text' => $request->b_choice[$key],
                    'q_id' => $q_id,
                ]);
    
                Cchoice::create([
                    'text' => $request->c_choice[$key],
                    'q_id' => $q_id,
                ]);
    
                Dchoice::create([
                    'text' => $request->d_choice[$key],
                    'q_id' => $q_id,
                ]);
    
                Answer::create([
                    'answer' => $request->answer[$key],
                    'q_id' => $q_id,
                ]);
            }else{                
                Question::where('id', $request->q_id[$key])->update([
                    'question' => $request->questions[$key],
                ]);

                Achoice::where('q_id',$request->q_id[$key])->update([
                    'text' => $request->a_choice[$key],
                ]);

                Bchoice::where('q_id',$request->q_id[$key])->update([
                    'text' => $request->b_choice[$key],
                ]);

                Cchoice::where('q_id',$request->q_id[$key])->update([
                    'text' => $request->c_choice[$key],
                ]);

                Dchoice::where('q_id',$request->q_id[$key])->update([
                    'text' => $request->d_choice[$key],
                ]);

                Answer::where('q_id',$request->q_id[$key])->update([
                    'answer' => $request->answer[$key],
                ]);
            }                     
        }
        return redirect()->route('admin.questions.index')->with('success', 'Data has been updated.');
    }

    public function destroy($id){
        QuestionSheet::where('id',$id)->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Data has been deleted.');    
    }

    public function deletequestion(Request $request){
        Question::where('id',$request->id)->delete();
        return response()->json([
            'success' => 'Deleted successfully!'
        ]);
     }

     public function changeStatus(Request $request){
        QuestionSheet::where('id', $request->qs_id)->update([
            'status' => $request->status,
        ]);
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function result($id){
        $result = ExamHistory::where('qs_id', $id)->get();
        return view('admin.questions.result', ['result'=>$result, 'qs_id'=>$id]);
    }

    public function showQuestionLogin(Request $request){
        $qs_id = last($request->segments());
        return view('students.login', ['qs_id'=>$qs_id]);
    }

    public function handleAnswers(Request $request, $qs_id){
        $studentID = Student::where('email', $request->email)->where('password', $request->accessCode)->first('id')->id;
        $alreadyTook = ExamHistory::where('student_id', $studentID)->where('qs_id', $qs_id)->exists();

        if(!$alreadyTook){
            $questionIDs = Question::where('qs_id',$qs_id)->get('id');
            $full_mark = count($questionIDs);
            $score = 0;

            foreach($questionIDs as $each){
                                
                $answer = $request[$each->id];
                $questionExisted = StudentAnswer::where('q_id', $each->id)->where('student_id', $studentID)->exists();

                // Score calculation
                $rightAnswer = Answer::where('q_id', $each->id)->first()->answer;                
                if($rightAnswer == $answer){
                    $score += 1;                    
                }                
                            
                if(!$questionExisted){
                    StudentAnswer::create([
                        'student_id'=> $studentID,
                        'q_id'=> $each->id,
                        'answer'=> $answer
                    ]);
                }else{
                    return abort(404);
                }                             
            }

            ExamHistory::create([
                'student_id'=> $studentID,
                'qs_id'=> $qs_id,
                'full_mark'=> $full_mark,
                'score'=>$score
            ]);
        }else{
            return redirect()->route('question.showQuestionLogin',  ['qs_id'=>$qs_id])->with('errorMessage', 'You Already took this exam!');
            // return view('students.login', ['qs_id'=>$qs_id])->with('errorMessage', 'You Already took this exam!');
        }
        return redirect()->route('question.showQuestionLogin',  ['qs_id'=>$qs_id])->with('successMessage', 'Success!');
        // return redirect('students.login', ['qs_id'=>$qs_id])->with('successMessage', 'Success!');
    }

    public function examHistory(){
        $data = ExamHistory::all();
        return view('admin.examHistory', ['data'=>$data]);
    }

    public function export($qs_id){
        return Excel::download(new ResultsExport($qs_id), 'result.xlsx');
    }

    public function sendMail($qs_id){
        $data = ExamHistory::where('qs_id', $qs_id)->get();

        foreach($data as $item){
            $mailData = $item;          
            Mail::to($mailData->student->email)->send(new ExamResultMail($mailData));
        }
        return redirect()->back()->with('success', 'Send Mail Successfully!');
    }
}