@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mdui-container">
            <div class="mdui-col-sm-12 mdui-m-t-2">
                <br>

                <div class="mdui-typo-display-2 mdui-text-center mdui-text-color-theme">
                    地图信息
                </div>


                <table class="mdui-table">
                    <thead>
                    <tr>
                        <th>名字</th>
                        <th>持有者</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($maps as $map){{-- I am buyer --}}
                    <tr>
                        <td>{{$map->name}}</td>
                        <td>
                            {{$map->owner_name}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
