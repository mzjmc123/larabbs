@if(count($errors) > 0)
    <div class="alert alert-danger">
        <h4>有错误发生:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    <l class="glyphicon glyphicon-remove"></l>
                </li>
            @endforeach
        </ul>
    </div>
@endif