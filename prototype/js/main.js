/* Draggables - Assumes Employee List exists */
  function initDraggable() {
    var $employees = $("#employee-list");
    $("li", $employees).draggable({
      revert: "invalid",
      containment: "document",
      helper: "clone",
      cursor: "move",
      cursorAt: { left: -8 }
    });
  }
/* Droppables - Where Employees are Dropped */
  var scheduled = {};
  function initDroppable() {
    updateRegions(); /* Initialize the schedule struct */
    $(".droppable").droppable({
      tolerance : "pointer",
      drop: function(event, ui) {
        var name = ui.draggable.text();
        var time = this.parentElement.id;
        //Add upon check
        if(scheduleEmployee(name, time)) {
          var elementHTML = '<li><span onclick="unscheduleEmployee(\'' + name + '\', \''+ time + '\');">x</span>'+name+'</li>';
          this.innerHTML += elementHTML;
        } else { 
          $( "#"+time ).effect( "shake" );
        }
      }
    });
  }
  /* Employe Profile Trigger */
  function initEmployeeProfile() {
    $(".droppable, .ui-draggable").bind('dblclick', function(event) {
        var name = event.target.textContent.substring(1);
        if(event.target.classList.contains('ui-draggable')) {
          name = event.target.textContent;
        }
        if(event.target.tagName.toLowerCase() == 'li') {
          alert("To Be Implemented: Employee Profile would be displayed for:\n" + name);
        }
      });
  }
/* scheduleEmployee(name, location, position) - position optional*/
  function scheduleEmployee(name, location, position) {
    /* return a false if employee already schedule in location */
    if(scheduled[location].indexOf(name) < 0) {
      scheduled[location].push(name)
      if(typeof position != 'undefined') { 
        scheduled[location][position].push(name);
      }
      return true;
    } else {
      return false; //Scheduled Previously
    }
  }
/* unscheduleEmployee(name, location, position)   - position optional */
  function unscheduleEmployee(name, location, position) {
    position = function() { if(typeof position == 'undefined') return ""; else return " > ." + position; }();
    $("#" + location + position + " li").each(function() {
      if($(this).text().substring(1) == name) { 
        $(this).remove(); //Remove from List
        scheduled[location].remove(name);
        if(position !== "" ) scheduled[location][position].remove(name); 
      }
    }); 
  }
/* updateRegions() - Initializes the storage obj */
  function updateRegions() {

    //Check if each Region is part of schedule obj.
    var locations_dom = document.getElementsByClassName('region');
    for(var i = 0; i<locations_dom.length; i++) {
      var location = locations_dom[i];
      if(scheduled[location.id] == undefined) { 
        scheduled[location.id] = []; 
      }
      //Check in each region for multiple positions
        var required_position = location.getElementsByTagName('ul');
        for(var j = 0; j<required_position.length; j++ ) {
          var position = getRequiredPosition(required_position[j].getAttribute('class').split(' '));
          if(position != undefined && scheduled[location.id][position] == undefined) {
            scheduled[location.id][position] = [];
          }
        }
    }
  }
/* getRequiredPosition(classArr) - Parses out the required position identifier */
  function getRequiredPosition(classList) {
    var output = undefined;
    for(var i = 0; i < classList.length; i++) {
      if(classList[i] != 'droppable' && classList[i] != 'ui-droppable') {
        output=classList[i];
        break;
      }
    } 
    return output;
  }
/* Remove pototype to Array */
  Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
      what = a[--L];
      while ((ax = this.indexOf(what)) !== -1) {
        this.splice(ax, 1);
      }
    }
    return this;
  };
//PROTOTYPES
    function settings(location) {
      alert("Not implemented, Received you want to get settings for: " + location);
    }
    function addRegion() {
      updateRegions(); //Fix the schedule object to reflect changes
      alert("Registered your want to add a region, to-be implemented");
    }
    function changeDay(amount) {
      //+1 = increase 1 day, -1 = decrease 1 day, -7 = decrease a week...etc 
      var new_date = new Date(curr_date.getTime());
      new_date.setDate(curr_date.getDate() + amount);
      var day = new_date.getDate();
      var month = new_date.getMonth() +1;
      var year = new_date.getFullYear();
      alert("Not implemented yet, you did select the following date: \n         " + month + "/" + day + "/" + year);
      // alert("Realized you wanted to change the date by: " + new_date.getMonth() + "/" + new_date.getDate() + "/" + new_date.getFullYear() + " days");
    }
    function go2region(timeslot) {
      alert("");
    }
    function newEmployee() {
      alert("Not implemented yet - received Add Employee Action");
    }
