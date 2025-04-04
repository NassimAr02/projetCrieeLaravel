@extends("layouts.layout")

@section("title","Criée en cours")

@section("content")

  <!-- Contenu principal -->
  <main>
    <table>
      <thead>
        <tr>
          <th>ID
          <th>First Name
          <th>Last Name
          <th>Goes By
          <th>Gender
          <th>Class
          <th>Alive
      </thead>
      <tbody>
        <tr>
          <td>1
          <td>Malcolm
          <td>Reynolds
          <td>Mal, Cap'n
          <td>M
          <td>Captain
          <td>Yes
        <tr>
          <td>2
          <td>Zoe
          <td>Washburn
          <td>Zoe
          <td>F
          <td>First Mate
          <td>Yes
        <tr class="disabled">
          <td>3
          <td>Hoban
          <td>Washburn
          <td>Wash
          <td>M
          <td>Pilot
          <td>No
        <tr>
          <td>4
          <td>Kaylee
          <td>Frye
          <td>Kaylee
          <td>F
          <td>Mechanic
          <td>Yes
        <tr>
          <td>5
          <td>Jayne
          <td>Cobb
          <td>Jayne
          <td>M
          <td>Muscle
          <td>Yes
        <tr class="disabled">
          <td>6
          <td>[unknown]
          <td>Book
          <td>Shepherd
          <td>M
          <td>Passenger
          <td>No
        <tr>
          <td>7
          <td>Simon
          <td>Tam
          <td>Simon
          <td>M
          <td>Passenger
          <td>Yes
        <tr>
          <td>8
          <td>River
          <td>Tam
          <td>River
          <td>F
          <td>Passenger
          <td>Yes
      </tbody>
    </table>
  </main>

@endsection
