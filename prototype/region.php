<?php
	if(empty($_POST['day']) && empty($_POST['period'])) {
		//Fix to be the current time
		$day =  '6/16/2013';
		$period = 'morning';
	} else {
		$day = $_POST['day'];
		$period = $_POST['period'];
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo "$day - $period"; ?> Region</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="The week schedule">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
    <!-- CUSTOM CSS -->
    <style>
      body {
        background-color: #FFFFF0;
      }
      .employees {
        background-color: rgba(255, 248, 220, 0.5);
        height: 550px;
        float: left;
      }
      .employees > form > ul {
        overflow-y: auto;
        height: 470px;
      }
      .week {
        height: 550px;
      }
      .morning td, .evening td{
      }
      #draggable, ol {
        margin: 0px 0px;
        padding-top: 15px;
        padding-bottom: 15px;
      }
      #draggable ol {
        width: 80%;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }
      #draggable ol, .ui-draggable {
        background-color: rgba(12, 40, 73, 0.8);
        color: white;
        font-size: 1.2em;
      }
      .ui-draggable {
        padding-top: 15px;
        padding-bottom: 15px;
      }
      .red-zone {
        background-color: rgba(255, 105, 97, 0.5);
      }
      .yellow-zone {
        background-color: rgba(255, 255, 187, 0.5);
      }
      .green-zone {
        background-color: rgba(189,236,182, 0.5);
      }
      .hidden {
        display: none;
        background-color: green;
        font-size: 100px;
      }
      .checkmark {
        text-align: center !important;
        vertical-align: middle !important;
      }
      td {
        vertical-align: middle;
        font-size: 0.82em;
      }
      td:first-child {
        font-size: .9em;
      }
      .nav-top {
        float: right;
      }
      .row {
        margin-top: 40px;
        height: 550px;

      }
      .week-wrapper {
        vertical-align: middle;
      }
      .logout {
        float: left;
      }
      #error-message {
        text-align: center;
        margin-top: 10px;
        font-size: 1.5em;
      }
      .region {
      	border: 1px solid rgb(221, 221, 221);
      	padding-left: 20px;
      	padding-right: 20px;
      	padding-top: 8px;
      	padding-bottom: 60px;
      	max-height: 350px;
      	overflow-y: auto;
      }
      .region h3 {
      	margin: 0px;
      	margin-bottom: 5px;
      }
      #region-wrapper {
      	overflow-y: auto;
      	height:510px;
      	margin-top: 40px;
      }
      .employee-list ol {
		background-color: rgba(12, 40, 73, 0.8);
        color: white;
        font-size: 1.2em;
        text-align: center;
      	margin-bottom:10px;
      }
      .employee-list {
      	margin: 0px;
      }
      .employee-list > ol > i {
      	float: left;
      	margin-right: -35px;
      	margin-left: 10px;
      	padding:5px;
      }
      .employee-list > ol > i:hover {
      	background-image: url("img/glyphicons-halflings-white.png")
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="nav-top btn-group">
        <a class="btn" href="index.html">Week</a>
        <a class="btn btn-primary" href="region.php">Region</a>
        <a class="btn" href="gallery.html">Gallery</a>
      </div>
      <div class="logout">
        <a class="btn" href="week.html">logout</a>
      </div>
      <div id="error-message">
      </div>
      <div class="row">
        <div style="text-align: center;" class="span12">
          <button class="btn"><i class="icon-chevron-left"></i></button>
          <span style="vertical-align: middle; margin-left: 8px; margin-right: 8px; font-size: 1.6em">
          	<?php echo "$day - $period"; ?>
          </span>
          <button class="btn"><i class="icon-chevron-right"></i></button>
        </div>
        <div class="employees span3">
          <form>
            <fieldset>
              <legend>Employees <a href="#POFILE-NOTIMPLEMENTED" style="font-size: 1.4em;">+</a></legend>
              <div style="margin: 0 auto; text-align: center:">
              <input type="text" placeholder="Search" style="margin-left: 15px; margin-bottom: 3px;"></div>
            </fieldset>
          <ul id="draggable">
            <ol class="tour captain">Colin Bookman</ol>
            <ol class="tour captain">John Doe</ol>
            <ol class="captain">Emp 1</ol>
            <ol class="captain captain">John 2</ol>
            <ol class="staff captain">John 3</ol>
            <ol class="staff captain">John 4</ol>
            <ol class="staff captain">John 5</ol>
            <ol class="staff captain">John 6</ol>
            <ol class="staff captain">John 7</ol>
          </ul>
          </form>
       </div>
       <div id="region-wrapper" class="span9">
       	<div id="region1" class="span3 region">
       	  <h3>Region 1</h3>
       	  <ul class="employee-list">
       	  	<ol><i class="icon-remove" onclick="deleteItem('John', 'region1')"></i>John</ol>
			<ol><i class="icon-remove" onclick="deleteItem('Dylan', 'region1')"></i>Dylan</ol>
       	  </ul>
       	</div>
	    <div id="region2" class="span3 region">
		  <h3>Region 2</h3>
       	  <ul class="employee-list">
       	  	<ol><i class="icon-remove" onclick="deleteItem('Colin', 'region2')"></i>Colin</ol>
			<ol><i class="icon-remove" onclick="deleteItem('Bob', 'region2')"></i>Bob</ol>
       	  </ul>
        </div>
        <section class="span6" style="margin-top:25px; margin-bottom: 25px;">
 		<a href="#new-region-modal" role="button" class="btn" data-toggle="modal">Add New Region</a>    
		</section>
   	   </div>
   	  </div>
    </div> <!-- /container -->

    <!-- Add new Region Modal -->
    <div id="new-region-modal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Add New Region" aria-hidden="true">
      <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	      <h3 id="myModalLabel">Add New Region</h3>
	  </div>
	  <div class="modal-body">
	  	<fieldset>
	  	  <legend>Add New Region</legend>
	  	  <label>Region Name</label>
	  	  <input id="regionName" type="text">
	  	  <label class="radio">
	  		<input type="radio" name="date-range" id="addToday"> Today Only?
	  	  </label>
	  	  <label class="radio">
	  		<input type="radio" name="date-range" id="addWeek"> Entire Week?
	  	  </label>
	  	  <label class="radio">
	  		<input type="radio" name="date-range" id="addForever"> Add Forever?
	  	  </label>
	  	</fieldset>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" onclick="addRegion(); $('#new-region-modal').modal('toggle');">Add Region</button>
	  </div>
	</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Draggable Script -->
     <script>
     //Red = Not Meeting 
     //Yellow = Just Meeting (all most be yellow)
     //Green = All Good - Everything Meets and a few Exceeds (all yellow and a green somewhere)
     //Checks for <=Red, >= Green, and the else
      var requirements = {
        "tour" : {
          "red" : 1,
          "yellow" : 2,
          "green"  : 4
        },
        "captain" : {
          "red" : 1,
          "yellow" : 2,
          "green"  : 2
        },
        "staff" : {
          "red" : 4,
          "yellow" : 5,
          "green" : 7,
        }
      }

      //which position to fill first
      var positions = ["captain", "tour", "staff"];
      //Draggable Init
      $(function() {
        $( "#draggable ol" ).draggable({
          appendTo: "body",
          helper: "clone"
        });
        $("#region-wrapper div" ).droppable({
          activeClass: "ui-state-default",
          hoverClass: "ui-state-hover",
          accept: ":not(.ui-sortable-helper)",
          drop: function( event, ui ) {
            $( this ).find( ".placeholder" ).remove();
            dropped(ui.draggable, this); //Name , Cell
          }
        }).sortable({
          items: "li:not(.placeholder)",
          sort: function() {
            // gets added unintentionally by droppable interacting with sortable
            // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
            $( this ).removeClass( "ui-state-default" );
          }
        });
      });
      var test;
      function dropped(name, cell) {
      	//Check if already in region
      	var staffName = name.text();
      	test = cell;
      	for(var i=1; i<cell.childNodes[3].childNodes.length; i++) {
      		if(staffName == cell.childNodes[3].childNodes[i].textContent) {
      			return error("Already added " + staffName + " to region " + cell.childNodes[1].textContent);
      		}
      	}

      	//Add to region
      	cell.childNodes[3].innerHTML +='<ol><i class="icon-remove" onclick="deleteItem(\''+ name.text() + '\',\'' + cell.id + '\');"></i>' + name.text() + '</ol>';
      	// alert("NAME: " + name.text() + "Cell: " + cell.id);
      }

      function error(error_message) {
        var errorMSG = document.getElementById('error-message');
        errorMSG.innerHTML = error_message;
        setTimeout(function() { errorMSG.innerHTML = ""; }, 2500);
      }
      function addRegion() {
      	var regionName = $("#regionName").val();
      	var regionID = regionName.replace(' ', '').replace('-','');
      	//TODO - Add Error Handling for regions w/same name
      	var regionHTML = '<div id="'+regionID+'" class="span3 region ui-droppable ui-sortable">\n<h3>'+regionName+'</h3>\n<ul class="employee-list">\n</ul>\n</div>';
      	$("#region-wrapper div:last").after(regionHTML);
      	$("#"+regionID).droppable({
          activeClass: "ui-state-default",
          hoverClass: "ui-state-hover",
          accept: ":not(.ui-sortable-helper)",
          drop: function( event, ui ) {
            $( this ).find( ".placeholder" ).remove();
            dropped(ui.draggable, this); //Name , Cell
          }
        }).sortable({
          items: "li:not(.placeholder)",
          sort: function() {
            // gets added unintentionally by droppable interacting with sortable
            // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
            $( this ).removeClass( "ui-state-default" );
          }
        });
      }
      function deleteItem(name, region) {
	    $("#"+region+" > ul").children().each(function() {
	      if(this.textContent == name) {
	      	$(this).remove();
	      }
	    });
      }
     </script>
  </body>
</html>
