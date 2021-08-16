@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verifique o seu endereço de e-mail</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Um novo link de verificação foi enviado 
                                para o seu endereço de e-mail
                            </div>
                        @endif
                        <p>Antes de prosseguir, por favor, clique no link de verificação do seu e-mail. Se você 
                            não recebeu o e-mail </p>
                            <form action="{{ route('verification.resend') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Clique aqui para receber outro.</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection