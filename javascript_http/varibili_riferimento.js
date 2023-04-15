const a = [1, 2, 3, 4];

//const b = a;

//SHALLOW COPY
const b = new Array(...a);

let c = "Lucia";

d = c;

d = "Lucy"; //come fare = new String("Lucy")

b.push("Z");

//console.log(a);
//[ 1, 2, 3, 4, 'Z' ]

console.log(a);
//[ 1, 2, 3, 4 ]

console.log(b);
//[ 1, 2, 3, 4 ]

console.log(c, d);
//Lucia Lucy
