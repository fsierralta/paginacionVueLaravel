@extends('welcome')


@section('content')

<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i>Oops.</h3>
        <p>
          <DIV>@{{error}}</DIV>
          
        </p>
        <form class='search-form'>
            <div class='input-group'>
                 <h1> hola</h1>h1>   
             </div>
            </div><!-- /.input-group -->
        </form>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection