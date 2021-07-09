@extends('layouts.app')
@section('content')
<script>
setActive("add");
</script>
<div class="container center">
    <div id="contact" class="col-md-6">
        @if(session()->has('message'))
        <div class="alert alert-primary">
            {{ session()->get('message') }}
        </div>
        @endif
        <form action="/add/store" method="post" enctype="multipart/form-data">
            @csrf
            <br>
            <h2 class="h2">Deelnemer toevoegen</h2>

            <select id="role" class="form-control" name="role" onblur="getRole()">
                @foreach (\App\Enums\Roles::getKeys() as $item)
                    <option value="{{\App\Enums\Roles::fromKey($item)->value}}">{{$item}}</option>
                @endforeach
            </select><br>

            <div class="form-group">
                <label for="voornaam">Voornaam*</label>
                <input class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" value="{{ old('firstName') }}" id="firstName" name="firstName" placeholder="Voornaam...">
            </div><br>

            <div class="form-group">
                <label for="voornaam">Achternaam*</label>
                <input class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" value="{{ old('lastName') }}" id="lastName" name="lastName" placeholder="Achternaam...">
            </div><br>

            <div class="form-group">
                <label for="voornaam">Geboortedatum*</label>
                <input class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" value="{{ old('birthday') }}" type="date" id="birthday" name="birthday" placeholder="MM-DD-JJJJ...">
            </div><br>

            <div class="form-group">
                    <label for="voornaam">Email</label>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email" name="email" placeholder="Email...">
            </div><br>

            <div class="form-group">
                    <label for="voornaam">Telefoonnummer</label>
                    <input class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" value="{{ old('phoneNumber') }}" id="phoneNumber" name="phoneNumber" placeholder="Telefoonnummerfirst...">
                </div><br>

            <div id="child" style="display: none;">

                <div class="form-group">
                <select class="form-control" name="studentYear">
                    @foreach (\App\Enums\studentYear::getKeys() as $item)
                        <option value="{{\App\Enums\StudentYear::fromKey($item)->value}}">{{$item}}</option>
                    @endforeach
                </select><br>
                </div>

                <div class="form-group">
                    <label for="voornaam">Voornaam Ouder</label>
                    <input class="form-control{{ $errors->has('firstNameParent') ? ' is-invalid' : '' }}" value="{{ old('firstNameParent') }}" id="firstNameParent" name="firstNameParent" placeholder="Voornaam Ouder...">
                </div><br>

                <div class="form-group">
                    <label for="voornaam">Achternaam Ouder</label>
                    <input class="form-control{{ $errors->has('lastNameParent') ? ' is-invalid' : '' }}" value="{{ old('lastNameParent') }}" id="lastNameParent" name="lastNameParent" placeholder="Achternaam Ouder...">
                </div><br>

                <div class="form-group">
                    <label for="voornaam">Adres Ouder</label>
                    <input class="form-control{{ $errors->has('addressParent') ? ' is-invalid' : '' }}" value="{{ old('addressParent') }}" id="addressParent" name="addressParent" placeholder="Adres Ouder...">
                </div><br>

                <div class="form-group">
                    <label for="voornaam">Telefoon Ouder</label>
                    <input class="form-control{{ $errors->has('phoneNumberParent') ? ' is-invalid' : '' }}" value="{{ old('phoneNumberParent') }}" id="phoneNumberParent" name="phoneNumberParent" placeholder="Titel...">
                </div><br>
            </div>
            <div id="dad_mom" style="display: none;">

            </div>
            <div class="form-group">
                <label for="voornaam">Allergieën</label>
                <input class="form-control{{ $errors->has('medicalIssues') ? ' is-invalid' : '' }}" value="{{ old('medicalIssues') }}" id="medicalIssues" name="medicalIssues" placeholder="allergiën...">
            </div><br>

            <div class="form-group">
                <label for="voornaam">Bijzonderheden</label>
                <input class="form-control{{ $errors->has('specials') ? ' is-invalid' : '' }}" value="{{ old('specials') }}" id="specials" name="specials" placeholder="bijzonderheden...">
            </div><br>

            <select class="form-control" name="covidTest">
                @foreach (\App\Enums\CovidProof::getKeys() as $item)
                    <option value="{{\App\Enums\CovidProof::fromKey($item)->value}}">{{$item}}</option>
                @endforeach
            </select><br>

            <select class="form-control" name="checkedIn">
                <option value="1">Check in</option>
                <option value="0">Check niet in</option>
            </select>

            <div class="form-group mb-5">
                <br>
                <input class="btn btn-primary" type="submit" value="Toevoegen">
            </div>
        </form>
    </div>
</div>
<script>
    function getRole() {
        var role = document.getElementById("role").value;
        if(role == {{ App\Enums\Roles::coerce("child")->value }})
        {
            document.getElementById("child").style.display = "inline";
            document.getElementById("dad_mom").style.display = "none";
        }
        else if(role == {{ App\Enums\Roles::coerce("dad_mom")->value }})
        {
            document.getElementById("child").style.display = "none";
            document.getElementById("dad_mom").style.display = "inline";
        }
        else
        {
            document.getElementById("child").style.display = "none";
            document.getElementById("dad_mom").style.display = "none";
        }
    }
</script>
@endsection
