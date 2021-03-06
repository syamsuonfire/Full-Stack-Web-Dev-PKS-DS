@extends('layout.master')
@section('title')
Buat Account Baru
@endsection

@section('content')
    <div>
      <h2>Sign Up Form</h2>

      <form method="POST" action="/register">
        @csrf
        <div>
          <p>
            <label for="firstname">First Name :</label>
          </p>
          <input type="text" name="firstname" id="firtstname" />
        </div>

        <div>
          <p>
            <label for="lastname">Last Name :</label>
          </p>
          <input type="text" name="lastname" id="lastname" />
        </div>

        <div>
          <p><label for="gender">Gender :</label></p>
          <input type="radio" id="gender" name="gender" value="male" />
            <label for="male">Male</label>
          <br />
          <input type="radio" id="gender" name="gender" value="female" />
            <label for="female">Female</label>
        </div>

        <div>
          <p><label for="nationality">Nationality :</label></p>
          <select name="nationality" id="nationality">
            <option value="indonesia">Indonesia</option>
            <option value="malaysia">Malaysia</option>
            <option value="australia">Australia</option>
            <option value="singapore">Singapore</option>
          </select>
        </div>

        <div>
          <p><label for="fav_language">Language Spoken :</label></p>
          <input
            type="checkbox"
            id="fav_language"
            name="fav_language"
            value="bahasaindonesia"
          />
            <label for="fav_language">Bahasa Indonesia</label>
          <br />
          <input
            type="checkbox"
            id="fav_language"
            name="fav_language"
            value="english"
          />
            <label for="fav_language">English</label>
          <br />
          <input
            type="checkbox"
            id="fav_language"
            name="fav_language"
            value="other"
          />
            <label for="other">Other</label>
        </div>

        <div>
          <p><label for="bio">Bio</label></p>
          <textarea name="bio" cols="30" rows="5" id="bio"></textarea>
        </div>
        <br />
        <input type="submit" value="Sign Up" />
      </form>

    
        <a href="/"><p>Kembali ke halaman Home</p></a> 
     
    </div>
    @endsection