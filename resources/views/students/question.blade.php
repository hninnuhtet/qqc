<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Questions</title>
        <style>
            html {
                box-sizing: border-box;
            }
            *,
            *:before,
            *:after {
                box-sizing: inherit;
            }

            body {
                font-family: sans-serif;
                padding: 1rem;
            }

            .quiz,
            .choices {
                list-style-type: none;
                padding: 0;
            }

            .choices li {
                margin-bottom: 5px;
            }

            .choices label {
                display: flex;
                align-items: center;
            }

            .choices label,
            input[type="checkbox"] {
                cursor: pointer;
            }

            input[type="checkbox"] {
                margin-right: 8px;
            }

            .view-results {
                padding: 1rem;
                cursor: pointer;
                font-size: inherit;
                color: white;
                background: teal;
                border-radius: 8px;
                margin-right: 5px;
            }

            .my-results {
                padding: 1rem;
                border: 1px solid goldenrod;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="time">Time left >> <span id="timer">{{$sheet->allowed_time}}</span></div>
        </center>
        <form action="{{ route('question.handleAnswers', ['qs_id'=>$sheet->id]) }}" method="post" id="form">
            @csrf
            <input type="text" hidden name="email" value="{{ $email }}">
            <input type="text" hidden name="accessCode" value="{{ $accessCode }}">
            <ul class="quiz">
                @if($question) @foreach($question as $key=>$value)
                <li>
                    <h4>{{$question[$key]->question}}</h4>
                    <ul class="choices">
                        <li>
                            <label>
                                <input
                                    type="checkbox"
                                    onclick="onlyOne(this, '{{$question[$key]->id}}')"
                                    name="{{$question[$key]->id}}" value="A"
                                />
                                <span>{{$a[$key][0]->text}}</span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input
                                    type="checkbox"
                                    onclick="onlyOne(this, '{{$question[$key]->id}}')"
                                    name="{{$question[$key]->id}}" value="B"
                                />
                                <span>{{$b[$key][0]->text}}</span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input
                                    type="checkbox"
                                    onclick="onlyOne(this, '{{$question[$key]->id}}')"
                                    name="{{$question[$key]->id}}" value="C"
                                />
                                <span>{{$c[$key][0]->text}}</span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input
                                    type="checkbox"
                                    onclick="onlyOne(this, '{{$question[$key]->id}}')"
                                    name="{{$question[$key]->id}}" value="D"
                                />
                                <span>{{$d[$key][0]->text}}</span>
                            </label>
                        </li>
                    </ul>
                </li>
                <hr />
                @endforeach @endif
            </ul>
            <button class="submitBtn" onclick="">Submit</button>
        </form>

        <script>
            function onlyOne(checkbox, name) {
                let checkboxes = document.getElementsByName(name);
                console.log(checkboxes);
                checkboxes.forEach((each) => {
                    if (each !== checkbox) {
                        each.checked = false;
                    }
                });
            }

            window.onload = function() {
                startTimer();
            };

            function startTimer() {
                var presentTime = document.getElementById('timer').innerHTML;
                var timeArray = presentTime.split(/[:]+/);
                var m = timeArray[0];
                var s = checkSecond((timeArray[1] - 1));
                if(s==59){m=m-1}
                if(m==0 && s==0){
                    document.getElementById("form").submit();
                }
                document.getElementById('timer').innerHTML =
                m + ":" + s;
                setTimeout(startTimer, 1000);
            }

            function checkSecond(sec) {
                if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                if (sec < 0) {sec = "59"};
                return sec;
                //if(sec == 0 && m == 0){ alert('stop it')};
            }
        </script>
    </body>
</html>
