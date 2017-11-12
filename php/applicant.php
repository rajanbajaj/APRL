<?php

$username = $_COOKIE['username'];
if(isset($_POST['username'])){
	$username = $_POST['username'];
}
// echo $username;
$dbc = mysqli_connect("localhost", "root", NULL, "aprl")
or die("Unable to connect to database");
$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];

// echo $profession;
if($row['profession']=='faculty' and isset($_POST['id'])){
	$id = $_POST['id'];
	$query = "SELECT id,project_id,applicant.username,firstname,lastname,email,credential,description,interest,approval FROM `applicant` JOIN `studentinfo` on applicant.username=studentinfo.username where applicant.project_id ='$id'";

	$result = mysqli_query($dbc, $query)
	or die('Unable to query applicant faculty' );

	echo"
	<!--                 collapse -->
	<div id='collapse'>
	<div class='row'>
	<div class='col-md-12'>
	<div id='accordion' role='tablist' aria-multiselectable='true' class='card-collapse'>
	<div class='card card-plain'>
	<div class='card-header' role='tab' id='heading$id'>
	<a data-toggle='collapse' data-parent='#accordion' href='#collapse$id' aria-expanded='true' aria-controls='collapse$id'>
	Applicant Details
	<i class='now-ui-icons arrows-1_minimal-down'></i>
	</a>
	</div>
	<div id='collapse$id' class='collapse ' role='tabpanel' aria-labelledby='heading$id'>
	<div class='card-body'>
	<div class='card card-plain'>
	<div class='card-body'>
	<div class='table-responsive'>
	<table class='table'>
	<thead class=''>
	<th class='text-center'>#</th>
	<th>Name</th>
	<th>email</th>
	<th class='text-center'>Credential</th>
	<th class='text-right'>Description</th>
	<th class='text-right'>Proposal</th>
	<th class='text-right'>Approval</th>

	</thead>
	<tbody>";
	$count=0;
	while($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
		$short_desc = substr($row["description"], 0,150)." ....";
		echo "<tr>
		<td class='text-center'>
		$count
		</td>
		<td>
		<a href = 'profile-page.php?username=$row[username]'>$row[firstname] $row[lastname]</a>
		</td>
		<td>
		$row[email]
		</td>
		<td class='text-center'>
		$row[credential]
		</td>
		<td class='text-right'>
		$row[description]
		</td>
		<td class='text-right'>
		$row[interest]
		</td>
		<td class='text-right'>";
		if($row['approval'] == ''){
			echo"
			<span id=idd$row[id]>
		<button type='button' id='id$row[id]' value='$row[id]' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons ui-1_check'></i>
		</button>

		<button type='button' id='i$row[id]' value='$row[id]' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons ui-1_simple-remove'></i>
		</button>
	 </span>

		";
	}
	if($row['approval'] == 'yes'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Approved
		</button>
		";
	}
	if($row['approval'] == 'no'){
			echo"
		<button type='button' rel='tooltip' class=' btn-sm '>
		Rejected
		</button>";
	}
	echo "	</td>
			</tr> 
	<script>
		$(document).ready(function(){
            $(document).on('click','#id$row[id]',function(){
                var pid = $('#id$row[id]').val();
                console.log(pid);
                $.ajax({
                    type : 'POST',
                    url : 'approve.php',
                    data :{
                        'id' : pid,
                        'approve' : 'yes'
                    },
                    success : function(data){
                        $('#idd'+pid).html(data);
                    }
                });
            });
        });
        $(document).ready(function(){
            $(document).on('click','#i$row[id]',function(){
                //var approve = $('#approval').val();
                var pid = $('#id$row[id]').val();
                console.log(pid);
                $.ajax({
                    type : 'POST',
                    url : 'approve.php',
                    data :{
                        'id' : pid,
                        'approve' : 'no'
                    },
                    success : function(data){
                        $('#idd'+pid).html(data);
                    }
                });
            });
        });
	</script>
	";
	}
	echo
	" </tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<!--  end collapse -->";

}
if($row['profession']=='student'){
	$query = "SELECT id,project.project_id,offeredby,title,description,project.addedon,incentive,interest FROM `applicant` JOIN `project` on applicant.project_id=project.project_id where applicant.username ='$username'";
	// echo $query;
	$result = mysqli_query($dbc, $query)
	or die('Unable to query applicant student' );

	echo "<div class='card card-plain'>
	<div class='card-body'>
	<div class='table-responsive'>
	<table class='table'>
	<thead class=''>
	<th class='text-center'>
							#
	</th><th>Title</th>
	<th>offeredby</th>
	<th class='text-center'>description</th>
	<th class='text-right'>Added On</th>
	<th class='text-right'>Incentive</th>
	<th class='text-right'>Approved</th>

	</thead>
	<tbody>";
	$count=0;
	while($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
		$short_desc = substr($row["description"], 0,100)." ....";
		echo "<tr>
		<td class='text-center'>
		$count
		</td>
		<td>
		<a href='project.php?id=$row[project_id]'>$row[title]</a>
		</td>
		<td>
		<a href='profile-page.php?username=$row[offeredby]'>$row[offeredby]
		</td>
		<td class='text-center'>
		$short_desc
		</td>
		<td class='text-right'>
		$row[addedon]
		</td>
		<td class='text-right'>
		$row[incentive]
		</td>
		<td class='text-right'>
		<button type='button' rel='tooltip' class='btn btn-info btn-icon btn-sm '>
		<i class='now-ui-icons users_single-02'></i>
		</button>
		<button type='button' rel='tooltip' class='btn btn-success btn-icon btn-sm '>
		<i class='now-ui-icons ui-2_settings-90'></i>
		</button>
		<button type='button' rel='tooltip' class='btn btn-danger btn-icon btn-sm '>
		<i class='now-ui-icons ui-1_simple-remove'></i>
		</button>
		</td>
		</tr> ";
	}
	echo
	" </tbody>
	</table>
	</div>
	</div>
	</div>
	";
}   
mysqli_close($dbc);
// echo'<div class="card card-plain">
//                                         <div class="card-body">
//                                             <div class="table-responsive">
//                                                 <table class="table">
//                                                     <thead class="">
//                                                         <th class="text-center">
//                                                             #
//                                                         </th>
//                                                         <th>
//                                                             Name
//                                                         </th>
//                                                         <th>
//                                                             Job Position
//                                                         </th>
//                                                         <th class="text-center">
//                                                             Since
//                                                         </th>
//                                                         <th class="text-right">
//                                                             Salary
//                                                         </th>
//                                                         <th class="text-right">
//                                                             Actions
//                                                         </th>
//                                                     </thead>
//                                                     <tbody>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 1
//                                                             </td>
//                                                             <td>
//                                                                 Andrew Mike
//                                                             </td>
//                                                             <td>
//                                                                 Develop
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2013
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 99,225
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 2
//                                                             </td>
//                                                             <td>
//                                                                 John Doe
//                                                             </td>
//                                                             <td>
//                                                                 Design
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2012
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 89,241
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 3
//                                                             </td>
//                                                             <td>
//                                                                 Alex Mike
//                                                             </td>
//                                                             <td>
//                                                                 Design
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2010
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 92,144
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 4
//                                                             </td>
//                                                             <td>
//                                                                 Mike Monday
//                                                             </td>
//                                                             <td>
//                                                                 Marketing
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2013
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 49,990
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm   btn-neutral  ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 5
//                                                             </td>
//                                                             <td>
//                                                                 Paul Dickens
//                                                             </td>
//                                                             <td>
//                                                                 Communication
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2015
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 69,201
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td class="text-center">
//                                                                 6
//                                                             </td>
//                                                             <td>
//                                                                 Manuel Rico
//                                                             </td>
//                                                             <td>
//                                                                 Manager
//                                                             </td>
//                                                             <td class="text-center">
//                                                                 2012
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 € 99,201
//                                                             </td>
//                                                             <td class="text-right">
//                                                                 <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons users_single-02"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons ui-2_settings-90"></i>
//                                                                 </button>
//                                                                 <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm   btn-round  ">
//                                                                     <i class="now-ui-icons ui-1_simple-remove"></i>
//                                                                 </button>
//                                                             </td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </div>
//                                         </div>
//                                     </div>';

?>