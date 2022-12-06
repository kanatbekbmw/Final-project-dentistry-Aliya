@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <a class="col-md-8" href="{{ route('admin-create-record') }}"><button type="button" class="mt-4 mb-4 ml-4 btn btn-secondary">Добавить запись</button></a>

    <table class="col-md-12 ml-2 pb-10 table table-striped">
        <thead>
          <tr>
            <th>Время</th>
            <th>Понедельник</th>
            <th>Вторник</th>
            <th>Среда</th>
            <td>Четверг</td>
            <td>Пятница</td>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>09:00</td>
            <tr>
                <td>10:00</td>
            </tr>
            <tr>
                <td>11:00</td>
            </tr>
            <tr>
                <td>12:00</td>
            </tr>
            <tr>
                <td>13:00</td>
            </tr>
            <tr>
                <td>14:00</td>
            </tr>    
            <tr>
                <td>15:00</td>    
            </tr>  
            <tr>
                <td>16:00</td>    
            </tr>     
            <tr>
                <td>17:00</td>
            </tr>
                <td>18:00</td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection