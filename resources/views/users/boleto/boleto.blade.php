<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Lora|Roboto:400,500);

        body {
        margin: 0;
        padding: 0;
        font-size: 16px;
        line-height: 1.5;
        text-rendering: optimizeLegibility;
        font-variant-ligatures: none;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        background-color: #fafafa;
        }
        body::before,
        body::after {
        content: "";
        display: table;
        clear: both;
        }
        body * {
        box-sizing: inherit;
        }
        p, h1 {
        margin: 0; padding: 0;
        }

        body, .text-light-black {
        color: rgba(0,0,0,0.6);
        }
        .text-black {
        color: rgba(0,0,0,0.9);
        }
        .text-muted {
        color: rgba(0, 0, 0, 0.3);
        }



        .text-uppercase {
        text-transform: uppercase;
        }
        .ff-serif {
        font-family: 'Lora', serif;
        }

        .font-weight-normal {
        font-weight: normal;
        }
        .font-weight-medium {
        font-weight: 500;
        }

        .lts-1px {
        letter-spacing: 1px;
        }
        .lts-2px {
        letter-spacing: 2px;
        }


        .w-full {
        width: 100%;
        }

        .text-center {
        text-align: center;
        }
        .text-left {
        text-align: left;
        }
        .text-right {
        text-align: right;
        }

        .d-block {
        display: block;
        }
        .d-inline-block {
        display: inline-block;
        }

        .p-relative {
        position: relative;
        }
        .p-absolute {
        position: absolute
        }



        .bg-white {
        background-color: #fff;
        }






        .small {
        font-size: 0.75rem;
        }
        .card-heading {
        font-size: 2.25rem;
        }
        .styled-link {
        text-decoration: none;
        outline: none;
        color: #2196fe;
        transition: all 0.25s ease-in; 
        }
        .styled-link:hover,
        .styled-link:focus,
        .styled-link:active {
        color: #536dfe;
        }
        .shadow-1 {
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.15);
        }
        .blue-hover {
        transition: all 0.25s ease-in;
        border-bottom: 5px solid transparent;
        }
        .blue-hover:hover {
        transform: translateY(-5px);
        mar
        border: none;
        border-bottom: 5px solid #2196fe;
        }




        .clearfix::before,
        .clearfix::after {
        content: "";
        display: table;
        clear: both;
        }
        .float-left {
        float: left;
        }
        .float-right{
        float: right;
        }






        /**Margin and padding utilities*/
        .mx-auto {
        margin-left: auto;
        margin-right: auto;
        }
        .ml-auto {
        margin-left: auto;
        }
        .mr-auto {
        margin-right: auto;
        }
        .mx-0 {
        margin-left: 0;
        margin-right: 0;
        }
        .mx-1 {
        margin-left: 1rem;
        margin-right: 1rem;
        }
        .mx-2 {
        margin-left: 2rem;
        margin-right: 2rem;
        }
        .mx-3 {
        margin-left: 3rem;
        margin-right: 3rem;
        }


        .my-0 {
        margin-top: 0;
        margin-bottom: 0;
        }
        .my-1 {
        margin-top: 1rem;
        margin-bottom: 1rem;
        }
        .my-2 {
        margin-top: 2rem;
        margin-bottom: 2rem;
        }
        .my-3 {
        margin-top: 3rem;
        margin-bottom: 3rem;
        }

        .mt-0 {
        margin-top: 0;
        }
        .mt-1 {
        margin-top: 1rem;
        }
        .mt-2 {
        margin-top: 2rem;
        }
        .mt-3 {
        margin-top: 3rem;
        }

        .mb-0 {
        margin-bottom: 0;
        }
        .mb-1 {
        margin-bottom: 1rem;
        }
        .mb-2 {
        margin-bottom: 2rem;
        }
        .mb-3 {
        margin-bottom: 3rem;
        }

        .ml-0 {
        margin-left: 0;
        }
        .ml-1 {
        margin-left: 1rem;
        }
        .ml-2 {
        margin-left: 2rem;
        }
        .ml-3 {
        margin-left: 3rem;
        }




        .px-0 {
        padding-left: 0;
        padding-right: 0;
        }
        .px-1 {
        padding-left: 1rem;
        padding-right: 1rem;
        }
        .px-2 {
        padding-left: 2rem;
        padding-right: 2rem;
        }
        .px-3 {
        padding-left: 3rem;
        padding-right: 3rem;
        }


        .py-0 {
        padding-top: 0;
        padding-bottom: 0;
        }
        .py-1 {
        padding-top: 1rem;
        padding-bottom: 1rem;
        }
        .py-2 {
        padding-top: 2rem;
        padding-bottom: 2rem;
        }
        .py-3 {
        padding-top: 3rem;
        padding-bottom: 3rem;
        }

        .pt-0 {
        padding-top: 0;
        }
        .pt-1 {
        padding-top: 1rem;
        }
        .pt-2 {
        padding-top: 2rem;
        }
        .pt-3 {
        padding-top: 3rem;
        }

        .pb-0 {
        padding-bottom: 0;
        }
        .pb-1 {
        padding-bottom: 1rem;
        }
        .pb-2 {
        padding-bottom: 2rem;
        }
        .pb-3 {
        padding-bottom: 3rem;
        }
    
    </style>


<div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 360px; overflow: hidden; border-radius: 1px;">
        <img src="https://as01.epimg.net/deporteyvida/imagenes/2018/02/16/portada/1518787733_123354_1518787790_noticia_normal.jpg" alt="Man with backpack"    
            class="d-block w-full">

  <div class="px-2 py-2">
    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
    Presentar este boleto para acceso
    </p>

    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
    {{ $titulo }}
    </h1>

    <p class="mb-1">
      Precio:   ${{$precio}} <br>
      Código:   {{$codigo }} <br>
      Nombre:   {{$nombre}}<br>
    </p>
       Correo:     {{$correo}}<br>

  </div>
</div>



</body>
</html>