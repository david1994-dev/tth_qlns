<ul>
    @foreach($models as $model)
        <li>{{$model->is_read}}</li>
    @endforeach
</ul>
