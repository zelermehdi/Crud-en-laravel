
@extends("layout.master")


@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">bienvenue dans notre application</h3>


    <div class="my-3 p-3 bg-body rounded shadow-sm">
 
    <h3 class="border-bottom pb-2 mb-4">Liste des etudiants inscrits</h3>
    
<div class="mt-4">
    <div class="d-flex justify-content-end mb-4">
    <a href="{{route('etudiant.create')}}" class="btn btn-primary">ajouter un nouveau etudiant</a>
    </div>
    @if(session()->has("successDelete"))
<div class=" alert alert-success">
   <h3>{{session()->get('successDelete')}}</h3>
</div>

@endif


<table class="table table-bordered table-hover " >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">classe</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($etudiants as $etudiant)
    <tr>
      <th scope="row">{{$etudiant->id}}</th>
      <td>{{$etudiant->nom}}</td>
      <td>{{$etudiant->prenom}}</td>
      <td>{{$etudiant->classe->libelle}}</td>
      <td>
        <a href="{{route('etudiant.edit',['etudiant'=>$etudiant->id])}}" class="btn btn-info">Editer</a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cet etudiant')){document.getElementById('form-{{$etudiant->id}}').submit() }">Supprimer</a>
        <form id="form-{{$etudiant->id}}" action="{{route('etudiant.supprimer', ['etudiant'=>$etudiant->id])}}" method="POST">

@csrf
<input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
  {{$etudiants->links()}}
</table>
</div>


  </div>




</div>
@endsection