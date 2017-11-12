<?php
// define variables and set to empty values
$titleErr = $descriptionErr = "";
$title = $description = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["title"])) {
//     $titleErr = "Title is required";
//   } else {
//     $title = test_input($_POST["title"]);
//   }

//   if (empty($_POST["description"])) {
//     $descriptionErr = "Description is required";
//   } else {
//     $description = test_input($_POST["description"]);
//   }
// }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<!DOCTYPE html>
<html>
<head>
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit9f1e.css?v=1.1.0" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />


<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

 <script src="jquery-3.2.1.min.js"></script>
  <!-- live search -->

<script>
    var allTags = [];
    var check =0;

  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","tagsearch.php?q="+str,true);
    xmlhttp.send();
  }

  function tagPopulate(){
    var x = document.getElementById("livesearch").textContent

    if(allTags.indexOf(x) != -1 || x.length>19){
      // console.log("yo sexy bitch, i'm already here");
      return ;
    }else{
      allTags.push(x);
      var para = document.createElement("p");
      var node = document.createTextNode(x);
      para.appendChild(node);
      para.setAttribute("class","btn btn-primary btn-simple btn-round btn-sm")
      var element = document.getElementById("tagComesHere");
      element.appendChild(para);
    }
  }

  // function checkTitle(){
  //   var c = document.getElementById("title_id").value;
  //   if(c.length == 0){
  //     var tt = "Title daal bhosdiwale";
  //     showSnack(tt);
  //   }
  // }

  // function checkDescription(){
  //   var c = document.getElementById("description_id").value;
  //   if(c.length == 0){
  //     var tt = "Description kya tera baap dalega";
  //     showSnack(tt);
  //   }
  // }


  function formSubmit(){
    check = 0;
    var c = document.getElementById("title_id").value;
    if(c.length == 0){
      var tt = "Title daal bhosdiwale";
      showSnack(tt);
    }else{

      if(!tinymce.get('description_id').getContent()){
        var tt = "Description kya tera baap dalega";
        showSnack(tt);
      }
      else{
        if(allTags.length == 0){
          var tt = "Tags add kr chutie";
          showSnack(tt);
        }else{
          check = 1;
        }
    
      }
    }
  }

  function showSnack(message) {
    var x = document.getElementById("snackbar")
    x.innerHTML = message;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }

  $(document).ready(function(){
    $("#submit_button").click(function(){
      // console.log("idhar hu main ");
      formSubmit();
    // var descripvar = $('#description_id').val();
    //   console.log(titlevar);
    if(check==1){
      var titlevar = $('#title_id').val();
      var descripvar = tinymce.get('description_id').getContent();
      // console.log(allTags[1]);
      // console.log(descripvar);
      $.ajax({
       type: "POST",
       url: "blog_data_insert.php",
       data: {title: titlevar, description: descripvar, tagsrr: allTags },

       success: function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        $("#hidden_input").val(data);
        document.getElementById('form_id').submit();

        // <?php
        //   session_start();
        //   if(isset($_GET['hidden_name']) && !empty($_GET['hidden_name'])) {

        //     echo $_GET['hidden_name']; 
        //   }else{
        //     echo "iski maa ko chodu";
        //   }

        // ?>
        
      }
    });
    }
  });
  }); 


</script>
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>
</head>

<body>


<!-- <form > -->
<h5> Title</h5>
<input id="title_id" type="text" size="100" ><br><br>
<br><br>

<h5> Description</h5>
<textarea id="description_id" ></textarea><br><br>

<h5>Tags</h5>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch" onclick="tagPopulate()"></div>

<span id="tagComesHere"></span>
<br><br>

<!-- <input type="submit" value="Submit" onclick="formSubmit()"> -->
<!-- </form> -->
<button id="submit_button" >Submit</button>
<br>
<br>

<form name="form" id="form_id" action="blog.php" method="get">
<input type="hidden" id="hidden_input" name="hidden_name" value="mera_16_ka_dola">

</form>

<div id="snackbar"></div>


</body>
</html>
