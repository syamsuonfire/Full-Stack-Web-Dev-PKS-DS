// Soal No. 1
var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];

// Jawaban Soal No. 1
daftarHewan.sort().forEach((item) => {
    console.log(`${item}`);
});

// Soal No. 2
var data = {
    name: "John",
    age: 30,
    address: "Jalan Pelesiran",
    hobby: "Gaming",
};

// Jawaban Soal No. 2
function introduce(data) {
    let name = data.name;
    let age = data.age;
    let address = data.address;
    let hobby = data.hobby;

    return `"Nama saya ${name}, umur saya ${age} tahun, alamat saya di ${address}, dan saya punya hobby yaitu ${hobby}!"`;
}

var perkenalan = introduce(data);
console.log(perkenalan);

// Soal No. 3
const vokal = ["a", "e", "i", "o", "u"];

// Jawaban Soal No. 3
function hitung_huruf_vokal(kata) {
    let count = 0;

    for (let huruf of kata.toLowerCase()) {
        if (vokal.includes(huruf)) {
            count++;
        }
    }

    return count;
}

var hitung_1 = hitung_huruf_vokal("Muhammad");

var hitung_2 = hitung_huruf_vokal("Iqbal");

console.log(hitung_1, hitung_2);

// Soal dan Jawaban Soal No. 4
function hitung(int) {
    return int - 2 + int;
}
console.log(hitung(0));
console.log(hitung(1));
console.log(hitung(2));
console.log(hitung(3));
console.log(hitung(5));
