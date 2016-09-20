<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="css/style.css"  >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <br /><br />
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>My ToDos</h3>
                <hr />
                <h4>To Be Done</h4>
                    <div id="allTask">
                    @foreach ($tasks as $task)
                        @if($task->status == 1)
                        <div id="delete-{{$task->id}}">
                        <form>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input id="editId-{{$task->id}}" type="checkbox" value="1" />
                                </span>
                                <input type="text" placeholder="ToDo Text" class="form-control"  id="editVal-{{$task->id}}" value="{{ $task->content }}">
                                <span  class="input-group-btn">
                                    <a id="updateBtn" class="btn btn-default" onclick="updateTaskAJAX({{$task->id}})">Update</a>
                                </span>
                            </div>
                            <input type="hidden" name="id" id="taskId" value="{{$task->id}}">
                        </form>
                         <span  id="delete-{{$task->id}}" class="input-group-btn">
                            <a style="float: right;" class="btn btn-default"   onclick="deleteTaskAJAX({{$task->id}})" type="submit">Delete</a>
                         </span>
                        <br />
                        </div>
                        @endif
                    @endforeach
                     </div>

                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" id="createVal" name="content" >
                            <input type="hidden" name="status" id="createId" value="1">
                            <span class="input-group-btn">
                                <a class="btn btn-default" onclick="createTaskAJAX();">Create</a>
                            </span>
                        </div>
                    </form>

                <hr />


                <h4>Done</h4>
                <div id="allDone">
                @foreach($tasks as $task)
                     @if($task->status == 2)
                         <div id="delete-{{$task->id}}">
                        <div class="input-group">
                           <span class="input-group-addon">
                        <input type="checkbox" name="status" checked>
                         </span>
                          <input type="text" class="form-control" placeholder="ToDo Text" value="{{ $task->content }}">
                        </div>
                      <span  class="input-group-btn">
                            <a style="float: right;" class="btn btn-default"   onclick="deleteTaskAJAX({{$task->id}})" type="submit">Delete</a>
                         </span>
                     <br/>
                     </div>
                  @endif
              @endforeach
              </div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
     </body>

</html>
