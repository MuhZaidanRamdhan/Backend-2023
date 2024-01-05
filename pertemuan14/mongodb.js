db.customers.insertOne({
    _id: "1",
    name : "Zaidan"
});


db.products.insertMany([
    {
        _id: "1",
        name: "Indomie goreng",
        price: new NumberLong('2500'),
        category: "food"
    },
    {
        _id: "2",
        name: "Indomie rebus",
        price: new NumberLong('2000'),
        category: "food"
    }
]);