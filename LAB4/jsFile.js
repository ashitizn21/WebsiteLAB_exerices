
// var table = document.getElementById("tabele");
// var course = ["course"=>"web", "courseCode"=>"CSE1234"];

var course = ["course","web", "ccode","cse123"];
var head = document.getElementById("asdf");
head.innerHTML ="asdfghj";
// alert(123456);
console.log(head);
course.forEach(func1);

function func1(data){
    console.log(data);
    head.innerHTML = `<tr>${data}</tr>`;
}
// var value = document.getElementById("table");
// for(data as course){
//     console.log("working");
// }
// alert()
// head.innerText = "Abdi Urgessa";

//     // head.innerText = "<tr><td>" + data + "</td><tr>";
// }

//console.log("hello web");