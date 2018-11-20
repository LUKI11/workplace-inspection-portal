<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Testing</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templateStyle/sidebar.css" rel="stylesheet">

</head>

<body>
    <!-- Main content-->
                <form action="conn/formSubmit.php" method="post" data-form-title="Interest Registration">
                    <input type="hidden" value="eWWTjZEbEuWdQARX7iZQ4lgPe/kz6N8s0qC5/FDqvxuR40Ae/LwZHIxoCAa4wJky9YeuR0RMYlDmQjXp2wfRtUCbpvVUQwSiIFuSXSh0Q2ObdPvxLkhfD8W+nHrdOyP9"  data-form-email="true">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required="" placeholder="Name*" data-form-field="Name">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender" data-form-field="Gender" required="">
                            <option value="">Gender*</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="age" data-form-field="Age" required="">
                            <option value="">Age*</option>
                            <option value="~ 18"> ~ 18 </option>
                            <option value="19 ~ 25">  19 ~ 25 </option>
                            <option value="26 ~ 35"> 26 ~ 35</option>
                            <option value="36 ~ 55"> 36 ~ 55 </option>
                            <option value="55 ~"> 55 ~ </option>
                          </select>
                    </div>
                
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required="" placeholder="Email address*" data-form-field="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="occupation" placeholder="Occupation " data-form-field="Occupation">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="7" placeholder="Leave your message to let us know your interests." data-form-field="Message"></textarea>
                    </div>
                    <div class="text-xs-right"><button type="submit" class="btn btn-secondary-outline">Submit</button></div>
                </form>


</body>

</html>
