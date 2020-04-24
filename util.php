<?php
function show_error($err){
    echo ("<h3 style='color:red; text-align:center; margin-top:20px;'>{$err}</h3>");
}

function show_success($msg){
    echo("<h3 style='color:green; text-align:center; margin-top:20px;'>{$msg}</h3>");
}

function welcome_prompt()
{
    echo ('<div class="container">
            <div class="jumbotron">
              <h1 class="display-4">Hello ' . $_SESSION['user']['name'] . '!</h1>
              <p class="lead">Use the Manage Subscription dropdown to create or edit subscriptions and get useful information about your spending habits.</p>
            </div>
            </div>');
}

function login_prompt()
{
    echo ('<div class="card card-body">
    <h3 class="text-center">Account Login</h3>
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" required name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" required name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
</div>');
}

function show_create(){

    echo('
    <div class="container">
        <div class="card card-body">
        <h3 class="text-center">Create New Subscription</h3>
    <form action="" method="post">


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Cost</label>
            <input type="number" name="cost" class="form-control" step="0.01">
        </div>

        <div class="form-group">
            <label for="name">Bills / Year</label>
            <input type="number" name="billed" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Subscription Date</label>
            <input type="date" name="sub_date" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
        
    </div>
    ');
}

function register_prompt(){
    echo('
    <div class="container">
    <div class="card card-body">
    <h3 class="text-center">Account Register</h3>
    <form method="POST" action="register.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" required name="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" required name="email">
        </div>


        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" required name="password">
        </div>

        <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input type="password" class="form-control" required name="password2">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>');
}



?>