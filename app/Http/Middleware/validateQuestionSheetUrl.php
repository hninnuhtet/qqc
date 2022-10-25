<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\QuestionSheet;
class validateQuestionSheetUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $question_sheet_id = last($request->segments());
        $isValidated = QuestionSheet::where('id', $question_sheet_id)->exists();
        if(!$isValidated){
            return abort(403);
        }
        return $next($request);
    }
}
