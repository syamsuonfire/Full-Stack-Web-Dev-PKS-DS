// Soal dan Jawaban No. 1
const hitungLuasPersegiPanjang = (p, l) => {
    return p * l;
};

let luasPersegiPanjang = hitungLuasPersegiPanjang(10, 2);

console.log(luasPersegiPanjang);

// Soal No. 2
const Function = function literal(firstName, lastName) {
    return {
        firstName: firstName,
        lastName: lastName,
        fullName: function () {
            console.log(firstName + " " + lastName);
        },
    };
};

// Jawaban Soal No. 2
const newFunction = (firstName, lastName) => {
    return {
        firstName,
        lastName,
        fullName: () => console.log(firstName + " " + lastName),
    };
};

// Driver Code
newFunction("William", "Imoh").fullName();

// Soal No. 3
const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
};
// Jawaban Soal No. 3
const { firstName, lastName, address, hobby } = newObject;
// Driver code
console.log(firstName, lastName, address, hobby);

// Soal No. 4
const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = west.concat(east);

// Jawaban Soal No. 4
//Driver Code
const combinedEs6 = [...west, ...east];
console.log(combinedEs6);

// Soal dan Jawaban No. 5
const planet = "earth";
const view = "glass";
var before =
    "Lorem " +
    view +
    " dolor sit amet, " +
    "consectetur adipiscing elit, " +
    planet;
let after = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}`;

console.log(before);
console.log(after);
