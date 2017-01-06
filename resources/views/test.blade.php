<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- Input -->
<input id="title_1" type="text">
<input id="title_2" type="text">
<input id="title_3" type="text">
<?php $user = App\User::where('type',0)->get(); ?>
<script>

    $(document).ready(function(){

        // Using Array

        {!! FormAutocomplete::selector('#title_1')->source(['aaaaa', 'bbbbb', 'cccccc']) !!}

        

        // Using Table and column

        {!! FormAutocomplete::selector('#title_3')->db::items('users','name') !!}

    });

</script>