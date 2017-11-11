<!DOCTYPE html>
<html>
<head>
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit9f1e.css?v=1.1.0" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />


<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

  <!-- live search -->
<script>
    var allTags = [];

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
      console.log("yo sexy bitch, i'm already here");
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


</script>

</head>

<body>
<form>
<h5> Title</h5>
<h5> Description</h5>
<textarea id="description_id"></textarea>
<h5>Tags</h5>

<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch" onclick="tagPopulate()"></div>
<span id="tagComesHere" >
  <!-- <button id=class='btn btn-primary btn-simple btn-round btn-sm' type='button'></button> -->
</span>
</form>




</body>
</html>