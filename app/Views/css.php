<style>
    /* Reset a základní styl */
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Styl tabulky */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f0f0f0;
    font-weight: bold;
}

/* Styl tlačítek */
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #0077cc;
    color: white;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #005fa3;
}

.button:active {
    background-color: #004e88;
}

/* Responsivní tabulka */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    thead tr {
        display: none;
    }

    tr {
        margin-bottom: 10px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ddd;
    }

    td {
        padding-left: 50%;
        position: relative;
    }

    td::before {
        position: absolute;
        top: 12px;
        left: 15px;
        width: 45%;
        white-space: nowrap;
        font-weight: bold;
        content: attr(data-label);
    }
}

</style>