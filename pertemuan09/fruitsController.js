// import data
const fruits = require("./data.js");

// menampikan seluruh data
const index = () => {
  for (const fruit of fruits) {
    console.log(fruit);
  }
};

// menambahkan data
const store = (name) => {
  fruits.push(name);

  console.log(`menambahkan data ${name}`);
  index();
};

// Update data
const update = (position, name) => {

  // mengecek jika index memenuhi atau ada
  if (fruits[position] !== undefined) {
    fruits[position] = name;
    console.log(`Data pada index ${position} telah diubah menjadi ${name}`);
    index();
  } else {
    console.log(`Index ${position} tidak ditemukan untuk di update`);
  }
};

// Delete data
const destroy = (position) => {

  // mengecek jika index memenuhi atau ada
  if (fruits[position] !== undefined) {
    fruits.splice(position, 1);
    console.log(`Data pada index ${position} telah dihapus`);
    index();
  } else {
    console.log(`Index ${position} tidak ditemukan untuk dihapus`);
  }
};

// export data
module.exports = { index, store, update, destroy };
