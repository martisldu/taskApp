// add new task html
function addTask (content, status, id) {
    var html ='<div id="delete-' + id + '">';
        html +='<form>';
        html +='<div class="input-group">';
        html +='<span class="input-group-addon">';
        html +='<input id="editId-' + id +'" type="checkbox" value="' + status + '" /></span>';
        html +='<input type="text" placeholder="ToDo Text" class="form-control" id="editVal-'+ id +'" value="' + content + '">';
        html +='<span class="input-group-btn">';
        html +='<a class="btn btn-default" onclick="updateTaskAJAX('+ id +')">Update</a>';
        html +='</span></div>';
        html +='<input type="hidden" name="id" value="{{$task->id}}">';
        html +='</form>';
        html +='<span  id="delete-{{$task->id}}" class="input-group-btn">';
        html +='<a style="float: right;" class="btn btn-default"   onclick="deleteTaskAJAX(' + id + ')" type="submit">Delete</a>';
        html +='</span><br /></div>';
 return html
}

// done task html
function doneTask (content, id) {
     var html ='<div id="delete-'+ id +'">';
         html +='<div class="input-group">';
         html +='<span class="input-group-addon">';
         html +='<input type="checkbox" name="status" checked></span>';
         html +='<input type="text" class="form-control" placeholder="ToDo Text" value="'+ content +'"></div>';
         html +='<span  class="input-group-btn">';
         html +='<a style="float: right;" class="btn btn-default"   onclick="deleteTaskAJAX('+ id +')" type="submit">Delete</a>';
         html +='</span><br/></div>';
  return html
}

// AJAX call for creating new task
function createTaskAJAX () {
    var content = $('#createVal').val();
    var status = $('#createId').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'create-task',
        type: 'POST',
        data: {'content': content,  'status': status },
        dataType: 'JSON',
        success: function (response) {
            $('#allTask').append(addTask(content, status, response['id']));
            $('#createVal').val('');
        },
        error: function () {
            alert('no');
        }
    })
}

// AJAX call for deleting task
function deleteTaskAJAX (id) {
        $.ajax ({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'delete-task',
        type: 'POST',
        data: {'id': id},
        dataType: 'JSON',
        success: function () {
            $('#delete-' + id).remove();
        }});
}

// AJAX call for updating task
function updateTaskAJAX (id) {
    var content = $('#editVal-'+ id ).val();
    var status = 1;
    if ($('#editId-' + id).is(":checked")) {
        status = 2;
    }
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'edit-task',
            type: 'POST',
            data: {'content': content, 'status': status, 'id': id },
            dataType: 'JSON',
            success: function (response) {
                if (status == 1) {
                $('#delete-' + id).after(addTask(content, status, response['id']));
                } else {
                    $('#allDone').append(doneTask(content, response['id']));
                }
                $('#delete-' + id).remove();
            }
        })
    }