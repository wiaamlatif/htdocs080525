<?php 
      //  require_once "\htdocs\include\database.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <title>Document</title>
</head>
<body>
        <div class="contaner">

                <table class="table table-striped table-sm border border-dark w-50" >
        <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Country</th>
        </tr>

        <tr  id="trHeadTicket1" class="table table- border border-dark fw-bold ">
                <td>Alfreds1</td>
                <td>Maria1</td>
                <td><button onclick="showLine(1)">This line 1 is selected</button></td>
        </tr>

        <tr  id="trHeadTicket2" class="table table- border border-dark fw-bold ">
                <td>Alfreds2</td>
                <td>Maria2</td>
                <td><button onclick="showLine(2)">This line 2 is selected</button></td>
        </tr>

        <tr  id="trHeadTicket3" class="table table- border border-dark fw-bold ">
                <td>Alfreds3</td>
                <td>Maria3</td>
                <td><button onclick="showLine(3)">This line 3 is selected</button></td>
        </tr>

        <tr  id="trHeadTicket4" class="table table- border border-dark fw-bold ">
                <td>Alfreds4</td>
                <td>Maria4</td>
                <td><button onclick="showLine(4)">This line 4 is selected</button></td>
        </tr>

        <tr  id="trHeadTicket5" class="table table- border border-dark fw-bold ">
                <td>Alfreds5</td>
                <td>Maria5</td>
                <td><button onclick="showLine(5)">This line 5 is selected</button></td>
        </tr>

        </table>

        </div>

        <script>

function startTime() {
  const today = new Date();
  
  let s = today.getSeconds();
  s = checkTime(s);
  
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i == 1) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
                

                function showLine(choice){
                      
                      document.getElementById("trHeadTicket"+oldchoice).classList.remove('table-success');
                      document.getElementById("trHeadTicket"+readChoice(choice)).classList.add('table-success');
                      
                }
 
                function readChoice(choice){
                
                 console.log(choice)

                 return choice;
                }


              //   document.getElementById('firstLine').classList.add('table-success');
              //   document.getElementById('firstLine').classList.remove('table-success');
              //   document.getElementById('firstLine').classList.add('table-danger');
        </script>

</body>
</html>  