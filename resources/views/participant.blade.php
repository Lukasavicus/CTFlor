@extends('templates.default_crud')

@section('search')
    <div class="row">
        <form class="col s12" action="{{ route('home') }}" method="POST">
        	<div class="input-field col s4 left-align">
                <p>
                    <input type="checkbox" id="name"/>
                    <label for="name">Nome</label>
                    &nbsp;
                    <input type="checkbox" id="location"/>
                    <label for="location">Localizacao</label>
                    &nbsp;
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
        <form class="col s12">
        
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">toc</i>
                    <input id="nameForm" type="text" class="validate">
                    <label for="nameForm">Nome</label>
                </div>
                  
                <div class="input-field col s4">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="cpf" type="text" class="validate">
                    <label for="cpf">CPF</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" type="text" class="validate">
                    <label for="phone">Telefone</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">location_on</i>
                    <input id="address" type="text" class="validate">
                    <label for="address">Endereco</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" class="validate">
                    <label class="active" for="password">Senha</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <select>
                      <option value="" disabled selected>Escolha uma opcao</option>
                      <option value="student">Estudante</option>
                      <option value="professor">Professor</option>
                      <option value="community">Comunidade</option>
                    </select>
                    <label>Tipo de usuario</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">store</i>
                    <input id="university" type="text" class="validate">
                    <label for="university">Universidade</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">assignment</i>
                    <input id="course" type="text" class="validate">
                    <label class="active" for="course">Curso</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input id="department" type="text" class="validate">
                    <label for="department">Departamento</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input id="responsability" type="text" class="validate">
                    <label for="responsability">Responsabilidade</label>
                </div>

            </div>



            <div class="row">
            <div class="input-field col s3"></div>
                <div class="input-field col s4">
                    <a href="#!" class="waves-effect waves-light btn" id="insertButton" name="insertButton">
                        <i class="material-icons left">input</i>
                        Inserir
                    </a>
                </div>

                <div class="input-field col s5">
                    <a href="#!" class="waves-effect waves-light btn" id="clearButton" name="clearButton">
                        <i class="material-icons left">delete</i>
                        Limpar
                    </a>
                </div>
            </div>

        </form>
    </div>
@stop

@section('elements')

    @if($participants == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhum evento foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($participants as $participant)
            <li class="collection-item avatar">
                <i class="material-icons circle">toc</i>
                <span class="title">{{ $participant->name }}</span>
                <p>
                    <i class="material-icons">credit_card</i>
                    <i class="material-icons">person_pin</i>
                    <i class="material-icons">call</i>
                    <i class="material-icons">location_on</i>
                    <i class="material-icons">verified_user</i>
                    <i class="material-icons">perm_identity</i>
                    <i class="material-icons">description</i>
                    <i class="material-icons">grade</i>
                    <i class="material-icons">work</i>
                    <i class="material-icons">visibility</i>
                </p>
                <br>
                <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">info_outline</i>Edit</a>
                <a href="#!" class="waves-effect waves-light btn"><i class="material-icons left">delete</i>Delete</a>
            </li>
        @endforeach
        </ul>
    @endif
@stop