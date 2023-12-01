const {index, store, update, destroy} = require('./fruitsController.js');

const main = () => {
    console.log('Menampilkan seluruh buah  ');
    index();
    console.log('\n');
    store("strawberry");
    console.log('\n');
    update(1, 'blueberry');
    console.log('\n');
    destroy(1);
};

main();