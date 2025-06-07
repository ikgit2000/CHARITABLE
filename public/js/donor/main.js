const inputs = document.querySelectorAll(".input-field");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

//-------NAVBAR--------

// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


/*$(document).ready(function() {
  var calendar = $('#calendar').fullCalendar({
   editable:true,
   header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
   }
  });
});*/

//calendar
// $(document).ready(function () {
//   var calendar = $('#calendar').fullCalendar({
//     defaultView: 'month',
//     timeZone: 'local',
//     editable: true,
//     //selectable: true,
//     //selectHelper: true,
//     //events: events

//     // select: function (start, end) {
//     //   //alert(start);
//     //   $('#D_Date').val(moment(start).format('YYYY-MM-DD'));
//     //   $('#meal_entry').modal('show');
//     // },
//     // events: meals,
//     // eventRender: function (event, element, view) {
//     //   element.bind('click', function () {
//     //     alert(event.B_Req_ID);
//     //   });
//     // }
//   });


// });//end document.ready block

const calendarElement = document.getElementById('calendar');
const detailsElement = document.getElementById('meal-details');

const calendar = new FullCalendar.Calendar(calendarElement, {
  headerToolbar: {
    left: 'prev,next',
    center: 'title',
    right: 'today,dayGridMonth,listMonth'
  },
  views: {
    list: {
      buttonText: 'List'
    }
  },
  defaultView: 'month',
  timeZone: 'local',
  editable: true,
  events: [],
  });

calendar.render();

function get_meals(calendar) {
  var meals = [];
  $.ajax({
    url: "http://localhost/charitAble/Schedulereq_dons/get_meals",
    method: 'GET',
    dataType: 'JSON',
    success: function (response) {
      console.log(response.requests);
      response.requests.forEach(function (item) {
        var reservedQuantity = item.Reserved_Quantity;
        var bMembers = item.B_Members; // call your getBMembers function to get the B_Members value
        var total = item.Total_Quantity;
        var remain = bMembers - total;
        /*
                var backgroundColor = 'red'; // set the default background color to red
        */
        if (reservedQuantity == 0) {
          backgroundColor = 'blue';
        } else if (reservedQuantity == bMembers) {
          backgroundColor = 'red';
        } else {
          backgroundColor = 'green';
        }
        meals.push(
            {
              reqID: item.S_ID,
              title: item.Time,
              date: item.D_Date,
              backgroundColor: backgroundColor,
              description: 'Details </br></br>Time: ' + item.Time + '</br>Date: ' + item.D_Date + '</br> Reserved quantity: ' + reservedQuantity + '</br>Total Requested Meals : ' + total + '</br>Requestable Amount : ' + remain


            }
        );
      });
      calendar.addEventSource(meals);
    }
  })
  calendar.setOption('eventClick', function (info) {
    var event = info.event;

    var detailsDiv = document.getElementById('event-details');
    detailsDiv.innerHTML = '<p>' + event.extendedProps.description + '</p>';


    // Add a close button to the detailsDiv
    detailsDiv.innerHTML += '<button id="close-button">Close</button>';

    // Attach a click event listener to the close button to hide the detailsDiv when clicked
    document.getElementById('close-button').addEventListener('click', function () {
      detailsDiv.style.display = 'none';

    });

    detailsDiv.style.display = 'block';

  });
}
get_meals(calendar);