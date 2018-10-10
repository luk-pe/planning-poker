<?php
 ?>
 <div class="card-header">
   <h3 >Planning Poker</h3>
   <div class="row">
     <!-- navigation -->
   <div class="col-sm-10">
     <ul class="nav nav-pills">
       <li class="nav-item">
         <a class="nav-link <?php if ($page=='overview'){echo'active';} ?>" href="overview.php">Overview</a>
       </li>
       <li class="nav-item">
         <a class="nav-link <?php if ($page=='enterAssesment'){echo'active';} ?>" href="enterAssesment.php">Enter assesment</a>
       </li>
       <li class="nav-item">
         <a class="nav-link <?php if ($page=='newAssesment'){echo'active';} ?>" href="newAssesment.php">New assesment </a>
       </li>
     </ul>
   </div>
   <!-- user -->
   <div class="col-sm-2 ">
     <div class="dropdown">
       <button class="btn btn-light dropdown-toggle" type="button" style="float: right" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
         echo ($user); ?>
       </button>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
         <a class="dropdown-item" href="#">Show details</a>
         <a class="dropdown-item" href="#">Log out</a>
       </div>
     </div>
   </div>
   </div>
 </div>
