@extends('templates.default_crud')

@section('search')
    <div class="row">
        <form class="col s12" action="{{ route('home') }}" method="POST">
        	<div class="input-field col s4 left-align">
                <p>
                    <input type="checkbox" id="name"/>
                    <label for="name">Nome</label>
                    <input type="checkbox" id="location"/>
                    <label for="location">Localizacao</label>
                    <input type="checkbox" id="type"/>
                    <label for="type">Tipo</label>
                </p>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
            	<input id="icon_search" type="text" class="validate">
                <label for="icon_search">Buscar</label>
            </div>
            <div class="input-field col s2 right-align">
                <button class="waves-effect waves-light btn" type="submit">Buscar</button>
            </div>
        </form>
    </div>
@stop

@section('fields')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('participant') }}">
        
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="name" name="name" type="text" class="validate">
                    <label for="name">Nome</label>
                </div>
                  
                <div class="input-field col s4">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="cpf" name="cpf" type="text" class="validate">
                    <label for="cpf">CPF</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">email</i>
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" name="phone" type="text" class="validate">
                    <label for="phone">Telefone</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">location_on</i>
                    <input id="address" name="address" type="text" class="validate">
                    <label for="address">Endereco</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="password" type="password" class="validate">
                    <label class="active" for="password">Senha</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <select id="type" name="type">
                        <option value="" disabled selected>Escolha uma opcao</option>
                        <option value="student">Estudante</option>
                        <option value="professor">Professor</option>
                        <option value="community">Comunidade</option>
                        <option value="organization">Organização</option>
                    </select>
                    <label>Tipo de usuario</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">store</i>
                    <input id="university" name="university" type="text" class="validate">
                    <label for="university">Universidade</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">assignment</i>
                    <input id="course" name="course" type="text" class="validate">
                    <label class="active" for="course">Curso</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input id="department" name="department" type="text" class="validate">
                    <label for="department">Departamento</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input id="responsability" name="responsability" type="text" class="validate">
                    <label for="responsability">Responsabilidade</label>
                </div>

            </div>



            <div class="row">
                <div class="input-field col s3">
                    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Inserir</button>
                </div>

                <div class="input-field col s3">
                    <a href="#!" class="waves-effect waves-light btn" id="clearButton" name="clearButton"><i class="material-icons left">delete</i>Limpar</a>
                </div>
            </div>

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop

@section('elements')

    @if($participants == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhum Participante foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($participants as $participant)
            <li class="collection-item avatar">
                <div class="row col s12">
                    <i class="material-icons left">perm_identity</i>
                    <div class="col s3">
                        <span id="nameSearch" name="nameSearch">{{ $participant->name }}</span>
                    </div>
                    
                    <i class="tiny material-icons left">credit_card</i>
                    <div class="col s3">
                        <span id="cpfSearch" name="cpfSearch">{{ $participant->cpf }}</span>
                    </div>
                    <button class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Edit</button>
                <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $participant->name }}');"><i class="material-icons left">delete</i>Delete</a>
                </div>
            </li>
        @endforeach
        </ul>
    @endif
@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('participant.delete') }}";
    }
</script>