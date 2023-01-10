<html>

<head>
    <title>Pagina Principala</title>
    <style>
    *{
    margin : 0;
    padding: 0;
    font-family: garamond;
}

.front{
    width: 100%;
    height: 100vh;
    background-image: url("nightbeach.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
}


.navbar{
    width: 85%;
    height : 15%;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}


.content{
    color: #FFFFF0;
    position: absolute;
    top: 55%;
    left: 18%;
    transform: translateY(-50%);
    z-index: 2;

}

h1{
    font-size: 75px;
    margin: 10px 0 10px;
    line-height: 40px;
}


h2{
    font-size: 55px;
    margin: 10px 0 20px;
    line-height: 50px;
}


.navbar input[type="submit"]
{
    color: #FFFFF0;
    height: 40px;
    width:120px;
    font-size:18px;
    padding: 10px 25px;
    background: transparent;
    border: 1px solid #FFFFF0;
    border-radius: 20px;
    outline: none;
    cursor: pointer;
}

.navbar input[type="submit"]:hover
{
    cursor:pointer;
    background: #FFFFF0;
    color:black;
}

    </style>
    

</head>
<body>
    <div class="front">
        <div class="navbar">
            <a href = "https://orzataandreiphp.000webhostapp.com/contact/">
                <input type="submit" value ="Contact Us">
            </a>
            <a href = "https://orzataandreiphp.000webhostapp.com/travel/">
                <input type="submit" value ="Our Offers">
            </a>
            <a href = "https://orzataandreiphp.000webhostapp.com/about/">
                <input type="submit" value ="About Us">
            </a>
        </div>
        <div class="content">
            <h1>EasyTour,</h1>
            <h2>o simpla companie de tourism</h2>
             <a href = "https://orzataandreiphp.000webhostapp.com/logout/"><h3>Logout, daca ati terminat sesiunea</h3></a>
        </div>

    </div>
</body>


</html>