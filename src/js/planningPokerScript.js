// function to submit the estimations via ajax to the php file -> addEstimation -> safe data in DB
function submitEstimation(){
// TODO check if numeric

   $.ajax({
     type: "POST",
     url: "../php/helper/addEstimation.php",
     // transmitted data
     data:{
       task:$('#taskId').val(),
       user:$('#userId').val(),
       estimation:$('#estimation').val(),
       comment:$('#comment').val()},
    async: true,
    cache: false,
   }).done(function(data){
     // alert(data);
   });

  // display message insteead of button, if the estimation is set
  document.getElementById('button').style.visibility="hidden";
  document.getElementById('estimatedMessage').style.visibility="visible";
}

// call the function every 100ms -> realtime
window.setInterval(function (){
// ajax function to get the estimations
  $.ajax({
    type: "POST",
    url: "../php/helper/getEstimations.php",
    data:{
      // submit the current assesment id and task id
      asessment:$('#assesmentId').val(),
      task:$('#taskId').val()},
    async: true,
    cache: false,
  }).done(function(data){
    // get the estimations
    data = JSON.parse(data);
    output = "";
    // generate the output -> one interation for every participant
    for (var i = 0; i < data.length; i++){
      output = output + data[i].username;
      output = output + " - "
      output = output + data[i].estimation;
      output = output + " PT - "
      output = output + data[i].comment;
      output = output + "</br>";

   }
   // write the output in the html source file
    document.getElementById('estimations').innerHTML = output;
  })
},100);

// call the function every 100ms -> realtime
 window.setInterval(function (){
   // function performed to see if a task is finished
    $.ajax({
      type: "POST",
      url: "../php/helper/taskFinished.php",
      data:{
        // submitted data
        asessment:$('#assesmentId').val(),
        task:$('#taskId').val()},
      async: true,
      cache: false,
    }).done(function(data){
        // get data from the game view
        assesmentId= $('#assesmentId').val();
        currentTask= $('#currentTask').val();
        // prepare for following if statements
        currentTask = parseInt(currentTask);
        newTask = currentTask + 1;
        numberOfTasks = $('#numberOfTasks').val();
        // estiamtion of current task is finished
        if (data == "true"){
          // current task was the last task of the assesment
          if (currentTask == numberOfTasks){
            // perform function to set for example the completion date
            assesmentCompleted();
            // redirect back to the overview page
            nextPage= "../php/overview.php";
            alert("Finished planning poker assesment! View the final results!")
          }
          // current task was NOT the last task of the assesment
          else {
            // redirect to the estimation of the next task
            nextPage= "../php/gameView.php?assesmentid="+assesmentId+"&task="+newTask;
          }
          // actual redirection is performed here
           window.location = nextPage;
       }

    })
 },100);

 // function performed if the estimation of a assesment is finished
 function assesmentCompleted(){
   // completion date
   d = $('#date').val();
   $.ajax({
     type: "POST",
     url: "../php/helper/assesmentCompleted.php",
     data:{
       // submit asssement id and completion date
       asessment: $('#assesmentId').val(),
       date: d,
     },
    async: true,
    cache: false,
   }).done(function(data){

   });
 }
