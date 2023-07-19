<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <style>
        .purple-text {
            color: #b45fa8;
        }

        h3 {
            font-size: 24px;
            font-weight: bold;
            color: #b45fa8;
        }

        h4 {
            font-size: 20px;
            color: #b45fa8;
        }

        .Our_box {
            text-align: center;
            margin-top: 30px;
        }

        .Our_box img {
            max-width: 150px;
            align-items: center;
            align-content: center;
        }

        .Our_box h4 {
            margin-top: 20px;
            color: black;
        }

        .read_more {
            display: inline-block;
            margin-top: 30px;
            color: #b45fa8;
            border: 2px solid #b45fa8;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .read_more:hover {
            background-color: #b45fa8;
            color: #ffffff;
        }

        .p-6 {
            background-color: #CBA2C7;
            
        }

        /* Estilos personalizados para el footer */
        .footer {
            background-color: #f7f5fa;
            padding: 40px 0;
            text-align: center;
        }

        .footer h3 {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

        .footer p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 30px;
        }

        .footer-bottom {
            background-color: #b45fa8;
            padding: 10px 0;
            text-align: center;
        }

        .footer-bottom p {
            font-size: 14px;
            color: #ffffff;
            margin: 0;
        }

        .footer-bottom a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }
    </style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-error-dashboard">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="bienvenida">
                <div class="jumbotron jumbotron-fluid" style="background-color: #b45fa8;">
                    <div class="container">
                        <h1 class="display-4 text-white" style="font-family: 'Arial', sans-serif; font-weight: bold; font-size: 60px; text-align:center">¡Bienvenida al Gimnasio UNIKA!</h1>
                        <br>
                        <p class="lead text-white" style="font-family: 'Arial', sans-serif;font-size: 30px; text-align:center">Aquí encontrarás información relevante y funciones importantes para lograr tus objetivos de fitness y bienestar.</p>
                    </div>
                </div>
        </div>

        <div class="p-6 text-gray-900">

            <div class="row">
                <div class="col-md-4">
                    <div class="card Our_box">
                        
                        <h3>Peso </h3>
                        <img src="{{ asset('img/icon1.png') }}" alt="logo">
                        <br>
                        <h4>Clases con entrenadores capacitados que permitan poner en practica y demostrar la fuerza femenina.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card Our_box">
                        
                        <h3>Cardio </h3>
                        <img src="{{ asset('img/icon2.png') }}" alt="logo">
                        <h4>Clases orientadas al objetivo ideal para cada clienta.</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card Our_box">
                        
                        <h3>Figura ideal </h3>
                        <img src="{{ asset('img/icon3.png') }}" alt="logo">
                        <h4>Programas que buscan garantizar llegar al peso y estado fisico que cada clienta busca</h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <a class="" href="#"><br></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card Our_box">
                        <h3>Salon de Bienvenida </h3>
                        <img src="{{ asset('img/instalacion2.jpeg') }}" alt="logo">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card Our_box">
                        <h3>Sala de masajes </h3>
                        <img src="{{ asset('img/instalacion1.jpeg') }}" alt="logo">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card Our_box">
                        <h3>Instalaciones </h3>
                        <img src="{{ asset('img/instalacion3.jpeg') }}" alt="logo">

                    </div>
                </div>
                <BR>
            </div>
        </div>
    </div>


    </div>
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="cont">
                            <h3> <span class="multi">Free Multipurpose </span> <br> Responsive Landing Page 2019</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

</x-app-layout>