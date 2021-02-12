var tid = setInterval(realTime, 2000);

con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM panini", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
    });
});

function realTime() {
    //var mysql = require('mysql');
    //import mysql from 'mysql';
    var mysql = require(['mysql']);
    /*var con = mysql.createConnection({
        host: "localhost",
        user: "barpoldo",
        password: "Zermaculo180202@",
        database: "barpoldo"
    });*/

    let connection = mysql.createConnection({
        host: 'localhost',
        user: 'barpoldo',
        port: '8888',  /* port on which phpmyadmin run */
        password: 'Zermaculo180202@',
        database: 'barpoldo',
        socketPath: '/Applications/MAMP/tmp/mysql/mysql.sock' //for mac and linux
    });



    document.getElementById("D1").innerHTML = 10;
}

function abortTimer() { // to be called when you want to stop the timer
    clearInterval(tid);
}