@extends('layout')
@section('blog')
<h1>Halaman Blog</h1>
    <br>
    <h2>Artikel</h2>
    <article>
        <h3>ABCD</h3>
        <h5>Author : {{ $name }}</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni ex nemo,
            eum optio cumque repellendus repellat minus, accusamus corporis rerum,
            quisquam sunt provident quaerat vel iste excepturi dolore ratione soluta!</p>
    </article>
    <br>
    <article>
        <h3>Dev Indo</h3>
        <h5>Author : {{ $name }}</h5>
        <p>Pada tahun ini, game Indonesia sedangn banyak mendapatkan perhatian masyarakat.
            Hal ini dikarenakan kualitasnya yang sedang meningkat frasstis, jumlahnya yang semakin banyak serta
            masuknya salah astu game indonesia yaitu 'Space For The Unbound' dalam The Game Awards 2023</p>
    </article>
@endsection
