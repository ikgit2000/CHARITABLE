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
    events: []
});

calendar.render();

function get_events(calendar) {
    var events = [];
    $.ajax({
        url: "http://localhost/charitAble/request_ehs/get_events",
        method: 'GET',
        dataType: 'JSON',
        success: function (response) {
            console.log(response.requests);
            response.requests.forEach(function (item) {
                var accepted = item.accepted;
                let backgroundColor;
                if (accepted == 0) {
                    backgroundColor = 'red';
                } else {
                    backgroundColor = 'green';
                }
                events.push(
                    {
                        reqID: item.Event_ID,
                        title: item.Event_Name,
                        date: item.Event_Date,
                        backgroundColor: backgroundColor
                    }
                );
            });
            calendar.addEventSource(events);
        }
    })
};

get_events(calendar);