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
    <ul class="quiz">
        @if($question)
            @foreach($question as $key=>$value)                            
            <li>
                <h4>{{$question[$key]->question}}</h4>
                <ul class="choices">
                  <li>
                    <label>
                        <input type="checkbox" onclick="onlyOne(this, '{{$question[$key]->id}}')" name="{{$question[$key]->id}}"/>
                        <span>{{$a[$key][0]->text}}</span>
                    </label>
                  </li>
                  <li>
                    <label>
                        <input type="checkbox" onclick="onlyOne(this, '{{$question[$key]->id}}')" name="{{$question[$key]->id}}"/>
                        <span>{{$b[$key][0]->text}}</span>
                    </label>
                  </li>
                  <li>
                    <label>
                        <input type="checkbox" onclick="onlyOne(this, '{{$question[$key]->id}}')" name="{{$question[$key]->id}}"/>
                        <span>{{$c[$key][0]->text}}</span>
                    </label>
                  </li>
                  <li>
                    <label>
                        <input type="checkbox" onclick="onlyOne(this, '{{$question[$key]->id}}')" name="{{$question[$key]->id}}"/>
                        <span>{{$d[$key][0]->text}}</span>
                    </label>
                  </li>
                </ul>
              </li>
              <hr>
            @endforeach
        @endif
    </ul>
    <button class="submitBtn" onclick="">Submit</button>

    <script>
      function onlyOne(checkbox, name) {
        let checkboxes = document.getElementsByName(name)
        console.log(checkboxes)
        checkboxes.forEach((each) => {
            if(each !== checkbox){
              each.checked = false
            }
        })
      }
    </script>
  </body>
</html>


