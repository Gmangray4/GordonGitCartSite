$(document).ready(function() {

  let header = $('header');
  let section = $('section');
  let loaded = false;
  let keyword;
  // getData();

  $("#getData").click(function(event) {
    keyword = $("#keyword").val();

/// clears the section for a new one
    $(section).html("");

    // if (loaded === false) {
      console.log("clicked");

      $.getJSON('loadFiles/days.json', function(data)
          console.log(data);
          console.log(keyword);
          populateHeader(data);

          if (keyword === "days" || keyword === "day" || keyword === "Day" || keyword === "Days" || keyword === "DAY" || keyword === "DAYS" || keyword === "All" || keyword === "all" || keyword === "ALL" || keyword === "All DAYS" || keyword === "all days" || keyword === "All days") {
            showDays(data);
          }
          if (keyword === "Day 1" || keyword === "day 1" || keyword === "Day 1" || keyword === "Day1" || keyword === "DAY 1" || keyword === "DAY1" || keyword === "day1") {
            showDay1(data);
          }
          if (keyword === "Day 2" || keyword === "day 2" || keyword === "Day 2" || keyword === "Day2" || keyword === "DAY 2" || keyword === "DAYS 2" || keyword === "day2") {
            showDay2(data);
          }
          if (keyword === "Day 3" || keyword === "day 3" || keyword === "Day 3" || keyword === "Day3" || keyword === "DAY 3" || keyword === "DAYS 3" || keyword === "day3") {
            showDay3(data);
          }
          if (keyword === "Day 4" || keyword === "day 4" || keyword === "Day 4" || keyword === "Day4" || keyword === "DAY 4" || keyword === "DAYS 4" || keyword === "day4") {
            showDay4(data);
          }
          // loaded = true;
        })
        .fail(function() {
          console.log('error');
        })
    // }
    // else {
    //   console.log("data was loaded");
    // }


    function populateHeader(data) {
      let sampleHeader = $("<h1>");
      $(sampleHeader).text(data.Label);
      $(sampleHeader).appendTo(header);
    }

    function showDays(data){

      let days = data['DaysItems'];

      for (let i = 0; i < days.length; i++) {
        let sampleDayArticle = $('<article>');
        let sampleDayH2 = $('<h2>');
        let sampleDayH3_1 = $('<h3>');
        let sampleDayH3_2 = $('<h3>');
        let samplePara1 = $("<p>");
        let samplePara2 = $("<p>");
        let samplePara3 = $("<p>");
        let samplePara4 = $("<p>");
        let samplePara5 = $("<p>");
        let samplePara6 = $("<p>");
        let samplePara7 = $("<p>");
        let samplePara8 = $("<p>");
        let lineBreak = $("<br>");

        $(sampleDayH2).text(days[i].Day);
        $(sampleDayH3_1).text(days[i].Going.From);
        $(samplePara1).text(days[i].Going.Metro);
        $(samplePara2).text(days[i].Going.TimeLeft);
        $(samplePara3).text(days[i].Going.Arrived);
        $(samplePara4).text(days[i].Going.Weather);

        $(sampleDayH3_2).text(days[i].Return.From);
        $(samplePara5).text(days[i].Return.Metro);
        $(samplePara6).text(days[i].Return.TimeLeft);
        $(samplePara7).text(days[i].Return.Arrived);
        $(samplePara8).text(days[i].Return.Weather);

        $(sampleDayH2).appendTo(sampleDayArticle);
        $(sampleDayH3_1).appendTo(sampleDayArticle);

        $(samplePara1).appendTo(sampleDayArticle);
        $(samplePara2).appendTo(sampleDayArticle);
        $(samplePara3).appendTo(sampleDayArticle);
        $(samplePara4).appendTo(sampleDayArticle);
        $(lineBreak).appendTo(sampleDayArticle);

        $(sampleDayH3_2).appendTo(sampleDayArticle);

        $(samplePara5).appendTo(sampleDayArticle);
        $(samplePara6).appendTo(sampleDayArticle);
        $(samplePara7).appendTo(sampleDayArticle);
        $(samplePara8).appendTo(sampleDayArticle);

        $(section).append(sampleDayArticle);

      }

    }

    function showDay1(data){

      let days = data['DaysItems'];

        let sampleDayArticle = $('<article>');
        let sampleDayH2 = $('<h2>');
        let sampleDayH3_1 = $('<h3>');
        let sampleDayH3_2 = $('<h3>');
        let samplePara1 = $("<p>");
        let samplePara2 = $("<p>");
        let samplePara3 = $("<p>");
        let samplePara4 = $("<p>");
        let samplePara5 = $("<p>");
        let samplePara6 = $("<p>");
        let samplePara7 = $("<p>");
        let samplePara8 = $("<p>");
        let lineBreak = $("<br>");

        $(sampleDayH2).text(days[0].Day);
        $(sampleDayH3_1).text(days[0].Going.From);
        $(samplePara1).text(days[0].Going.Metro);
        $(samplePara2).text(days[0].Going.TimeLeft);
        $(samplePara3).text(days[0].Going.Arrived);
        $(samplePara4).text(days[0].Going.Weather);

        $(sampleDayH3_2).text(days[0].Return.From);
        $(samplePara5).text(days[0].Return.Metro);
        $(samplePara6).text(days[0].Return.TimeLeft);
        $(samplePara7).text(days[0].Return.Arrived);
        $(samplePara8).text(days[0].Return.Weather);

        $(sampleDayH2).appendTo(sampleDayArticle);
        $(sampleDayH3_1).appendTo(sampleDayArticle);

        $(samplePara1).appendTo(sampleDayArticle);
        $(samplePara2).appendTo(sampleDayArticle);
        $(samplePara3).appendTo(sampleDayArticle);
        $(samplePara4).appendTo(sampleDayArticle);
        $(lineBreak).appendTo(sampleDayArticle);

        $(sampleDayH3_2).appendTo(sampleDayArticle);

        $(samplePara5).appendTo(sampleDayArticle);
        $(samplePara6).appendTo(sampleDayArticle);
        $(samplePara7).appendTo(sampleDayArticle);
        $(samplePara8).appendTo(sampleDayArticle);

        $(section).append(sampleDayArticle);

    }

    function showDay2(data){

      let days = data['DaysItems'];

        let sampleDayArticle = $('<article>');
        let sampleDayH2 = $('<h2>');
        let sampleDayH3_1 = $('<h3>');
        let sampleDayH3_2 = $('<h3>');
        let samplePara1 = $("<p>");
        let samplePara2 = $("<p>");
        let samplePara3 = $("<p>");
        let samplePara4 = $("<p>");
        let samplePara5 = $("<p>");
        let samplePara6 = $("<p>");
        let samplePara7 = $("<p>");
        let samplePara8 = $("<p>");
        let lineBreak = $("<br>");

        $(sampleDayH2).text(days[1].Day);
        $(sampleDayH3_1).text(days[1].Going.From);
        $(samplePara1).text(days[1].Going.Metro);
        $(samplePara2).text(days[1].Going.TimeLeft);
        $(samplePara3).text(days[1].Going.Arrived);
        $(samplePara4).text(days[1].Going.Weather);

        $(sampleDayH3_2).text(days[1].Return.From);
        $(samplePara5).text(days[1].Return.Metro);
        $(samplePara6).text(days[1].Return.TimeLeft);
        $(samplePara7).text(days[1].Return.Arrived);
        $(samplePara8).text(days[1].Return.Weather);

        $(sampleDayH2).appendTo(sampleDayArticle);
        $(sampleDayH3_1).appendTo(sampleDayArticle);

        $(samplePara1).appendTo(sampleDayArticle);
        $(samplePara2).appendTo(sampleDayArticle);
        $(samplePara3).appendTo(sampleDayArticle);
        $(samplePara4).appendTo(sampleDayArticle);
        $(lineBreak).appendTo(sampleDayArticle);

        $(sampleDayH3_2).appendTo(sampleDayArticle);

        $(samplePara5).appendTo(sampleDayArticle);
        $(samplePara6).appendTo(sampleDayArticle);
        $(samplePara7).appendTo(sampleDayArticle);
        $(samplePara8).appendTo(sampleDayArticle);

        $(section).append(sampleDayArticle);

    }

    function showDay3(data){

      let days = data['DaysItems'];

        let sampleDayArticle = $('<article>');
        let sampleDayH2 = $('<h2>');
        let sampleDayH3_1 = $('<h3>');
        let sampleDayH3_2 = $('<h3>');
        let samplePara1 = $("<p>");
        let samplePara2 = $("<p>");
        let samplePara3 = $("<p>");
        let samplePara4 = $("<p>");
        let samplePara5 = $("<p>");
        let samplePara6 = $("<p>");
        let samplePara7 = $("<p>");
        let samplePara8 = $("<p>");
        let lineBreak = $("<br>");

        $(sampleDayH2).text(days[2].Day);
        $(sampleDayH3_1).text(days[2].Going.From);
        $(samplePara1).text(days[2].Going.Metro);
        $(samplePara2).text(days[2].Going.TimeLeft);
        $(samplePara3).text(days[2].Going.Arrived);
        $(samplePara4).text(days[2].Going.Weather);

        $(sampleDayH3_2).text(days[2].Return.From);
        $(samplePara5).text(days[2].Return.Metro);
        $(samplePara6).text(days[2].Return.TimeLeft);
        $(samplePara7).text(days[2].Return.Arrived);
        $(samplePara8).text(days[2].Return.Weather);

        $(sampleDayH2).appendTo(sampleDayArticle);
        $(sampleDayH3_1).appendTo(sampleDayArticle);

        $(samplePara1).appendTo(sampleDayArticle);
        $(samplePara2).appendTo(sampleDayArticle);
        $(samplePara3).appendTo(sampleDayArticle);
        $(samplePara4).appendTo(sampleDayArticle);
        $(lineBreak).appendTo(sampleDayArticle);

        $(sampleDayH3_2).appendTo(sampleDayArticle);

        $(samplePara5).appendTo(sampleDayArticle);
        $(samplePara6).appendTo(sampleDayArticle);
        $(samplePara7).appendTo(sampleDayArticle);
        $(samplePara8).appendTo(sampleDayArticle);

        $(section).append(sampleDayArticle);

    }

    function showDay4(data){

      let days = data['DaysItems'];

        let sampleDayArticle = $('<article>');
        let sampleDayH2 = $('<h2>');
        let sampleDayH3_1 = $('<h3>');
        let sampleDayH3_2 = $('<h3>');
        let samplePara1 = $("<p>");
        let samplePara2 = $("<p>");
        let samplePara3 = $("<p>");
        let samplePara4 = $("<p>");
        let samplePara5 = $("<p>");
        let samplePara6 = $("<p>");
        let samplePara7 = $("<p>");
        let samplePara8 = $("<p>");
        let lineBreak = $("<br>");

        $(sampleDayH2).text(days[3].Day);
        $(sampleDayH3_1).text(days[3].Going.From);
        $(samplePara1).text(days[3].Going.Metro);
        $(samplePara2).text(days[3].Going.TimeLeft);
        $(samplePara3).text(days[3].Going.Arrived);
        $(samplePara4).text(days[3].Going.Weather);

        $(sampleDayH3_2).text(days[3].Return.From);
        $(samplePara5).text(days[3].Return.Metro);
        $(samplePara6).text(days[3].Return.TimeLeft);
        $(samplePara7).text(days[3].Return.Arrived);
        $(samplePara8).text(days[3].Return.Weather);

        $(sampleDayH2).appendTo(sampleDayArticle);
        $(sampleDayH3_1).appendTo(sampleDayArticle);

        $(samplePara1).appendTo(sampleDayArticle);
        $(samplePara2).appendTo(sampleDayArticle);
        $(samplePara3).appendTo(sampleDayArticle);
        $(samplePara4).appendTo(sampleDayArticle);
        $(lineBreak).appendTo(sampleDayArticle);

        $(sampleDayH3_2).appendTo(sampleDayArticle);

        $(samplePara5).appendTo(sampleDayArticle);
        $(samplePara6).appendTo(sampleDayArticle);
        $(samplePara7).appendTo(sampleDayArticle);
        $(samplePara8).appendTo(sampleDayArticle);

        $(section).append(sampleDayArticle);

    }

  });



  // switch (keyword) {
  //   case "Going":
  //   case "going":
  //   case "GOING":
  //   case "GO":
  //   case "go":
  //   case :"Going to":
  //   case :"going To":
  //     keyword = "Going";
  //     break;
  //   default:
  // }
});




// switch (keyword) {
//   case "Going":
//   case "going":
//   case "GOING":
//   case "GO":
//   case "go":
//   case :"Going to":
//   case :"going To":
//     keyword = "Going";
//     break;
//   case "Return":
//   case "return":
//   case "RETURN":
//   case "Returning":
//   case "Returning":
//   case "Coming":
//   case :"coming":
//   case :"COMING":
//     keyword = "Return";
//     break;
//   default:
// }
