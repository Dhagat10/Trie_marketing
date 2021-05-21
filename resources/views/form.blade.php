

<!doctype html>
<html lang="">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link href="index.css" rel="stylesheet"> -->

</head>

<body>

@if(isset($_GET['0']['original']['success']))

<p class="alert alert-success ">{{$_GET['0']['original']['success']}}</p>
@elseif(isset($_GET['0']['original']['error']))
<p class="alert alert-danger ">{{$_GET['0']['original']['success']}}</p>
@endif
    <div class="outer d-flex justify-content-center w-100">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title text-center">Test</h5>
                <form action="/generate/code" method="POST">

                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <input type="number" class="form-control is-valid" id="validationServer01" placeholder="Please enter the value in integer" name="number">
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit" id="submit">Submit form</button>
                        </div>
                    </div>
                    <label>
                        <h5>Timer:</h5>
                    </label>
                </form>

            </div>
        </div>
    </div>

    <div class="countdown"></div>
<div class="finaltime"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
var start = new Date;
$("#submit").click(function() {
var myInterval = setInterval(function() {
    $('.countdown').text((new Date - start) / 1000 + " Seconds");
}, 1000);
});

if($("div").hasClass("finaltime")){
    $('.finaltime').text(myInterval);
clearInterval(myInterval);
}


</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>