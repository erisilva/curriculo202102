@extends('layouts.clear')

@section('css-header')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endsection

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
    @if(Session::has('create_curriculo'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="text-center py-5">
        <h2>{{ session('create_curriculo') }}</h2>
        <hr class="my-4">
        <p class="lead">Obrigado por cadastrar seu currículo, em breve entraremos em contato</p>
      </div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Atenção!</strong> Todos campos marcados com <strong>*</strong> são de preenchimento obrigatório.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="container">
      <form method="POST" action="{{ route('cadastro.store') }}" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group">
          <label for="nome">Nome do Candidato<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') ?? '' }}">
          @if ($errors->has('nome'))
          <div class="invalid-feedback">
          {{ $errors->first('nome') }}
          </div>
          @endif
      </div>


      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nascimento">Data Nascimento<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('nascimento') ? ' is-invalid' : '' }}" name="nascimento" id="nascimento" value="{{ old('nascimento') ?? '' }}" autocomplete="off">
          @if ($errors->has('nascimento'))
          <div class="invalid-feedback">
          {{ $errors->first('nascimento') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cpf">CPF<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" id="cpf" value="{{ old('cpf') ?? '' }}">
          @if ($errors->has('cpf'))
          <div class="invalid-feedback">
          {{ $errors->first('cpf') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="rg">RG<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" id="rg" value="{{ old('rg') ?? '' }}">
          @if ($errors->has('rg'))
          <div class="invalid-feedback">
          {{ $errors->first('rg') }}
          </div>
          @endif
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="email">E-mail<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?? '' }}">
          @if ($errors->has('email'))
          <div class="invalid-feedback">
          {{ $errors->first('email') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cel1">N° Celular<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('cel1') ? ' is-invalid' : '' }}" name="cel1" id="cel1" value="{{ old('cel1') ?? '' }}">
          @if ($errors->has('cel1'))
          <div class="invalid-feedback">
          {{ $errors->first('cel1') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cel2">N&lowast; Celular Alternativo<strong  class="text-warning">(opcional)</strong></label>
          <input type="text" class="form-control" name="cel2" id="cel2" value="{{ old('cel2') ?? '' }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="formacao_id">Escolaridade<strong  class="text-danger">(*)</strong></label>
          <select class="form-control {{ $errors->has('formacao_id') ? ' is-invalid' : '' }}" name="formacao_id" id="formacao_id">
            <option value="" selected="true">Selecione ...</option>        
            @foreach($formacoes as $formacao)
            <option value="{{$formacao->id}}" {{ old("formacao_id") == $formacao->id ? "selected":"" }}>{{$formacao->descricao}}</option>
            @endforeach
          </select>
          @if ($errors->has('formacao_id'))
          <div class="invalid-feedback">
          {{ $errors->first('formacao_id') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="registro">Registro do Conselho <strong  class="text-warning">(opcional)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('registro') ? ' is-invalid' : '' }}" name="registro" id="registro" value="{{ old('registro') ?? '' }}">
          @if ($errors->has('registro'))
          <div class="invalid-feedback">
          {{ $errors->first('registro') }}
          </div>
          @endif
        </div>  
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="cep">CEP<strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" id="cep" value="{{ old('cep') ?? '' }}">
          @if ($errors->has('cep'))
          <div class="invalid-feedback">
          {{ $errors->first('cep') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-5">  
          <label for="logradouro">Logradouro <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('logradouro') ? ' is-invalid' : '' }}" name="logradouro" id="logradouro" value="{{ old('logradouro') ?? '' }}">
          @if ($errors->has('logradouro'))
          <div class="invalid-feedback">
          {{ $errors->first('logradouro') }}
          </div>
          @endif
        </div> 
        <div class="form-group col-md-2">  
          <label for="numero">Nº <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" id="numero" value="{{ old('numero') ?? '' }}">
          @if ($errors->has('numero'))
          <div class="invalid-feedback">
          {{ $errors->first('numero') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-3">  
          <label for="complemento">Complemento <strong  class="text-warning">(opcional)</strong></label>  
          <input type="text" class="form-control" name="complemento" id="complemento" value="{{ old('complemento') ?? '' }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="bairro">Bairro <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" id="bairro" value="{{ old('bairro') ?? '' }}">
          @if ($errors->has('bairro'))
          <div class="invalid-feedback">
          {{ $errors->first('bairro') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-6">  
          <label for="cidade">Cidade <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" id="cidade" value="{{ old('cidade') ?? '' }}">
          @if ($errors->has('cidade'))
          <div class="invalid-feedback">
          {{ $errors->first('cidade') }}
          </div>
          @endif
        </div> 
        <div class="form-group col-md-2">  
          <label for="uf">UF <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('uf') ? ' is-invalid' : '' }}" name="uf" id="uf" value="{{ old('uf') ?? '' }}">
          @if ($errors->has('uf'))
          <div class="invalid-feedback">
          {{ $errors->first('uf') }}
          </div>
          @endif
        </div>
      </div>


      <div class="form-group">
          <div class="alert alert-warning" role="alert">
            <h3>Anexos</h3>
            <p><strong  class="text-danger">(!)</strong> Só serão aceitos os seguintes formatos: pdf, doc, rft ou txt</p>
            <p><strong  class="text-danger">(!)</strong> O arquivo não pode ter mais de <strong>5MB</strong></p>

          </div>       
      </div>


      <div class="form-group">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="arquivo1">Clique no botão a seguir para anexar seu currículo. O currículo deve conter as seguintes informações: escolaridade, experiências profissionais, cursos e qualificações, quando disponíveis. <strong  class="text-danger">(*)</strong></label>
            <input type="file" class="form-control-file  {{ $errors->has('arquivo1') ? ' is-invalid' : '' }}" id="arquivo1" name="arquivo1">
            @if ($errors->has('arquivo1'))
            <div class="invalid-feedback">
            {{ $errors->first('arquivo1') }}
            </div>
            @endif
          </li>
        </ul>
      </div>

      <div class="form-group">
          <label for="funcao_id">Cargo<strong  class="text-danger">(*)</strong></label>
          <select class="form-control {{ $errors->has('funcao_id') ? ' is-invalid' : '' }}" name="funcao_id" id="funcao_id">
            <option value="" selected="true">Selecione ...</option>        
            @foreach($funcoes as $funcao)
            <option value="{{$funcao->id}}" {{ old("funcao_id") == $funcao->id ? "selected":"" }}>{{$funcao->descricao}}</option>
            @endforeach
          </select>
          @if ($errors->has('funcao_id'))
          <div class="invalid-feedback">
          {{ $errors->first('funcao_id') }}
          </div>
          @endif
      </div>  

      <button type="submit" class="btn-lg btn-primary"><i class="bi bi-check-circle"></i> Enviar Currículo</button>
    
    </div>
    <br>
  </div>
@endsection

@section('script-footer')
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script>
  $(document).ready(function(){

      $('#nascimento').datepicker({
          format: "dd/mm/yyyy",
          todayBtn: "linked",
          clearBtn: true,
          language: "pt-BR",
          autoclose: true,
          todayHighlight: true,
          forceParse: false
      });

      $("#cpf").inputmask({"mask": "999.999.999-99"});
      $("#cel1").inputmask({"mask": "(99) 99999-9999"});
      $("#cel2").inputmask({"mask": "(99) 99999-9999"});
      $("#cep").inputmask({"mask": "99.999-999"});

      function limpa_formulario_cep() {
          $("#logradouro").val("");
          $("#bairro").val("");
          $("#cidade").val("");
          $("#uf").val("");
      }
      
    $("#cep").blur(function () {
          var cep = $(this).val().replace(/\D/g, '');
          if (cep != "") {
              var validacep = /^[0-9]{8}$/;
              if(validacep.test(cep)) {
                  $("#logradouro").val("...");
                  $("#bairro").val("...");
                  $("#cidade").val("...");
                  $("#uf").val("...");
                  $.ajax({
                      dataType: "json",
                      url: "http://srvsmsphp01.brazilsouth.cloudapp.azure.com:9191/cep/?value=" + cep,
                      type: "GET",
                      success: function(json) {
                          if (json['erro']) {
                              limpa_formulario_cep();
                              console.log('cep inválido');
                          } else {
                              $("#bairro").val(json[0]['bairro']);
                              $("#cidade").val(json[0]['cidade']);
                              $("#uf").val(json[0]['uf'].toUpperCase());
                              $("#logradouro").val(json[0]['rua']);
                          }
                      }
                  });
              } else {
                  limpa_formulario_cep();
              }
          } else {
              limpa_formulario_cep();
          }
      });     

  });
</script>

@endsection      
