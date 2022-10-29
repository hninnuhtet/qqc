<?php

namespace App\Exports;

use App\Models\ExamHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection,WithHeadings
{
    private $qs_id;

    public function __construct($qs_id){
        $this->qs_id = $qs_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ExamHistory::where('qs_id', $this->qs_id)->get();

        $result = array();
        $count = 0;

        foreach($data as $item){
            $count += 1;
            $result[] = array(
                $count,
                $item->student->name,
                $item->full_mark,
                $item->score,
                $item->created_at,
                $item->question_sheet->title.' - '.$item->question_sheet->description
            );
        }

        return collect($result);
    }

    public function headings(): array
    {
       return [
         'No',
         'Studentame',
         'Full Mark',
         'Score',
         'Submitted at',
         'Question Sheet Info'
       ];
    }
}
