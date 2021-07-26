@extends('layouts.clear')

@section('content')


<div class="container">


  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="text-center">
            <img class="img-fluid" src="{{ asset('img/logo-prefeitura-contagem.png') }}">
          </div>  
        </div>
        <div class="col-md-8">
          <h3>Prefeitura Municipal de Contagem</h3>
          <h4>Secretaria Municipal de Saúde</h4>
          <p class="lead">IGH Contagem – Intervenção</p>
          <hr class="my-4">
          <h4>Cadastro de Currículo</h4>
          <p>Processo Seletivo Simplificado: as vagas serão preenchidas conforme disponibilidade e seguindo a ordem de inscrição, análise de currículos e entrevistas técnicas.</p>
          <p>A convovação será feita <strong>exclusivamente através de e-mail</strong>.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Sua inscrição foi recebida com sucesso.</h1>
    <h2>Número da inscrição <strong>{{ $newcurriculo->id }}</strong></h2>
    <hr class="my-4">
    <p class="lead">Nome: {{ $newcurriculo->nome }}</p>
    <p class="lead">CPF: {{ $newcurriculo->cpf }} RG: {{ $newcurriculo->rg }}</p>
    <h3>Função: {{ $newcurriculo->funcao->descricao }}</h3>  
  </div>

  <div class="container">
    <p class="lead">Data/Hora: {{ $newcurriculo->created_at->format('d/m/Y H:i') }}</p>
  </div>

  <div class="container">
    <a class="btn-lg btn-warning" role="button" onclick="window.print();return false;"><i class="bi bi-printer"></i> Clique aqui para imprimir seu currículo</a>
  </div>
  
</div>

@endsection
