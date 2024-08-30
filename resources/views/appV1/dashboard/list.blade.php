@extends('appV2.layouts.app')
@section('page_title', 'emails')
@section('content')

    <div class="container">
        @php



            if (!empty($single) && is_numeric($single)) {
                $user = \App\User::find($single);
                dd($user->email);
            }
            $users = \App\User::get()->toArray();
            $em = '';
            for ($c = 0; $c < count($users); $c++) {
                $em .= $c === 0? $users[$c]['email'] : ', ' . $users[$c]['email'];
            }
            echo "<p>";

            echo $em;
            echo "</p>";


        @endphp
    </div>

@endsection
