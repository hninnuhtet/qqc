<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Test School</title>
</head>
<body>
    <h1>Mail from Test School</h1>
    <p>Informing the result of Exam you answered......</p>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Question Info</th>
                <th>Full Mark</th>
                <th>Score</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$mailData->student->name}}</td>
                <td>{{$mailData->question_sheet->title.' - '.$mailData->question_sheet->description}}</td>
                <td>{{$mailData->full_mark}}</td>
                <td>{{$mailData->score}}</td>
                <td>{{$mailData->created_at}}</td>
            </tr>
        </tbody>
    </table>
  
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
     
    <p>Thank you</p>
</body>
</html>