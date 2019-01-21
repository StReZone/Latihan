    <tbody>
        @foreach($articles as $article)
        <tr class="item{{$article->id}} @if($article->is_published) warning @endif">
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>
                {{App\Article::getExcerpt($article->content)}}
            </td>
            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->diffForHumans() }}</td>
            <td>
                <button class="show-modal btn btn-success" data-id="{{$article->id}}" data-title="{{$article->title}}" data-content="{{$article->content}}" >
                <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                <button class="edit-modal btn btn-info" data-id="{{$article->id}}" data-title="{{$article->title}}" data-content="{{$article->content}}"data-update="{{$article->updated_at}}"">
                <span class="glyphicon glyphicon-edit"></span> Edit</button>
                <button class="delete-modal btn btn-danger" data-id="{{$article->id}}" data-title="{{$article->title}}" data-content="{{$article->content}}">
                <span class="glyphicon glyphicon-trash"></span> Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row"> 
    <div class="col-md-6 col-md-offset-4"> 
    </div>  
</div>