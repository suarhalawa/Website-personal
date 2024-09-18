const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'your_database'
});

db.connect(err => {
    if (err) throw err;
    console.log('Database connected.');
});

app.post('/login', (req, res) => {
    const { email, password } = req.body;
    const query = 'INSERT INTO users (email, password) VALUES (?, ?)';
    db.query(query, [email, password], (err, result) => {
        if (err) throw err;
        res.send('Data saved');
    });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});
