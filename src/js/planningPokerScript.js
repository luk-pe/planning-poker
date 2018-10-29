function submitEstimation(){
// TODO check if numeric
   $.ajax({
     type: "POST",
     url: "../php/helper/addEstimation.php",
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
      // submit the current task id
      asessment:$('#assesmentId').val(),
      task:$('#taskId').val()},
    async: true,
    cache: false,
  }).done(function(data){
    // get the estimations
    data = JSON.parse(data);
    finished = true;
    output = "";
    // generate the output -> one interation for every participant
    for (var i = 0; i < data.length; i++){
      output = output + data[i].username;
      output = output + " - "
      output = output + data[i].estimation;
      output = output + " PT - "
      output = output + data[i].comment;
      output = output + "</br>";
      if (data[i].estimation == null){
        finished = false;
      }
   }
   // write the output in the html source file
    document.getElementById('estimations').innerHTML = output;
  })
},100);

 window.setInterval(function (){
    $.ajax({
      type: "POST",
      url: "../php/helper/taskFinished.php",
      data:{
        asessment:$('#assesmentId').val(),
        task:$('#taskId').val()},
      async: true,
      cache: false,
    }).done(function(data){


        assesmentId= $('#assesmentId').val();
        currentTask= $('#currentTask').val();
        // bad style i know
        currentTask = parseInt(currentTask);
        newTask = currentTask + 1;
        numberOfTasks = $('#numberOfTasks').val();
        if (data == "true"){
          if (currentTask == numberOfTasks){
            assesmentCompleted();
            nextPage= "../php/overview.php";
            alert("Finished planning poker assesment! View the final results!")
          } else {
            nextPage= "../php/gameView.php?assesmentid="+assesmentId+"&task="+newTask;
          }
          // alert(nextPage);
           window.location = nextPage;
       }

    })
 },100);
 function assesmentCompleted(){
   d = $('#date').val();
   $.ajax({
     type: "POST",
     url: "../php/helper/assesmentCompleted.php",
     data:{
       asessment: $('#assesmentId').val(),
       date: d,
     },
    async: true,
    cache: false,
   }).done(function(data){

   });
 }
